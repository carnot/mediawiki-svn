<?php

/**
 * Internationalization file for the Semantic Maps extension
 *
 * @file SemanticMaps.i18n.php
 * @ingroup Semantic Maps
 *
 * @author Jeroen De Dauw
 */

$messages = array();

/** English
 * @author Jeroen De Dauw
 */
$messages['en'] = array(
	// General
	'semanticmaps-desc' => "Provides the ability to view and edit coordinate data stored with the Semantic MediaWiki extension ([http://mapping.referata.com/wiki/Examples demo's]).",
	'semanticmaps-unrecognizeddistance' => 'The value $1 is not a valid distance.',
	'semanticmaps-kml-link' => 'View the KML file',
	'semanticmaps-kml' => 'KML',
	'semanticmaps-default-kml-pagelink' => 'View page $1',

	// Forms
	'semanticmaps-loading-forminput'	=> 'Loading map form input...',
	'semanticmaps_lookupcoordinates' 	=> 'Look up coordinates',
	'semanticmaps_enteraddresshere' 	=> 'Enter address here',
	'semanticmaps-updatemap' 			=> 'Update map',
	'semanticmaps-forminput-remove'		=> 'Remove',
	'semanticmaps-forminput-add'		=> 'Add',
	'semanticmaps-forminput-locations'	=> 'Locations',
	
	// Parameter descriptions
	
	'semanticmaps-par-staticlocations'	=> 'A list of locations to add to the map together with the queried data. Like with display_points, you can add a title, description and icon per location using the tilde "~" as separator.',
	'semanticmaps-par-forceshow'		=> 'Show the map even when there are no locations to display?',
	'semanticmaps-par-showtitle'		=> 'Show a title in the marker info window or not. Disabling this is often usefull when using a template to format the info window content.',
	'semanticmaps-par-centre'		=> 'The centre of the map. When not provided, the map will automatically pick the optimal centre to display all markers on the map.',
	'semanticmaps-par-template'		=> 'A template to use to format the info window contents.'
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Fryed-peach
 * @author Purodha
 * @author Raymond
 */
$messages['qqq'] = array(
	'semanticmaps-desc' => '{{desc}}',
	'semanticmaps-forminput-remove' => '{{Identical|Remove}}',
	'semanticmaps-forminput-add' => '{{Identical|Add}}',
	'semanticmaps-forminput-locations' => '{{Identical|Location}}',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'semanticmaps-desc' => 'Bied die vermoë om koördinaatdata met behulp van die Semantiese MediaWiki-uitbreiding te sien en te wysig ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps-unrecognizeddistance' => 'Die waarde "$1" is nie \'n geldige afstand nie.',
	'semanticmaps_lookupcoordinates' => 'Soek koördinate op',
	'semanticmaps_enteraddresshere' => 'Voer adres hier in',
);

/** Gheg Albanian (Gegë)
 * @author Mdupont
 */
$messages['aln'] = array(
);

/** Arabic (العربية)
 * @author Meno25
 * @author OsamaK
 */
$messages['ar'] = array(
	'semanticmaps-desc' => 'يقدم إمكانية عرض وتعديل بيانات التنسيق التي خزنها امتداد سيمانتيك ميدياويكي ([http://mapping.referata.com/wiki/Examples تجربة]).',
	'semanticmaps-kml' => 'كيه إم إل',
	'semanticmaps_lookupcoordinates' => 'ابحث عن الإحداثيات',
	'semanticmaps_enteraddresshere' => 'أدخل العنوان هنا',
	'semanticmaps-forminput-remove' => 'أزل',
	'semanticmaps-forminput-add' => 'أضف',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Ghaly
 * @author Meno25
 */
$messages['arz'] = array(
	'semanticmaps_name' => 'خرائط دلالية',
	'semanticmaps_lookupcoordinates' => 'ابحث عن الإحداثيات',
	'semanticmaps_enteraddresshere' => 'أدخل العنوان هنا',
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 * @author Jim-by
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'semanticmaps-desc' => 'Забясьпечвае магчымасьць прагляду і рэдагаваньня зьвестак пра каардынаты, якія захоўваюцца з дапамогай пашырэньня Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples дэманстрацыя]).',
	'semanticmaps-unrecognizeddistance' => 'Значэньне $1 — няслушная адлегласьць.',
	'semanticmaps-kml-link' => 'Паказаць KML-файл',
	'semanticmaps-default-kml-pagelink' => 'Паказаць старонку $1',
	'semanticmaps-loading-forminput' => 'Загрузка мапы…',
	'semanticmaps_lookupcoordinates' => 'Пошук каардынатаў',
	'semanticmaps_enteraddresshere' => 'Увядзіце тут адрас',
	'semanticmaps-updatemap' => 'Абнавіць мапу',
	'semanticmaps-forminput-remove' => 'Выдаліць',
	'semanticmaps-forminput-add' => 'Дадаць',
	'semanticmaps-forminput-locations' => 'Месцы',
	'semanticmaps-par-staticlocations' => 'Сьпіс месцазнаходжаньняў для даданьня на мапу разам з запытанымі зьвесткамі. Напрыклад, разам з «display_points», Вы можаце дадаць назву, апісаньне і мініятуру для месцазнаходжаньня з дапамогай сымбаля «~» у якасьці разьдзяляльніка.',
	'semanticmaps-par-forceshow' => 'Паказаць мапу, нават калі няма месцазнаходжаньняў для паказу?',
	'semanticmaps-par-showtitle' => 'Паказваць назву ў акне інфармацыі пра маркер ці не. Адключэньне гэтай функцыі часта карыснае падчас выкарыстаньня шаблёну для фарматаваньня зьместу акна інфармацыі.',
	'semanticmaps-par-centre' => 'Цэнтар мапы. Калі ён не пададзены, мапа будзе аўтаматычна выбіраць аптымальны цэнтар для паказу ўсіх маркераў.',
	'semanticmaps-par-template' => 'Шаблён для фарматаваньня зьместу акна інфармацыі.',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'semanticmaps-forminput-remove' => 'Премахване',
	'semanticmaps-forminput-add' => 'Добавяне',
);

/** Bengali (বাংলা)
 * @author Wikitanvir
 */
$messages['bn'] = array(
	'semanticmaps-kml-link' => 'কেএমএল ফাইল দেখাও',
	'semanticmaps-default-kml-pagelink' => '$1 পাতা প্রদর্শন করো',
	'semanticmaps_enteraddresshere' => 'এখানে ঠিকানা প্রবেশ করাও',
	'semanticmaps-updatemap' => 'মানচিত্র হালনাগাদ',
	'semanticmaps-forminput-remove' => 'অপসারণ',
	'semanticmaps-forminput-add' => 'যোগ',
	'semanticmaps-forminput-locations' => 'অবস্থান',
);

/** Breton (Brezhoneg)
 * @author Fohanno
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'semanticmaps-desc' => 'Talvezout a ra da welet ha da gemmañ roadennoù daveennoù stoket dre an astenn Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps-unrecognizeddistance' => "An talvoud $1 n'eo ket un hed reizh anezhañ.",
	'semanticmaps-kml-link' => 'Gwelet ar restr KML',
	'semanticmaps-default-kml-pagelink' => 'Gwelet ar pennad $1',
	'semanticmaps-loading-forminput' => 'O kargañ enmont furmskrid ar gartenn...',
	'semanticmaps_lookupcoordinates' => 'Istimañ an daveennoù',
	'semanticmaps_enteraddresshere' => "Merkit ar chomlec'h amañ",
	'semanticmaps-updatemap' => 'Hizivaat ar gartenn',
	'semanticmaps-forminput-remove' => 'Dilemel',
	'semanticmaps-forminput-add' => 'Ouzhpennañ',
	'semanticmaps-forminput-locations' => "Lec'hiadurioù",
	'semanticmaps-par-forceshow' => "Diskouez ar gartenn ha pa ne vefe lec'h ebet da welet ?",
	'semanticmaps-par-template' => "Ur patrom d'ober gantañ da furmadiñ boued ar prenestr titouriñ.",
);

/** Bosnian (Bosanski)
 * @author CERminator
 * @author Palapa
 */
$messages['bs'] = array(
	'semanticmaps-desc' => 'Daje mogućnost pregleda i uređivanja podataka koordinata koji su spremljeni putem Semantic MediaWiki proširenja ([http://mapping.referata.com/wiki/Examples primjeri]).',
	'semanticmaps-unrecognizeddistance' => 'Vrijednost $1 nije ispravno odstojanje.',
	'semanticmaps-kml-link' => 'Pogledajte KML datoteku',
	'semanticmaps-default-kml-pagelink' => 'Pogledajte stranicu $1',
	'semanticmaps-loading-forminput' => 'Učitavam obrazac unosa za mapu...',
	'semanticmaps_lookupcoordinates' => 'Nađi koordinate',
	'semanticmaps_enteraddresshere' => 'Unesite adresu ovdje',
	'semanticmaps-updatemap' => 'Ažuriraj mapu',
	'semanticmaps-forminput-remove' => 'Ukloni',
	'semanticmaps-forminput-add' => 'Dodaj',
	'semanticmaps-forminput-locations' => 'Lokacije',
);

/** Catalan (Català)
 * @author Dvdgmz
 * @author Paucabot
 * @author SMP
 * @author Solde
 * @author Toniher
 */
$messages['ca'] = array(
	'semanticmaps-desc' => "Ofereix l'habilitat de visualitzar i editar dades de coordenades emmagatzemades a través de l'extensió Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples alguns exemples]).",
	'semanticmaps-unrecognizeddistance' => 'El valor $1 no és un valor de distància.',
	'semanticmaps-kml-link' => 'Visualitza el fitxer KML',
	'semanticmaps-default-kml-pagelink' => 'Visualitza la pàgina $1',
	'semanticmaps-loading-forminput' => "Carregant formulari d'entrada del mapa...",
	'semanticmaps_lookupcoordinates' => 'Consulta les coordenades',
	'semanticmaps_enteraddresshere' => 'Introduïu una adreça a continuació',
	'semanticmaps-updatemap' => 'Actualitzar mapa',
	'semanticmaps-forminput-remove' => 'Suprimir',
	'semanticmaps-forminput-add' => 'Afegir',
	'semanticmaps-forminput-locations' => 'Ubicacions',
	'semanticmaps-par-staticlocations' => "Una llista d'ubicacions per afegir al mapa juntament amb les dades consultades. Com amb 'display_points', s'hi pot afegir un títol, una descripció i una icona per a cada ubicació fent servir el signe \"~\" com a separador.",
	'semanticmaps-par-forceshow' => 'Mostrar el mapa fins i tot quan no hi ha ubicacions a mostrar?',
);

/** German (Deutsch)
 * @author DaSch
 * @author Imre
 * @author Kghbln
 * @author Pill
 * @author The Evil IP address
 * @author Umherirrender
 */
$messages['de'] = array(
	'semanticmaps-desc' => 'Ermöglicht das Anzeigen und Bearbeiten von Daten zu Koordinaten, die mit Semantic MediaWiki gespeichert werden ([http://mapping.referata.com/wiki/Examples Demonstrationsseite])',
	'semanticmaps-unrecognizeddistance' => 'Der Wert $1 ist keine gültige Distanz.',
	'semanticmaps-kml-link' => 'KML-Datei ansehen',
	'semanticmaps-default-kml-pagelink' => 'Artikel $1 ansehen',
	'semanticmaps-loading-forminput' => 'Lade die Formulareingaben zur Karte …',
	'semanticmaps_lookupcoordinates' => 'Koordinaten nachschlagen',
	'semanticmaps_enteraddresshere' => 'Adresse hier eingeben',
	'semanticmaps-updatemap' => 'Karte aktualisieren',
	'semanticmaps-forminput-remove' => 'Entfernen',
	'semanticmaps-forminput-add' => 'Hinzufügen',
	'semanticmaps-forminput-locations' => 'Standort',
	'semanticmaps-par-staticlocations' => 'Eine Listen von Standorten, die zusammen mit den abgefragten Daten, der Karte hinzugefügt werden sollen. Analog zu den Anzeigepunkten können je Standort Titel, Beschreibung und Symbol, unter Verwendung einer Tilde „~“ als Trennzeichen, hinzugefügt werden.',
	'semanticmaps-par-forceshow' => 'Die Karte auch dann anzeigen, wenn es keine Standorte zum Anzeigen gibt?',
	'semanticmaps-par-showtitle' => 'Anzeige eines Titels im Informationsfenster der Kennzeichnung oder nicht. Diese Option zu deaktivieren ist oftmals dann nützlich, sofern eine Vorlage zur Formatierung des Informationsfensterinhalts verwendet wird.',
	'semanticmaps-par-centre' => 'Das Zentrum der Karte. Sofern nicht angegeben wird automatisch das optimale Zentrum zur Darstellung aller Kennzeichnungen auf der Karte gewählt.',
	'semanticmaps-par-template' => 'Die zur Formatierung des Informationsfensterinhalts zu verwendende Vorlage.',
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'semanticmaps-desc' => 'Bitujo zmóžnosć se koordinatowe daty pśez rozšyrjenje Semantic MediaWiki woglědaś a wobźěłaś ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps-unrecognizeddistance' => 'Gódnota $1 njejo płaśiwa distanca.',
	'semanticmaps-kml-link' => 'KML-dataju se woglědaś',
	'semanticmaps-default-kml-pagelink' => 'Bok $1 se woglědaś',
	'semanticmaps_lookupcoordinates' => 'Za koordinatami póglědaś',
	'semanticmaps_enteraddresshere' => 'Zapódaj how adresu',
);

/** Greek (Ελληνικά)
 * @author ZaDiak
 */
$messages['el'] = array(
	'semanticmaps_lookupcoordinates' => 'Επιθεώρηση συντεταγμένων',
	'semanticmaps_enteraddresshere' => 'Εισαγωγή διεύθυνσης εδώ',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'semanticmaps_lookupcoordinates' => 'Rigardi koordinatojn',
	'semanticmaps_enteraddresshere' => 'Enigu adreson ĉi tie',
);

/** Spanish (Español)
 * @author Crazymadlover
 * @author Imre
 * @author Locos epraix
 * @author Translationista
 */
$messages['es'] = array(
	'semanticmaps-desc' => 'Proporciona la capacidad de ver y editar los datos coordinados almacenados a través de la extensión Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps-unrecognizeddistance' => 'El valor $1 no esuna distancia válida.',
	'semanticmaps_lookupcoordinates' => 'Busque las coordenadas',
	'semanticmaps_enteraddresshere' => 'Ingresar dirección aquí',
);

/** Basque (Euskara)
 * @author An13sa
 */
$messages['eu'] = array(
	'semanticmaps_lookupcoordinates' => 'Koordenatuak bilatu',
);

/** Finnish (Suomi)
 * @author Crt
 * @author Str4nd
 */
$messages['fi'] = array(
	'semanticmaps_enteraddresshere' => 'Kirjoita osoite tähän',
);

/** French (Français)
 * @author Crochet.david
 * @author Grondin
 * @author Hashar
 * @author IAlex
 * @author Jean-Frédéric
 * @author Peter17
 * @author PieRRoMaN
 * @author Sherbrooke
 * @author Urhixidur
 */
$messages['fr'] = array(
	'semanticmaps-desc' => "Permet d'afficher et de modifier les données de coordonnées stockées par l'extension Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples demo]).",
	'semanticmaps-unrecognizeddistance' => "La valeur $1 n'est pas une distance valide",
	'semanticmaps-kml-link' => 'Voir le fichier KML',
	'semanticmaps-default-kml-pagelink' => 'Voir l’article $1',
	'semanticmaps-loading-forminput' => "Chargement du formulaire d'entrée de la carte...",
	'semanticmaps_lookupcoordinates' => 'Estimer les coordonnées',
	'semanticmaps_enteraddresshere' => 'Entrez ici l’adresse',
	'semanticmaps-updatemap' => 'Mise à jour de la carte',
	'semanticmaps-forminput-remove' => 'Enlever',
	'semanticmaps-forminput-add' => 'Ajouter',
	'semanticmaps-forminput-locations' => 'Emplacements',
	'semanticmaps-par-staticlocations' => 'Une liste des endroits à ajouter à la carte avec les données demandées. Comme avec display_points, vous pouvez ajouter un titre, une description et une icône par emplacement en utilisant le tilde « ~ » comme séparateur.',
	'semanticmaps-par-forceshow' => "Afficher la carte même quand il n'y a pas d'emplacement à afficher ?",
	'semanticmaps-par-showtitle' => "Afficher un titre dans la fenêtre d'informations des marqueurs ou non. La désactivation de ceci est souvent utile lorsque vous utilisez un modèle pour formater le contenu de la fenêtre d'informations.",
	'semanticmaps-par-centre' => "Le centre de la carte. Lorsqu'il n'est pas fourni, la carte va choisir automatiquement le centre optimal pour afficher tous les marqueurs sur la carte.",
	'semanticmaps-par-template' => "Un modèle à utiliser pour mettre en forme le contenu de la fenêtre d'informations.",
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'semanticmaps-unrecognizeddistance' => 'La valor $1 est pas una distance valida.',
	'semanticmaps-kml-link' => 'Vêre lo fichiér KML',
	'semanticmaps-default-kml-pagelink' => 'Vêre la pâge $1',
	'semanticmaps-loading-forminput' => 'Chargement du formulèro d’entrâ de la mapa...',
	'semanticmaps_lookupcoordinates' => 'Èstimar les coordonâs',
	'semanticmaps_enteraddresshere' => 'Buchiéd l’adrèce ique',
	'semanticmaps-updatemap' => 'Misa a jorn de la mapa',
	'semanticmaps-forminput-remove' => 'Enlevar',
	'semanticmaps-forminput-add' => 'Apondre',
	'semanticmaps-forminput-locations' => 'Emplacements',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'semanticmaps-desc' => 'Proporciona a capacidade de ollar e modificar os datos de coordenadas gardados a través da extensión Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples demostración]).',
	'semanticmaps-unrecognizeddistance' => 'O valor $1 non é unha distancia válida.',
	'semanticmaps-kml-link' => 'Ollar o ficheiro KML',
	'semanticmaps-default-kml-pagelink' => 'Ver a páxina "$1"',
	'semanticmaps-loading-forminput' => 'Cargando o formulario de entrada do mapa...',
	'semanticmaps_lookupcoordinates' => 'Ver as coordenadas',
	'semanticmaps_enteraddresshere' => 'Introduza o enderezo aquí',
	'semanticmaps-updatemap' => 'Actualizar o mapa',
	'semanticmaps-forminput-remove' => 'Eliminar',
	'semanticmaps-forminput-add' => 'Engadir',
	'semanticmaps-forminput-locations' => 'Localizacións',
	'semanticmaps-par-staticlocations' => 'Unha lista de localizacións para engadir ao mapa xunto aos datos consultados. Como con display_points, pode engadir un título, unha descrición e mais unha icona por localización mediante o signo "~" como separador.',
	'semanticmaps-par-forceshow' => 'Quere mostrar o mapa, mesmo cando non haxa localizacións que presentar?',
	'semanticmaps-par-showtitle' => 'Mostrar ou non un título na ventá de información do marcador. Frecuentemente, desactivar isto é útil ao utilizar un modelo para dar formato ao contido da ventá de información.',
	'semanticmaps-par-centre' => 'O centro do mapa. Cando non se proporciona, o mapa ha escoller automaticamente o mellor centro para mostrar todos os marcadores no mapa.',
	'semanticmaps-par-template' => 'Un modelo a empregar para dar formato ao contido da ventá de información.',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'semanticmaps-desc' => 'Ergänzt e Megligkeit zum Aaluege un Bearbeite vu Koordinate, wu im Ramme vu dr Erwyterig „Semantisch MediaWiki“ gspycheret wore sin. [http://www.mediawiki.org/wiki/Extension:Semantic_Maps Dokumäntation]. [http://mapping.referata.com/wiki/Examples Demo]',
	'semanticmaps-unrecognizeddistance' => 'Dr Wert $1 isch kei giltigi Dischtanz.',
	'semanticmaps-kml-link' => 'KML-Datei aaluege',
	'semanticmaps-default-kml-pagelink' => 'Syte $1 aaluege',
	'semanticmaps-loading-forminput' => 'Am Lade vu dr Formularyygabe zue dr Charte …',
	'semanticmaps_lookupcoordinates' => 'Koordinate nooluege',
	'semanticmaps_enteraddresshere' => 'Doo Adräss yygee',
	'semanticmaps-updatemap' => 'Charte aktualisiere',
	'semanticmaps-forminput-remove' => 'Uuseneh',
	'semanticmaps-forminput-add' => 'Zuefiege',
	'semanticmaps-forminput-locations' => 'Standort',
);

/** Hebrew (עברית)
 * @author Amire80
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'semanticmaps-desc' => 'הוספת האפשרות לצפייה בנתוני הקואורדינטות המאוחסנים ולעריכתם באמצעות ההרחבה מדיה־ויקי סמנטית ([http://mapping.referata.com/wiki/Examples הדגמות]).',
	'semanticmaps-unrecognizeddistance' => 'הערך $1 אינו מרחק תקין.',
	'semanticmaps-kml-link' => 'הצגת קובץ KML',
	'semanticmaps-default-kml-pagelink' => 'הצגת הדף $1',
	'semanticmaps-loading-forminput' => 'טעינת המפה מהקלט...',
	'semanticmaps_lookupcoordinates' => 'חיפוש קואורדינטות',
	'semanticmaps_enteraddresshere' => 'כתבו כתובת כאן',
	'semanticmaps-updatemap' => 'עדכון מפה',
	'semanticmaps-forminput-remove' => 'הסרה',
	'semanticmaps-forminput-add' => 'הוספה',
	'semanticmaps-forminput-locations' => 'מיקומים',
	'semanticmaps-par-staticlocations' => 'רשימת מיקומים להוסיף למפה יחד עם הנתונים המבוקשים בשאילתה. כמו עם display_points, אפשר להוסיף כאן כותרת, תיאור וסמל לכל מיקום עם טילדה (~) בתור תו מפריד.',
	'semanticmaps-par-forceshow' => 'להציג מפה גם כשאין מיקומים להצגה?',
	'semanticmaps-par-showtitle' => 'להציג את הכותרת בחלון המידע על הסמן או לא. הכיבוי של זה שימושי לעתים קרובות כאשר נעשה שימוש בתבנית לעיצוב חלון המידע.',
	'semanticmaps-par-centre' => 'מרכז המפה. אם לא ניתן, המפה תבחר בעצמה את המרכז המיטבי להצגת כל הסמנים על המפה.',
	'semanticmaps-par-template' => 'תבנית לעיצוב תוכן חלון המידע.',
);

/** Croatian (Hrvatski)
 * @author Tivek
 */
$messages['hr'] = array(
	'semanticmaps-desc' => "Pruža pregledavanje i uređivanje koordinata spremljenih koristeći Semantic MediaWiki ekstenziju ([http://mapping.referata.com/wiki/Examples demo's]).",
	'semanticmaps-unrecognizeddistance' => 'Vrijednost $1 nije valjana udaljenost.',
	'semanticmaps_lookupcoordinates' => 'Potraži koordinate',
	'semanticmaps_enteraddresshere' => 'Unesite adresu ovdje',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'semanticmaps-desc' => 'Zmóžnja zwobraznjenje a wobdźěłanje koordinatowych datow, kotrež su so z rozšěrjenjom Semantic MediaWiki składowali ([http://mapping.referata.com/wiki/Examples přikłady]).',
	'semanticmaps-unrecognizeddistance' => 'Hódnota $1 płaćiwa distanca njeje.',
	'semanticmaps-kml-link' => 'KML-dataju sej wobhladać',
	'semanticmaps-default-kml-pagelink' => 'Nastawk $1 sej wobhladać',
	'semanticmaps-loading-forminput' => 'Formularne zapodawanske polo karty so začituje...',
	'semanticmaps_lookupcoordinates' => 'Za koordinatami hladać',
	'semanticmaps_enteraddresshere' => 'Zapodaj tu adresu',
	'semanticmaps-updatemap' => 'Kartu aktualizować',
	'semanticmaps-forminput-remove' => 'Wotstronić',
	'semanticmaps-forminput-add' => 'Přidać',
	'semanticmaps-forminput-locations' => 'Městna',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author Glanthor Reviol
 */
$messages['hu'] = array(
	'semanticmaps-desc' => 'Lehetővé teszi a szemantikus MediaWiki kiterjesztés segítségével tárolt koordinátaadatok megtekintését és szerkesztését ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps_lookupcoordinates' => 'Koordináták felkeresése',
	'semanticmaps_enteraddresshere' => 'Add meg a címet itt',
	'semanticmaps-forminput-add' => 'Hozzáadás',
	'semanticmaps-forminput-locations' => 'Helyszínek',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'semanticmaps-desc' => 'Forni le capacitate de vider e modificar datos de coordinatas immagazinate con le extension Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples demonstrationes]).',
	'semanticmaps-unrecognizeddistance' => 'Le valor $1 non es un distantia valide.',
	'semanticmaps-kml-link' => 'Vider le file KML',
	'semanticmaps-default-kml-pagelink' => 'Vider articulo $1',
	'semanticmaps-loading-forminput' => 'Carga datos entrate in formulario...',
	'semanticmaps_lookupcoordinates' => 'Cercar coordinatas',
	'semanticmaps_enteraddresshere' => 'Entra adresse hic',
	'semanticmaps-updatemap' => 'Actualisar carta',
	'semanticmaps-forminput-remove' => 'Remover',
	'semanticmaps-forminput-add' => 'Adder',
	'semanticmaps-forminput-locations' => 'Locos',
	'semanticmaps-par-staticlocations' => 'Un lista de locos a adder al carta con le datos resultante del consulta. Como con display_points, tu pote adder un titulo, description e icone per loco usante le tilde "~" como separator.',
	'semanticmaps-par-forceshow' => 'Monstrar le carta mesmo si il non ha locos a monstrar?',
	'semanticmaps-par-showtitle' => 'Monstrar un titulo in le fenestra de information de marcator o non. Disactivar isto es sovente utile si un patrono es usate pro formatar le contento del fenestra de information.',
	'semanticmaps-par-centre' => 'Le centro del carta. Si non specificate, le systema selige automaticamente le centro optimal pro monstrar tote le marcatores in le carta.',
	'semanticmaps-par-template' => 'Un patrono a usar pro formatar le contento del fenestra de information.',
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 * @author Farras
 * @author IvanLanin
 */
$messages['id'] = array(
	'semanticmaps-desc' => 'Memberikan kemampuan untuk melihat dan menyunting data koordinat yang disimpan melalui pengaya MediaWiki Semantic
([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps-unrecognizeddistance' => 'Nilai $1 bukan jarak yang sah.',
	'semanticmaps-kml-link' => 'Lihat berkas KML',
	'semanticmaps-default-kml-pagelink' => 'Lihat halaman $1',
	'semanticmaps-loading-forminput' => 'Memuat masukan bentuk peta...',
	'semanticmaps_lookupcoordinates' => 'Cari koordinat',
	'semanticmaps_enteraddresshere' => 'Masukkan alamat di sini',
	'semanticmaps-updatemap' => 'Pembaruan peta',
	'semanticmaps-forminput-remove' => 'Hapus',
	'semanticmaps-forminput-add' => 'Tambah',
	'semanticmaps-forminput-locations' => 'Lokasi',
	'semanticmaps-par-staticlocations' => 'Daftar lokasi yang akan ditambahkan ke dalam peta, berikut data kueri. Seperti halnya display_points, Anda dapat menambahkan judul, deskripsi, dan ikon per lokasi dengan menggunakan tanda tilde "~" sebagai pemisah.',
	'semanticmaps-par-forceshow' => 'Tampilkan peta bahkan ketika tidak ada lokasi untuk ditampilkan?',
	'semanticmaps-par-showtitle' => 'Tampilkan judul di jendela info penanda. Penonaktifan judul sering berguna ketika menggunakan templat untuk memformat isi jendela info.',
	'semanticmaps-par-centre' => 'Pusat peta. Jika tidak disediakan, peta secara otomatis akan memilih pusat optimal untuk menampilkan semua penanda di peta.',
	'semanticmaps-par-template' => 'Ttemplat yang digunakan untuk memformat isi jendela info.',
);

/** Italian (Italiano)
 * @author Beta16
 * @author Civvì
 * @author Darth Kule
 * @author HalphaZ
 */
$messages['it'] = array(
	'semanticmaps-desc' => "Fornisce la possibilità di visualizzare e modificare le coordinate memorizzate con l'estensione Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples demo]).",
	'semanticmaps-unrecognizeddistance' => 'Il valore $1 non è una distanza valida.',
	'semanticmaps-kml-link' => 'Visualizza il file KML',
	'semanticmaps-default-kml-pagelink' => 'Visualizza la pagina $1',
	'semanticmaps_lookupcoordinates' => 'Cerca coordinate',
	'semanticmaps_enteraddresshere' => 'Inserisci indirizzo qui',
	'semanticmaps-updatemap' => 'Aggiorna mappa',
	'semanticmaps-forminput-remove' => 'Rimuovi',
	'semanticmaps-forminput-add' => 'Aggiungi',
);

/** Japanese (日本語)
 * @author Fryed-peach
 * @author Mizusumashi
 * @author 青子守歌
 */
$messages['ja'] = array(
	'semanticmaps-desc' => 'Semantic MediaWiki 拡張機能を通して格納された座標データを表示・編集する機能を提供する ([http://mapping.referata.com/wiki/Examples 実演])。',
	'semanticmaps-unrecognizeddistance' => '値$1は有効な距離ではありません。',
	'semanticmaps-kml-link' => 'KMLファイルを閲覧',
	'semanticmaps-default-kml-pagelink' => 'ページ$1を表示',
	'semanticmaps_lookupcoordinates' => '座標を調べる',
	'semanticmaps_enteraddresshere' => '住所をここに入力します',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Thearith
 */
$messages['km'] = array(
	'semanticmaps_lookupcoordinates' => 'ក្រឡេក​មើល​កូអរដោនេ',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'semanticmaps-desc' => 'Määt et müjjelesch, Koodinaate ze beloore un ze ändere, di mem „Semantesch Mediawiki“ faßjehallde woode sin. ([http://mapping.referata.com/wiki/Examples Beijshpöll för et vörzemaache])',
	'semanticmaps-unrecognizeddistance' => 'Dä Wäät „$1“ es keine jölteje Afschtand.',
	'semanticmaps-kml-link' => 'De KML-Dattei belooere',
	'semanticmaps-default-kml-pagelink' => 'De Sigg „$1“ belooere',
	'semanticmaps-loading-forminput' => 'Mer sin de Enjaabe vum Fommulaa for die Kaat aam laade&nbsp;…',
	'semanticmaps_lookupcoordinates' => 'Koordinate nohkike',
	'semanticmaps_enteraddresshere' => 'Donn hee de Address enjäve',
	'semanticmaps-updatemap' => 'De Kaad op der neue Shtand bränge',
	'semanticmaps-forminput-remove' => 'Fottnämme',
	'semanticmaps-forminput-add' => 'Dobei donn',
	'semanticmaps-forminput-locations' => 'Oote',
	'semanticmaps-par-staticlocations' => 'En Leß met Pläz, di zosamme met dä nohjefrochte Aanjabe op di Kaat sulle. Wi bei <code lang="en">display_points</code> kam_mer ene Tittel, ene Täx doh zoh, un e Minni_Belldsche
för jeede Plaz aanjävve, med enem Schlängelsche (~) doh zwesche.',
	'semanticmaps-par-forceshow' => 'Donn de Kaat aanzeije, selvs wann kein Pläz drop ze zeije sin?',
	'semanticmaps-par-showtitle' => 'Donn en Övverschreff en däm Finster met Infomazjuhne övver de Makeerong aanzeije udder nit. De Övverschreff afzeschallde es öff joot, wam_mer en Schabloon nemmp för dä Enhallt vum Finster zerääsch ze possumenteere.',
	'semanticmaps-par-centre' => 'Der Meddelpunk vun dä Kaat. Wann keine aanjejovve_n_es jeiht dä automattesch op der optesche Meddelpunk vun all dä Makeerunge en dä Kaat.',
	'semanticmaps-par-template' => 'En Schabloon för der Enhalt vum Finster met de Enfommazjuhne ze jeschtallte',
);

/** Kurdish (Latin) (Kurdî (Latin))
 * @author George Animal
 */
$messages['ku-latn'] = array(
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'semanticmaps-unrecognizeddistance' => 'De Wäert $1 ass keng valabel Distanz.',
	'semanticmaps-kml-link' => 'KML-Fichier weisen',
	'semanticmaps-default-kml-pagelink' => 'Säit $1 weisen',
	'semanticmaps_lookupcoordinates' => 'Koordinaten nokucken',
	'semanticmaps_enteraddresshere' => 'Adress hei aginn',
	'semanticmaps-updatemap' => 'Kaart aktualiséieren',
	'semanticmaps-forminput-remove' => 'Ewechhuelen',
	'semanticmaps-forminput-add' => 'Derbäisetzen',
	'semanticmaps-forminput-locations' => 'Plazen',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'semanticmaps-desc' => 'Овозможува прегледување и уредување на координатни податоци складирани со додатокот Семантички МедијаВики ([http://mapping.referata.com/wiki/Examples урнеци]).',
	'semanticmaps-unrecognizeddistance' => 'Вредноста $1 не претставува важечко растојание.',
	'semanticmaps-kml-link' => 'Преглед на KML-податотеката',
	'semanticmaps-default-kml-pagelink' => 'Преглед на статијата $1',
	'semanticmaps-loading-forminput' => 'Вчитувам карти од внесеното...',
	'semanticmaps_lookupcoordinates' => 'Побарај координати',
	'semanticmaps_enteraddresshere' => 'Внесете адреса тука',
	'semanticmaps-updatemap' => 'Поднови карта',
	'semanticmaps-forminput-remove' => 'Отстрани',
	'semanticmaps-forminput-add' => 'Додај',
	'semanticmaps-forminput-locations' => 'Места',
	'semanticmaps-par-staticlocations' => 'Список на места за додавање во картатата заедно со побараните податоци. Како и со „display_points“, тука можете да додадете наслов, опис и икона за секое место, користејќи тилда (~) како одделувач.',
	'semanticmaps-par-forceshow' => 'Да ја прикажувам картата дури и ако нема места за приказ?',
	'semanticmaps-par-showtitle' => 'Дали да се прикажува насловот на инфопрозорецот на ознаката. Оневозможете го кога користите шаблон за форматирање на содржината на инфопрозорецот.',
	'semanticmaps-par-centre' => 'Средиштето на картата. Ако не е укажано, картата автоматски ќе го одбере средиштето кајшто оптимално ќе се прикажат сите одбележувачи на картата.',
	'semanticmaps-par-template' => 'Шаблон за форматирање на содржината на инфопрозорецот.',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 */
$messages['ml'] = array(
	'semanticmaps_enteraddresshere' => 'വിലാസം നൽകുക',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'semanticmaps-forminput-remove' => 'Buang',
	'semanticmaps-forminput-locations' => 'Lokasi',
);

/** Dutch (Nederlands)
 * @author Jeroen De Dauw
 * @author Siebrand
 */
$messages['nl'] = array(
	'semanticmaps-desc' => 'Biedt de mogelijkheid om locatiegegevens die opgeslagen zijn in Semantic MediaWiki te bewerken en te bekijken',
	'semanticmaps-unrecognizeddistance' => 'De waarde "$1" is geen geldige afstand.',
	'semanticmaps-kml-link' => 'KML-bestand bekijken',
	'semanticmaps-default-kml-pagelink' => 'Pagina $1 bekijken',
	'semanticmaps-loading-forminput' => 'Bezig met het laden van de kaart formulierinvoer...',
	'semanticmaps_lookupcoordinates' => 'Coördinaten opzoeken',
	'semanticmaps_enteraddresshere' => 'Voer hier het adres in',
	'semanticmaps-updatemap' => 'Kaart bijwerken',
	'semanticmaps-forminput-remove' => 'Verwijderen',
	'semanticmaps-forminput-add' => 'Toevoegen',
	'semanticmaps-forminput-locations' => 'Locaties',
	'semanticmaps-par-staticlocations' => 'Een lijst met aan de kaart toe te voegen locaties samen met de opgevraagde gegevens. Zoals bij display_points, kunt u een naam, beschrijving en icoon per locatie toevoegen door de tilde ("~") als scheidingsteken te gebruiken.',
	'semanticmaps-par-forceshow' => 'De kaart zelfs weergeven als er geen weer te geven locaties zijn?',
	'semanticmaps-par-showtitle' => 'Een naam weergeven in het gegevensvenster van de markering of niet. Dit uitschakelen is vaak handig als er een sjabloon wordt gebruikt om de inhoud van het gegevensvenster vorm te geven.',
	'semanticmaps-par-centre' => 'Het centrum van de kaart. Als deze waarde niet wordt opgegeven, wordt automatisch een keuze gemaakt voor een centrum op basis van alle markeringen op de kaart.',
	'semanticmaps-par-template' => 'Een te gebruiken sjabloon om de inhoud van het gegevensvenster op te maken.',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Harald Khan
 */
$messages['nn'] = array(
	'semanticmaps_lookupcoordinates' => 'Sjekk koordinatar',
	'semanticmaps_enteraddresshere' => 'Skriv inn adressa her',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Event
 * @author Jon Harald Søby
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'semanticmaps-desc' => 'Tilbyr muligheten til å se og endre koordinatdata lagret gjennom Semantic MediaWiki-utvidelsen ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps-unrecognizeddistance' => 'Verdien $1 er ikke en gyldig avstand.',
	'semanticmaps-kml-link' => 'Vis KML-filen',
	'semanticmaps-default-kml-pagelink' => 'Vis siden $1',
	'semanticmaps_lookupcoordinates' => 'Sjekk koordinater',
	'semanticmaps_enteraddresshere' => 'Skriv inn adressen her',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'semanticmaps-desc' => "Permet de veire e modificar las donadas de coordenadas estocadas a travèrs l'extension Semantic MediaWiki. [http://www.mediawiki.org/wiki/Extension:Semantic_Maps Documentacion]. [http://mapping.referata.com/wiki/Examples Demo]",
	'semanticmaps_lookupcoordinates' => 'Estimar las coordenadas',
	'semanticmaps_enteraddresshere' => 'Picatz aicí l’adreça',
);

/** Polish (Polski)
 * @author Deejay1
 * @author Derbeth
 * @author Leinad
 * @author Odder
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'semanticmaps-desc' => 'Umożliwia przeglądanie oraz edytowanie współrzędnych zapisanych przez rozszerzenie Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples dema]).',
	'semanticmaps-unrecognizeddistance' => 'Wartość $1 nie jest poprawną odległością.',
	'semanticmaps-kml-link' => 'Wyświetla plik KML',
	'semanticmaps-default-kml-pagelink' => 'Pokaż stronę $1',
	'semanticmaps_lookupcoordinates' => 'Wyszukaj współrzędne',
	'semanticmaps_enteraddresshere' => 'Podaj adres',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'semanticmaps-desc' => "A dà la possibilità ëd vardé e modifiché ij dat ëd le coordinà memorisà con l'estension Semantic MediaWiki ([http://mapping.referata.com/wiki/Demo d'esempi]).",
	'semanticmaps-unrecognizeddistance' => "Ël valor $1 a l'é pa na distansa bon-a.",
	'semanticmaps-kml-link' => "Vëdde l'archivi KML",
	'semanticmaps-default-kml-pagelink' => 'Lese la pàgina $1',
	'semanticmaps-loading-forminput' => 'Carié ël formolari për anserì la carta...',
	'semanticmaps_lookupcoordinates' => 'Serca coordinà',
	'semanticmaps_enteraddresshere' => 'Ansëriss adrëssa sì',
	'semanticmaps-updatemap' => 'Agiornament ëd la carta',
	'semanticmaps-forminput-remove' => 'Gava',
	'semanticmaps-forminput-add' => 'Gionta',
	'semanticmaps-forminput-locations' => 'Locassion',
	'semanticmaps-par-staticlocations' => 'Na lista ëd ocassion da gionté a la carta ansema con ij dat ciamà. Com con dispay_points, it peule gionté un tìtol, descrission e icon-a për locassion an dovrand la tilde "~" com separador.',
	'semanticmaps-par-forceshow' => 'Mosta la carta ëdcò quand a-i son pa locassion da mosté?',
	'semanticmaps-par-showtitle' => "Mosta un tìtol ant a fnesta d'anformassion dël marcador o no. Disabilité sòn-sì a l'é ùtil soens quand as dòvra në stamp për formaté ël contnù dla fnesta d'anformassion.",
	'semanticmaps-par-centre' => "Ël sénter ëd la carta. Quand a l'é pa dàit, la carta a troverà automaticament ël sénter otimal për mosté tùit ij marcador an sla carta.",
	'semanticmaps-par-template' => "Në stamp da dovré për formaté ij contnù dla fnesta d'anformassion.",
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
);

/** Portuguese (Português)
 * @author Hamilton Abreu
 * @author Indech
 * @author Malafaya
 */
$messages['pt'] = array(
	'semanticmaps-desc' => 'Permite ver e editar dados de coordenadas, armazenados através da extensão MediaWiki Semântico ([http://mapping.referata.com/wiki/Examples demonstração]).',
	'semanticmaps-unrecognizeddistance' => 'O valor $1 não é uma distância válida.',
	'semanticmaps-kml-link' => 'Ver o ficheiro KML',
	'semanticmaps-default-kml-pagelink' => 'Ver a página $1',
	'semanticmaps-loading-forminput' => 'A carregar o formulário de entrada do mapa...',
	'semanticmaps_lookupcoordinates' => 'Pesquisar coordenadas',
	'semanticmaps_enteraddresshere' => 'Introduza um endereço aqui',
	'semanticmaps-updatemap' => 'Actualizar mapa',
	'semanticmaps-forminput-remove' => 'Remover',
	'semanticmaps-forminput-add' => 'Adicionar',
	'semanticmaps-forminput-locations' => 'Locais',
	'semanticmaps-par-staticlocations' => 'Uma lista de localizações para acrescentar ao mapa em conjunto com os dados consultados. Tal como nos pontos a apresentar ("display_points"), pode adicionar um título, descrição e ícone por localização, usando o til "~" como separador.',
	'semanticmaps-par-forceshow' => 'Mostrar o mapa mesmo quando não existem localizações para apresentar?',
	'semanticmaps-par-showtitle' => 'Mostrar, ou não, um título na janela informativa do marcador. É frequentemente desejável desactivar esta funcionalidade quando usar uma predefinição para formatar o conteúdo da janela informativa.',
	'semanticmaps-par-centre' => 'O centro do mapa. Quando este não for fornecido, o mapa escolherá automaticamente o centro óptimo para apresentar todos os marcadores do mapa.',
	'semanticmaps-par-template' => 'Uma predefinição que será usada para formatar o conteúdo da janela informativa.',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Eduardo.mps
 * @author Giro720
 * @author Luckas Blade
 */
$messages['pt-br'] = array(
	'semanticmaps-desc' => 'Provê a possibilidade de ver e editar dados de coordenadas armazenados através da extensão Semantic MediaWiki. ([http://mapping.referata.com/wiki/Examples demonstração]).',
	'semanticmaps-unrecognizeddistance' => 'O valor $1 não é uma distância válida.',
	'semanticmaps-kml-link' => 'Ver o arquivo KML',
	'semanticmaps-default-kml-pagelink' => 'Ver a página $1',
	'semanticmaps_lookupcoordinates' => 'Pesquisar coordenadas',
	'semanticmaps_enteraddresshere' => 'Introduza um endereço aqui',
);

/** Romanian (Română)
 * @author Firilacroco
 */
$messages['ro'] = array(
	'semanticmaps_enteraddresshere' => 'Introduceți adresa aici',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'semanticmaps-desc' => "Dèje l'abbilità a fà vedè e cangià le coordinate reggistrate cu l'estenzione Semandiche de MediaUicchi ([http://mapping.referata.com/wiki/Examples demo]).",
	'semanticmaps-default-kml-pagelink' => "Vide 'a pàgene $1",
	'semanticmaps_lookupcoordinates' => 'Ingroce le coordinate',
	'semanticmaps_enteraddresshere' => "Scaffe l'indirizze aqquà",
	'semanticmaps-updatemap' => "Aggiorne 'a mappe",
	'semanticmaps-forminput-remove' => 'Live',
	'semanticmaps-forminput-add' => 'Aggiunge',
);

/** Russian (Русский)
 * @author Eugene Mednikov
 * @author Lockal
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'semanticmaps-desc' => 'Обеспечивает возможность просмотра и редактирования координатных данных, хранящихся в семантическом расширении MediaWiki ([http://mapping.referata.com/wiki/Examples примеры]).',
	'semanticmaps-unrecognizeddistance' => 'Значение $1 не является допустимым расстоянием.',
	'semanticmaps-kml-link' => 'Просмотреть файл KML',
	'semanticmaps-default-kml-pagelink' => 'Просмотреть страницу $1',
	'semanticmaps-loading-forminput' => 'Загрузка карты…',
	'semanticmaps_lookupcoordinates' => 'Найти координаты',
	'semanticmaps_enteraddresshere' => 'Введите адрес',
	'semanticmaps-updatemap' => 'Обновить карту',
	'semanticmaps-forminput-remove' => 'Удалить',
	'semanticmaps-forminput-add' => 'Добавить',
	'semanticmaps-forminput-locations' => 'Места',
	'semanticmaps-par-staticlocations' => 'Список мест для добавления на карту вместе с запрашиваемыми данными. Например, к display_points можно добавить название, описание и значок, используя тильду ~ в качестве разделителя.',
	'semanticmaps-par-forceshow' => 'Показывать карту даже тогда, когда нет мест для отображения?',
	'semanticmaps-par-template' => 'Шаблон для форматирования содержимого окна информация.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'semanticmaps-desc' => 'Poskytuje schopnosť zobrazovať a upravovať údaje súradníc uložené prostredníctvom rozšírenia Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps_lookupcoordinates' => 'Vyhľadať súradnice',
	'semanticmaps_enteraddresshere' => 'Sem zadajte emailovú adresu',
);

/** Serbian Cyrillic ekavian (‪Српски (ћирилица)‬)
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'semanticmaps-unrecognizeddistance' => 'Вредност $1 није исправно растојање.',
	'semanticmaps_enteraddresshere' => 'Унеси адресу овде',
);

/** Serbian Latin ekavian (‪Srpski (latinica)‬)
 * @author Michaello
 */
$messages['sr-el'] = array(
	'semanticmaps-unrecognizeddistance' => 'Vrednost $1 nije ispravno rastojanje.',
	'semanticmaps_enteraddresshere' => 'Unesi adresu ovde',
);

/** Swedish (Svenska)
 * @author Boivie
 * @author Najami
 * @author Per
 */
$messages['sv'] = array(
	'semanticmaps-desc' => 'Ger möjligheten att titta på och ändra koordinatdata sparad genom Semantic MediaWiki-utvidgningen ([http://mapping.referata.com/wiki/Examples demo]).',
	'semanticmaps_lookupcoordinates' => 'Kolla upp koordinater',
	'semanticmaps_enteraddresshere' => 'Skriv in adress här',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'semanticmaps_enteraddresshere' => 'చిరునామాని ఇక్కడ ఇవ్వండి',
	'semanticmaps-forminput-add' => 'చేర్చు',
);

/** Tetum (Tetun)
 * @author MF-Warburg
 */
$messages['tet'] = array(
	'semanticmaps-forminput-remove' => 'Hasai',
	'semanticmaps-forminput-add' => 'Tau tan',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'semanticmaps-desc' => 'Nagbibigay ng kakayahang matingnan at baguhin ang dato ng tugmaang pampook na nakaimbak sa pamamagitan ng dugtong ng Semantikong MediaWiki ([http://mapping.referata.com/wiki/Examples pagpapamalas]).',
	'semanticmaps-unrecognizeddistance' => 'Hindi isang tanggap na layo ang halagang $1.',
	'semanticmaps-kml-link' => 'Tingnan ang talaksang KML',
	'semanticmaps-default-kml-pagelink' => 'Tingnan ang pahinang $1',
	'semanticmaps-loading-forminput' => 'Ikinakarga ang pagpapasok ng anyo ng mapa...',
	'semanticmaps_lookupcoordinates' => "Hanapin ang mga tugmaang-pampook (''coordinate'')",
	'semanticmaps_enteraddresshere' => 'Ipasok ang adres dito',
	'semanticmaps-updatemap' => 'Isapanahon ang mapa',
	'semanticmaps-forminput-remove' => 'Tanggalin',
	'semanticmaps-forminput-add' => 'Idagdag',
	'semanticmaps-forminput-locations' => 'Mga kinalalagyan',
);

/** Turkish (Türkçe)
 * @author Vito Genovese
 */
$messages['tr'] = array(
	'semanticmaps_lookupcoordinates' => 'Koordinat ara',
	'semanticmaps_enteraddresshere' => 'Adresi buraya girin',
);

/** Veps (Vepsan kel')
 * @author Игорь Бродский
 */
$messages['vep'] = array(
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'semanticmaps-desc' => 'Cung cấp khả năng xem và sửa đổi dữ liệu tọa độ được lưu bởi phần mở rộng Semantic MediaWiki ([http://mapping.referata.com/wiki/Examples thử xem]).',
	'semanticmaps-unrecognizeddistance' => 'Giá trị $1 không phải là tầm hợp lệ.',
	'semanticmaps-kml-link' => 'Xem tập tin KML',
	'semanticmaps-default-kml-pagelink' => 'Xem trang $1',
	'semanticmaps-loading-forminput' => 'Đang tải dữ liệu biểu mẫu bản đồ…',
	'semanticmaps_lookupcoordinates' => 'Tra tọa độ',
	'semanticmaps_enteraddresshere' => 'Nhập địa chỉ vào đây',
	'semanticmaps-updatemap' => 'Cập nhật bản đồ',
	'semanticmaps-forminput-remove' => 'Dời',
	'semanticmaps-forminput-add' => 'Thêm',
	'semanticmaps-forminput-locations' => 'Các vị trí',
	'semanticmaps-par-staticlocations' => 'Danh sách các vị trí để thêm vào bản đồ cùng với dữ liệu được truy vấn. Giống như với display_points, bạn có thể đặt tên, miêu tả, và hình tượng cho mỗi đánh dấu bằng cách phân tách dùng dấu ngã (~).',
	'semanticmaps-par-forceshow' => 'Hiển thị bản đồ ngay cả khi không có vị trí nào để hiển thị?',
	'semanticmaps-par-showtitle' => 'Tên tùy chọn của cửa sổ thông tin đánh dấu. Có thể để trống để định dạng nội dung cửa sổ thông tin dùng bản mẫu.',
	'semanticmaps-par-centre' => 'Trung tâm của bản đồ. Nếu không có, bản đồ sẽ tự động chọn trung tâm tối ưu bao gồm tất cả các dấu trên bản đồ.',
	'semanticmaps-par-template' => 'Bản đồ dùng để định dạng nội dung của cửa sổ thông tin.',
);

/** Volapük (Volapük)
 * @author Smeira
 */
$messages['vo'] = array(
	'semanticmaps_lookupcoordinates' => 'Tuvön koordinatis',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Gzdavidwong
 */
$messages['zh-hans'] = array(
	'semanticmaps_lookupcoordinates' => '查找坐标',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Gzdavidwong
 * @author Mark85296341
 * @author Sheepy
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'semanticmaps-default-kml-pagelink' => '檢視頁面 $1',
	'semanticmaps_lookupcoordinates' => '尋找座標',
);

