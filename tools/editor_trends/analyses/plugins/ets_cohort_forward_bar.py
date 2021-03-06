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
__date__ = '2011-01-25'
__version__ = '0.1'


def ets_cohort_forward_bar(var, editor, **kwargs):
    '''
    The forward looking bar charts looks for every month that an editor
    was part of the Wikimedia community whether this person made at least cutoff
    value edits. If yes, then include this person in the analysis, else skip the
    person. 
    '''
    new_wikipedian = editor['new_wikipedian']
    last_edit = editor['final_edit']
    #monthly_edits = editor['monthly_edits']
    #yearly_edits = editor['edits_by_year']
    totals = editors['totals']['edit_count']
    edits = editors['edit_count']
    n = editor['cum_edit_count']

    if n >= var.cum_cutoff and new_wikipedian != False:
        years = edits.keys()
        for year in years:
            months = edits[year].keys()
            max_edits = max([edits[year][month]['0'] for month in months])
            #max_edits = max(monthly_edits.get(year, {0:0}).values())
            if totals.get(year, 0) == 0 or max_edits < var.cutoff:
                continue
            else:
                experience = (year - new_wikipedian.year) + 1
                var.add(new_wikipedian, 1, {'experience':experience})
    return var
