
select

lp.hr as hr,
lp.landing_page,
null as total_impressions,
null as impressions,
views as views,
total_clicks as clicks,
donations as donations,
amount as amount,
null as click_rate,
donations / total_clicks as completion_rate,
null as don_per_imp,
null as amt_per_imp,
donations / views as don_per_view,
amount / views as amt_per_view,
amount / donations  as amt_per_donation,
max_amt,
pp_don,
cc_don,
pp_don / pp_clicks  as paypal_click_thru,
cc_don / cc_clicks as credit_card_click_thru,
'%s %s %s %s %s %s %s %s %s %s %s %s' as effluent

from

(select 
DATE_FORMAT(request_time,'%sY-%sm-%sd %sH') as hr,
landing_page,
count(*) as views

from landing_page

where request_time >=  '%s' and request_time < '%s'
and utm_campaign REGEXP '%s'
group by 1,2) as lp

join

(select 
DATE_FORMAT(ts,'%sY-%sm-%sd %sH') as hr,
SUBSTRING_index(substring_index(utm_source, '.', 2),'.',-1) as landing_page,
count(*) as total_clicks,
sum(not isnull(contribution_tracking.contribution_id)) as donations,
sum(converted_amount) AS amount,
max(converted_amount) AS max_amt,
sum(if(right(utm_source,2)='cc',1,0))  as cc_clicks,
sum(if(right(utm_source,2)='cc' and contribution_tracking.contribution_id,1,0)) as cc_don,
sum(if(right(utm_source,2)='pp',1,0))  as pp_clicks,
sum(if(right(utm_source,2)='pp' and contribution_tracking.contribution_id,1,0)) as pp_don
from
drupal.contribution_tracking LEFT JOIN civicrm.public_reporting 
ON (contribution_tracking.contribution_id = civicrm.public_reporting.contribution_id)
where ts >=  '%s' and ts < '%s'
and utm_campaign REGEXP '%s'
group by 1,2) as ecomm

on ecomm.landing_page  = lp.landing_page and ecomm.hr = lp.hr

group by 1,2,3,4
having views > 1000 and donations > 10
order by 1 desc;





