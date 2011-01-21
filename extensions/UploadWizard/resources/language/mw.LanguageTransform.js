// this class seems to be about selecting a language to fall back on if it's not available
// in the current regime we will do this in PHP

	// Language classes ( has a file in /languages/classes/Language{code}.js )
	// ( for languages that override default transforms ) 
	mw.Language.transformClass = ['am', 'ar', 'bat_smg', 'be_tarak', 'be', 'bh',
		'bs', 'cs', 'cu', 'cy', 'dsb', 'fr', 'ga', 'gd', 'gv', 'he', 'hi',
		'hr', 'hsb', 'hy', 'ksh', 'ln', 'lt', 'lv', 'mg', 'mk', 'mo', 'mt',
		'nso', 'pl', 'pt_br', 'ro', 'ru', 'se', 'sh', 'sk', 'sl', 'sma',
		'sr_ec', 'sr_el', 'sr', 'ti', 'tl', 'uk', 'wa'
	];
	
	// Language fallbacks listed from language -> fallback language
	mw.Language.fallbackTransformMap = {
		'mwl' : 'pt', 
		'ace' : 'id', 
		'hsb' : 'de', 
		'frr' : 'de', 
		'pms' : 'it', 
		'dsb' : 'de', 
		'gan' : 'gan-hant', 
		'lzz' : 'tr', 
		'ksh' : 'de', 
		'kl' : 'da', 
		'fur' : 'it', 
		'zh-hk' : 'zh-hant', 
		'kk' : 'kk-cyrl', 
		'zh-my' : 'zh-sg', 
		'nah' : 'es', 
		'sr' : 'sr-ec', 
		'ckb-latn' : 'ckb-arab', 
		'mo' : 'ro', 
		'ay' : 'es', 
		'gl' : 'pt', 
		'gag' : 'tr', 
		'mzn' : 'fa', 
		'ruq-cyrl' : 'mk', 
		'kk-arab' : 'kk-cyrl', 
		'pfl' : 'de', 
		'zh-yue' : 'yue', 
		'ug' : 'ug-latn', 
		'ltg' : 'lv', 
		'nds' : 'de', 
		'sli' : 'de', 
		'mhr' : 'ru', 
		'sah' : 'ru', 
		'ff' : 'fr', 
		'ab' : 'ru', 
		'ko-kp' : 'ko', 
		'sg' : 'fr', 
		'zh-tw' : 'zh-hant', 
		'map-bms' : 'jv', 
		'av' : 'ru', 
		'nds-nl' : 'nl', 
		'pt-br' : 'pt', 
		'ce' : 'ru', 
		'vep' : 'et', 
		'wuu' : 'zh-hans', 
		'pdt' : 'de', 
		'krc' : 'ru', 
		'gan-hant' : 'zh-hant', 
		'bqi' : 'fa', 
		'as' : 'bn', 
		'bm' : 'fr', 
		'gn' : 'es', 
		'tt' : 'ru', 
		'zh-hant' : 'zh-hans', 
		'hif' : 'hif-latn', 
		'zh' : 'zh-hans', 
		'kaa' : 'kk-latn', 
		'lij' : 'it', 
		'vot' : 'fi', 
		'ii' : 'zh-cn', 
		'ku-arab' : 'ckb-arab', 
		'xmf' : 'ka', 
		'vmf' : 'de', 
		'zh-min-nan' : 'nan', 
		'bcc' : 'fa', 
		'an' : 'es', 
		'rgn' : 'it', 
		'qu' : 'es', 
		'nb' : 'no', 
		'bar' : 'de', 
		'lbe' : 'ru', 
		'su' : 'id', 
		'pcd' : 'fr', 
		'glk' : 'fa', 
		'lb' : 'de', 
		'kk-kz' : 'kk-cyrl', 
		'kk-tr' : 'kk-latn', 
		'inh' : 'ru', 
		'mai' : 'hi', 
		'tp' : 'tokipona', 
		'kk-latn' : 'kk-cyrl', 
		'ba' : 'ru', 
		'nap' : 'it', 
		'ruq' : 'ruq-latn', 
		'tt-cyrl' : 'ru', 
		'lad' : 'es', 
		'dk' : 'da', 
		'de-ch' : 'de', 
		'be-x-old' : 'be-tarask', 
		'za' : 'zh-hans', 
		'kk-cn' : 'kk-arab', 
		'shi' : 'ar', 
		'crh' : 'crh-latn', 
		'yi' : 'he', 
		'pdc' : 'de', 
		'eml' : 'it', 
		'uk' : 'ru', 
		'kv' : 'ru', 
		'koi' : 'ru', 
		'cv' : 'ru', 
		'zh-cn' : 'zh-hans', 
		'de-at' : 'de', 
		'jut' : 'da', 
		'vec' : 'it', 
		'zh-mo' : 'zh-hk', 
		'fiu-vro' : 'vro', 
		'frp' : 'fr', 
		'mg' : 'fr', 
		'ruq-latn' : 'ro', 
		'sa' : 'hi', 
		'lmo' : 'it', 
		'kiu' : 'tr', 
		'tcy' : 'kn', 
		'srn' : 'nl', 
		'jv' : 'id', 
		'vls' : 'nl', 
		'zea' : 'nl', 
		'ty' : 'fr', 
		'szl' : 'pl', 
		'rmy' : 'ro', 
		'wo' : 'fr', 
		'vro' : 'et', 
		'udm' : 'ru', 
		'bpy' : 'bn', 
		'mrj' : 'ru', 
		'ckb' : 'ckb-arab', 
		'xal' : 'ru', 
		'de-formal' : 'de', 
		'myv' : 'ru', 
		'ku' : 'ku-latn', 
		'crh-cyrl' : 'ru', 
		'gsw' : 'de', 
		'rue' : 'uk', 
		'iu' : 'ike-cans', 
		'stq' : 'de', 
		'gan-hans' : 'zh-hans', 
		'scn' : 'it', 
		'arn' : 'es', 
		'ht' : 'fr', 
		'zh-sg' : 'zh-hans', 
		'bat-smg' : 'lt', 
		'aln' : 'sq', 
		'tg' : 'tg-cyrl', 
		'li' : 'nl', 
		'simple' : 'en', 
		'os' : 'ru', 
		'ln' : 'fr', 
		'als' : 'gsw', 
		'zh-classical' : 'lzh', 
		'arz' : 'ar', 
		'wa' : 'fr'
	};
	
	/**
	* Get a language transform key
	* returns default "en" fallback if none found
	* @param String langKey The language key to be checked	
	*/
	mw.getLangTransformKey = function( langKey ) {		
		if( mw.Language.fallbackTransformMap[ langKey ] ) {
			langKey = mw.Language.fallbackTransformMap[ langKey ];
		}
		// Make sure the langKey has a transformClass: 
		for( var i = 0; i < mw.Language.transformClass.length ; i++ ) {
			if( langKey == mw.Language.transformClass[i] ){
				return langKey
			}
		}
		// By default return the base 'en' class
		return 'en';
	};
	