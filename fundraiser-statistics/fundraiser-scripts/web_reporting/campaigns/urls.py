from django.conf.urls.defaults import *


urlpatterns = patterns('',
    (r'^$', 'campaigns.views.index'),
    (r'^(?P<utm_campaign>[a-zA-Z0-9_]+)$', 'campaigns.views.show_campaigns'),
)
