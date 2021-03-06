
-- This test metric query pulls data for impressions, landing pages, and donations
-- rates for impressions are scaled relative to the impressions seen by a given landing page	

-- column names
--
--
--utm_campaign	
-- Banner (from utm_source)	
-- Landing Page	
-- Banner Views	
-- Landing Page Views	
-- Donate button clicks	(Number of donations)	
-- Total amount	
-- Landing Page Views / Banner Views (% - banner click rate)	
-- Amounts / Impression ($)	
-- Donations / Impression (% - banner donation rate)	
-- Donations / Donate button clicks (%) 	
-- Donate button clicks / Landing (%)	
-- Total amount / Landing page views ($)	
-- Amount / Donation ($)
--
--
--
--


use faulkner;


set @s = '20101213000000';
set @e = '20101214000000';


drop table if exists query_bin_imp_vis_ecomm;

create table query_bin_imp_vis_ecomm as 
select

imp.hr,
impressions as total_impressions,
floor(impressions * views / views_banner) as impressions,
views as views,
total_clicks as clicks,
donations as donations,
amount as amount,
views / floor(impressions * views / views_banner) as click_rate_lp,
--views_banner / impressions  as click_rate_banner,
donations / total_clicks as conversion_rate,
round(donations / floor(impressions * views / views_banner) ,6) as don_per_imp,
-- amount / floor(impressions * views / views_banner) as amt_per_imp,
donations / views as don_per_view
-- amount / views as amt_per_view,
-- amount / donations  as amt_per_donation

from

(select 
DATE_FORMAT(on_minute,'%H') as hr,
sum(counts) as impressions
from impression 
where on_minute >=  @s and on_minute < @e 
group by 1) as imp

join

(select 
DATE_FORMAT(request_time,'%H') as hr,
count(*) as views

from landing_page

where request_time >=  @s and request_time < @e 
group by 1) as lp

on lp.hr = imp.hr

left join

(select 
DATE_FORMAT(ts,'%H') as hr,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount
from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)
where ts >=  @s and ts < @e 
group by 1) as ecomm

on ecomm.hr = lp.hr 

group by 1 order by 1;





