#!/usr/bin/perl

sub SetLiterals_HE # replace by language code
{
$out_statistics   = "&#1505;&#1496;&#1496;&#1497;&#1505;&#1496;&#1497;&#1511;&#1493;&#1514; &#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1492;" ;
$out_charts       = "&#1514;&#1512;&#1513;&#1497;&#1502;&#1497; &#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1492;" ;
$out_btn_tables   = "&#1496;&#1489;&#1500;&#1488;&#1493;&#1514;" ;
$out_btn_charts   = "&#1514;&#1512;&#1513;&#1497;&#1502;&#1497;&#1501;" ;

$out_wikipedia    = "&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1493;&#1514;" ; # singular ??
$out_wikipedias   = "&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1493;&#1514;" ;
$out_wikipedians   = "wikipedians" ; # new

$out_wiktionary   = "Wiktionary" ;
$out_wiktionaries = "Wiktionaries" ;
$out_wiktionarians   = "wiktionarians" ; # new

$out_wikibook        = "Wikibook" ;  # new
$out_wikibooks       = "Wikibooks" ; # new
$out_wikibookies     = "Wikibook authors" ; # new

$out_wikiquote       = "Wikiquote" ;  # new
$out_wikiquotes      = "Wikiquotes" ; # new
$out_wikiquotarians  = "Wikiquotarians" ; # new

$out_wikinews        = "Wikinews" ;  # new
$out_wikinewssites   = "Wikinews sites" ; # new
$out_wikireporters   = "Wikireporters" ; # new

$out_wikisources     = "Wikisource" ;  # new
$out_wikisourcesites = "Wikisources" ; # new
$out_wikilibrarians  = "Wikilibrarians" ; # new

$out_wikispecial     = "Wikispecial" ;  # new
$out_wikispecials    = "Wikispecial sites" ; # new
$out_wikispecialists = "Authors" ; # new

$out_wikimedia       = "Wikimedia" ;       # new
$out_wikimedia_sites = "Wikimedia sites" ; # new

$out_comparisons  = "&#1492;&#1513;&#1493;&#1493;&#1488;&#1493;&#1514;" ;

$out_creation_history = "Creation history" ; # new
$out_accomplishments  = "Accomplishments" ; # new
$out_created          = "Created" ; # new
$average_increase     = "Average increase per month" ; # new

$out_explanation_categories = "Behind each category you find the number of articles that belong to this category" ; # new
$out_follow_links           = "Tip: in order to avoid lengthy page reloads use Shift+Mouseclick to follow links" ; # new
$out_categories_templates   = "Category tags that were inserted via a template are <b>not yet</b> recognised." ; # new
$out_categories_redirects   = "Also this overview may lists categories pages that only contain a redirect tag." ;

$out_license      = "All data and images on this page are in the public domain." ; # new
$out_generated    = "&#1504;&#1493;&#1510;&#1512; &#1489;&#1497;&#1493;&#1501; " ;
$out_sqlfiles     = "&#1502;&#1511;&#1489;&#1510;&#1497; &#1492;&#1506;&#1514;&#1511; SQL &#1513;&#1500; &#1502;&#1505;&#1491; &#1492;&#1504;&#1514;&#1493;&#1504;&#1497;&#1501; &#1502;&#1497;&#1493;&#1501; " ;
$out_version      = "&#1490;&#1497;&#1512;&#1505;&#1514; &#1492;&#1505;&#1511;&#1512;&#1497;&#1508;&#1496;: " ;
$out_author       = "&#1492;&#1502;&#1495;&#1489;&#1512;" ;
$out_mail         = "&#1491;&#1493;&#1488;&#1512; &#1488;&#1500;&#1511;&#1496;&#1512;&#1493;&#1504;&#1497;" ;
$out_site         = "&#1488;&#1514;&#1512;" ;
$out_home         = "&#1491;&#1507; &#1492;&#1489;&#1497;&#1514;" ;
$out_sitemap      = "&#1502;&#1508;&#1514; &#1492;&#1488;&#1514;&#1512;";
$out_rendered     = "&#1492;&#1514;&#1512;&#1513;&#1497;&#1502;&#1497;&#1501; &#1504;&#1493;&#1510;&#1512;&#1493; &#1489;&#1488;&#1502;&#1510;&#1506;&#1493;&#1514; " ;
$out_generated2   = "Also generated:" ;       # new
$out_easytimeline = "Index to EasyTimeline charts per Wikipedia" ; # new
$out_categories   = "Category Overview per Wikipedia" ; # new
$out_botactivity  = "Bot activity" ;     # new
$out_stats_for    = "Statistics for " ; # new
$out_stats_per    = "Statistics per " ; # new

$out_gigabytes    = "Gb" ;
$out_megabytes    = "Mb" ;
$out_kilobytes    = "Kb" ;
$out_bytes        = "b" ;
$out_million      = "M" ;
$out_thousand     = "K" ;

$out_date         = "&#1514;&#1488;&#1512;&#1497;&#1498;" ;
$out_year         = "&#1513;&#1504;&#1492;" ;
$out_month        = "&#1495;&#1493;&#1491;&#1513;" ;
$out_mean         = "&#1502;&#1502;&#1493;&#1510;&#1506;" ;
$out_growth       = "&#1490;&#1491;&#1497;&#1500;&#1492;" ;
$out_total        = "&#1505;&#1492;\"&#1499;" ;
$out_bars         = "&#1506;&#1502;&#1493;&#1491;&#1493;&#1514;" ;
$out_words        = "&#1502;&#1497;&#1500;&#1497;&#1501;" ;
$out_zoom         = "&#1502;&#1512;&#1495;&#1511; &#1502;&#1514;&#1510;&#1493;&#1490;&#1492;" ;
$out_scripts      = "Scripts" ; # new

$out_new          = "new" ; # new
$out_all          = "all" ; # new  (people)
$out_all2         = "all" ; # new  (things)

$out_conversions1 = "" ;
$out_conversions2 = " &#1492;&#1502;&#1512;&#1493;&#1514; &#1488;&#1493;&#1496;&#1493;&#1502;&#1496;&#1497;&#1493;&#1514; (&#1500;&#1502;&#1495;&#1510;&#1492;) &#1489;&#1493;&#1510;&#1506;&#1493;." ;

$out_phaseIII     = "&#1504;&#1499;&#1500;&#1500;&#1493;&#1514; &#1512;&#1511; &#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1493;&#1514; &#1492;&#1502;&#1513;&#1514;&#1502;&#1513;&#1493;&#1514; &#1489;&#1514;&#1493;&#1499;&#1504;&#1514; <a href='http://www.mediawiki.org'>MediaWiki</a>." ;

$out_svg_viewer   = "&#1499;&#1491;&#1497; &#1500;&#1512;&#1488;&#1493;&#1514; &#1488;&#1514; &#1514;&#1493;&#1499;&#1503; &#1506;&#1502;&#1493;&#1491; &#1494;&#1492; &#1514;&#1494;&#1491;&#1511;&#1511; &#1500;&#1502;&#1510;&#1497;&#1490; SVG, " .
                    "&#1499;&#1502;&#1493; <a href='http://www.adobe.com/svg/viewer/install/'>Adobe SVG Viewer</a> " .
                    "&#1500;&#1495;&#1500;&#1493;&#1504;&#1493;&#1514;/&#1502;&#1511;&#1497;&#1504;&#1496;&#1493;&#1513; (&#1495;&#1497;&#1504;&#1501;)" ;
$out_rendering    = "&#1502;&#1489;&#1510;&#1506;.... &#1504;&#1488; &#1492;&#1502;&#1514;&#1503;" ;

$out_sort_order   = "&#1492;&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1493;&#1514; &#1502;&#1505;&#1493;&#1491;&#1512;&#1493;&#1514; &#1500;&#1508;&#1497; &#1502;&#1505;&#1508;&#1512; &#1492;&#1511;&#1497;&#1513;&#1493;&#1512;&#1497;&#1501; &#1492;&#1508;&#1504;&#1497;&#1502;&#1497;&#1497;&#1501; &#1513;&#1489;&#1492;&#1503; (&#1500;&#1502;&#1506;&#1496; &#1491;&#1508;&#1497; &#1492;&#1508;&#1504;&#1497;&#1492;).  &#1504;&#1512;&#1488;&#1492; &#1513;&#1494;&#1492;&#1493; &#1489;&#1505;&#1497;&#1505; &#1492;&#1493;&#1490;&#1503; &#1497;&#1493;&#1514;&#1512; &#1500;&#1492;&#1513;&#1493;&#1493;&#1488;&#1514; &#1492;&#1502;&#1488;&#1502;&#1509;<br>" .
                    "&#1492;&#1499;&#1493;&#1500;&#1500; &#1513;&#1492;&#1493;&#1513;&#1511;&#1506; &#1489;&#1492;&#1503;, &#1502;&#1488;&#1513;&#1512; &#1502;&#1505;&#1508;&#1512; &#1492;&#1502;&#1488;&#1502;&#1512;&#1497;&#1501; &#1488;&#1493; &#1490;&#1493;&#1491;&#1500; &#1502;&#1505;&#1491; &#1492;&#1504;&#1514;&#1493;&#1504;&#1497;&#1501;; &#1502;&#1505;&#1508;&#1512; &#1492;&#1502;&#1488;&#1502;&#1512;&#1497;&#1501; &#1488;&#1497;&#1504;&#1493; &#1502;&#1513;&#1502;&#1506;&#1493;&#1514;&#1497; &#1499;&#1500; &#1499;&#1498; &#1502;&#1499;&#1497;&#1493;&#1503; &#1513;&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1493;&#1514;<br>" .
                    "&#1502;&#1505;&#1493;&#1497;&#1502;&#1493;&#1514; &#1502;&#1499;&#1497;&#1500;&#1493;&#1514; &#1489;&#1506;&#1497;&#1511;&#1512; &#1502;&#1488;&#1502;&#1512;&#1497;&#1501; &#1511;&#1510;&#1512;&#1497;&#1501;, &#1488;&#1493; &#1506;&#1512;&#1499;&#1497;&#1501; &#1512;&#1489;&#1497;&#1501; &#1513;&#1504;&#1493;&#1510;&#1512;&#1493; &#1489;&#1488;&#1493;&#1508;&#1503; &#1488;&#1493;&#1496;&#1493;&#1502;&#1496;&#1497;, &#1493;&#1488;&#1497;&#1500;&#1493; &#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1493;&#1514; &#1488;&#1495;&#1512;&#1493;&#1514; &#1502;&#1499;&#1497;&#1500;&#1493;&#1514; &#1502;&#1488;&#1502;&#1512;&#1497;&#1501;<br>" .
                    "&#1502;&#1506;&#1496;&#1497;&#1501; &#1488;&#1489;&#1500; &#1488;&#1512;&#1493;&#1499;&#1497;&#1501; &#1497;&#1493;&#1514;&#1512;, &#1513;&#1504;&#1499;&#1514;&#1489;&#1493; &#1499;&#1493;&#1500;&#1501; &#1497;&#1491;&#1504;&#1497;&#1514;.  &#1490;&#1501; &#1490;&#1493;&#1491;&#1500; &#1502;&#1505;&#1491; &#1492;&#1504;&#1514;&#1493;&#1504;&#1497;&#1501; &#1506;&#1513;&#1493;&#1497; &#1500;&#1492;&#1496;&#1506;&#1493;&#1514;, &#1499;&#1497;&#1493;&#1503; &#1513;&#1492;&#1493;&#1488; &#1514;&#1500;&#1493;&#1497; &#1489;&#1511;&#1497;&#1491;&#1493;&#1491; (&#1514;&#1493;&#1497; Unicode<br>" .
                    "&#1506;&#1513;&#1493;&#1497;&#1497;&#1501; &#1500;&#1514;&#1508;&#1493;&#1505; &#1502;&#1505;&#1508;&#1512; &#1489;&#1497;&#1497;&#1496;&#1497;&#1501;) &#1493;&#1489;&#1502;&#1497;&#1491;&#1514; &#1492;&#1502;&#1513;&#1502;&#1506;&#1493;&#1514; &#1513;&#1502;&#1499;&#1497;&#1500; &#1499;&#1500; &#1514;&#1493; (&#1500;&#1502;&#1513;&#1500;, &#1514;&#1493;&#1497;&#1501; &#1489;&#1505;&#1497;&#1504;&#1497;&#1514; &#1492;&#1501; &#1502;&#1497;&#1500;&#1497;&#1501; &#1513;&#1500;&#1502;&#1493;&#1514;).<br>" ;
$out_not_included = "Not included" ; #new

$out_average_1    = "&#1505;&#1508;&#1497;&#1512;&#1492; &#1502;&#1502;&#1493;&#1510;&#1506;&#1514; &#1489;&#1495;&#1493;&#1491;&#1513;&#1497;&#1501; &#1492;&#1502;&#1493;&#1510;&#1490;&#1497;&#1501;" ;
$out_growth_1     = "&#1490;&#1491;&#1497;&#1500;&#1492; &#1495;&#1493;&#1491;&#1513;&#1497;&#1514; &#1502;&#1502;&#1493;&#1510;&#1506;&#1514; &#1489;&#1495;&#1493;&#1491;&#1513;&#1497;&#1501; &#1492;&#1502;&#1493;&#1510;&#1490;&#1497;&#1501;" ;
$out_formula      = "&#1504;&#1493;&#1505;&#1495;&#1492;" ;
$out_value        = "&#1506;&#1512;&#1498;" ;
$out_monthes      = "&#1495;&#1493;&#1491;&#1513;&#1497;&#1501;" ;
$out_skip_values  = "(&#1492;&#1493;&#1513;&#1502;&#1496;&#1493; &#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1493;&#1514; &#1506;&#1501; &#1506;&#1512;&#1499;&#1497;&#1501; &#1511;&#1496;&#1504;&#1497;&#1501; &#1502;-10)" ;

$out_history      = "&#1492;&#1506;&#1512;&#1492;: &#1492;&#1495;&#1497;&#1513;&#1493;&#1489;&#1497;&#1501; &#1500;&#1495;&#1493;&#1491;&#1513;&#1497;&#1501; &#1492;&#1512;&#1488;&#1513;&#1493;&#1504;&#1497;&#1501; &#1492;&#1501; &#1504;&#1502;&#1493;&#1499;&#1497;&#1501; &#1502;&#1491;&#1497;, &#1499;&#1497;&#1493;&#1503; " .
                    "&#1513;&#1492;&#1497;&#1505;&#1496;&#1493;&#1512;&#1497;&#1497;&#1514; &#1492;&#1513;&#1497;&#1504;&#1493;&#1497;&#1497;&#1501; &#1500;&#1488; &#1504;&#1513;&#1502;&#1512;&#1492; &#1488;&#1494; &#1514;&#1502;&#1497;&#1491; &#1499;&#1512;&#1488;&#1493;&#1497;." ;

$out_unique_users = "Unique users" ; # new
$out_archived     = "Archived" ; # new
$out_reg          = "Reg." ;   # new (Reg. = Registered)
$out_unreg        = "Unreg." ; # new (Unreg. = Unregistered)

$out_reg_users_edited = "reg. users edited" ; # new
$out_reg_user_edited  = "reg. user edited" ;  # new

$out_index        = "Index" ;    # new
$out_complete     = "Complete" ; # new
$out_concise      = "Concise" ;  # new

$out_categories_complete = "Complete" ; # new
$out_categories_concise  = "Concise" ;  # new
$out_categories_main     = "Main" ;     # new
$out_category_trees      = "Wikipedia Category Overviews" ; # new
$out_category_tree       = "Wikipedia Category Overview" ;  # new

$out_license      = "All data and images on this page are in the public domain." ; # new

$out_tbl1_intro   = "[[2]] &#1492;&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1501; &#1492;&#1508;&#1506;&#1497;&#1500;&#1497;&#1501; &#1500;&#1488;&#1495;&#1512;&#1493;&#1504;&#1492;, " .
                    "&#1502;&#1505;&#1493;&#1491;&#1512;&#1497;&#1501; &#1500;&#1508;&#1497; &#1502;&#1505;&#1508;&#1512; &#1492;&#1514;&#1512;&#1493;&#1502;&#1493;&#1514;:" ;
$out_tbl1_intro2  = "&#1504;&#1505;&#1508;&#1512;&#1493; &#1512;&#1511; &#1506;&#1512;&#1497;&#1499;&#1493;&#1514; &#1513;&#1500; &#1502;&#1488;&#1502;&#1512;&#1497;&#1501;, &#1500;&#1488; &#1499;&#1493;&#1500;&#1500; &#1491;&#1508;&#1497; &#1513;&#1497;&#1495;&#1492; &#1493;&#1499;&#1493;'" ;
$out_tbl1_intro3  = "&#916; = &#1513;&#1497;&#1504;&#1493;&#1497; &#1489;&#1491;&#1497;&#1512;&#1493;&#1490; &#1489;&#1513;&#1500;&#1493;&#1513;&#1497;&#1501; &#1497;&#1502;&#1497;&#1501; &#1488;&#1495;&#1512;&#1493;&#1504;&#1497;&#1501;" ;

$out_tbl1_hdr1    = "&#1502;&#1513;&#1514;&#1502;&#1513;" ;
$out_tbl1_hdr2    = "&#1506;&#1512;&#1497;&#1499;&#1493;&#1514;" ;
$out_tbl1_hdr3    = "&#1506;&#1512;&#1497;&#1499;&#1492; &#1512;&#1488;&#1513;&#1493;&#1504;&#1492;" ;
$out_tbl1_hdr4    = "&#1506;&#1512;&#1497;&#1499;&#1492; &#1488;&#1495;&#1512;&#1493;&#1504;&#1492;" ;
$out_tbl1_hdr5    = "&#1514;&#1488;&#1512;&#1497;&#1498;" ;
$out_tbl1_hdr6    = "&#1497;&#1502;&#1497;&#1501;<br>&#1502;&#1488;&#1494;" ;
$out_tbl1_hdr7    = "&#1505;&#1492;\"&#1499;" ;
$out_tbl1_hdr8    = "30 &#1497;&#1502;&#1497;&#1501;<br>&#1488;&#1495;&#1512;&#1493;&#1504;&#1497;&#1501;" ;
$out_tbl1_hdr9    = "&#1491;&#1497;&#1512;&#1493;&#1490;" ;
$out_tbl1_hdr10   = "&#1499;&#1506;&#1514;" ;
$out_tbl1_hdr11   = "&#916;" ;
$out_tbl1_hdr12   = "&#1502;&#1488;&#1502;&#1512;&#1497;&#1501;" ;
$out_tbl1_hdr13   = "&#1488;&#1495;&#1512;&#1493;&#1514;" ;

$out_tbl2_intro  = "[[3]] &#1492;&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1501; &#1492;&#1504;&#1506;&#1491;&#1512;&#1497;&#1501; &#1500;&#1488;&#1495;&#1512;&#1493;&#1504;&#1492;, " .
                    "&#1502;&#1505;&#1493;&#1491;&#1512;&#1497;&#1501; &#1500;&#1508;&#1497; &#1502;&#1505;&#1508;&#1512; &#1492;&#1514;&#1512;&#1493;&#1502;&#1493;&#1514;:" ;

$out_tbl3_intro   = "&#1490;&#1491;&#1497;&#1500;&#1492; &#1489;&#1502;&#1505;&#1508;&#1512; &#1492;&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1501; &#1492;&#1512;&#1513;&#1493;&#1502;&#1497;&#1501; &#1492;&#1508;&#1506;&#1497;&#1500;&#1497;&#1501; &#1493;&#1489;&#1508;&#1506;&#1497;&#1500;&#1493;&#1514;&#1501;" ;

$out_tbl3_hdr1a   = "&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1501;" ;
$out_tbl3_hdr1e   = "&#1502;&#1488;&#1502;&#1512;&#1497;&#1501;" ;
$out_tbl3_hdr1l   = "&#1502;&#1505;&#1491; &#1492;&#1504;&#1514;&#1493;&#1504;&#1497;&#1501;" ;
$out_tbl3_hdr1o   = "&#1511;&#1497;&#1513;&#1493;&#1512;&#1497;&#1501;" ;
$out_tbl3_hdr1t   = "&#1513;&#1497;&#1502;&#1493;&#1513; &#1497;&#1493;&#1502;&#1497;" ; # new

# use &nbsp; (non breaking space) in stead of normal spaces in following headers
# this ensures text will never be broken into two lines
$out_tbl3_hdr1a2  = " (&#1502;&#1513;&#1514;&#1502;&#1513;&#1497;&#1501; &#1512;&#1513;&#1493;&#1502;&#1497;&#1501;)" ;
$out_tbl3_hdr1e2  = " (&#1500;&#1488; &#1499;&#1493;&#1500;&#1500; &#1492;&#1508;&#1504;&#1497;&#1493;&#1514;)" ;

$out_tbl3_hdr2a   = "&#1505;&#1492;\"&#1499;" ;
$out_tbl3_hdr2b   = "&#1495;&#1491;&#1513;&#1497;&#1501;" ;
$out_tbl3_hdr2c   = "&#1506;&#1512;&#1497;&#1499;&#1493;&#1514;" ;
$out_tbl3_hdr2e   = "&#1499;&#1502;&#1493;&#1514;" ;
$out_tbl3_hdr2f   = "&#1495;&#1491;&#1513;&#1497;&#1501;<br>&#1500;&#1497;&#1493;&#1501;" ;
$out_tbl3_hdr2h   = "&#1502;&#1502;&#1493;&#1510;&#1506;" ;
$out_tbl3_hdr2j   = "&#1490;&#1491;&#1493;&#1500;&#1497;&#1501;&nbsp;&#1502;-" ;
$out_tbl3_hdr2l   = "&#1506;&#1512;&#1497;&#1499;&#1493;&#1514;" ;
$out_tbl3_hdr2m   = "&#1490;&#1493;&#1491;&#1500;" ;
$out_tbl3_hdr2n   = "&#1502;&#1497;&#1500;&#1497;&#1501;" ;
$out_tbl3_hdr2o   = "&#1508;&#1504;&#1497;&#1502;&#1497;&#1497;&#1501;" ;
$out_tbl3_hdr2p   = "&#1489;&#1497;&#1504;&#1500;&#1513;&#1493;&#1504;&#1497;&#1497;&#1501;" ;
$out_tbl3_hdr2q   = "&#1514;&#1502;&#1493;&#1504;&#1493;&#1514;" ;
$out_tbl3_hdr2r   = "&#1495;&#1497;&#1510;&#1493;&#1504;&#1497;&#1497;&#1501;" ;
$out_tbl3_hdr2s   = "&#1492;&#1508;&#1504;&#1497;&#1493;&#1514;" ;
$out_tbl3_hdr2t   = "&#1489;&#1511;&#1513;&#1493;&#1514;<br>&#1491;&#1507;" ;
$out_tbl3_hdr2u   = "&#1489;&#1497;&#1511;&#1493;&#1512;&#1497;&#1501;" ;
$out_tbl3_hdr2s2  = "projects" ; # new

$out_tbl3_hdr3c   = ">&nbsp;5" ;
$out_tbl3_hdr3d   = ">&nbsp;100" ;
$out_tbl3_hdr3e   = "&#1512;&#1513;&#1502;&#1497;&#1514;" ;
$out_tbl3_hdr3f   = ">&nbsp;200&nbsp;&#1488;&#1493;&#1514;" ;
$out_tbl3_hdr3h   = "&#1506;&#1512;&#1497;&#1499;&#1493;&#1514;" ;
$out_tbl3_hdr3i   = "&#1489;&#1497;&#1497;&#1496;&#1497;&#1501;" ;
$out_tbl3_hdr3j   = "0.5&nbsp;&#1511;\"&#1489;" ;
$out_tbl3_hdr3k   = "2&nbsp;&#1511;\"&#1489;" ;

$out_tbl6_intro  = "[[4]] &#1502;&#1513;&#1514;&#1502;&#1513;&#1497;&#1501; &#1488;&#1504;&#1493;&#1504;&#1497;&#1502;&#1497;&#1497;&#1501;, &#1502;&#1505;&#1493;&#1491;&#1512;&#1497;&#1501; &#1500;&#1508;&#1497; &#1502;&#1505;&#1508;&#1512; &#1492;&#1514;&#1512;&#1493;&#1502;&#1493;&#1514;" ; # new
$out_table6_footer = "&#1505;&#1492;\"&#1499; %d &#1506;&#1512;&#1497;&#1499;&#1493;&#1514; &#1504;&#1506;&#1513;&#1493; &#1506;\"&#1497; &#1502;&#1513;&#1514;&#1502;&#1513;&#1497;&#1501; &#1488;&#1504;&#1493;&#1504;&#1497;&#1502;&#1497;&#1497;&#1501;, &#1502;&#1514;&#1493;&#1498; %d &#1506;&#1512;&#1497;&#1499;&#1493;&#1514; (%.0f\%)" ; # new

$out_tbl5_intro   = "&#1505;&#1496;&#1496;&#1497;&#1505;&#1496;&#1497;&#1511;&#1493;&#1514; &#1502;&#1489;&#1511;&#1512;&#1497;&#1501; (&#1502;&#1489;&#1493;&#1505;&#1505;&#1493;&#1514; &#1506;&#1500; &#1508;&#1500;&#1496; <a href='http://www.mrunix.net/webalizer/'><font color='#000088'>Webalizer</font></a> ; " .
                    "<a href='http://www.mrunix.net/webalizer/webalizer_help.html'><font color='#000088'>&#1492;&#1490;&#1491;&#1512;&#1493;&#1514;</font></a>, " .
                    "<a href=''><font color='#000088'>&#1514;&#1512;&#1513;&#1497;&#1501;</font></a>)" ; #new
$out_tbl5_hdr1a   = "&#1502;&#1502;&#1493;&#1510;&#1506; &#1497;&#1493;&#1502;&#1497;" ; # new
$out_tbl5_hdr1e   = "&#1505;&#1499;&#1493;&#1501; &#1495;&#1493;&#1491;&#1513;&#1497;" ; # new
$out_tbl5_hdr2a   = "&#1508;&#1490;&#1497;&#1506;&#1493;&#1514;" ; # new
$out_tbl5_hdr2b   = "&#1511;&#1489;&#1510;&#1497;&#1501;" ; # new
$out_tbl5_hdr2c   = "&#1491;&#1508;&#1497;&#1501;" ; # new
$out_tbl5_hdr2d   = "&#1489;&#1497;&#1511;&#1493;&#1512;&#1497;&#1501;" ; # new
$out_tbl5_hdr2e   = "&#1488;&#1514;&#1512;&#1497;&#1501;" ; # new
$out_tbl5_hdr2f   = "&#1511;. &#1489;&#1497;&#1497;&#1496;&#1497;&#1501;" ; # new
$out_tbl5_hdr2g   = "&#1489;&#1497;&#1511;&#1493;&#1512;&#1497;&#1501;" ; # new
$out_tbl5_hdr2h   = "&#1491;&#1508;&#1497;&#1501;" ; # new
$out_tbl5_hdr2i   = "&#1511;&#1489;&#1510;&#1497;&#1501;" ; # new
$out_tbl5_hdr2j   = "&#1508;&#1490;&#1497;&#1506;&#1493;&#1514;" ; # new

$out_tbl7_intro   = "Database records per namespace / Categorised articles<p>" .
                    "<small>1) Categories that are inserted via a template are not detected.</small>" ; # new
$out_tbl7_hdr_ns  = "Namespace" ; # new
$out_tbl7_hdr_ca  = "Categorised<br>articles <sup>1</sup>" ; # new

$out_tbl8_intro = "Distribution of article edits over wikipedians"  ; # new

$out_tbl9_intro   = "[[5]] most edited articles (> 25 edits)"  ; # new

$out_tbl10_intro  = "[[3]] bots, ordered by number of contributions" ; # new

@out_namespaces   = ("Article", "User", "Project", "Image", "MediaWiki", "Template", "Help", "Category") ; #new

@out_tbl3_legend  = (
"&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1501; &#1513;&#1506;&#1512;&#1499;&#1493; &#1500;&#1508;&#1495;&#1493;&#1514; 10 &#1508;&#1506;&#1502;&#1497;&#1501; &#1502;&#1488;&#1494; &#1492;&#1490;&#1497;&#1506;&#1493;",
"&#1490;&#1497;&#1491;&#1493;&#1500; &#1489;&#1502;&#1505;&#1508;&#1512; &#1492;&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1501; &#1513;&#1506;&#1512;&#1499;&#1493; &#1500;&#1508;&#1495;&#1493;&#1514; 10 &#1508;&#1506;&#1502;&#1497;&#1501; &#1502;&#1488;&#1494; &#1492;&#1490;&#1497;&#1506;&#1493;",
"&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1501; &#1513;&#1514;&#1512;&#1502;&#1493; 5 &#1508;&#1506;&#1502;&#1497;&#1501; &#1488;&#1493; &#1497;&#1493;&#1514;&#1512; &#1489;&#1495;&#1493;&#1491;&#1513; &#1494;&#1492;",
"&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1501; &#1513;&#1514;&#1512;&#1502;&#1493; 100 &#1508;&#1506;&#1502;&#1497;&#1501; &#1488;&#1493; &#1497;&#1493;&#1514;&#1512; &#1489;&#1495;&#1493;&#1491;&#1513; &#1494;&#1492;",
"&#1502;&#1488;&#1502;&#1512;&#1497;&#1501; &#1492;&#1502;&#1499;&#1497;&#1500;&#1497;&#1501; &#1497;&#1493;&#1514;&#1512; &#1502;&#1511;&#1497;&#1513;&#1493;&#1512; &#1508;&#1504;&#1497;&#1502;&#1497; &#1488;&#1495;&#1491;",
"&#1502;&#1488;&#1502;&#1512;&#1497;&#1501; &#1492;&#1502;&#1499;&#1497;&#1500;&#1497;&#1501; &#1500;&#1508;&#1495;&#1493;&#1514; &#1511;&#1497;&#1513;&#1493;&#1512; &#1508;&#1504;&#1497;&#1502;&#1497; &#1488;&#1495;&#1491; &#1493;-200 &#1488;&#1493;&#1514;&#1497;&#1493;&#1514; &#1496;&#1511;&#1505;&#1496; &#1511;&#1512;&#1497;&#1488;, <br>" .
   "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#1500;&#1488; &#1499;&#1493;&#1500;&#1500; &#1499;&#1493;&#1514;&#1512;&#1493;&#1514;, &#1511;&#1493;&#1491;&#1497; &#1493;&#1497;&#1511;&#1497; &#1493;-HTML, &#1511;&#1497;&#1513;&#1493;&#1512;&#1497;&#1501; &#1502;&#1493;&#1505;&#1514;&#1512;&#1497;&#1501; &#1493;&#1499;&#1493;'. <br>" .
   "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&#1499;&#1500; &#1492;&#1496;&#1493;&#1512;&#1497;&#1501; &#1492;&#1488;&#1495;&#1512;&#1497;&#1501; &#1502;&#1489;&#1493;&#1505;&#1505;&#1497;&#1501; &#1506;&#1500; &#1513;&#1497;&#1496;&#1514; &#1492;&#1505;&#1508;&#1497;&#1512;&#1492; &#1492;&#1512;&#1513;&#1502;&#1497;&#1514;)",
"&#1502;&#1488;&#1502;&#1512;&#1497;&#1501; &#1495;&#1491;&#1513;&#1497;&#1501; &#1500;&#1497;&#1493;&#1501; &#1489;&#1495;&#1493;&#1491;&#1513; &#1492;&#1488;&#1495;&#1512;&#1493;&#1503;",
"&#1502;&#1505;&#1508;&#1512; &#1502;&#1502;&#1493;&#1510;&#1506; &#1513;&#1500; &#1506;&#1512;&#1497;&#1499;&#1493;&#1514; &#1502;&#1495;&#1491;&#1513; &#1500;&#1499;&#1500; &#1502;&#1488;&#1502;&#1512;",
"&#1490;&#1493;&#1491;&#1500; &#1502;&#1502;&#1493;&#1510;&#1506; &#1513;&#1500; &#1502;&#1488;&#1502;&#1512; &#1489;&#1489;&#1497;&#1497;&#1496;&#1497;&#1501;",
"&#1488;&#1495;&#1493;&#1494; &#1492;&#1502;&#1488;&#1502;&#1512;&#1497;&#1501; &#1506;&#1501; &#1500;&#1508;&#1495;&#1493;&#1514; 0.5 &#1511;\"&#1489; &#1496;&#1511;&#1505;&#1496; &#1511;&#1512;&#1497;&#1488; (&#1512;&#1488;&#1492; F)",
"&#1488;&#1495;&#1493;&#1494; &#1492;&#1502;&#1488;&#1502;&#1512;&#1497;&#1501; &#1506;&#1501; &#1500;&#1508;&#1495;&#1493;&#1514; 2 &#1511;\"&#1489; &#1496;&#1511;&#1505;&#1496; &#1511;&#1512;&#1497;&#1488; (&#1512;&#1488;&#1492; F)",
"&#1506;&#1512;&#1497;&#1499;&#1493;&#1514; &#1489;&#1495;&#1493;&#1491;&#1513; &#1492;&#1488;&#1495;&#1512;&#1493;&#1503; (&#1499;&#1493;&#1500;&#1500; &#1492;&#1508;&#1504;&#1497;&#1493;&#1514;, &#1499;&#1493;&#1500;&#1500; &#1514;&#1512;&#1493;&#1502;&#1493;&#1514; &#1500;&#1488; &#1512;&#1513;&#1493;&#1502;&#1493;&#1514;)",
"&#1490;&#1493;&#1491;&#1500; &#1499;&#1493;&#1500;&#1500; &#1513;&#1500; &#1499;&#1500; &#1492;&#1502;&#1488;&#1502;&#1512;&#1497;&#1501; (&#1499;&#1493;&#1500;&#1500; &#1492;&#1508;&#1504;&#1497;&#1493;&#1514;)",
"&#1502;&#1505;&#1508;&#1512; &#1492;&#1502;&#1497;&#1500;&#1497;&#1501; &#1492;&#1499;&#1500;&#1500;&#1497; (&#1500;&#1502;&#1506;&#1496; &#1492;&#1508;&#1504;&#1497;&#1493;&#1514;, &#1511;&#1493;&#1491;&#1497; &#1493;&#1497;&#1511;&#1497;, HTML &#1493;&#1511;&#1497;&#1513;&#1493;&#1512;&#1497;&#1501; &#1502;&#1493;&#1505;&#1514;&#1512;&#1497;&#1501;)",
"&#1502;&#1505;&#1508;&#1512; &#1492;&#1511;&#1497;&#1513;&#1493;&#1512;&#1497;&#1501; &#1492;&#1508;&#1504;&#1497;&#1502;&#1497;&#1497;&#1501; (&#1500;&#1502;&#1506;&#1496; &#1491;&#1508;&#1497; &#1492;&#1508;&#1504;&#1497;&#1492;, &#1511;&#1510;&#1512;&#1502;&#1512;&#1497;&#1501; &#1493;&#1512;&#1513;&#1497;&#1502;&#1493;&#1514; &#1511;&#1497;&#1513;&#1493;&#1512;&#1497;&#1501;)",
"&#1502;&#1505;&#1508;&#1512; &#1492;&#1511;&#1497;&#1513;&#1493;&#1512;&#1497;&#1501; &#1500;&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1493;&#1514; &#1489;&#1513;&#1508;&#1493;&#1514; &#1488;&#1495;&#1512;&#1493;&#1514;",
"&#1502;&#1505;&#1508;&#1512; &#1492;&#1511;&#1497;&#1513;&#1493;&#1512;&#1497;&#1501; &#1500;&#1514;&#1502;&#1493;&#1504;&#1493;&#1514; &#1511;&#1497;&#1497;&#1502;&#1493;&#1514;",
"&#1502;&#1505;&#1508;&#1512; &#1492;&#1511;&#1497;&#1513;&#1493;&#1512;&#1497;&#1501; &#1500;&#1488;&#1514;&#1512;&#1497;&#1501; &#1488;&#1495;&#1512;&#1497;&#1501;",
"&#1502;&#1505;&#1508;&#1512; &#1491;&#1508;&#1497; &#1492;&#1492;&#1508;&#1504;&#1497;&#1492;",
"&#1489;&#1511;&#1513;&#1493;&#1514; &#1491;&#1508;&#1497;&#1501; &#1500;&#1497;&#1493;&#1501; (<a href='http://www.mrunix.net/webalizer/webalizer_help.html'><font color='#000088'>&#1492;&#1490;&#1491;&#1512;&#1492;</font></a>, &#1502;&#1489;&#1493;&#1505;&#1505; &#1506;&#1500; &#1508;&#1500;&#1496; <a href='http://www.mrunix.net/webalizer/'><font color='#000088'>Webalizer</font></a>)", #new
"&#1489;&#1497;&#1511;&#1493;&#1512;&#1497;&#1501; &#1500;&#1497;&#1493;&#1501; (<a href='http://www.mrunix.net/webalizer/webalizer_help.html'><font color='#000088'>&#1492;&#1490;&#1491;&#1512;&#1492;</font></a>, &#1502;&#1489;&#1493;&#1505;&#1505; &#1506;&#1500; &#1508;&#1500;&#1496; <a href='http://www.mrunix.net/webalizer/'><font color='#000088'>Webalizer</font></a>)", #new
"&#1504;&#1514;&#1493;&#1504;&#1497;&#1501; &#1500;&#1495;&#1493;&#1491;&#1513;&#1497;&#1501; &#1492;&#1488;&#1495;&#1512;&#1493;&#1504;&#1497;&#1501;"
) ;

# some plots have slightly other criteria than corresponding tables
@out_plot_legend  = (
"&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1501; &#1513;&#1514;&#1512;&#1502;&#1493; 5 &#1508;&#1506;&#1502;&#1497;&#1501; &#1488;&#1493; &#1497;&#1493;&#1514;&#1512; &#1489;&#1513;&#1489;&#1493;&#1506;",
"&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1501; &#1513;&#1514;&#1512;&#1502;&#1493; 25 &#1508;&#1506;&#1502;&#1497;&#1501; &#1488;&#1493; &#1497;&#1493;&#1514;&#1512; &#1489;&#1513;&#1489;&#1493;&#1506;"
) ;

$out_legend_daily_edits = "&#1506;&#1512;&#1497;&#1499;&#1493;&#1514; &#1500;&#1497;&#1493;&#1501; (&#1499;&#1493;&#1500;&#1500; &#1492;&#1508;&#1504;&#1497;&#1493;&#1514;, &#1499;&#1493;&#1500;&#1500; &#1514;&#1512;&#1493;&#1502;&#1493;&#1514; &#1500;&#1488; &#1512;&#1513;&#1493;&#1502;&#1493;&#1514;)" ;
$out_report_description_daily_edits = "&#1506;&#1512;&#1497;&#1499;&#1493;&#1514; &#1500;&#1497;&#1493;&#1501;" ;
$out_report_description_edits       = "&#1506;&#1512;&#1497;&#1499;&#1493;&#1514; &#1500;&#1495;&#1493;&#1491;&#1513;/&#1497;&#1493;&#1501;" ;
$out_report_description_current_status = "Current status" ; # new

@out_report_descriptions = (
"&#1514;&#1493;&#1512;&#1502;&#1497;&#1501;",
"&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1501; &#1495;&#1491;&#1513;&#1497;&#1501;",
"&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1501; &#1508;&#1506;&#1497;&#1500;&#1497;&#1501;",
"&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1501; &#1508;&#1506;&#1497;&#1500;&#1497;&#1501; &#1502;&#1488;&#1491;",
"&#1502;&#1505;&#1508;&#1512; &#1502;&#1488;&#1502;&#1512;&#1497;&#1501; (&#1512;&#1513;&#1502;&#1497;)",
"&#1502;&#1505;&#1508;&#1512; &#1502;&#1488;&#1502;&#1512;&#1497;&#1501; (&#1495;&#1500;&#1493;&#1508;&#1497;)",
"&#1502;&#1488;&#1502;&#1512;&#1497;&#1501; &#1495;&#1491;&#1513;&#1497;&#1501; &#1500;&#1497;&#1493;&#1501;",
"&#1506;&#1512;&#1497;&#1499;&#1493;&#1514; &#1500;&#1502;&#1488;&#1502;&#1512;",
"&#1489;&#1497;&#1497;&#1496;&#1497;&#1501; &#1500;&#1502;&#1488;&#1502;&#1512;",
"&#1502;&#1488;&#1502;&#1512;&#1497;&#1501; &#1502;&#1506;&#1500; 0.5 &#1511;\"&#1489;",
"&#1502;&#1488;&#1502;&#1512;&#1497;&#1501; &#1502;&#1506;&#1500; 2 &#1511;\"&#1489;",
"&#1506;&#1512;&#1497;&#1499;&#1493;&#1514; &#1500;&#1495;&#1493;&#1491;&#1513;",
"&#1490;&#1493;&#1491;&#1500; &#1502;&#1505;&#1491; &#1492;&#1504;&#1514;&#1493;&#1504;&#1497;&#1501;",
"&#1502;&#1497;&#1500;&#1497;&#1501;",
"&#1511;&#1497;&#1513;&#1493;&#1512;&#1497;&#1501; &#1508;&#1504;&#1497;&#1502;&#1497;&#1497;&#1501;",
"&#1511;&#1497;&#1513;&#1493;&#1512;&#1497;&#1501; &#1500;&#1493;&#1497;&#1511;&#1497;&#1508;&#1491;&#1497;&#1493;&#1514; &#1488;&#1495;&#1512;&#1493;&#1514;",
"&#1514;&#1502;&#1493;&#1504;&#1493;&#1514;",
"&#1511;&#1497;&#1513;&#1493;&#1512;&#1497;&#1501; &#1495;&#1497;&#1510;&#1493;&#1504;&#1497;&#1497;&#1501;",
"&#1492;&#1508;&#1504;&#1497;&#1493;&#1514;",
"&#1489;&#1511;&#1513;&#1493;&#1514; &#1491;&#1508;&#1497;&#1501; &#1500;&#1497;&#1493;&#1501;",
"&#1489;&#1497;&#1511;&#1493;&#1512;&#1497;&#1501; &#1500;&#1497;&#1493;&#1501;",
"&#1505;&#1511;&#1497;&#1512;&#1492;"
) ;

$out_languages {"als"} = "&#1488;&#1500;&#1494;&#1505;&#1497;&#1514;" ;
$out_languages {"ar"} = "&#1506;&#1512;&#1489;&#1497;&#1514;" ;
$out_languages {"bg"} = "&#1489;&#1493;&#1500;&#1490;&#1512;&#1497;&#1514;" ;
$out_languages {"bs"} = "&#1489;&#1493;&#1505;&#1504;&#1497;&#1514;" ;
$out_languages {"cs"} = "&#1510;'&#1499;&#1497;&#1514;" ;
$out_languages {"cy"} = "&#1493;&#1493;&#1500;&#1513;&#1497;&#1514;" ;
$out_languages {"da"} = "&#1491;&#1504;&#1497;&#1514;" ;
$out_languages {"de"} = "&#1490;&#1512;&#1502;&#1504;&#1497;&#1514;" ;
$out_languages {"el"} = "&#1497;&#1493;&#1493;&#1504;&#1497;&#1514;" ;
$out_languages {"en"} = "&#1488;&#1504;&#1490;&#1500;&#1497;&#1514;" ;
$out_languages {"eo"} = "&#1488;&#1505;&#1508;&#1512;&#1504;&#1496;&#1493;" ;
$out_languages {"es"} = "&#1505;&#1508;&#1512;&#1491;&#1497;&#1514;" ;
$out_languages {"et"} = "&#1488;&#1505;&#1496;&#1493;&#1504;&#1497;&#1514;" ;
$out_languages {"fa"} = "&#1508;&#1512;&#1505;&#1497;&#1514;" ;
$out_languages {"fi"} = "&#1508;&#1497;&#1504;&#1497;&#1514;" ;
$out_languages {"fr"} = "&#1510;&#1512;&#1508;&#1514;&#1497;&#1514;" ;
$out_languages {"fy"} = "&#1508;&#1512;&#1497;&#1494;&#1500;&#1504;&#1491;&#1497;&#1514;" ;
$out_languages {"ga"} = "&#1488;&#1497;&#1512;&#1497;&#1514;" ;
$out_languages {"gv"} = "Manx Gaelic" ;
$out_languages {"hi"} = "&#1492;&#1497;&#1504;&#1491;&#1497;&#1514;" ;
$out_languages {"he"} = "&#1506;&#1489;&#1512;&#1497;&#1514;" ;
$out_languages {"hr"} = "&#1511;&#1512;&#1493;&#1488;&#1496;&#1497;&#1514;" ;
$out_languages {"hu"} = "&#1492;&#1493;&#1504;&#1490;&#1512;&#1497;&#1514;" ;
$out_languages {"ia"} = "&#1488;&#1497;&#1504;&#1496;&#1512;&#1500;&#1497;&#1504;&#1490;&#1493;&#1488;&#1492;" ;
$out_languages {"id"} = "&#1488;&#1497;&#1504;&#1491;&#1493;&#1504;&#1494;&#1497;&#1514;" ;
$out_languages {"it"} = "&#1488;&#1497;&#1496;&#1500;&#1511;&#1497;&#1514;" ;
$out_languages {"ja"} = "&#1497;&#1508;&#1504;&#1497;&#1514;" ;
$out_languages {"ka"} = "&#1490;&#1512;&#1493;&#1494;&#1497;&#1504;&#1497;&#1514;" ;
$out_languages {"ko"} = "&#1511;&#1493;&#1512;&#1497;&#1488;&#1504;&#1497;&#1514;" ;
$out_languages {"la"} = "&#1500;&#1496;&#1497;&#1504;&#1497;&#1514;" ;
$out_languages {"lt"} = "&#1500;&#1497;&#1496;&#1488;&#1497;&#1514;" ;
$out_languages {"ml"} = "&#1502;&#1500;&#1497;&#1488;&#1500;&#1488;&#1501;" ;
$out_languages {"ms"} = "&#1502;&#1500;&#1488;&#1497;&#1514;" ;
$out_languages {"my"} = "&#1489;&#1493;&#1512;&#1502;&#1494;&#1497;&#1514;" ;
$out_languages {"nah"} = "Nahuatl" ;
$out_languages {"nl"} = "&#1492;&#1493;&#1500;&#1504;&#1491;&#1497;&#1514;" ;
$out_languages {"no"} = "&#1504;&#1493;&#1512;&#1489;&#1490;&#1497;&#1514;" ;
$out_languages {"oc"} = "Occitan" ;
$out_languages {"pl"} = "&#1508;&#1493;&#1500;&#1504;&#1497;&#1514;" ;
$out_languages {"pt"} = "&#1508;&#1493;&#1512;&#1496;&#1493;&#1490;&#1494;&#1497;&#1514;" ;
$out_languages {"ro"} = "&#1512;&#1493;&#1502;&#1504;&#1497;&#1514;" ;
$out_languages {"ru"} = "&#1512;&#1493;&#1505;&#1497;&#1514;" ;
$out_languages {"sh"} = "&#1505;&#1512;&#1489;&#1493;-&#1511;&#1512;&#1493;&#1488;&#1496;&#1497;&#1514;" ;
$out_languages {"simple"} = "&#1488;&#1504;&#1490;&#1500;&#1497;&#1514;&nbsp;&#1489;&#1505;&#1497;&#1505;&#1497;&#1514;" ;
$out_languages {"sk"} = "&#1505;&#1500;&#1493;&#1489;&#1511;&#1497;&#1514;" ;
$out_languages {"sr"} = "&#1505;&#1512;&#1489;&#1497;&#1514;" ;
$out_languages {"sv"} = "&#1513;&#1489;&#1491;&#1497;&#1514;" ;
$out_languages {"ta"} = "&#1496;&#1502;&#1497;&#1500;&#1497;&#1514;" ;
$out_languages {"th"} = "&#1514;&#1488;&#1497;" ;
$out_languages {"tr"} = "&#1514;&#1493;&#1512;&#1499;&#1497;&#1514;" ;
$out_languages {"vi"} = "&#1493;&#1497;&#1497;&#1496;&#1504;&#1502;&#1497;&#1514;" ;
$out_languages {"wa"} = "&#1493;&#1500;&#1493;&#1504;&#1497;&#1514;" ;
$out_languages {"zh"} = "&#1505;&#1497;&#1504;&#1497;&#1514;" ;
$out_languages {"zz"} = "&#1499;&#1500;&nbsp;&#1492;&#1513;&#1508;&#1493;&#1514;" ;
}

# my @weekdays_he = qw(&#1512;&#1488;&#1513;&#1493;&#1503; &#1513;&#1504;&#1497; &#1513;&#1500;&#1497;&#1513;&#1497; &#1512;&#1489;&#1497;&#1506;&#1497; &#1495;&#1502;&#1497;&#1513;&#1497; &#1513;&#1497;&#1513;&#1497; &#1513;&#1489;&#1514;);
#
# my @months_he   = qw (&#1497;&#1504;&#1493;&#1488;&#1512; &#1508;&#1489;&#1512;&#1493;&#1488;&#1512; &#1502;&#1512;&#1509; &#1488;&#1508;&#1512;&#1497;&#1500; &#1502;&#1488;&#1497; &#1497;&#1493;&#1504;&#1497; &#1497;&#1493;&#1500;&#1497;
#                      &#1488;&#1493;&#1490;&#1493;&#1505;&#1496; &#1505;&#1508;&#1496;&#1502;&#1489;&#1512; &#1488;&#1493;&#1511;&#1496;&#1493;&#1489;&#1512; &#1504;&#1493;&#1489;&#1502;&#1489;&#1512; &#1491;&#1510;&#1502;&#1489;&#1512;);

#my @months_he   = qw (&#1497;&#1504;&#1493; &#1508;&#1489;&#1512; &#1502;&#1512;&#1509; &#1488;&#1508;&#1512; &#1502;&#1488;&#1497; &#1497;&#1493;&#1504;&#1497; &#1497;&#1493;&#1500;&#1497;
#                      &#1488;&#1493;&#1490; &#1505;&#1508;&#1496; &#1488;&#1493;&#1511; &#1504;&#1493;&#1489; &#1491;&#1510;&#1502;);

#hebrew date format: "dd &#1489;mmmm yyyy"

1;
