<?php

$namespaceNames = array(
	NS_MEDIA          => 'Media',
	NS_SPECIAL        => 'विशेष',
	NS_MAIN           => '',
	NS_TALK           => 'चर्चा',
	NS_USER           => 'सदस्य',
	NS_USER_TALK      => 'सदस्य_चर्चा',
	# NS_PROJECT set by $wgMetaNamespace
	NS_PROJECT_TALK   => '$1_चर्चा',
	NS_IMAGE          => 'चित्र',
	NS_IMAGE_TALK     => 'चित्र_चर्चा',
	NS_MEDIAWIKI      => 'MediaWiki',
	NS_MEDIAWIKI_TALK => 'MediaWiki_talk',
	NS_TEMPLATE       => 'साचा',
	NS_TEMPLATE_TALK  => 'साचा_चर्चा',
	NS_CATEGORY       => 'वर्ग',
	NS_CATEGORY_TALK  => 'वर्ग_चर्चा',
);

$digitTransformTable = array(
	'0' => '०', # &#x0966;
	'1' => '१', # &#x0967;
	'2' => '२', # &#x0968;
	'3' => '३', # &#x0969;
	'4' => '४', # &#x096a;
	'5' => '५', # &#x096b;
	'6' => '६', # &#x096c;
	'7' => '७', # &#x096d;
	'8' => '८', # &#x096e;
	'9' => '९', # &#x096f;
);
$linkTrail = "/^([\xE0\xA4\x80-\xE0\xA5\xA3\xE0\xA5\xB1-\xE0\xA5\xBF\xEF\xBB\xBF\xE2\x80\x8D]+)(.*)$/sDu";

$messages = array(
'about'         => 'च्या विषयी',
'cancel'        => 'रद्द करा',
'qbfind'        => 'शोध',
'qbbrowse'      => 'विचरण',
'qbedit'        => 'संपादन',
'qbpageoptions' => 'पृष्ठ विकल्प',
'qbpageinfo'    => 'पृष्ठ जानकारी',
'qbmyoptions'   => 'माझे विकल्प',
'mypage'        => 'माझे पृष्ठ',
'mytalk'        => 'माझ्या चर्चा',

'errorpagetitle'    => 'चुक',
'returnto'          => '$1 कडे परत चला.',
'help'              => 'साहाय्य',
'search'            => 'शोधा',
'go'                => 'चला',
'history'           => 'जुन्या आवृत्ती',
'printableversion'  => 'छापन्यायोग्य आवर्तन',
'editthispage'      => 'हे पृष्ठ संपादित करा',
'deletethispage'    => 'हे पृष्ठ काढून टाका',
'protectthispage'   => 'हे पृष्ठ सुरक्षित करा',
'unprotectthispage' => 'हे पृष्ठ असुरक्षित करा',
'newpage'           => 'नवीन पृष्ठ',
'talkpage'          => 'चर्चा पृष्ठ',
'articlepage'       => 'लेख पृष्ठ',
'userpage'          => 'सदस्य पृष्ठ',
'imagepage'         => 'चित्र पृष्ठ',
'viewtalkpage'      => 'चर्चा पृष्ठ पहा',
'otherlanguages'    => 'इतर भाषा',
'redirectedfrom'    => '($1 पासून पुनर्निर्देशित)',
'protectedpage'     => 'सुरक्षित पृष्ठ',

# All link text and link target definitions of links into project namespace that get used by other message strings, with the exception of user group pages (see grouppage) and the disambiguation template definition (see disambiguations).
'aboutpage'      => '{{ns:project}}:माहितीपृष्ठ',
'bugreports'     => 'दोष अहवाल',
'bugreportspage' => '{{ns:project}}:दोष अहवाल',
'edithelp'       => 'संपादन साहाय्य',
'edithelppage'   => '{{ns:project}} संपादन:साहाय्य',
'faq'            => 'नेहमीची प्रश्नावली',
'faqpage'        => '{{ns:project}}:प्रश्नावली',
'helppage'       => '{{ns:project}}:साहाय्य पृष्ठ',
'mainpage'       => 'मुखपृष्ठ',

'ok'              => 'ठीक',
'retrievedfrom'   => '"$1" पासून मिळविले',
'newmessageslink' => 'नवीन संदेश',

# Main script and global functions
'nosuchaction'      => 'अशी कृती अस्तित्वात नाही',
'nosuchspecialpage' => 'असे कोणतेही विशेष पृष्ठ अस्तित्वात नाही',

# General errors
'error'         => 'त्रुटी',
'databaseerror' => 'माहितीसंग्रहातील त्रुटी',
'dberrortextcl' => 'चुकीच्या प्रश्नलेखनामुळे माहितीसंग्रह त्रुटी.
शेवटची माहितीसंग्रहाला पाठविलेला प्रश्न होता:
"$1"
"$2" या कार्यकृतीमधून .
MySQL returned error "$3: $4".',

# Login and logout pages
'logouttitle'        => 'बाहेर पडा',
'loginpagetitle'     => 'सदस्य नोंदणी',
'yourname'           => 'तुमचे नाव',
'yourpassword'       => 'तुमचा परवलीचा शब्द',
'yourpasswordagain'  => 'तुमचा परवलीचा शब्द पुन्हा लिहा',
'remembermypassword' => 'माझा परवलीचा पुढच्या खेपेसाठी शब्द लक्षात ठेवा.',
'loginproblem'       => '<b>तुमच्या प्रवेशप्रक्रियेमध्ये चुक झाली आहे.</b><br />कृपया पुन्हा प्रयत्न करा!',
'login'              => 'प्रवेश करा',
'userlogin'          => 'सदस्य प्रवेश',
'logout'             => 'बाहेर पडा',
'userlogout'         => 'बाहेर पडा',
'notloggedin'        => 'प्रवेशाची नोंदणी झालेली नाही!',
'createaccount'      => 'नवीन खात्याची नोंदणी करा',
'createaccountmail'  => 'इमेल द्वारे',
'badretype'          => 'आपला परवलीचा शब्द चुकीचा आहे.',
'userexists'         => 'या नावाने सदस्याची नोंदणी झालेली आहे, कृपया दुसरे सदस्य नाव निवडा.',
'youremail'          => 'आपला इमेल *',
'yournick'           => 'आपले उपनाव (सहीसाठी)',
'loginerror'         => 'आपल्या प्रवेश नोंदणीमध्ये चुक झाली आहे',
'noname'             => 'आपण नोंदणीसाठी सदस्याचे योग्य नाव लिहिले नाही.',
'loginsuccesstitle'  => 'आपल्या प्रवेशाची नोंदणी यशस्वीरित्या पूर्ण झाली',
'wrongpassword'      => 'आपला परवलीचा शब्द चुकीचा आहे, पुन्हा एकदा प्रयत्न करा.',
'mailmypassword'     => 'कृपया परवलीचा नवीन शब्द माझ्या इमेल पत्त्यावर पाठविणे.',
'noemail'            => '"$1" सदस्यासाठी कोणताही इमेल पत्ता दिलेला नाही.',
'passwordsent'       => '"$1" सदस्याच्या इमेल पत्त्यावर परवलीचा नवीन शब्द पाठविण्यात आलेला आहे.
तो शब्द वापरुन पुन्हा प्रवेश करा.',

# Edit pages
'summary'            => 'सारांश',
'subject'            => 'विषय',
'minoredit'          => 'हा एक छोटा बदल आहे',
'watchthis'          => 'या लेखावर लक्ष ठेवा',
'savearticle'        => 'हा लेख साठवून ठेवा',
'preview'            => 'झलक',
'showpreview'        => 'झलक दाखवा',
'blockedtitle'       => 'या सदस्यासाठी प्रवेश नाकारण्यात आलेला आहे.',
'whitelistedittitle' => 'संपादनासाठी सदस्य म्हणून प्रवेश आवश्यक आहे.',
'whitelistreadtitle' => 'हा लेख वाचण्यासाठी [[Special:Userlogin|सदस्य म्हणून प्रवेश करावा लागेल]].',
'whitelistreadtext'  => 'हा लेख वाचण्यासाठी [[Special:Userlogin|सदस्य म्हणून प्रवेश करावा लागेल]].',
'whitelistacctitle'  => 'आपणास नवीन खात्याची नोंदणी करण्यास मनाई आहे.',
'whitelistacctext'   => 'आपणास नवीन खात्याची नोंदणी करण्यास मनाई आहे, कृपया व्यवस्थापक सूचीमधील कोणात्याही व्यवस्थापकाशी संपर्क करावा',
'accmailtitle'       => 'परवलीचा शब्द पाठविण्यात आलेला आहे.',
'accmailtext'        => "'$1' चा परवलीचा शब्द $2 पाठविण्यात आलेला आहे.",
'newarticle'         => '(नवीन लेख)',
'anontalkpagetext'   => "---- ''हे बोलपान  अशा अज्ञात सदस्यासाठी आहे ज्यांनी खाते तयार केले नाही आहे
 किंवा त्याचा वापर करत नाही आहे. त्याच्या ओळखीसाठी आम्ही आंतरजाल अंकपत्ता वापरतो आहे. असा अंकपत्ता 
बऱ्याच लोकांच्यात एकच असू शकतो जर आपण अज्ञात सदस्य असाल आणि आपल्याला काही अप्रासंगिक  संदेश
 मिळाला असेल तर  कृपया [[Special:Userlogin| खाते तयार करा किंवा प्रवेश करा]] ज्यामुळे पुढे असा गैरसमज होणार नाही.''",
'updated'            => '(बदल झाला आहे.)',
'note'               => '<strong>सूचना:</strong>',
'previewnote'        => 'लक्षात ठेवा की ही फक्त झलक आहे, बदल अजून सुरक्षित केले नाहीत.',
'editing'            => '$1 चे संपादन होत आहे.',
'editconflict'       => 'वादग्रस्त संपादन: $1',
'explainconflict'    => 'तुम्ही संपादनाला सुरूवात केल्यानंतर इतर कोणीतरी बदल केला आहे.
वरील पाठ्यभागामध्ये सध्या अस्तिवात असलेल्या पृष्ठातील पाठ्य आहे, तर तुमचे बदल खालील 
पाठ्यभागात दर्शविलेले आहेत. तुम्हाला हे बदल सध्या अस्तिवात असणाऱ्या पाठ्यासोबत एकत्रित करावे 
लागतील.
<b>केवळ</b> वरील पाठ्यभागामध्ये असलेले पाठ्य साठविण्यात येईल जर तुम्ही "साठवून ठेवा" ही
कळ दाबली.
<p>',
'yourtext'           => 'तुमचे पाठ्य',
'storedversion'      => 'साठविलेली आवृत्ती',
'editingold'         => '<strong>इशारा: तुम्ही मूळ पृष्ठाची एक कालबाह्य आवृत्ती संपादित करीत आहात.
जर आपण बदल साठवून ठेवण्यात आले तर या नंतरच्या सर्व आवृत्त्यांमधील साठविण्यात आलेले बदल नष्ठ होतील.</strong>',
'yourdiff'           => 'फरक',
'longpagewarning'    => 'इशारा: या पृष्ठ $1 kilobytes लांबीचे आहे; काही विचरकांना
सुमारे ३२ किलोबाईट्स् आणि त्यापेक्षा जास्त लांबीच्या पृष्ठांना संपादित करण्यास अडचण येऊ शकते.
कृपया या पृष्ठाचे त्याहून छोट्या भागात रुपांतर करावे',

# History pages
'revhistory'      => 'आवृत्ती इतिहास',
'nohistory'       => 'या पृष्ठासाठी आवृत्ती इतिहास अस्तित्वात नाही.',
'revnotfound'     => 'आवृत्ती सापडली नाही',
'revnotfoundtext' => 'या पृष्ठाची तुम्ही मागविलेली जुनी आवृत्ती सापडली नाही.
कृपया URL तपासून पहा.',
'loadhist'        => 'पृष्ठाचा इतिहास दाखवित आहोत',
'currentrev'      => 'चालू आवृत्ती',
'revisionasof'    => '$1 नुसारची आवृत्ती',
'cur'             => 'चालू',
'next'            => 'पुढील',
'last'            => 'मागील',
'orig'            => 'मूळ',
'histlegend'      => 'Legend: (चालू) = चालू आवृत्तीशी फरक,
(मागील) = पूर्वीच्या आवृत्तीशी फरक, M = छोटा बदल',

# Diffs
'difference'  => '(आवर्तनांमधील फरक)',
'loadingrev'  => 'फरकासाठी आवर्तने भरत(लोड करत) आहे',
'lineno'      => 'ओळ $1:',
'editcurrent' => 'या पृष्ठाची सध्याची आवृत्ती संपादित करा',

# Image list
'imagelist'      => 'चित्र यादी',
'getimagelist'   => 'चित्र यादी खेचत आहे',
'ilsubmit'       => 'शोधा',
'showlast'       => '$2 क्रमबद्ध शेवटची $1 चित्रे पहा.',
'byname'         => 'नावानुसार',
'bydate'         => 'तारखेनुसार',
'bysize'         => 'आकारानुसार',
'imgdelete'      => 'पुसा',
'imgdesc'        => 'वर्णन',
'imglegend'      => 'अर्थ: (वर्णन) = चित्र वर्णन पहा/बदला.',
'imghistory'     => 'चित्र इतिहास',
'revertimg'      => 'उलट',
'deleteimg'      => 'पुसा',
'imghistlegend'  => 'अर्थ: (सद्य) = हे सध्याचे चित्र आहे, (पुसा) = ही जुनी
आवृत्ती पुसून टाका, (उलट) = या जुन्या आवृत्तीवर उलटवा.
<br /><i>तारखेवर टिचकी मारुन त्या दिवशी चढवलेली चित्रे पहा</i>.',
'imagelinks'     => 'चित्र दुवे',
'linkstoimage'   => 'खालील पाने या चित्राशी जोडली आहेत:',
'nolinkstoimage' => 'या चित्राशी जोडलेली पृष्ठे नाही आहेत.',

# Statistics
'statistics' => 'सांख्यिकी',
'sitestats'  => 'स्थळ सांख्यिकी',
'userstats'  => 'सदस्य सांख्यिकी',

# Contributions
'contributions' => 'सदस्याचे योगदान',
'mycontris'     => 'माझे योगदान',
'contribsub2'    => '$1 ($2) साठी',
'nocontribs'    => 'या मानदंडाशी जुळणारे बदल सापडले नाहीत.',
'ucnote'        => 'या सदस्याचे गेल्या <b>$2</b> दिवसातील शेवटचे <b>$1</b> बदल दिले आहेत.',
'uclinks'       => 'शेवटचे $1 बदल पहा;शेवटचे $2 दिवस पहा.',
'uctop'         => ' (वर)',

# What links here
'whatlinkshere' => 'येथे काय जोडले आहे',
'notargettitle' => 'कर्म(target) नाही',
'notargettext'  => 'ही क्रिया करण्यासाठी तुम्ही सदस्य किंवा पृष्ठ लिहिले नाही.',
'linklistsub'   => '(दुव्यांची यादी)',
'isredirect'    => 'पुनर्निर्देशित पान',

# Block/unblock
'blockip'           => 'हा अंकपत्ता आडवा',
'ipaddress'         => 'अंकपत्ता',
'ipbreason'         => 'कारण',
'ipbsubmit'         => 'हा पत्ता आडवा',
'badipaddress'      => 'अंकपत्ता बरोबर नाही.',
'blockipsuccesssub' => 'आडवणूक यशस्वी झाली',
'unblockip'         => 'अंकपत्ता सोडवा',
'unblockiptext'     => 'खाली दिलेला फॉर्म वापरून पुर्वी आडवलेल्या अंकपत्त्याला लेखनासाठी आधिकार द्या.',
'ipusubmit'         => 'हा पत्ता सोडवा',
'ipblocklist'       => 'आडवलेल्या अंकपत्त्यांची यादी',
'blocklink'         => 'आडवा',
'unblocklink'       => 'सोडवा',
'contribslink'      => 'योगदान',

# Move page
'movepage'         => 'पृष्ठ स्थानांतरण',
'movepagetalktext' => "संबंधित चर्चा पृष्ठ याबरोबर स्थानांतरीत होणार नाही '''जर:'''
* तुम्ही पृष्ठ दुसऱ्या नामावकाशात  स्थानांतरीत करत असाल
* या नावाचे चर्चा अगोदरच अस्तित्वात असेल तर, किंवा 
* खालील चेकबॉक्स तुम्ही काढुन टाकला तर.

या बाबतीत तुम्हाला स्वतःला ही पाने एकत्र करावी लागतील.",
'movearticle'      => 'पृष्ठाचे स्थानांतरण',
'movenologin'      => 'प्रवेश केलेला नाही',
'newtitle'         => 'नवीन शिर्षकाकडे',
'movepagebtn'      => 'स्थानांतरण करा',
'pagemovedsub'     => 'स्थानांतरण यशस्वी',
'pagemovedtext'    => 'पृष्ठ "[[$1]]" "[[$2]]" नावाने स्थानांतरीत केले.',
'articleexists'    => 'त्या नावाचे पृष्ठ अगोदरच अस्तित्वात आहे, किंवा तुम्ही निवडलेले
नाव योग्य नाही आहे.
कृपया दुसरे नाव शोधा.',
'talkexists'       => 'पृष्ठ यशस्वीरीत्या स्थानांतरीत झाले पण चर्चा पृष्ठ स्थानांतरीत होवू
शकले नाही कारण त्या नावाचे पृष्ठ आधीच अस्तित्वात होते. कृपया तुम्ही स्वतः ती पृष्ठे एकत्र करा.',
'movedto'          => 'कडे स्थानांतरण केले',
'movetalk'         => 'शक्य असल्यास "चर्चा पृष्ठ" स्थानांतरीत करा',
'talkpagemoved'    => 'संबंधित चर्चा पृष्ठही स्थानांतरीत केले.',
'talkpagenotmoved' => 'संबंधित चर्चा पृष्ठ स्थानांतरीत केले <strong>नाही</strong>',

);

?>
