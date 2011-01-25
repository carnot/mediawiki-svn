#!/usr/bin/python
# -*- coding: utf-8 -*-
'''
Copyright (C) 2010 by Diederik van Liere (dvanliere@gmail.com)
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License version 2
as published by the Free Software Foundation.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details, at
http://www.fsf.org/licenses/gpl.html
'''

__author__ = '''\n'''.join(['Diederik van Liere (dvanliere@gmail.com)', ])
__email__ = 'dvanliere at gmail dot com'
__date__ = '2011-01-14'
__version__ = '0.1'

import calendar
import datetime
import time
import math
import sys
from pymongo.son_manipulator import SONManipulator


sys.path.append('..')
import configuration
settings = configuration.Settings()

from utils import file_utils
from utils import data_converter
from database import db

class Transform(SONManipulator):
    def transform_incoming(self, son, collection):
        for (key, ds) in son.items():
            son[key] = {}
            for x, var in enumerate(ds):
                if isinstance(var, Variable):
                    son[key][var.name] = var.encode()
        for prop in ds.props:
            son[prop] = getattr(ds, prop)
        return son

    def transform_outgoing(self, son, collection):
        for (key, value) in son.items():
            if isinstance(value, dict):
                names = value.keys()
                for name in names:
                    var = Variable(name, None)
                    var.decode(value)
                    son['variables'][name] = var
            else: # Again, make sure to recurse into sub-docs
                son[key] = value
        name = son.pop('name', None)
        project = son.pop('project', None)
        collection = son.pop('collection', None)
        language_code = son.pop('language_code', None)
        variables = son.pop('variables', [])
        ds = Dataset(name, project, collection, language_code, **son)
        for var in variables:
            var = variables[var]
            ds.add_variable(var)
        return ds


class Data:
    def __hash__(self, date):
        #return hash(self.convert_date_to_epoch(date))
        return int(self.convert_date_to_epoch(date))

    def encode_to_bson(self):
        kwargs = dict([(str(key), value) for key, value in self.__dict__.iteritems()])
        for key, value in kwargs.iteritems():
            if isinstance(value, dict):
                d = dict([(str(k), v) for k, v in value.iteritems()])
                kwargs[key] = d
        return kwargs



    def convert_date_to_epoch(self, date):
        assert self.time_unit == 'year' or self.time_unit == 'month' \
        or self.time_unit == 'day'

        if self.time_unit == 'year':
            datum = datetime.datetime(date.year, 1, 1)
            return time.mktime(datum.timetuple())
        elif self.time_unit == 'month':
            datum = datetime.datetime(date.year, date.month, 1)
            return time.mktime(datum.timetuple())
        else:
            return time.mktime(date.timetuple())


class Observation(Data):
    def __init__(self, date, time_unit):
        assert isinstance(date, datetime.datetime)
        self.time_unit = time_unit
        self.t0 = self.set_start_date(date)
        self.t1 = self.set_end_date(date)
        self.hash = self.__hash__(date)
        self.date = date
        self.data = {}
        self._type = 'observation'

    def __repr__(self):
        return '%s' % self.t1

    def __str__(self):
        return 'range: %s:%s' % (self.t0, self.t1)

    def __iter__(self):
        for obs in self.obs:
            yield self.obs[obs]

    def __getitem__(self, key):
        return getattr(self, key, [])

    def next(self):
        try:
            return len(self.data.keys()) + 1
        except IndexError:
            return 0

    def set_start_date(self, date):
        if self.time_unit == 'year':
            return datetime.datetime(date.year, 1, 1)
        elif self.time_unit == 'month':
            return datetime.datetime(date.year, date.month, 1)
        else:
            return datetime.datetime(date.year, date.month, date.day)

    def set_end_date(self, date):
        if self.time_unit == 'year':
            return datetime.datetime(date.year, 12, 31)
        elif self.time_unit == 'month':
            return datetime.datetime(date.year, date.month, calendar.monthrange(date.year, date.month)[1])
        else:
            return datetime.datetime(date.year, date.month, date.day)

    def add(self, value, update):
        if hasattr(value, '__iter__') == False:
            d = {}
            d[0] = value
            value = d
        assert type(value) == type({})
        x = self.next()
        for i, v in value.iteritems():
            self.data.setdefault(i, 0)
            if update:
                self.data[i] += v
            else:
                i += x
                self.data[i] = v


class Variable(Data):
    '''
    This class constructs a time-based variable and has some associated simple 
    statistical descriptives
    '''

    def __init__(self, name, time_unit, **kwargs):
        self.name = name
        self.obs = {}
        self.time_unit = time_unit
        self._type = 'variable'
        self.props = ['name', 'time_unit', '_type']
        for kw in kwargs:
            setattr(self, kw, kwargs[kw])
            self.props.append(kw)

    def __str__(self):
        return self.name

    def __repr__(self):
        return self.name

    def __getitem__(self, key):
        return getattr(self, key, [])

    def __iter__(self):
        dates = self.obs.keys()
        dates.sort()
        for date in dates:
            yield date

    def __len__(self):
        return [x for x in xrange(self.obs())]

    def items(self):
        for key in self.__dict__.keys():
            yield key, getattr(self, key)

    def obs(self):
        for date in self:
            for key in self.obs[date].data.keys():
                yield self.obs[date].data[key]

    def iteritems(self):
        for date in self:
            for value in self.obs[date].data.keys():
                yield (value, self.obs[date].data[value])

    def get_observation(self, date):
        key = self.__hash__(date)
        return self.obs.get(key, Observation(date, self.time_unit))

    def min(self):
        return min([obs for obs in self])
        #return min([self.obs[date].data[k]  for date in self.obs.keys() for k in self.obs[date].data.keys()])

    def max(self):
        return max([self.obs[date].data[k] for date in self.obs.keys() for k in self.obs[date].data.keys()])

    def get_standard_deviation(self, number_list):
        mean = get_mean(number_list)
        std = 0
        n = len(number_list)
        for i in number_list:
            std = std + (i - mean) ** 2
        return math.sqrt(std / float(n - 1))


    def get_median(self, number_list):
        #print number_list
        if number_list == []: return '.'
        data = sorted(number_list)
        data = [float(x) for x in data]
        if len(data) % 2 == 1:
            return data[(len(data) + 1) / 2 - 1]
        else:
            lower = data[len(data) / 2 - 1]
            upper = data[len(data) / 2]
            #print upper, lower
        return (lower + upper) / 2


    def get_mean(self, number_list):
        #print number_list
        if number_list == []: return '.'
        float_nums = [float(x) for x in number_list]
        return sum(float_nums) / len(number_list)

    def summary(self):
        print 'Variable: %s' % self.name
        print 'Mean: %s' % self.get_mean(self)
        print 'Median: %s' % self.get_median(self)
        print 'Standard Deviation: %s' % self.get_standard_deviation(self)
        print 'Minimum: %s' % self.min()
        print 'Maximum: %s' % self.max()


    def add(self, date, value, update=True):
        data = self.get_observation(date)
        data.add(value, update)
        self.obs[data.hash] = data


    def encode(self):
        bson = {}
        for prop in self.props:
            bson[prop] = getattr(self, prop)

        bson['obs'] = {}
        for obs in self:
            data = self.obs[obs]
            obs = str(obs)
            bson['obs'][obs] = data.encode_to_bson()
        return bson

    def decode(self, values):
        for varname in values:
            for prop in values[varname]:
                if isinstance(values[varname][prop], dict):
                    data = values[varname][prop]
                    for d in data:
                        date = data[d]['date']
                        obs = data[d]['data']
                        self.add(date, obs)
                else:
                    setattr(self, prop, values[varname][prop])
                    self.props.append(prop)


class Dataset:
    '''
    This class acts as a container for the Variable class and has some methods
    to output the dataset to a csv file, mongodb and display statistics. 
    '''

    def __init__(self, name, project, collection, language_code, vars=None, **kwargs):
        self.name = name
        self.project = project
        self.collection = collection
        self.language_code = language_code
        self.hash = self.name
        self._type = 'dataset'
        self.filename = '%s_%s.csv' % (self.project, self.name)
        self.created = datetime.datetime.now()
        for kw in kwargs:
            setattr(self, kw, kwargs[kw])
        self.props = self.__dict__.keys()

        self.variables = []
        if vars != None:
            for kwargs in vars:
                name = kwargs.pop('name')
                setattr(self, name, Variable(name, **kwargs))
                self.variables.append(name)

    def __repr__(self):
        return 'Dataset contains %s variables' % (len(self.vars))

    def __iter__(self):
        for var in self.variables:
            yield getattr(self, var)

    def add_variable(self, var):
        if isinstance(var, Variable):
            self.variables.append(var.name)
            setattr(self, var.name, var)

        else:
            raise TypeError('You can only instance of Variable to a dataset.')


    def write(self, format='csv'):
        if format == 'csv':
            self.to_csv()
        elif format == 'mongo':
            self.to_mongo()

    def to_mongo(self):
        dbname = '%s%s' % (self.language_code, self.project)
        mongo = db.init_mongo_db(dbname)
        coll = mongo['%s_%s' % (dbname, 'charts')]
        mongo.add_son_manipulator(Transform())
        coll.remove({'hash':self.hash, 'project':self.project,
                    'language_code':self.language_code})
        coll.insert({'variables': self})

    def to_csv(self):
        data, all_keys = data_converter.convert_dataset_to_lists(self, 'manage')
        headers = data_converter.add_headers(self, all_keys)
        fh = file_utils.create_txt_filehandle(settings.dataset_location, self.filename, 'w', settings.encoding)
        file_utils.write_list_to_csv(headers, fh, recursive=False, newline=True, format=self.format)
        file_utils.write_list_to_csv(data, fh, recursive=False, newline=True, format=self.format)
        fh.close()

    def encode(self):
        props = {}
        for prop in self.props:
            props[prop] = getattr(self, prop)
        return props



#    def transform_to_stacked_bar_json(self):
#        '''
#        This function outputs data in a format that is understood by jquery
#        flot plugin.
#        '''
#        options = {}
#        options['xaxis'] = {}
#        options['xaxis']['ticks'] = []
#        data = []
#        obs, all_keys = ds.convert_dataset_to_lists()
#
#        for ob in obs:
#            d = {}
#            d['label'] = ob[0].year
#            d['data'] = []
#            ob = ob[1:]
#            for x, o in enumerate(ob):
#                d['data'].append([x, o])
#            data.append(d)
#        for x, date in enumerate(obs[0]):
#            options['xaxis']['ticks'].append([x, date.year])
#
#        return data, options


def debug():
    mongo = db.init_mongo_db('enwiki')
    rawdata = mongo['enwiki_charts']
    mongo.add_son_manipulator(Transform())
#    d1 = datetime.datetime.today()
#    d2 = datetime.datetime(2007, 6, 7)
#    ds = Dataset('test', 'enwiki', 'editors_dataset', [{'name': 'count', 'time_unit': 'year'},
#                                                       {'name': 'testest', 'time_unit': 'year'}])
#    ds.count.add(d1, 5)
#    ds.count.add(d2, 514)
#    ds.testest.add(d1, 135)
#    ds.testest.add(d2, 535)
#    #ds.summary()
#    #ds.write_to_csv()
#    v = Variable('test', 'year')
#    ds.encode()
#    mongo.test.insert({'variables': ds})

    #v.add(date , 5)
    #o = v.get_observation(date)
    ds = rawdata.find_one({'project': 'wiki', 'language_code': 'en', 'hash': 'cohort_dataset_backward_bar'})
    transform_to_stacked_bar_json(ds)
    #v.summary()
    print ds





if __name__ == '__main__':
    debug()