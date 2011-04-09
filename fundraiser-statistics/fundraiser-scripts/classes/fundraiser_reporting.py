

"""

Pulls data from storage3.faulkner and generates plots.


"""

__author__ = "Ryan Faulkner"
__revision__ = "$Rev$"
__date__ = "December 16th, 2010"


import sys
sys.path.append('../')

import matplotlib
import datetime
import MySQLdb
import pylab
import HTML
import math

import query_store as qs
import miner_help as mh
import TimestampProcesser as TP
import DataLoader as DL

matplotlib.use('Agg')

		
		
"""

	CLASS :: FundraiserReporting
	
	Base class for reporting fundraiser analytics.  Methods that are intended to be extended in derived classes include:
	
	METHODS:
	
		run_query 				- format and execute the query to obtain data
		gen_plot 				- plots the results of the report
		write_to_html_table 	- writes the results to an HTML table
		run

"""
class FundraiserReporting(TP.TimestampProcesser, DL.DataLoader):	
	
	"""

		Smooths a list of values
		
		INPUT:
	            values       		- a list of datetime objects
	            window_length       - indicate whether the list counts back from the end
	        
	    RETURN: 
	            new_values        - list of smoothed values

	"""
	def smooth(self, values, window_length):

		window_length = int(math.floor(window_length / 2))

		if window_length < 1:
			return values

		list_len = len(values)
		new_values = list()

		for i in range(list_len):
			index_left = max([0, i - window_length])
			index_right = min([list_len - 1, i + window_length])

			width = index_right - index_left + 1
			
			new_val = sum(values[index_left : (index_right + 1)]) / width
			new_values.append(new_val)

		return new_values
	
	"""
	
		workaround for issue with tuple objects in HTML.py 
		MySQLdb returns unfamiliar tuple elements from its fetchall() method
		this is probably a version problem since the issue popped up in 2.5 but not 2.6
		
		INPUT:
	            row       		- row object returned from MySQLdb.fetchall()
	            
	    RETURN: 
	            l        		- a list of tuple objects from the db
	
	"""
	def listify(self, row):
		l = []
		for i in row:
			l.append(i)
		return l
		

	"""
	
		To be overloaded by subclasses for specific types of queries
		
		INPUT:
	            values       		- a list of datetime objects
	            window_length       - indicate whether the list counts back from the end
	        
	    RETURN: 
	            return_status        - integer, 0 indicates un-exceptional execution
	
	"""
	def run_query(self, start_time, end_time, query_name, metric_name):
		return 0
		
	
	"""
	
		To be overloaded by subclasses for different plotting behaviour
		
		INPUT:
	            values       		- a list of datetime objects
	            window_length       - indicate whether the list counts back from the end
	        
	    RETURN: 
	            return_status        - integer, 0 indicates un-exceptional execution
	
	"""
	def gen_plot(self,x, y_lists, labels, title, xlabel, ylabel, subplot_index, fname):
		return 0

	"""
	
		To be overloaded by subclasses for writing tables - this functionality currently exists outside of this class structure (test_reporting.py)
		
		INPUT:
	            values       		- a list of datetime objects
	            window_length       - indicate whether the list counts back from the end
	        
	    RETURN: 
	            return_status        - integer, 0 indicates un-exceptional execution
	
	"""
	def write_to_html_table(self):
		return 0
	
	
	
	"""
	
		The access point of FundraiserReporting and derived objects.  Will be used for executing and orchestrating the creation of plots, tables etc.
		To be overloaded by subclasses 
		
		INPUT:
	         
	    RETURN: 
	            return_status        - integer, 0 indicates un-exceptional execution
	            
	"""
	def run(self):
		return
		


"""

CLASS :: ^TotalAmountsReporting^

This subclass handles reporting on total amounts for the fundraiser.

"""

class TotalAmountsReporting(FundraiserReporting):
	
	def __init__(self):
		self.data = []
		
	def run_query(self, start_time, end_time, query_name, descriptor):
		
		self.init_db()
		
		query_obj = qs.QueryStore()

		# Load the SQL File & Format
		filename = './sql/' + query_name + '.sql'
		sql_stmnt = mh.read_sql(filename)
		sql_stmnt = query_obj.format_query(query_name + descriptor, sql_stmnt, [start_time, end_time])
		
		labels = [None] * 21
		labels[0] = 'clicks'
		labels[1] = 'donations'
		labels[2] = 'total amount'
		labels[3] = 'banner amount'
		labels[4] = 'US amount'
		labels[5] = 'EN amount'
		labels[6] = 'Other Amount'
		labels[7] = 'Email Amount'
		labels[8] = 'Recurring Guess'
		labels[9] = 'completion_rate'
		labels[10] = 'pp_clicks'
		labels[11] = 'pp_donations'
		labels[12] = 'pp_completion'
		labels[13] = 'pp_amount'
		labels[14] = 'pp_max_amount'
		labels[15] = 'cc_clicks'
		labels[16] = 'cc_donations'
		labels[17] = 'cc_completion'
		labels[18] = 'cc_amount'
		labels[19] = 'cc_max_amount'
		labels[20] = 'total_amt50'

		
		num_keys = len(labels)
		
		lists = list()
		for i in range(num_keys):
			lists.append(list())
		
		# Composes the data for each banner
		try:
			err_msg = sql_stmnt
			self.cur.execute(sql_stmnt)

			# This query store records according to dates
			results = self.cur.fetchall()
			for row in results:
				for i in range(num_keys):
					lists[i].append(row[i+1]) 	
				
		except:
			self.db.rollback()
			sys.exit("Database Interface Exception:\n" + err_msg)
		
		self.close_db()
		
		# Only interested in amounts
		return [labels, lists]
	
	
	
	def gen_plot(self,x, y_lists, labels, title, xlabel, ylabel, ranges, subplot_index, fname):
		pylab.subplot(subplot_index)
		num_keys = len(y_lists)
		
		pylab.figure(num=None,figsize=[26,14])
		line_types = ['b-o','g-o','r-o','c-o','m-o','k-o','b--o','g--o','r--o','c--o','m--o','k--o']
		
		for i in range(num_keys):
			pylab.plot(x, y_lists[i], line_types[i])

		pylab.grid()
		pylab.xlim(ranges[0], ranges[1])
		pylab.legend(labels,loc=2)

		pylab.xlabel(xlabel)
		pylab.ylabel(ylabel)

		pylab.title(title)
		pylab.savefig(fname+'.png', format='png')
	
	
	
	def run_hr(self, type):
		
		
		# Current date & time
		now = datetime.datetime.now()
		#UTC = 8
		#delta = datetime.timedelta(hours=UTC)
		#now = now + delta


		# ESTABLISH THE START TIME TO PULL ANALYTICS
		hours_back = 24
		times = self.gen_date_strings_hr(now, hours_back)
		
		start_time = times[0]
		end_time = times[1]

		print '\nGenerating analytics total amount for ' + str(hours_back) + ' hours back. The start and end times are: ' + start_time + ' - ' + end_time +' ... \n'

		# QUERY NAME
		query_name = 'report_total_amounts'
		

		# RUN BY HOUR
		descriptor = '_by_hr'
		return_val = self.run_query(start_time, end_time, query_name, descriptor)
		
		labels = return_val[0] 	# curve labels
		counts = return_val[1]	# curve data - lists
		
		r = self.get_query_fields(labels, counts, type, start_time, end_time)
		labels = r[0]
		counts = r[1]
		title = r[2]
		ylabel = r[3]
		
		xlabel = 'Time - Hours'
		subplot_index = 111
		
		# plot the curves
		time_range = range(len(counts[0]))
		for i in range(len(counts[0])):
			time_range[i] = time_range[i] - len(counts[0])
		
		ranges = [min(time_range), max(time_range)]
		
		fname = query_name + descriptor + '_' + type
		self.gen_plot(time_range, counts, labels, title, xlabel, ylabel, ranges, subplot_index, fname)
		
	
	
	def run_day(self,type):
		
		# Current date & time
		now = datetime.datetime.now()
		#UTC = 8
		#delta = datetime.timedelta(hours=UTC)
		#now = now + delta


		# ESTABLISH THE START TIME TO PULL ANALYTICS
		days_back = 7
		times = self.gen_date_strings_day(now, days_back)
		
		start_time = times[0]
		end_time = times[1]

		print '\nGenerating analytics total amount for ' + str(days_back) + ' days back. The start and end times are: ' + start_time + ' - ' + end_time +' ... \n'


		# FORMAT HEADERS & QUERY NAME
		query_name = 'report_total_amounts'
		descriptor = '_by_day'
		return_val = self.run_query(start_time, end_time, query_name, descriptor)

		labels = return_val[0]
		counts = return_val[1]

		r = self.get_query_fields(labels, counts, type, start_time, end_time)
		labels = r[0]
		counts = r[1]
		title = r[2]
		ylabel = r[3]
		
		xlabel = 'Time - Days'
		subplot_index = 111
		
		# Plot values
		time_range = range(len(counts[0]))
		for i in range(len(counts[0])):
			time_range[i] = time_range[i] - len(counts[0])
		
		ranges = [min(time_range), max(time_range)]
		
		fname = query_name + descriptor + '_' + type
		self.gen_plot(time_range, counts, labels, title, xlabel, ylabel, ranges, subplot_index, fname)
		
		
	def get_query_fields(self, labels, counts, type, start_time, end_time):
		
		if type == 'BAN_EM':
			indices = range(2,9)
			title = 'Total Amounts: ' + start_time + ' -- ' + end_time
			ylabel = 'Amount'
		elif type == 'CC_PP_completion':
			indices = [12,17]
			title = 'Credit Card & Paypal Completion Rates: ' + start_time + ' -- ' + end_time
			ylabel = 'Rate'			
		elif type == 'CC_PP_amount':
			indices = [13,18]
			title = 'Credit Card & Paypal Total Amounts: ' + start_time + ' -- ' + end_time
			ylabel = 'Amount'
		elif type == 'AMT_VS_AMT50':
			indices = [2,20]
			title = 'Amount50 and Amount Totals: ' + start_time + ' -- ' + end_time
			ylabel = 'Amount'
		else:
			sys.exit("Total Amounts: You must enter a valid report type.\n" )
		
		# Exract relevant labels and values
		labels_temp = list()
		counts_temp = list()
		
		for i in range(len(labels)):
			if i in indices:
				labels_temp.append(labels[i])
				counts_temp.append(counts[i])

		return [labels_temp, counts_temp, title, ylabel]
		

"""

CLASS :: ^BannerLPReporting^

This subclass handles reporting on banners and landing pages for the fundraiser.

"""

class BannerLPReporting(FundraiserReporting):
	
		
	def __init__(self, *args):
		
		if len(args) == 2:
			self.campaign = args[0]
			self.start_time = args[1]
		else:
			self.campaign = None
			self.start_time = None
		
	def run_query(self,start_time, end_time, campaign, query_name, metric_name):
		
		self.init_db()
		
		query_obj = qs.QueryStore()

		metric_lists = mh.AutoVivification()
		time_lists = mh.AutoVivification()
		# table_data = []		# store the results in a table for reporting
		
		# Load the SQL File & Format
		filename = './sql/' + query_name + '.sql'
		sql_stmnt = mh.read_sql(filename)
		
		query_name  = 'report_bannerLP_metrics'  # rename query to work with query store
		sql_stmnt = query_obj.format_query(query_name, sql_stmnt, [start_time, end_time, campaign])
		
		key_index = query_obj.get_banner_index(query_name)
		time_index = query_obj.get_time_index(query_name)
		metric_index = query_obj.get_metric_index(query_name, metric_name)
		
		# Composes the data for each banner
		try:
			err_msg = sql_stmnt
			self.cur.execute(sql_stmnt)
			
			results = self.cur.fetchall()
			
			# Compile Table Data
			# cpRow = self.listify(row)
			# table_data.append(cpRow)
			
			for row in results:

				key_name = row[key_index]
				
				try:
					metric_lists[key_name].append(row[metric_index])
					time_lists[key_name].append(row[time_index])
				except:
					metric_lists[key_name] = list()
					time_lists[key_name] = list()

					metric_lists[key_name].append(row[metric_index])
					time_lists[key_name].append(row[time_index])

		except:
			self.db.rollback()
			sys.exit("Database Interface Exception:\n" + err_msg)
		
		""" Convert Times to Integers """
		# Find the earliest date
		max_i = 0
		
		for key in time_lists.keys():
			for date_str in time_lists[key]:
				day_int = int(date_str[8:10])
				hr_int = int(date_str[11:13])
				date_int = int(date_str[0:4]+date_str[5:7]+date_str[8:10]+date_str[11:13])
				if date_int > max_i:
					max_i = date_int
					max_day = day_int
					max_hr = hr_int 
		
		
		# Normalize dates
		time_norm = mh.AutoVivification()
		for key in time_lists.keys():
			for date_str in time_lists[key]:
				day = int(date_str[8:10])
				hr = int(date_str[11:13])
				# date_int = int(date_str[0:4]+date_str[5:7]+date_str[8:10]+date_str[11:13])
				elem = (day - max_day) * 24 + (hr - max_hr)
				try: 
					time_norm[key].append(elem)
				except:
					time_norm[key] = list()
					time_norm[key].append(elem)
					
		# smooth out the values
		#window_length = 20
		#for banner in metric_lists.keys():
		#	metric_lists[banner] = smooth(metric_lists[banner], window_length)

		self.close_db()
		
		# return [metric_lists, time_norm, table_data]
		return [metric_lists, time_norm]
		
		
	def gen_plot(self,counts, times, title, xlabel, ylabel, ranges, subplot_index, fname):
		pylab.subplot(subplot_index)
		pylab.figure(num=None,figsize=[26,14])	
		count_keys = counts.keys()
		
		line_types = ['b-o','g-o','r-o','c-o','m-o','k-o','y-o','b--d','g--d','r--d','c--d','m--d','k--d','y--d','b-.s','g-.s','r-.s','c-.s','m-.s','k-.s','y-.s']
		
		count = 0
		for key in counts.keys():
			pylab.plot(times[key], counts[key], line_types[count])
			count = count + 1

		pylab.grid()
		pylab.xlim(ranges[0], ranges[1])
		pylab.legend(count_keys,loc=2)

		pylab.xlabel(xlabel)
		pylab.ylabel(ylabel)

		pylab.title(title)
		pylab.savefig(fname, format='png')
		
	
	"""
	
		type = 'LP' || 'BAN' || 'BAN-TEST' || 'LP-TEST'
		
	"""
	def run(self, type, metric_name):
		
		# Current date & time
		now = datetime.datetime.now()
		#UTC = 8
		#delta = datetime.timedelta(hours=UTC)
		#now = now + delta
		
		# ESTABLISH THE START TIME TO PULL ANALYTICS
		hours_back = 24
		times = self.gen_date_strings_hr(now, hours_back)
		
		start_time = times[0]
		end_time = times[1]
		
		print '\nGenerating ' + type +' for ' + str(hours_back) + ' hours back. The start and end times are: ' + start_time + ' - ' + end_time +' ... \n'
		
		if type == 'LP':
			query_name = 'report_LP_metrics'
			
			# Set the campaign type - either a regular expression corresponding to a particular campaign or specific campaign
			if self.campaign == None:
				campaign = '[0-9](JA|SA|EA|TY)[0-9]'
			else:
				campaign = self.campaign 
				
			title = metric_name + ': ' + start_time + ' -- ' + end_time 
			fname = query_name + '_' + metric_name + '.png'			
		elif type == 'BAN':
			query_name = 'report_banner_metrics'
			
			# Set the campaign type - either a regular expression corresponding to a particular campaign or specific campaign
			if self.campaign == None:
				campaign = '[0-9](JA|SA|EA|TY)[0-9]'
			else:
				campaign = self.campaign 
				
			title = metric_name + ': ' + start_time + ' -- ' + end_time 
			fname = query_name + '_' + metric_name + '.png'
		elif type == 'BAN-TEST':
			r = self.get_latest_campaign()
			query_name = 'report_banner_metrics'
			
			# Set the campaign type - either a regular expression corresponding to a particular campaign or specific campaign
			if self.campaign == None:
				campaign = r[0]
				start_time = r[1]
			else:
				campaign = self.campaign 
				start_time = self.start_time
				
			title = metric_name + ': ' + start_time + ' -- ' + end_time + ', CAMPAIGN =' + campaign 
			fname = query_name + '_' + metric_name + '_latest' + '.png'
		elif type == 'LP-TEST':
			r = self.get_latest_campaign()
			query_name = 'report_LP_metrics'
			
			# Set the campaign type - either a regular expression corresponding to a particular campaign or specific campaign
			if self.campaign == None:
				campaign = r[0]
				start_time = r[1]
			else:
				campaign = self.campaign 
				start_time = self.start_time
				
			title = metric_name + ': ' + start_time + ' -- ' + end_time + ', CAMPAIGN =' + campaign 
			fname = query_name + '_' + metric_name + '_latest' + '.png'
		else:
			sys.exit("Invalid type name - must be 'LP' or 'BAN'.")	
		
		return_val = self.run_query(start_time, end_time, campaign, query_name, metric_name)
		metrics = return_val[0]
		times = return_val[1]
		
		# title = metric_name + ': ' + start_time + ' -- ' + end_time
		xlabel = 'Time - Hours'
		ylabel = metric_name
		subplot_index = 111
		
		min_time = 99
		for key in times.keys():
			min_elem = min(times[key])
			if min_elem < min_time:
				min_time = min_elem
		
		ranges = [min_time, 0]
		
		self.gen_plot(metrics, times, title, xlabel, ylabel, ranges, subplot_index, fname)
		
		return [metrics, times]
	
	
	def get_latest_campaign(self):
		
		query_name = 'report_latest_campaign'
		self.init_db()
		
		# Look at campaigns over the past 24 hours
		now = datetime.datetime.now()
		hours_back = 72
		times = self.gen_date_strings_hr(now, hours_back)
		
		query_obj = qs.QueryStore()
		sql_stmnt = mh.read_sql('./sql/report_latest_campaign.sql')
		sql_stmnt = query_obj.format_query(query_name, sql_stmnt, [times[0]])
		
		campaign_index = query_obj.get_campaign_index(query_name)
		time_index = query_obj.get_time_index(query_name)
		
		try:
			err_msg = sql_stmnt
			self.cur.execute(sql_stmnt)
			
			row = self.cur.fetchone()
		except:
			self.db.rollback()
			sys.exit("Database Interface Exception:\n" + err_msg)
			
		campaign = row[campaign_index]
		timestamp = row[time_index] 
			
		self.close_db()
		
		return [campaign, timestamp]

	"""
	
		Takes as input and converts it to a set of hours counting back from 0
		
		time_lists 		- a dictionary of timestamp lists
		time_norm 	- a dictionary of normalized times
		
	"""
	def normalize_timestamps(self, time_lists):
		# Find the earliest date
		max_i = 0
		
		for key in time_lists.keys():
			for date_str in time_lists[key]:
				day_int = int(date_str[8:10])
				hr_int = int(date_str[11:13])
				date_int = int(date_str[0:4]+date_str[5:7]+date_str[8:10]+date_str[11:13])
				if date_int > max_i:
					max_i = date_int
					max_day = day_int
					max_hr = hr_int 
		
		
		# Normalize dates
		time_norm = mh.AutoVivification()
		for key in time_lists.keys():
			for date_str in time_lists[key]:
				day = int(date_str[8:10])
				hr = int(date_str[11:13])
				# date_int = int(date_str[0:4]+date_str[5:7]+date_str[8:10]+date_str[11:13])
				elem = (day - max_day) * 24 + (hr - max_hr)
				try: 
					time_norm[key].append(elem)
				except:
					time_norm[key] = list()
					time_norm[key].append(elem)
		
		return time_norm

"""

CLASS :: ^MinerReporting^

This subclass handles reporting on raw values imported into the database.

"""

class MinerReporting(FundraiserReporting):
	
	def run_query(self, start_time, end_time, query_name):
		
		self.init_db()
		
		query_obj = qs.QueryStore()

		counts = list()
		times = list()
			
		# Load the SQL File & Format
		filename = './sql/' + query_name + '.sql'
		sql_stmnt = mh.read_sql(filename)
		
		sql_stmnt = query_obj.format_query(query_name, sql_stmnt, [start_time, end_time])
		#print sql_stmnt
		
		# Get Indexes into Query
		count_index = query_obj.get_count_index(query_name)
		time_index = query_obj.get_time_index(query_name)

		# Composes the data for each banner
		try:
			err_msg = sql_stmnt
			self.cur.execute(sql_stmnt)
			
			results = self.cur.fetchall()
			
			for row in results:
				counts.append(row[count_index])
				times.append(row[time_index])
				
		except:
			self.db.rollback()
			sys.exit("Database Interface Exception:\n" + err_msg)
		
		""" Convert Times to Integers """
		time_norm =  self.normalize_timestamps(times)
					

		self.close_db()
		
		return [counts, time_norm]
	

	# Create histograms for hourly counts
	
	def gen_plot(self,counts, times, title, xlabel, ylabel, ranges, subplot_index, fname):
		
		pylab.subplot(subplot_index)
		pylab.figure(num=None,figsize=[26,14])	
		
		# pylab.plot(times, counts)
		# pylab.hist(counts, times)
		pylab.bar(times, counts, width=0.5)
		
		pylab.grid()
		pylab.xlim(ranges[0], ranges[1])
		
		pylab.xlabel(xlabel)
		pylab.ylabel(ylabel)

		pylab.title(title)
		pylab.savefig(fname, format='png')
		
	def run(self, query_name):
		
		query_obj = qs.QueryStore()
		
		# Current date & time
		now = datetime.datetime.now()
		#UTC = 8
		#delta = datetime.timedelta(hours=UTC)
		#now = now + delta
		
		# ESTABLISH THE START TIME TO PULL ANALYTICS
		hours_back = 24
		times = self.gen_date_strings_hr(now, hours_back)
		
		start_time = times[0]
		end_time = times[1]
		
		print '\nGenerating ' + query_name +', start and end times are: ' + start_time + ' - ' + end_time +' ... \n'
		
		# Run Query
		return_val = self.run_query(start_time, end_time, query_name)
		counts = return_val[0]
		times = return_val[1]
		
		# Normalize times
		min_time = min(times)
		ranges = [min_time, 0]
		
		xlabel = 'Hours'
		subplot_index = 111
		fname = query_name + '.png'
		
		title = query_obj.get_plot_title(query_name)
		title = title + ' -- ' + start_time + ' - ' + end_time
		ylabel = query_obj.get_plot_ylabel(query_name)
		
		# Convert counts to float (from Decimal) to prevent exception when bar plotting
		# Bbox::update_numerix_xy expected numerix array
		counts_new = list()
		for i in range(len(counts)):
			counts_new.append(float(counts[i]))
		counts = counts_new
			
		# Generate Histogram
		self.gen_plot(counts, times, title, xlabel, ylabel, ranges, subplot_index, fname)
		
	
"""

CLASS :: IntervalReporting

Performs queries that take timestamps, query, and an interval as arguments.  Data for a single metric 
is generated for each time interval in the time period defined by the start and end timestamps. 

Types of queries supported:

report_banner_metrics_minutely
report_LP_metrics_minutely

"""

class IntervalReporting(FundraiserReporting):
	
	def run_query(self, start_time, end_time, interval, query_name, metric_name, campaign):
		
		self.init_db()
		
		query_obj = qs.QueryStore()

		metrics = mh.AutoVivification()
		times = mh.AutoVivification()
		times_norm = mh.AutoVivification()
		
		""" Compose datetime objects to represent the first and last intervals """
		start_time_obj = self.timestamp_to_obj(start_time, 1)
		start_time_obj = start_time_obj.replace(minute=int(math.floor(start_time_obj.minute / interval) * interval))
		start_time_obj_str = self.timestamp_from_obj(start_time_obj, 1, 3)
		
		end_time_obj = self.timestamp_to_obj(end_time, 1)
		# end_time_obj = end_time_obj + datetime.timedelta(seconds=-1)
		end_time_obj = end_time_obj.replace(minute=int(math.floor(end_time_obj.minute / interval) * interval))			
		end_time_obj_str = 	self.timestamp_from_obj(end_time_obj, 1, 3)
		
		""" The start time for the impression portion of the query should be one second less"""
		
		imp_start_time_obj = start_time_obj + datetime.timedelta(seconds=-1)
		imp_start_time_obj_str = self.timestamp_from_obj(imp_start_time_obj, 1, 3)
		
		""" Load the SQL File & Format """
		filename = './sql/' + query_name + '.sql'
		sql_stmnt = mh.read_sql(filename)
		
		sql_stmnt = query_obj.format_query(query_name, sql_stmnt, [start_time, end_time, campaign, interval, imp_start_time_obj_str])
		# print sql_stmnt
		
		""" Get Indexes into Query """
		key_index = query_obj.get_banner_index(query_name)
		metric_index = query_obj.get_metric_index(query_name, metric_name)
		time_index = query_obj.get_time_index(query_name)
		
		""" Compose the data for each separate donor pipeline artifact """
		try:
			err_msg = sql_stmnt
			self.cur.execute(sql_stmnt)
			
			results = self.cur.fetchall()
			final_time = dict() 									# stores the last timestamp seen
			interval_obj = datetime.timedelta(minutes=interval)		# timedelta object used to shift times by _interval_ minutes
			
			for row in results:
				
				key_name = row[key_index]
			 	time_obj = self.timestamp_to_obj(row[time_index], 1)  # format = 1, 14-digit TS 
			 	
				""" For each new dictionary index by key name start a new list if its not already there """	
				try:
					metrics[key_name].append(row[metric_index])
					times[key_name].append(time_obj + interval_obj)
					final_time[key_name] = row[time_index]
				except:
					metrics[key_name] = list()
					times[key_name] = list()
					
					""" If the first element is not the start time add it 
						this will be the case if there is no data for the first interval 
						NOTE:   two datapoints are added at the beginning to define the first interval """
					if start_time_obj_str != row[time_index]:
						times[key_name].append(start_time_obj)
						metrics[key_name].append(0.0)
						
						times[key_name].append(start_time_obj + interval_obj)
						metrics[key_name].append(0.0)
					else:
						metrics[key_name].append(row[metric_index])
						times[key_name].append(time_obj)
						
						metrics[key_name].append(row[metric_index])
						times[key_name].append(time_obj + interval_obj)
			
			
		except:
			self.db.rollback()
			sys.exit("Database Interface Exception:\n" + err_msg)
		


		""" Ensure that the last time in the list is the endtime less the interval """
		
		for key in times.keys():
			if final_time[key_name] != end_time_obj_str:
				times[key].append(end_time_obj)
				metrics[key].append(0.0)
			
		self.close_db()
		
		return [metrics, times]
	
		"""
		Execute reporting query and generate plots		
	"""			

	"""
		Execute reporting query and generate plots		
	"""		
	def gen_plot(self, metrics, times, title, xlabel, ylabel, ranges, subplot_index, fname):
		
		pylab.subplot(subplot_index)
		pylab.figure(num=None,figsize=[26,14])	
		
		line_types = ['b-o','g-o','r-o','c-o','m-o','k-o','y-o','b--d','g--d','r--d','c--d','m--d','k--d','y--d','b-.s','g-.s','r-.s','c-.s','m-.s','k-.s','y-.s']
		
		count = 0
		for key in metrics.keys():
			pylab.step(times[key], metrics[key], line_types[count])
			count = count + 1
		
		pylab.grid()
		pylab.xlim(ranges[0], ranges[1])
		pylab.ylim(ranges[2], ranges[3])
		pylab.legend(metrics.keys(),loc=2)

		pylab.xlabel(xlabel)
		pylab.ylabel(ylabel)

		pylab.title(title)
		pylab.savefig(fname, format='png')


	"""
		Execute reporting query and generate plots		
	"""		
	def run(self, start_time, end_time, interval, query_name, metric_name, campaign):
		
		query_obj = qs.QueryStore()
		
		print '\nGenerating ' + query_name +', start and end times are: ' + start_time + ' - ' + end_time +' ... \n'
		
		# Run Query
		return_val = self.run_query(start_time, end_time, interval, query_name, metric_name, campaign)
		counts = return_val[0]
		times = return_val[1]
		
		""" Convert Times to Integers that indicate relative times AND normalize the intervals in case any are missing """
		for key in times.keys():
			times[key] = self.normalize_timestamps(times[key], False, 2)
			times[key], counts[key] = self.normalize_intervals(times[key], counts[key], interval)
		
		# Normalize times
		min_time = min(times)
		ranges = [min_time, 0]
		
		xlabel = 'MINUTES'
		subplot_index = 111
		fname = campaign + ' ' + query_name + ' ' + metric_name + '.png'
		
		metric_full_name = query_obj.get_metric_full_name(metric_name)
		title = campaign + ':  ' + metric_full_name + ' -- ' + start_time + ' - ' + end_time
		ylabel = metric_full_name
		
		""" Convert counts to float (from Decimal) to prevent exception when bar plotting
			Bbox::update_numerix_xy expected numerix array """
		for key in counts.keys():
			counts_new = list()
			for i in range(len(counts[key])):
				counts_new.append(float(counts[key][i]))
			counts[key] = counts_new
		
		""" Determine List maximums """
		times_max = 0
		metrics_max = 0
		
		for key in counts.keys():
			list_max = max(counts[key])
			if list_max > metrics_max:
				metrics_max = list_max 
		
		for key in times.keys():
			list_max = max(times[key])
			if list_max > times_max:
				times_max = list_max
		
		ranges = list()
		ranges.append(0.0)
		ranges.append(times_max * 1.1)
		ranges.append(0.0)
		ranges.append(metrics_max * 1.1)
		
		
		""" Generate plots given data """
		self.gen_plot(counts, times, title, xlabel, ylabel, ranges, subplot_index, fname)
		

