<?php
/**
  * These determine things like interwikis, language selectors, and so on.
  * Safe to change without running scripts on the respective sites.
  *
  * @addtogroup Language
  */
/* private */ $wgLanguageNames = array(
	'aa' => 'Afar',			# Afar
	'ab' => 'Аҧсуа',	# Abkhaz, should possibly add ' бысжѡа'
	'af' => 'Afrikaans',	# Afrikaans
	'ak' => 'Akana',		# Akan
	'als' => 'Alemannisch',	# Alemannic -- not a valid code, for compatibility
	'am' => 'አማርኛ',	# Amharic
	'an' => 'Aragonés',	# Aragonese
	'ang' => 'Anglo Saxon',	# Old English
	'ar' => 'العربية',	# Arabic
	'arc' => 'ܐܪܡܝܐ',	# Aramaic
	'arn' => 'Mapudungun',	# Mapuche, Mapudungu, Araucanian (Araucano)
	'as' => 'অসমীয়া',	# Assamese
	'ast' => 'Asturianu',	# Asturian
	'av' => 'Авар',	# Avar
	'ay' => 'Aymar',		# Aymara, should possibly be Aymará
	'az' => 'Azərbaycan',	# Azerbaijani
	'ba' => 'Башҡорт',	# Bashkir
	'bar' => 'Boarisch',	# Bavarian (Austro-Bavarian and South Tyrolean)
	'bat-smg' => 'Žemaitėška', # Samogitian
	'bcl' => 'Bikol Central', # Bikol: Central Bicolano language
	'be' => 'Беларуская',	#  Belarusian normative
	'be-tarask' => 'Беларуская (тарашкевіца)',	# Belarusian in Taraskievica orthography
	'be-x-old' => 'Беларуская (тарашкевіца)',	# Belarusian in Taraskievica orthography; compat link
	'bg' => 'Български',	# Bulgarian
	'bh' => 'भोजपुरी',	# Bihara
	'bi' => 'Bislama',		# Bislama
	'bm' => 'Bamanankan',	# Bambara
	'bn' => 'বাংলা',	# Bengali
	'bo' => 'བོད་ཡིག',	# Tibetan
	'bpy' => 'ইমার ঠার/বিষ্ণুপ্রিয়া মণিপুরী',	# Bishnupriya Manipuri
	'br' => 'Brezhoneg',	# Breton
	'bs' => 'Bosanski',		# Bosnian
	'bug' => 'ᨅᨔ ᨕᨘᨁᨗ',	# Buginese
	'bxr' => 'Буряад',	# Buryat (Russia)
	'ca' => 'Català',	# Catalan
	'cbk-zam' => 'Zamboangueño',	# Zamboanga Chavacano
	'cdo' => 'Mìng-dĕ̤ng-ngṳ̄',	# Min Dong
	'ce' => 'Нохчийн',	# Chechen
	'ceb' => 'Cebuano',     # Cebuano
	'ch' => 'Chamoru',		# Chamorro
	'cho' => 'Choctaw',		# Choctaw
	'chr' => 'ᏣᎳᎩ', # Cherokee
	'chy' => 'Tsetsêhestâhese',	# Cheyenne
	'co' => 'Corsu',		# Corsican
	'cr' => 'Nēhiyawēwin / ᓀᐦᐃᔭᐍᐏᐣ',		# Cree
	'crh' => 'Qırımtatarca',   # Crimean Tatar
	'crh-latn' => "\xE2\x80\xAAQırımtatarca (Latin)\xE2\x80\xAC",       # Crimean Tatar (Latin)
	'crh-cyrl' => "\xE2\x80\xAAQırımtatarca (Kiril)\xE2\x80\xAC",       # Crimean Tatar (Cyrillic)
	'cs' => 'Česky',	# Czech
	'csb' => 'Kaszëbsczi',	# Cassubian
	'cu' => 'Словѣньскъ', 	# Old Church Slavonic (ancient language)
	'cv' => 'Чăвашла',	# Chuvash
	'cy' => 'Cymraeg',		# Welsh
	'da' => 'Dansk',		# Danish
	'de' => 'Deutsch',		# German
	'diq' => 'Zazaki',		# Zazaki
	'dk' => 'Dansk', 		# Unused code currently redirecting to Danish, 'da' is correct for the language
	'dsb' => 'Dolnoserbski', # Lower Sorbian
	'dv' => 'ދިވެހިބަސް',		# Dhivehi
	'dz' => 'ཇོང་ཁ',		# Bhutani
	'ee' => 'Eʋegbe',	# Ewe
	'el' => 'Ελληνικά',	# Greek
	'eml' => 'Emiliàn e rumagnòl',	# Emilian-Romagnol / Sammarinese
	'en' => 'English',		# English
	'eo' => 'Esperanto',	# Esperanto
	'es' => 'Español',	# Spanish
	'et' => 'Eesti',		# Estonian
	'eu' => 'Euskara',		# Basque
	'ext' => 'Estremeñu', # Extremaduran
	'fa' => 'فارسی',	# Persian
	'ff' => 'Fulfulde',		# Fulah
	'fi' => 'Suomi',		# Finnish
	'fiu-vro' => 'Võro',    # Võro
	'fj' => 'Na Vosa Vakaviti',	# Fijian
	'fo' => 'Føroyskt',	# Faroese
	'fr' => 'Français',	# French
	'frc' => 'Français cadien', # Cajun French
	'frp' => 'Arpetan',	# Franco-Provençal/Arpitan
	'fur' => 'Furlan',		# Friulian
	'fy' => 'Frysk',		# Frisian
	'ga' => 'Gaeilge',		# Irish
	'gd' => 'Gàidhlig',	# Scots Gaelic
	'gl' => 'Galego',		# Galician
	'glk' => 'گیلکی',	# Gilaki
	'gn' => 'Avañe\'ẽ',	# Guarani
	'got' => '𐌲𐌿𐍄𐌹𐍃𐌺',	# Gothic
	'grc' => 'Ἀρχαία ἑλληνικὴ', # Ancient Greece
	'gsw' => 'Alemannisch',	# Alemannic
	'gu' => 'ગુજરાતી',	# Gujarati
	'gv' => 'Gaelg',		# Manx
	'ha' => 'هَوُسَ',	# Hausa
	'hak' => 'Hak-kâ-fa',	# Hakka
	'haw' => 'Hawai`i',		# Hawaiian
	'he' => 'עברית',	# Hebrew
	'hi' => 'हिन्दी',	# Hindi
	'hil' => 'Ilonggo',	# Hiligaynon
	'ho' => 'Hiri Motu',	# Hiri Motu
	'hr' => 'Hrvatski',		# Croatian
	'hsb' => 'Hornjoserbsce',	# Upper Sorbian
	'ht'  => 'Kreyòl ayisyen',		# Haitian
	'hu' => 'Magyar',		# Hungarian
	'hy' => 'Հայերեն',	# Armenian
	'hz' => 'Otsiherero',	# Herero
	'ia' => 'Interlingua',	# Interlingua (IALA)
	'id' => 'Bahasa Indonesia',	# Indonesian
	'ie' => 'Interlingue',	# Interlingue (Occidental)
	'ig' => 'Igbo',			# Igbo
	'ii' => 'ꆇꉙ',	# Sichuan Yi
	'ik' => 'Iñupiak',	# Inupiak
	'ilo' => 'Ilokano',	# Ilokano
	'io' => 'Ido',			# Ido
	'is' => 'Íslenska',	# Icelandic
	'it' => 'Italiano',		# Italian
	'iu' => 'ᐃᓄᒃᑎᑐᑦ',	# Inuktitut
	'ja' => '日本語',	# Japanese
	'jbo' => 'Lojban',		# Lojban
	'jv' => 'Basa Jawa',	# Javanese
	'ka' => 'ქართული',	# Georgian
	'kaa' => 'Qaraqalpaqsha',	# Karakalpak
	'kab' => 'Taqbaylit',	# Kabyle
	'kg' => 'Kongo',		# Kongo, (FIXME!) should probaly be KiKongo or KiKoongo
	'ki' => 'Gĩkũyũ',	# Kikuyu, correctness not guaranteed
	'kj' => 'Kuanyama',		# Kuanyama (FIXME!)
	'kk' => 'Қазақша',	# Kazakh
	'kk-cn' => "\xE2\x80\xABقازاقشا (تٴوتە)\xE2\x80\xAC",	# Kazakh Arabic
	'kk-kz' => "\xE2\x80\xAAҚазақша (кирил)\xE2\x80\xAC",	# Kazakh Cyrillic
	'kk-tr' => "\xE2\x80\xAAQazaqşa (latın)\xE2\x80\xAC",	# Kazakh Latin
	'kl' => 'Kalaallisut',	# Greenlandic
	'km' => 'ភាសាខ្មែរ',	# Cambodian
	'kn' => 'ಕನ್ನಡ',	# Kannada
	'ko' => '한국어',	# Korean
	'kr' => 'Kanuri',		# Kanuri (FIXME!)
	'krj' => 'Kinaray-a', # Kinaray-a
	'ks' => 'कश्मीरी - (كشميري)',	# Kashmiri
	'ksh' => 'Ripoarisch', 	# Ripuarian 
	'ku'  => 'Kurdî / كوردی',	# Kurdish
	'ku-latn' => "\xE2\x80\xAAKurdî (latînî)\xE2\x80\xAC",	# Kurdish Latin script
	'ku-arab' => "\xE2\x80\xABكوردي (عەرەبی)\xE2\x80\xAC",	# Kurdish Arabic script
	'kv' => 'Коми', 	# Komi, cyrillic is common script but also written in latin script
	'kw' => 'Kernewek',		# Cornish
	'ky' => 'Кыргызча',	# Kirghiz
	'la' => 'Latina',		# Latin
	'lad' => 'Ladino',	# Ladino
	'lbe' => 'Лакку',	# Lak
	'lb' => 'Lëtzebuergesch',	# Luxemburguish
	'lg' => 'Luganda',		# Ganda
	'li' => 'Limburgs',	# Limburgian
	'lij' => 'Líguru',	# Ligurian
	'lld' => 'Ladin',	# Ladin
	'lmo' => 'Lumbaart',	# Lombard
	'ln' => 'Lingála',		# Lingala
	'lo' => 'ລາວ',# Laotian
	'lt' => 'Lietuvių',	# Lithuanian
	'lv' => 'Latviešu',	# Latvian
	'lzz' => 'Lazuri Nena',	#Laz
	'map-bms' => 'Basa Banyumasan', # Banyumasan 
	'mg' => 'Malagasy',		# Malagasy
	'mh' => 'Ebon',			# Marshallese
	'mi' => 'Māori',	# Maori
	'minnan' => 'Bân-lâm-gú', # Min-nan (also zh-min-nan)
	'mk' => 'Македонски',	# Macedonian
	'ml' => 'മലയാളം',	# Malayalam
	'mn' => 'Монгол',	# Mongoloian
	'mo' => 'Молдовеняскэ',	# Moldovan
	'mr' => 'मराठी',	# Marathi
	'ms' => 'Bahasa Melayu',	# Malay
	'mt' => 'Malti',	# Maltese
	'mus' => 'Muscogee',	# Creek, should possibly be Muskogee
	'my' => 'Myanmasa',		# Burmese
	'mzn' => 'مَزِروني',		# Mazandarin
	'na' => 'Ekakairũ Naoero',		# Nauruan
	'nah' => 'Nahuatl',		# Nahuatl, en:Wikipedia writes Nahuatlahtolli, while another form is Náhuatl
	'nan' => 'Bân-lâm-gú', # Min-nan -- (bug 8217) nan instead of zh-min-nan, http://www.sil.org/iso639-3/codes.asp?order=639_3&letter=n
	'nap' => 'Nnapulitano',	# Neapolitan
	'nb' => "\xE2\x80\xAANorsk (bokmål)\xE2\x80\xAC",		# Norwegian (Bokmal)
	'nds' => 'Plattdüütsch',	# Low German ''or'' Low Saxon
	'nds-nl' => 'Nedersaksisch',	# Dutch Low Saxon
	'ne' => 'नेपाली',	# Nepali
	'new' => 'नेपाल भाषा',		# Newar / Nepal Bhasa
	'ng' => 'Oshiwambo',		# Ndonga
	'nl' => 'Nederlands',	# Dutch
	'nn' => "\xE2\x80\xAANorsk (nynorsk)\xE2\x80\xAC"	,	# Norwegian (Nynorsk)
	'no' => "\xE2\x80\xAANorsk (bokmål)\xE2\x80\xAC",		# Norwegian
	'non' => 'Norrǿna',		# Old Norse
	'nov' => 'Novial',		# Novial
	'nrm' => 'Nouormand',	# Norman
	'nv' => 'Diné bizaad',	# Navajo
	'ny' => 'Chi-Chewa',	# Chichewa
	'oc' => 'Occitan',		# Occitan
	'om' => 'Oromoo', 		# Oromo
	'or' => 'ଓଡ଼ିଆ',		# Oriya
	'os' => 'Иронау', # Ossetic
	'pa' => 'ਪੰਜਾਬੀ', # Punjabi
	'pag' => 'Pangasinan',	# Pangasinan
	'pam' => 'Kapampangan',   # Pampanga
	'pap' => 'Papiamentu',	# Papiamentu
	'pdc' => 'Deitsch', 	# Pennsylvania German
	'pi' => 'पािऴ',	# Pali
	'pih' => 'Norfuk / Pitkern', # Norfuk/Pitcairn/Norfolk
	'pl' => 'Polski',		# Polish
	'pms' => 'Piemontèis', 	# Piedmontese
	'ps' => 'پښتو',	# Pashto
	'pt' => 'Português',	# Portuguese
	'pt-br' => 'Português do Brasil',	# Brazilian Portuguese
	'qu' => 'Runa Simi',	# Quechua
	'rm' => 'Rumantsch',	# Raeto-Romance
	'rmy' => 'Romani',	# Vlax Romany
	'rn' => 'Kirundi',		# Kirundi
	'ro' => 'Română',	# Romanian
	'roa-rup' => 'Armãneashce', # Aromanian
	'roa-tara' => 'Tarandíne',	# Tarantino
	'ru' => 'Русский',	# Russian
	'ru-sib' => 'Сибирской',	# Siberian/North Russian
	'rw' => 'Kinyarwanda',	# Kinyarwanda, should possibly be Kinyarwandi
	'sa' => 'संस्कृत',	# Sanskrit
	'sah' => 'Саха тыла', # Sakha
	'sc' => 'Sardu',		# Sardinian
	'scn' => 'Sicilianu',	# Sicilian
	'sco' => 'Scots',       # Scots
	'sd' => 'سنڌي',	# Sindhi
	'se' => 'Sámegiella',	# Northern Sami
	'sei' => 'Cmique Itom',	# Seri
	'sg' => 'Sängö',		# Sango, possible alternative is Sangho
	'sh' => 'Srpskohrvatski / Српскохрватски', # Serbocroatian
	'si' => 'සිංහල',	# Sinhalese
	'simple' => 'Simple English',	# Simple English
	'sk' => 'Slovenčina',	# Slovak
	'sl' => 'Slovenščina',	# Slovenian
	'sm' => 'Gagana Samoa',	# Samoan
	'sn' => 'chiShona',		# Shona
	'so' => 'Soomaaliga',	# Somali
	'sq' => 'Shqip',		# Albanian
	'sr' => 'Српски / Srpski',	# Serbian
	'sr-ec' => 'ћирилица',	# Serbian cyrillic ekavian
	'sr-jc' => 'ијекавица',	# Serbian cyrillic iyekvian
	'sr-el' => 'latinica',	# Serbian latin ekavian
	'sr-jl' => 'ijekavica',	# Serbian latin iyekavian
	'ss' => 'SiSwati',		# Swati
	'st' => 'seSotho',		# Southern Sotho
	'su' => 'Basa Sunda',	# Sundanese
	'sv' => 'Svenska',		# Swedish
	'sw' => 'Kiswahili',	# Swahili
	'ta' => 'தமிழ்',	# Tamil
	'te' => 'తెలుగు',	# Telugu
	'tet' => 'Tetun',	# Tetun
	'tg' => 'Тоҷикӣ',	# Tajik
	'th' => 'ไทย',	# Thai
	'ti' => 'ትግርኛ',		# Tigrinya
	'tk' => 'Türkmen',	# Turkmen
	'tl' => 'Tagalog',		# Tagalog (Filipino)
	#'tlh' => 'tlhIngan-Hol',	# Klingon - no interlanguage links allowed
	'tn' => 'Setswana',		# Setswana
	'to' => 'faka-Tonga',		# Tonga (Tonga Islands)
	'tokipona' => 'Toki Pona',      # Toki Pona
	'tp' => 'Toki Pona',	# Toki Pona - non-standard language code
	'tpi' => 'Tok Pisin',	# Tok Pisin
	'tr' => 'Türkçe',	# Turkish
	'ts' => 'Xitsonga',		# Tsonga
	'tt' => 'Tatarça',	# Tatar
	'tum' => 'chiTumbuka',  # Tumbuka
	'tw' => 'Twi',			# Twi, (FIXME!)
	'ty' => 'Reo Mā`ohi',	# Tahitian
	'tyv' => 'Тыва дыл',	# Tyvan
	'udm' => 'Удмурт',	# Udmurt
	'ug' => 'Uyghurche‎ / ئۇيغۇرچە',	# Uyghur
	'uk' => 'Українська',	# Ukrainian
	'ur' => 'اردو',	# Urdu
	'uz' => 'O\'zbek',	# Uzbek
	've' => 'Tshivenda',		# Venda
	'vec' => 'Vèneto',	# Venetian
	'vi' => 'Tiếng Việt',	# Vietnamese
	'vls' => 'West-Vlams', # West Flemish
	'vo' => 'Volapük',	# Volapük
	'wa' => 'Walon',		# Walloon
	'war' => 'Winaray', # Waray-Waray
	'wo' => 'Wolof',		# Wolof
	'wuu' => '吴语',		# Wu
	'xal' => 'Хальмг',		# Kalmyk
	'xh' => 'isiXhosa',		# Xhosan
	'yi' => 'ייִדיש',	# Yiddish
	'yo' => 'Yorùbá',	# Yoruba
	'yue' => '粵語', 	# Cantonese -- (bug 8217) yue instead of zh-yue, http://www.sil.org/iso639-3/codes.asp?order=639_3&letter=y
	'za' => '(Cuengh)',		# Zhuang
	'zea' => 'Zeêuws',	# Zealandic
	'zh' => '中文',						# (Zhōng Wén) - Chinese
	'zh-cfr' => '閩南語', 					# Min-nan alias (site is at minnan)
	'zh-classical' => '古文 / 文言文',			# Classical Chinese/Literary Chinese
	'zh-cn' => "\xE2\x80\xAA中文(中国大陆)\xE2\x80\xAC",	# Chinese (PRC)
	'zh-hans' => "\xE2\x80\xAA中文(简体)\xE2\x80\xAC",	# Chinese written using the Simplified Chinese script
	'zh-hant' => "\xE2\x80\xAA中文(繁體)\xE2\x80\xAC",	# Chinese written using the Traditional Chinese script
	'zh-hk' => "\xE2\x80\xAA中文(香港)\xE2\x80\xAC",		# Chinese (Hong Kong)
	'zh-min-nan' => 'Bân-lâm-gú', 				# Min-nan -- (see bug 8217)
	'zh-sg' => "\xE2\x80\xAA中文(新加坡)\xE2\x80\xAC", 	# Chinese (Singapore)
	'zh-tw' => "\xE2\x80\xAA中文(台灣)\xE2\x80\xAC",		# Chinese (Taiwan)
	'zh-yue' => '粵語',					# Cantonese -- (see bug 8217)
	'zu' => 'isiZulu'		# Zulu
);

