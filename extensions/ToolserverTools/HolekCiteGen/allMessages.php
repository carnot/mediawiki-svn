<?php
/**
 * Internationalisation file for Cite book template generator.
 *
 * @addtogroup Languages
 * @copyright © 2009 Michał Połtyn
 * @source http://translatewiki.net/w/i.php?title=Special%3ATranslate&task=export-to-file&group=ext-citebook-gen
 * @license GNU General Public Licence 2.0 or later
 */

$rtlLanguages = array('ar','arc','dv','fa','he','kk','ks','mzn','ps','sd','ug','ur','ydd','yi');

$messages = array();



/** English (English)
 * @author Holek
 * @author Wpedzich
 */
$messages['en'] = array(
	'ts-citegen-Title' => 'Citation template generator',
	
	// Button
	'ts-citegen-Send' => 'Generate',
	
	// Input
	'ts-citegen-Input-title' => 'Input',
	'ts-citegen-Input-text' => 'This is a citation template generator. Using it, you can quickly fill in the citation templates in various language editions of Wikipedia. Please fill in the data (%s) in the fields below, and the script will try to complete the templates. Remember, it does not matter which fields you put the input data into. The script will automatically match the correct template to the input given.',
	'ts-citegen-Option-append-author-link' => 'Append the author wiki links into the template',
	'ts-citegen-Option-append-newlines' => 'Append new lines after each parameter',
	'ts-citegen-Option-add-references' => 'Add <ref> tags around citation templates',
	'ts-citegen-Option-add-list' => 'Create a wikilist of citation templates',
	
	// Output
	'ts-citegen-Output-title' => 'Result',
	'ts-citegen-Output-select-disclaimer' => 'Choosing a template language does not guarantee that the specific template is available in your language. This field lists available languages of every supported template, i.e. it may display French because only {{Cite book}} is supported.',
	'ts-citegen-Wrong-input' => '%s: not identified as correct input.',
	
	// Settings
	'ts-citegen-Parsers' => 'Parsers',
	'ts-citegen-Skins' => 'Output',
	'ts-citegen-Skin-skins' => 'Skins',
	'ts-citegen-Skin-outputformat' => 'Output format',
	
	'ts-citegen-Template-lang' => 'Template language',
	
	// Sources
	'ts-citegen-Sources-title' => 'Sources',
	'ts-citegen-Sources-text' => 'Below the list of used sources is available.',
	
	// Sidebar-related messages
	'ts-citegen-Sidebar-title' => 'Citation generator',
	
	'ts-citegen-Sidebar-add-Firefox' => 'Add to the sidebar',
	'ts-citegen-Sidebar-add-Opera' => 'Add to the Hotlist',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Add to the Page Holder',
	'ts-citegen-Sidebar-add-IE-Mac-details' => 'Once the page has loaded, open your Page Holder, click \'Add\' then use the Page Holder Favorites button to store it as a Page Holder Favorite.',
	
	// Portlet messages
	'ts-citegen-Tools' => 'Tools',
	'ts-citegen-Other-languages' => 'Other languages',
	
	'ts-citegen-Save-it' => 'Current query',
	
	// Error messages
	'ts-citegen-Errors-title' => 'Errors',
	'ts-citegen-Unavailable-SQL' => 'Error: Toolserver database is unavailable. MySQL returned: %s',
	'ts-citegen-base-disabled' => 'Error: %s database is unavailable'
	

);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Holek
 * @author Raymond
 */
$messages['qqq'] = array(
	'ts-citegen-Title' => 'Generator title',
	'ts-citegen-Send' => 'Send button',
	'ts-citegen-Input-title' => 'Input secton',
	'ts-citegen-Input-text' => 'Input section description',
	'ts-citegen-Option-append-author-link' => 'Appends the author wikilinks into the template',
	'ts-citegen-Option-append-newlines' => 'Appends new lines after each parameter',
	'ts-citegen-Option-add-references' => 'Adds <ref> tags around citing templates',
	'ts-citegen-Option-add-list' => 'Creates a wikilist of citing templates',
	'ts-citegen-Output-title' => 'Output section
{{Identical|Result}}',
	'ts-citegen-Output-select-disclaimer' => 'Disclaimer about output templates',
	'ts-citegen-Wrong-input' => '"%s" is an unidentified input.',
	'ts-citegen-Parsers' => 'Parsers',
	'ts-citegen-Skins' => 'Output',
	'ts-citegen-Skin-skins' => 'Skins',
	'ts-citegen-Skin-outputformat' => 'Output format',
	'ts-citegen-Template-lang' => 'Template language',
	'ts-citegen-Sources-title' => 'Sources section title
{{Identical|Source}}',
	'ts-citegen-Sources-text' => 'An explanation test for sources section',
	'ts-citegen-Sidebar-title' => 'Shortened title used for mini-generator',
	'ts-citegen-Sidebar-add-Firefox' => "Caption of generator addition to Firefox's sidebar",
	'ts-citegen-Sidebar-add-Opera' => "Caption of generator addition to Opera's Hotlist",
	'ts-citegen-Sidebar-add-IE-Mac' => "Caption of generator addition to Mac IE's Page Holder. Page Holder is a Macintosh IE version of Firefox's Sidebar and Opera's Hotlist.",
	'ts-citegen-Sidebar-add-IE-Mac-details' => "Details on generator addition to Mac IE's Page Holder",
	'ts-citegen-Tools' => 'Tools portlet section
{{Identical|Tools}}',
	'ts-citegen-Other-languages' => 'Other languages section
{{Identical|Otherlanguages}}',
	'ts-citegen-Save-it' => 'Link to itself/current query',
	'ts-citegen-Errors-title' => 'Errors section title
{{Identical|Error}}',
	'ts-citegen-Unavailable-SQL' => 'Error message: Toolserver database is unavailable. %s is an error message',
	'ts-citegen-base-disabled' => 'Error message: A book database is unavailable. <tt>%s</tt> is the name of the database.',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'ts-citegen-Title' => 'Генэратар шаблёнаў цытаваньня',
	'ts-citegen-Send' => 'Стварыць',
	'ts-citegen-Input-title' => 'Уваход',
	'ts-citegen-Input-text' => 'Гэта генэратар шаблёнаў цытаваньня. Ён паскарае стварэньне шаблёнаў для цытатаў і крыніцаў у розных разьдзелах Вікіпэдыі. Калі ласка, пазначце зьвесткі (%s) у палях ніжэй, каб скрыпт мог стварыць шаблёны. Памятайце, што няма розьніцы, у якое поле якія зьвесткі ўносіць — скрыпт сам распазнае тыпы зьвестак.',
	'ts-citegen-Option-append-author-link' => 'Дадаваць спасылкі на старонкі аўтараў у шаблён',
	'ts-citegen-Option-append-newlines' => 'Пераходзіць на новы радок пасьля кожнага парамэтру',
	'ts-citegen-Option-add-references' => 'Зьмяшчаць шаблёны цытаваньня у тэгі <ref>',
	'ts-citegen-Option-add-list' => 'Стварыць вікі-сьпіс шаблёнаў цытаваньня',
	'ts-citegen-Output-title' => 'Вынік',
	'ts-citegen-Output-select-disclaimer' => 'Памятайце, што, калі вы выбіраеце мову шаблёну, гэта не азначае, што пэўны шаблён даступны на Вашай мове. Гэтае поле зьмяшчае даступныя мовы для кожнага шаблёну, якія падтрымліваюцца. Гэтак, тут можа зьмяшчацца француская мова, бо падтрымліваецца толькі {{Cite book}}.',
	'ts-citegen-Wrong-input' => '%s: тып уваходных зьвестак не распазнаны.',
	'ts-citegen-Parsers' => 'Парсэры',
	'ts-citegen-Skins' => 'Вывад',
	'ts-citegen-Skin-skins' => 'Афармленьні',
	'ts-citegen-Skin-outputformat' => 'Фармат вываду',
	'ts-citegen-Template-lang' => 'Мова шаблёну',
	'ts-citegen-Sources-title' => 'Крыніцы',
	'ts-citegen-Sources-text' => 'Ніжэй пададзены сьпіс выкарыстаных крыніцаў.',
	'ts-citegen-Sidebar-title' => 'Генэратар цытаваньняў',
	'ts-citegen-Sidebar-add-Firefox' => 'Дадаць да бакавой панэлі',
	'ts-citegen-Sidebar-add-Opera' => 'Дадаць да панэлі Opera',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Дадаць да Page Holder',
	'ts-citegen-Sidebar-add-IE-Mac-details' => "Як толькі старонка загрузіцца, адкрыйце Page Holder, націсьніце 'Add' і выкарыстоўвайце кнопку Page Holder Favorites лля захаваньня старонкі.",
	'ts-citegen-Tools' => 'Інструмэнты',
	'ts-citegen-Other-languages' => 'На іншых мовах',
	'ts-citegen-Save-it' => 'Цяперашні запыт',
	'ts-citegen-Errors-title' => 'Памылкі',
	'ts-citegen-Unavailable-SQL' => 'Памылка: база зьвестак Toolserver недаступная. адказ MySQL: %s',
	'ts-citegen-base-disabled' => 'Памылка: база зьвестак %s недаступная.',
);

/** Breton (Brezhoneg)
 * @author Fulup
 * @author Y-M D
 */
$messages['br'] = array(
	'ts-citegen-Send' => 'Krouiñ',
	'ts-citegen-Output-title' => "Disoc'h",
	'ts-citegen-Parsers' => 'Parseroù',
	'ts-citegen-Skins' => 'Ezvont',
	'ts-citegen-Skin-skins' => 'Gwiskadurioù',
	'ts-citegen-Skin-outputformat' => 'Furmad moned er-maez',
	'ts-citegen-Sources-title' => 'Mammennoù',
	'ts-citegen-Tools' => 'Ostilhoù',
	'ts-citegen-Other-languages' => 'Yezhoù all',
	'ts-citegen-Save-it' => 'Reked red',
	'ts-citegen-Errors-title' => 'Fazioù',
	'ts-citegen-Unavailable-SQL' => "Fazi : N'haller ket tizhout diaz roadennoù ar servijer ostilhoù. Kemenn MySQL : %s",
	'ts-citegen-base-disabled' => "Fa zi : N'haller ket tizhout diaz roadennoù %s.",
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'ts-citegen-Skin-skins' => 'Kože',
	'ts-citegen-Sources-title' => 'Izvori',
	'ts-citegen-Tools' => 'Alati',
);

/** German (Deutsch)
 * @author Holek
 * @author Kghbln
 */
$messages['de'] = array(
	'ts-citegen-Title' => 'Vorlagengenerator für Quellennachweise',
	'ts-citegen-Send' => 'Generieren',
	'ts-citegen-Input-title' => 'Angaben',
	'ts-citegen-Input-text' => 'Dies ist ein Vorlagengenerator für Quellennachweise. Mit ihm kannst du die entsprechende Vorlage in den unterschiedlichen Sprachausgaben der Wikipedia, zur Nutzung als Einzelnachweis oder Literaturangabe, schnell erstellen. Gebe die vorhandenen Daten (%s) in die untenstehenden Felder ein. Das Skript wird dann versuchen aus ihnen die Vorlage zu erstellen. Bei der Angabe der Daten ist es unerheblich welches Feld für welche Angabe genutzt wird. Die richtige Zuordnung zu den einzelnen Parametern der Vorlage wird vom Skript übernommen.',
	'ts-citegen-Option-append-author-link' => 'Der Vorlage Wikilinks zum Autor beifügen',
	'ts-citegen-Option-append-newlines' => 'Nach jedem Parameter eine neue Zeile beginnen',
	'ts-citegen-Option-add-references' => 'Ergänze die Vorlage um „<ref>“-Elemente',
	'ts-citegen-Option-add-list' => 'Erstelle die Vorlagen in Form einer Wikiliste',
	'ts-citegen-Output-title' => 'Ergebnis',
	'ts-citegen-Output-select-disclaimer' => 'Die Auswahl einer Sprache für die Vorlage garantiert nicht das Vorhandensein einer entsprechenden Vorlage in der jeweiligen Sprache. Dieses Auswahlmenü gibt die Sprachen an, für die eine Vorlage verfügbar ist. Französisch kann beispielsweise auch deshalb angezeigt werden, weil lediglich die Vorlage „Cite book“ unterstützt wird.',
	'ts-citegen-Wrong-input' => '%s: Die Angabe wurde nicht als richtige Eingabe erkannt.',
	'ts-citegen-Parsers' => 'Parser',
	'ts-citegen-Skins' => 'Ausgabe',
	'ts-citegen-Skin-skins' => 'Benutzeroberflächen',
	'ts-citegen-Skin-outputformat' => 'Ausgabeformat',
	'ts-citegen-Template-lang' => 'Sprache der Vorlage',
	'ts-citegen-Sources-title' => 'Quellen',
	'ts-citegen-Sources-text' => 'Unterhalb wird die Liste der verwendeten Quellen angezeigt.',
	'ts-citegen-Sidebar-title' => 'Quellennachweisgenerator',
	'ts-citegen-Sidebar-add-Firefox' => 'Zu den Lesezeichen hinzufügen',
	'ts-citegen-Sidebar-add-Opera' => 'Zu den Lesezeichen hinzufügen',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Zu den Favoriten hinzufügen',
	'ts-citegen-Sidebar-add-IE-Mac-details' => 'Sobald die Seite geladen wurde, öffne bitte die Favoritenleiste, klicke danach auf „Hinzufügen“ und nutze anschließend den Favoritenknopf, um sie als Favorit zu speichern.',
	'ts-citegen-Tools' => 'Werkzeuge',
	'ts-citegen-Other-languages' => 'Andere Sprachen',
	'ts-citegen-Save-it' => 'Aktuelle Abfrage',
	'ts-citegen-Errors-title' => 'Fehler',
	'ts-citegen-Unavailable-SQL' => 'Fehler: Die Datenbank des Toolservers ist nicht verfügbar. MySQL erzeugte: %s',
	'ts-citegen-base-disabled' => 'Fehler: %s-Datenbank ist nicht verfügbar.',
);

/** British English (British English)
 * @author Holek
 */
$messages['en-gb'] = array(
	'ts-citegen-Title' => 'Citation template generator',
	'ts-citegen-Sidebar-add-IE-Mac-details' => "Once the page has loaded, open your Page Holder, click 'Add' then use the Page Holder Favourites button to store it as a Page Holder Favourite.",
);

/** Persian (فارسی)
 * @author Mjbmr
 */
$messages['fa'] = array(
	'ts-citegen-Send' => 'تولید',
	'ts-citegen-Input-title' => 'ورودی',
	'ts-citegen-Output-title' => 'نتیجه',
	'ts-citegen-Skins' => 'خروجی',
	'ts-citegen-Skin-outputformat' => 'قالب خروجی:',
	'ts-citegen-Template-lang' => 'زبان الگو',
	'ts-citegen-Sources-title' => 'منابع',
	'ts-citegen-Tools' => 'ابزارها',
	'ts-citegen-Other-languages' => 'زبان‌های دیگر',
	'ts-citegen-Errors-title' => 'خطاها',
	'ts-citegen-Unavailable-SQL' => 'خطا: پایگاه داده تولسرور در دسترس نیست. پیغام بازگشتی مای‌اس‌کیو‌ال: %s',
	'ts-citegen-base-disabled' => 'خطا: پایگاه داده %s در دسترس نیست',
);

/** French (Français)
 * @author Sherbrooke
 */
$messages['fr'] = array(
	'ts-citegen-Title' => 'Générateur de modèles de citation',
	'ts-citegen-Send' => 'Générer',
	'ts-citegen-Input-title' => 'Entrée',
	'ts-citegen-Input-text' => "Il s'agit d'un générateur de modèles de citations. Vous pouvez rapidement remplir des modèles de citation dans les différentes éditions de langue de Wikipédia. Veuillez remplir les données (%s) dans les champs ci-dessous et le script essaiera de remplir les modèles. Peu importe l'endroit où se trouvent les données d'entrée dans les champs, le script fera correspondre automatiquement le modèle à l'entrée donnée.",
	'ts-citegen-Option-append-author-link' => "Ajouter les liens wiki de l'auteur dans le modèle",
	'ts-citegen-Option-append-newlines' => 'Ajouter de nouveaux sauts de ligne après chaque paramètre',
	'ts-citegen-Option-add-references' => 'Ajouter des balises <ref> autour des modèles de citation',
	'ts-citegen-Option-add-list' => 'Créer une wikiliste des modèles de citation',
	'ts-citegen-Output-title' => 'Résultats',
	'ts-citegen-Output-select-disclaimer' => 'Choisir une langue pour un modèle ne garantit pas que ce modèle est disponible dans cette langue. Ce champ montre les langues disponibles pour tous les modèles reconnus, par exemple, il peut afficher le modèle en français car seul {{Cite book}} est reconnu.',
	'ts-citegen-Wrong-input' => '%s: pas identifié comme une entrée correcte.',
	'ts-citegen-Parsers' => 'Analyseurs syntaxiques',
	'ts-citegen-Skins' => 'Sortie',
	'ts-citegen-Skin-skins' => 'Habillages',
	'ts-citegen-Skin-outputformat' => 'Format de sortie',
	'ts-citegen-Template-lang' => 'Langue du modèle',
	'ts-citegen-Sources-title' => 'Sources',
	'ts-citegen-Sources-text' => 'Ci-dessous la liste des sources utilisées est affichée.',
	'ts-citegen-Sidebar-title' => 'Générateur de citations',
	'ts-citegen-Sidebar-add-Firefox' => 'Ajouter au panneau latéral',
	'ts-citegen-Tools' => 'Outils',
	'ts-citegen-Other-languages' => 'Autres langues',
	'ts-citegen-Save-it' => 'Requête en cours',
	'ts-citegen-Errors-title' => 'Erreurs',
	'ts-citegen-Unavailable-SQL' => "Erreur: le ''toolserver'' de la base de données n'est pas disponible. MySQL a retourné: %s",
	'ts-citegen-base-disabled' => "Erreur: la base de données %s n'est pas disponible",
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'ts-citegen-Title' => 'Vorlagegenerator fir Quällenoowyys',
	'ts-citegen-Send' => 'Generiere',
	'ts-citegen-Input-title' => 'Aagabe',
	'ts-citegen-Input-text' => 'Des isch e Vorlagegenerator fir Quällenoowyys. Mit ihm chasch diejenig Vorlag in dr unterschidlige Sprochuusgabe vu dr Wikipedia, fir d Nutzig as Einzelnoowyys oder Literaturaagab, schnäll aalege. Gib di vorhandene Date (%s) in die Fälder unten yy. S Skript versuecht derno us ene d Vorlag aazlege. Bi dr Aagab vu dr Daten isch nit wichtig, fir weli Aagabe wel Fäld brucht wird. Di richtig Zueornig zue dr einzelne Parameter vu dr Vorlag wird vum Skript ibernuu.',
	'ts-citegen-Option-append-author-link' => 'Wikilink zum Autor in d Vorlage yyfiege',
	'ts-citegen-Option-append-newlines' => 'No jedem Parameter e neji Zyyle aafange',
	'ts-citegen-Option-add-references' => 'Fiegt „<ref>“-Elemänt in d Vorlag yy',
	'ts-citegen-Option-add-list' => 'E Wikilischt mit Zitiervorlage aalege',
	'ts-citegen-Output-title' => 'Ergebnis',
	'ts-citegen-Output-select-disclaimer' => 'D Uuswahl vun ere Sproch fir d Vorlag isch kei Garanti derfir, ass es diejenig Vorlage in däre Sproch au git. Des Uuswahlmenü git d Sprochen aa, wu ne Vorlage verfiegbar isch. S cha syy, ass zem Byschpel Franzesisch nume aazeigt wird, wel d Vorlag „Cite book“ unterstitzt wird.',
	'ts-citegen-Wrong-input' => '%s: nit erkannt as richtig Yygab.',
	'ts-citegen-Parsers' => 'Parser',
	'ts-citegen-Skins' => 'Uusgab',
	'ts-citegen-Skin-skins' => 'Benutzeroberflechine',
	'ts-citegen-Skin-outputformat' => 'Uusgabformat',
	'ts-citegen-Template-lang' => 'Sproch vu dr Vorlag',
	'ts-citegen-Sources-title' => 'Quälle',
	'ts-citegen-Sources-text' => 'Unte wird d Lischt vu dr bruchte Quällen aazeigt.',
	'ts-citegen-Sidebar-title' => 'Quällenoowyysgenerator',
	'ts-citegen-Sidebar-add-Firefox' => 'Zue dr Läsezeiche zuefiege',
	'ts-citegen-Sidebar-add-Opera' => 'Zue dr Hotlist zuefiege',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Zue dr Favorite zuefiege',
	'ts-citegen-Sidebar-add-IE-Mac-details' => 'Sobald d Syte glade woren isch, mach bitte d Favoriteleischten uf, klick derno uf „Zuefiege“ un verwänd derno dr Favoritechnopf go si as Favorit spychere.',
	'ts-citegen-Tools' => 'Wärchzyyg',
	'ts-citegen-Other-languages' => 'Anderi Sproche',
	'ts-citegen-Save-it' => 'Aktuälli Abfrog',
	'ts-citegen-Errors-title' => 'Fähler',
	'ts-citegen-Unavailable-SQL' => 'Fähler: D Datebank vum Toolserver isch nit verfiegbar. MySQL het die Antwort gee: %s',
	'ts-citegen-base-disabled' => 'Fähler: %s-Datebank isch nit verfiegbar.',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'ts-citegen-Title' => 'Generator citatowych předłohow',
	'ts-citegen-Send' => 'Wupłodźić',
	'ts-citegen-Input-title' => 'Zapodaće',
	'ts-citegen-Input-text' => 'To je generator žórłowych předłohow. Z jeho pomocu móžeš žórłowe předłohi we wšelakich rěčnych wudaćach Wikipedije wutworić. Prošu zapisaj daty (%s) w slědowacych polach, a skript spyta předłohi dokónčić. Dźiwaj na to, zo žana róla njehraje, kotre daty do kotreho pola zapisuješ. Skript budźe prawu předłohu za zapodate daty wužiwać.',
	'ts-citegen-Option-append-author-link' => 'Awtorowe wikiwotkazy do předłohi připowěsnyć',
	'ts-citegen-Option-append-newlines' => 'Za kóždym parametrom nowe linki připowěsnyć',
	'ts-citegen-Option-add-references' => 'Taflički <ref> wokoło citowanskich předłohow přidać',
	'ts-citegen-Option-add-list' => 'Wikilisćinu citowacych předłohow wutworić',
	'ts-citegen-Output-title' => 'Wuslědk',
	'ts-citegen-Output-select-disclaimer' => 'Wuběranje předłohoweje rěče njegarantuje, zo specifiska předłoha w twojej rěči k dispoziciji steji. Tute polo naliča k dispoziciji stejace rěče kóždeje podpěrowaneje předłohi, t. r. móže so Francošćina zwobraznić, dokelž so jenož "Cite book" podpěruje.',
	'ts-citegen-Wrong-input' => '%s: njeidentifikowany jako korektne zapodaće.',
	'ts-citegen-Parsers' => 'Parsery',
	'ts-citegen-Skins' => 'Wudaće',
	'ts-citegen-Skin-skins' => 'Šaty',
	'ts-citegen-Skin-outputformat' => 'Wudatny format',
	'ts-citegen-Template-lang' => 'Rěč předłohi',
	'ts-citegen-Sources-title' => 'Žórła',
	'ts-citegen-Sources-text' => 'Deleka je lisćina wužitych žórłow k dispoziciji steji.',
	'ts-citegen-Sidebar-title' => 'Generator citatow',
	'ts-citegen-Sidebar-add-Firefox' => 'K bóčnicy přidać',
	'ts-citegen-Sidebar-add-Opera' => 'Hotlistej Opery přidać',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Page Holderej přidać',
	'ts-citegen-Sidebar-add-IE-Mac-details' => 'Hdyž strona je začitana. wočiń swój Page holder, klikń na "Přidać", potom wužij tłočatko faworitow w Page Holder, zo by ju jako faworit w Page Hodler składował.',
	'ts-citegen-Tools' => 'Nastroje',
	'ts-citegen-Other-languages' => 'Druhe rěče',
	'ts-citegen-Save-it' => 'Aktualne naprašowanje',
	'ts-citegen-Errors-title' => 'Zmylki',
	'ts-citegen-Unavailable-SQL' => 'Zmylk: Datowa banka Toolserver k dispoziciji njesteji. MySQL wozjewi: %s',
	'ts-citegen-base-disabled' => 'Zmylk: Datowa banka %s njesteji k dispoziciji.',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'ts-citegen-Title' => 'Generator de patronos de citation',
	'ts-citegen-Send' => 'Generar',
	'ts-citegen-Input-title' => 'Entrata',
	'ts-citegen-Input-text' => 'Isto es un generator de patronos de citation. Con illo, tu pote rapidemente completar le patronos de citation in le editiones de Wikipedia in varie linguas. Per favor completa le datos (%s) in le campos hic infra, e le script tentara completar le patronos. Nota ben que il non importa in qual campos tu mitte le datos de entrata. Le script cerca automaticamente le patrono correspondente al entrata date.',
	'ts-citegen-Option-append-author-link' => 'Adjunger in le patrono le wiki-ligamines verso le autor',
	'ts-citegen-Option-append-newlines' => 'Comenciar un nove linea post cata parametro',
	'ts-citegen-Option-add-references' => 'Adder etiquettas <ref> circa le patronos de citation',
	'ts-citegen-Option-add-list' => 'Crear un wiki-lista de patronos de citation',
	'ts-citegen-Output-title' => 'Resultato',
	'ts-citegen-Output-select-disclaimer' => 'Le selection de un lingua de patrono non garanti que le patrono specific es disponibile in iste lingua. Iste campo lista le linguas disponibile de cata patrono supportate, i.e. illo pote presentar le lingua francese proque solmente {{Cite book}} es supportate.',
	'ts-citegen-Wrong-input' => '%s: non identificate como entrata correcte.',
	'ts-citegen-Parsers' => 'Analysatores syntactic',
	'ts-citegen-Skins' => 'Resultato',
	'ts-citegen-Skin-skins' => 'Apparentias',
	'ts-citegen-Skin-outputformat' => 'Formato de output',
	'ts-citegen-Template-lang' => 'Lingua de patrono',
	'ts-citegen-Sources-title' => 'Fontes',
	'ts-citegen-Sources-text' => 'Hic infra es le lista del fontes usate.',
	'ts-citegen-Sidebar-title' => 'Generator de citationes',
	'ts-citegen-Sidebar-add-Firefox' => 'Adder al barra lateral',
	'ts-citegen-Sidebar-add-Opera' => 'Adder al "Hotlist"',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Adder al "Page Holder"',
	'ts-citegen-Sidebar-add-IE-Mac-details' => 'Un vice que le pagina ha essite cargate, aperi tu "Page Holder", clicca super "Add" e postea usa le button "Page Holder Favorites" pro immagazinar lo como un favorite de Page Holder.',
	'ts-citegen-Tools' => 'Instrumentos',
	'ts-citegen-Other-languages' => 'Altere linguas',
	'ts-citegen-Save-it' => 'Consulta actual',
	'ts-citegen-Errors-title' => 'Errores',
	'ts-citegen-Unavailable-SQL' => 'Error: Le base de datos Toolserver es indisponibile. MySQL retornava: %s',
	'ts-citegen-base-disabled' => 'Error: le base de datos %s es indisponibile',
);

/** Indonesian (Bahasa Indonesia)
 * @author IvanLanin
 */
$messages['id'] = array(
	'ts-citegen-Title' => 'Pembuat templat kutipan',
	'ts-citegen-Send' => 'Buat',
	'ts-citegen-Input-title' => 'Masukan',
	'ts-citegen-Input-text' => 'Ini adalah pembuat templat kutipan. Anda dapat dengan cepat mengisi templat kutipan dalam berbagai edisi bahasa Wikipedia dengan menggunakannya. Silakan isi data (%s) pada kolom-kolom di bawah ini dan skrip akan mencoba untuk menyelesaikan templat. Ingat, bidang apa pun yang Anda pilih untuk memasukkan data bukan masalah. Secara otomatis skrip akan mencocokkan templat yang tepat untuk masukan yang diberikan.',
	'ts-citegen-Option-append-author-link' => 'Tambahkan pranala penulis ke dalam templat',
	'ts-citegen-Option-append-newlines' => 'Tambahkan baris baru setelah setiap parameter',
	'ts-citegen-Option-add-references' => 'Tambahkan tag <ref> di sekitar templat kutipan',
	'ts-citegen-Option-add-list' => 'Buat daftar wiki tempat kutipan',
	'ts-citegen-Output-title' => 'Hasil',
	'ts-citegen-Output-select-disclaimer' => 'Ingat bahwa memilih bahasa templat tidak menjamin bahwa templat tertentu tersedia dalam bahasa Anda. Bidang ini mencantumkan daftar bahasa yang tersedia dari setiap template yang didukung, yaitu dapat menampilkan Perancis, karena hanya {{Cite book}} yang didukung.',
	'ts-citegen-Wrong-input' => '%s: tidak dikenali sebagai masukan yang benar.',
	'ts-citegen-Parsers' => 'Parser',
	'ts-citegen-Skins' => 'Keluaran',
	'ts-citegen-Skin-skins' => 'Kulit',
	'ts-citegen-Skin-outputformat' => 'Format keluaran',
	'ts-citegen-Template-lang' => 'Bahasa templat',
	'ts-citegen-Sources-title' => 'Sumber',
	'ts-citegen-Sources-text' => 'Berikut adalah daftar sumber',
	'ts-citegen-Sidebar-title' => 'Pembuat kutipan',
	'ts-citegen-Sidebar-add-Firefox' => 'Tambahkan ke bilah sisi',
	'ts-citegen-Sidebar-add-Opera' => 'Tambahkan ke Hotlist',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Tambahkan ke Page Holder',
	'ts-citegen-Sidebar-add-IE-Mac-details' => "Setelah halaman dimuat, buka Page Holder Anda, klik 'Tambah', kemudian gunakan tombol Favorit Page Holder untuk menyimpannya sebagai Favorit Page Holder.",
	'ts-citegen-Tools' => 'Peralatan',
	'ts-citegen-Other-languages' => 'Bahasa lain',
	'ts-citegen-Save-it' => 'Kueri saat ini',
	'ts-citegen-Errors-title' => 'Galat',
	'ts-citegen-Unavailable-SQL' => 'Galat: Basis data Toolserver tidak tersedia. Tanggapan MySQL: %s',
	'ts-citegen-base-disabled' => 'Galat: Basis data %s tidak tersedia.',
);

/** Japanese (日本語)
 * @author Marine-Blue
 * @author Ohgi
 */
$messages['ja'] = array(
	'ts-citegen-Title' => '出典テンプレート生成ツール',
	'ts-citegen-Send' => '生成',
	'ts-citegen-Input-title' => '入力',
	'ts-citegen-Option-append-author-link' => '著者の記事へのリンクをテンプレートに追加',
	'ts-citegen-Option-append-newlines' => '各パラメーターの後に改行を追加',
	'ts-citegen-Option-add-references' => '出典テンプレートの前後に<ref>タグを挿入',
	'ts-citegen-Option-add-list' => '出典テンプレートのwikilistを生成',
	'ts-citegen-Output-title' => '生成結果',
	'ts-citegen-Wrong-input' => '%s： 正しく認識できない値です',
	'ts-citegen-Parsers' => 'パーサー',
	'ts-citegen-Skins' => '出力',
	'ts-citegen-Skin-skins' => 'スキン',
	'ts-citegen-Skin-outputformat' => '出力形式',
	'ts-citegen-Template-lang' => 'テンプレートの言語',
	'ts-citegen-Sources-title' => '出典',
	'ts-citegen-Sources-text' => '以下のリストにある出典が使用可能です、',
	'ts-citegen-Sidebar-title' => '生成ツール',
	'ts-citegen-Sidebar-add-Firefox' => 'サイドバーに追加',
	'ts-citegen-Sidebar-add-Opera' => 'ホットリストに追加',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Page Holderに追加',
	'ts-citegen-Tools' => 'ツール',
	'ts-citegen-Other-languages' => '他の言語',
	'ts-citegen-Errors-title' => 'エラー',
	'ts-citegen-Unavailable-SQL' => 'エラー： Toolserverデータベースが使用できません。MySQLは次の値を返しました： %s',
	'ts-citegen-base-disabled' => 'エラー： %s データベースが使用できません',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'ts-citegen-Send' => 'Generéieren',
	'ts-citegen-Option-append-author-link' => "Wikilinken op den Auteur an d'Schabloun derbäisetzen",
	'ts-citegen-Output-title' => 'Resultat',
	'ts-citegen-Skin-skins' => 'Skins/Layout',
	'ts-citegen-Template-lang' => 'Sprooch vun der Schabloun',
	'ts-citegen-Sources-title' => 'Quellen',
	'ts-citegen-Sidebar-title' => 'Generator fir Zitatiounen',
	'ts-citegen-Sidebar-add-Opera' => "Op d'Hotlist derbäisetzen",
	'ts-citegen-Tools' => 'Geschir (Tools)',
	'ts-citegen-Other-languages' => 'Aner Sproochen',
	'ts-citegen-Save-it' => 'Aktuell Ufro',
	'ts-citegen-Errors-title' => 'Feeler',
	'ts-citegen-Unavailable-SQL' => "Feeler: D'Datebank vum Toolserver ass net disponibel. MySQL hat: %s",
	'ts-citegen-base-disabled' => 'Feeler: %s Datebank ass net disponibel.',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'ts-citegen-Title' => 'Создавач на шаблони за цитирање',
	'ts-citegen-Send' => 'Создај',
	'ts-citegen-Input-title' => 'Внос',
	'ts-citegen-Input-text' => 'Ова е создавач на шаблони за цитати. Овозможува брзо пополнување на шаблоните за цитирање на разни јазични изданија на Википедија. Пополнете ги податоците (%s) во долунаведените полиња, а самата скрипта ќе се обиде да ги доврши шаблоните. Запомнете: не е важно во кои полиња ги внесувате податоците. Самата скрипта ќе го изнајде точниот шаблон за внесеното.',
	'ts-citegen-Option-append-author-link' => 'Додај викиврски за авторот во шаблонот',
	'ts-citegen-Option-append-newlines' => 'Додај нови редови по секој параметар',
	'ts-citegen-Option-add-references' => 'Додај ознаки <ref> околу шаблоните за цитирање',
	'ts-citegen-Option-add-list' => 'Создај викисписок на шаблони за цитирање',
	'ts-citegen-Output-title' => 'Исход',
	'ts-citegen-Output-select-disclaimer' => 'Запомнете: изборот на јазик на шаблонот не ви гарантира дека тој шаблон е достапен на вашиот јазик. Ова поле ги наведува достапните јазици за секој поддржан шаблон. (т.е. може да прикаже француски бидејќи е поддржан само {{Cite book}}.)',
	'ts-citegen-Wrong-input' => '%s: не е утврден како исправен внос.',
	'ts-citegen-Parsers' => 'Парсери',
	'ts-citegen-Skins' => 'Извод',
	'ts-citegen-Skin-skins' => 'Рува',
	'ts-citegen-Skin-outputformat' => 'Формат на изводот',
	'ts-citegen-Template-lang' => 'Јазик на шаблонот',
	'ts-citegen-Sources-title' => 'Извори',
	'ts-citegen-Sources-text' => 'Подолу има список на користени извори.',
	'ts-citegen-Sidebar-title' => 'Создавач на цитати',
	'ts-citegen-Sidebar-add-Firefox' => 'Додај во страничната лента',
	'ts-citegen-Sidebar-add-Opera' => 'Додај во Hotlist',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Додај во Page Holder',
	'ts-citegen-Sidebar-add-IE-Mac-details' => 'Откако ќе се вчита страницата, отворете го вашиот Page Holder, сиснете на „Додај“, и потоа со копчето за Page Holder Favorites зачувајте ја како таква.',
	'ts-citegen-Tools' => 'Алатки',
	'ts-citegen-Other-languages' => 'Други јазици',
	'ts-citegen-Save-it' => 'Тековно барање',
	'ts-citegen-Errors-title' => 'Грешки',
	'ts-citegen-Unavailable-SQL' => 'Грешка: Базата на Toolserver е недостапна. MySQL даде: %s',
	'ts-citegen-base-disabled' => 'Грешка: Базата на %s е недостапна.',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'ts-citegen-Title' => 'Citaatsjabloongenerator',
	'ts-citegen-Send' => 'Aanmaken',
	'ts-citegen-Input-title' => 'Invoer',
	'ts-citegen-Input-text' => 'Dit is een citaatsjabloongenerator. Hiermee kunt u de citaatsjablonen in verschillende taalversies van Wikipedia invullen. Vul de gegevens (%s) in de velden hieronder in en het programma probeert dan de sjablonen in te vullen. Het maakt niet uit in welke velden u de invoergegevens plaatst. Het script probeert automatisch het juiste sjabloon te gebruiken voor de ingevoerde gegevens.',
	'ts-citegen-Option-append-author-link' => 'De wikiverwijzingen van de auteur aan het sjabloon toevoegen',
	'ts-citegen-Option-append-newlines' => 'Nieuwe regel beginnen na iedere parameter',
	'ts-citegen-Option-add-references' => 'Het label <ref> toevoegen om citaatsjablonen',
	'ts-citegen-Option-add-list' => 'Een wikilijst met citaatsjablonen aanmaken',
	'ts-citegen-Output-title' => 'Resultaat',
	'ts-citegen-Output-select-disclaimer' => 'Het kiezen van een sjabloontaal is geen garantie dat een bepaald sjabloon in die taal beschikbaar is. In dit veld worden de beschikbare talen voor alle ondersteunde sjablonen weergegeven; het kan bijvoorbeeld zijn dat Frans wordt weergegeven omdat alleen {{Cite book}} wordt ondersteund.',
	'ts-citegen-Wrong-input' => '%s: dit lijkt geen geldige invoer.',
	'ts-citegen-Parsers' => 'Parsers',
	'ts-citegen-Skins' => 'Uitvoer',
	'ts-citegen-Skin-skins' => 'Vormgevingen',
	'ts-citegen-Skin-outputformat' => 'Uitvoerformaat',
	'ts-citegen-Template-lang' => 'Sjabloontaal',
	'ts-citegen-Sources-title' => 'Bronnen',
	'ts-citegen-Sources-text' => 'Hieronder staat een lijst met gebruikte bronnen.',
	'ts-citegen-Sidebar-title' => 'Citaatgenerator',
	'ts-citegen-Sidebar-add-Firefox' => 'Toevoegen aan het menu',
	'ts-citegen-Sidebar-add-Opera' => 'Toevoegen aan de hotlist',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Toevoegen aan de paginahouder',
	'ts-citegen-Sidebar-add-IE-Mac-details' => 'Als deze pagina is geladen, kunt u uw Page Holder openen, klikken op "Toevoegen" en daarna de knop Page Holder Favorites gebruiken om deze op te slaan als een Page Holder Favorite.',
	'ts-citegen-Tools' => 'Hulpmiddelen',
	'ts-citegen-Other-languages' => 'Andere talen',
	'ts-citegen-Save-it' => 'Huidige zoekopdracht',
	'ts-citegen-Errors-title' => 'Fouten',
	'ts-citegen-Unavailable-SQL' => 'Fout: de Toolserverdatabase is niet beschikbaar. MySQL gaf de volgende foutmelding: %s',
	'ts-citegen-base-disabled' => 'Fout: de database database %s is niet beschikbaar.',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Nghtwlkr
 */
$messages['no'] = array(
	'ts-citegen-Title' => 'Sitat-malgenerator',
	'ts-citegen-Send' => 'Generer',
	'ts-citegen-Input-title' => 'Inndata',
	'ts-citegen-Input-text' => 'Dette er en sitatmalgenerator. Ved å bruke den kan du raskt fylle ut sitatmaler på forskjellige språkversjoner av Wikipedia. Fyll ut dataene (%s) i feltene nedenfor og skriptet vil prøve å fullføre malene. Husk, det spiller ingen rolle hvilke felt du setter inndataene i. Skriptet vil automatisk finne den riktige malen samsvarende med de gitte inndatene.',
	'ts-citegen-Option-append-author-link' => 'Tilføy forfatterwikilenkene inn i malen',
	'ts-citegen-Option-append-newlines' => 'Tilføy nye linjer etter hver parameter',
	'ts-citegen-Option-add-references' => 'Legg til <ref>-element rundt sitatmalene',
	'ts-citegen-Option-add-list' => 'Opprett en wikiliste over sitatmaler',
	'ts-citegen-Output-title' => 'Resultat',
	'ts-citegen-Output-select-disclaimer' => 'Å velge et malspråk garanterer ikke at den spesifikke malen er tilgjengelig på ditt språk. Dette feltet lister opp tilgjengelige språk for hver støttet mal, dvs. den kan vise fransk fordi kun {{Cite book}} er støttet.',
	'ts-citegen-Wrong-input' => '%s: ikke identifisert som korrekt inndata.',
	'ts-citegen-Parsers' => 'Tolkere',
	'ts-citegen-Skins' => 'Utdata',
	'ts-citegen-Skin-skins' => 'Drakter',
	'ts-citegen-Skin-outputformat' => 'Utdataformat',
	'ts-citegen-Template-lang' => 'Malspråk',
	'ts-citegen-Sources-title' => 'Kilder',
	'ts-citegen-Sources-text' => 'Nedenfor er listen over brukte kilder tilgjengelig.',
	'ts-citegen-Sidebar-title' => 'Sitatgenerator',
	'ts-citegen-Sidebar-add-Firefox' => 'Legg til sidepanelet',
	'ts-citegen-Sidebar-add-Opera' => 'Legg til Favorittlisten',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Legg til i Page Holder',
	'ts-citegen-Sidebar-add-IE-Mac-details' => "Når siden er lastet, åpne din Page Holder, klikk 'Add' og bruk Page Holder sin Favorites-knapp for å lagre den som en Page Holder Favorite.",
	'ts-citegen-Tools' => 'Verktøy',
	'ts-citegen-Other-languages' => 'Andre språk',
	'ts-citegen-Save-it' => 'Gjeldende spørring',
	'ts-citegen-Errors-title' => 'Feil',
	'ts-citegen-Unavailable-SQL' => 'Feil: Verktøytjenerdatabasen er ikke tilgjengelig. MySQL returnerte: %s',
	'ts-citegen-base-disabled' => 'Feil: % s-databasen er ikke tilgjengelig',
);

/** Polish (Polski)
 * @author Herr Kriss
 * @author Holek
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'ts-citegen-Title' => 'Generator szablonów cytowania',
	'ts-citegen-Send' => 'Generuj',
	'ts-citegen-Input-title' => 'Dane wejściowe',
	'ts-citegen-Input-text' => 'To jest generator szablonów cytowania. Za pomocą tego narzędzia możesz szybko uzupełnić szablony cytowania dostępne w różnych edycjach językowych Wikipedii. Wpisz w polach poniżej odpowiednie dane (%s), a skrypt postara się wypełnić odpowiednie szablony według danych wejściowych. Pamiętaj, że nie ma znaczenia, w których polach, co wpiszesz. Skrypt automatycznie dopasowuje szablony do wprowadzonych danych.',
	'ts-citegen-Option-append-author-link' => 'Dołączaj linki do artykułów o odpowiednich autorach',
	'ts-citegen-Option-append-newlines' => 'Umieszczaj nowe linie po każdym parametrze',
	'ts-citegen-Option-add-references' => 'Umieść szablony pomiędzy znacznikami <ref></ref>',
	'ts-citegen-Option-add-list' => 'Dodaj wikilistę do szablonów cytowania',
	'ts-citegen-Output-title' => 'Rezultat',
	'ts-citegen-Output-select-disclaimer' => 'Pamiętaj – wybór języka nie gwarantuje, że wszystkie szablony w tym języku są gotowe do użytku. W tym polu wyświetlana jest lista języków dla wszystkich obsługiwanych szablonów. Na przykład może być w nim dostępny język francuski, ponieważ skrypt obsługuje jedynie francuski odpowiednik {{Cytuj książkę}}.',
	'ts-citegen-Wrong-input' => '%s: nie zidentyfikowano.',
	'ts-citegen-Parsers' => 'Bazy',
	'ts-citegen-Skins' => 'Forma prezentacji',
	'ts-citegen-Skin-skins' => 'Skórki',
	'ts-citegen-Skin-outputformat' => 'Dla botów',
	'ts-citegen-Template-lang' => 'Język szablonu',
	'ts-citegen-Sources-title' => 'Źródła',
	'ts-citegen-Sources-text' => 'Poniżej podane są strony, z których korzystano przy pobieraniu informacji o książkach.',
	'ts-citegen-Sidebar-title' => 'Generator cytowań',
	'ts-citegen-Sidebar-add-Firefox' => 'Dodaj do panelu bocznego',
	'ts-citegen-Sidebar-add-Opera' => 'Dodaj do panelu Opery',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Dodaj do Page Holdera',
	'ts-citegen-Sidebar-add-IE-Mac-details' => 'Gdy strona zostanie załadowana, otwórz Page Holder, naciśnij „Dodaj“ i użyj przycisku Ulubionych Page Holdera, aby zapisać generator w panelu.',
	'ts-citegen-Tools' => 'Narzędzia',
	'ts-citegen-Other-languages' => 'W innych językach',
	'ts-citegen-Save-it' => 'Samowywołanie (zapisz tę stronę)',
	'ts-citegen-Errors-title' => 'Błędy',
	'ts-citegen-Unavailable-SQL' => 'Błąd – dostęp do bazy danych serwera narzędziowego jest niemożliwy. MySQL zwróciło %s',
	'ts-citegen-base-disabled' => 'Błąd – baza danych %s jest niedostępna',
);

/** Portuguese (Português)
 * @author Giro720
 * @author Hamilton Abreu
 * @author Waldir
 */
$messages['pt'] = array(
	'ts-citegen-Title' => 'Gerador de predefinições de citação',
	'ts-citegen-Send' => 'Gerar',
	'ts-citegen-Input-title' => 'Entrada',
	'ts-citegen-Input-text' => 'Este é um gerador de predefinições de citação. Usando-o, pode preencher rapidamente as predefinições de citação nas várias edições linguísticas da Wikipédia. Por favor, preencha os dados (%s) nos campos abaixo, e o script tentará completar as predefinições. Lembre-se de que não importa em que campo coloca os dados de entrada. O script fará corresponder automaticamente a predefinição correcta aos dados fornecidos.',
	'ts-citegen-Option-append-author-link' => 'Adicionar os links wiki do autor à predefinição',
	'ts-citegen-Option-append-newlines' => 'Acrescentar novas linhas após cada parâmetro.',
	'ts-citegen-Option-add-references' => 'Adicionar etiquetas <ref> em torno das predefinições de citação',
	'ts-citegen-Option-add-list' => 'Criar uma lista wiki de predefinições de citação',
	'ts-citegen-Output-title' => 'Resultado',
	'ts-citegen-Output-select-disclaimer' => 'Escolher uma língua para a predefinição não garante que a predefinição específica esteja disponível na sua língua. Este campo lista as línguas disponíveis de todas as predefinições suportadas, ou seja, ele pode listar "francês" mesmo que apenas {{citar livro}} seja suportado nessa língua.',
	'ts-citegen-Wrong-input' => '%s: não identificado como entrada correcta.',
	'ts-citegen-Parsers' => 'Analisadores',
	'ts-citegen-Skins' => 'Resultado',
	'ts-citegen-Skin-skins' => 'Temas',
	'ts-citegen-Skin-outputformat' => 'Formato de saída',
	'ts-citegen-Template-lang' => 'Língua da predefinição',
	'ts-citegen-Sources-title' => 'Referências',
	'ts-citegen-Sources-text' => 'Abaixo encontra-se a lista de referências utilizadas.',
	'ts-citegen-Sidebar-title' => 'Gerador de citação',
	'ts-citegen-Sidebar-add-Firefox' => 'Adicionar à barra lateral',
	'ts-citegen-Sidebar-add-Opera' => 'Adicionar ao Hotlist',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Adicionar ao Fixador de Páginas',
	'ts-citegen-Sidebar-add-IE-Mac-details' => "Depois da página ter sido carregada, abra o Fixador de Páginas, clique 'Adicionar' e use o botão Preferidos do Fixador de Páginas para armazenar a página como uma Preferida.",
	'ts-citegen-Tools' => 'Ferramentas',
	'ts-citegen-Other-languages' => 'Outras línguas',
	'ts-citegen-Save-it' => 'Consulta actual',
	'ts-citegen-Errors-title' => 'Erros',
	'ts-citegen-Unavailable-SQL' => 'Erro: A base de dados Toolserver não está disponível. O MySQL devolveu o erro: %s',
	'ts-citegen-base-disabled' => 'Erro: A base de dados %s não está disponível',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Giro720
 * @author Holek
 * @author Waldir
 */
$messages['pt-br'] = array(
	'ts-citegen-Title' => 'Gerador de predefinições de citação',
	'ts-citegen-Send' => 'Gerar',
	'ts-citegen-Input-title' => 'Entrada',
	'ts-citegen-Input-text' => 'Este é um gerador de predefinição de citação. Usando-o, você pode preencher rapidamente as predefinições de citação nas várias línguas de edições da Wikipédia. Por favor, preencha os dados (%s) nos campos abaixo, e o script tentará completar as predefinições. Lembre-se de que não importa em qual campo você coloca os dados de entrada. O script automaticamente irá corresponder a predefinição correta com os dados fornecidos.',
	'ts-citegen-Option-append-author-link' => 'Adicionar os links wiki do autor para a predefinição',
);

/** Russian (Русский)
 * @author Lockal
 */
$messages['ru'] = array(
	'ts-citegen-Title' => 'Генератор шаблона цитирования',
	'ts-citegen-Send' => 'Сгенерировать',
	'ts-citegen-Input-title' => 'Входные данные',
	'ts-citegen-Input-text' => 'Это генератор шаблонов цитирования. С помощью него вы можете быстро заполнить шаблоны цитирования в различных языковых разделах Википедии. Пожалуйста, заполните данные (%s) в поля ниже, и скрипт попытается заполнить шаблоны. Порядок заполнения полей не имеет значения: скрипт автоматически подберёт правильный порядок для введённых данных.',
	'ts-citegen-Option-append-author-link' => 'Добавить в шаблон вики-ссылки на авторов',
	'ts-citegen-Option-append-newlines' => 'Добавить переносы строк после каждого параметра',
	'ts-citegen-Option-add-references' => 'Добавить теги <ref> вокруг шаблона цитирования.',
	'ts-citegen-Option-add-list' => 'Создать вики-список из шаблонов цитирования',
	'ts-citegen-Output-title' => 'Результат',
	'ts-citegen-Output-select-disclaimer' => 'Выбор языка шаблона не гарантирует, что этот конкретный шаблон доступен на вашем языке. В этом поле перечислены доступные языки для каждого поддерживаемого шаблона, то есть в нём может быть французский только из-за того, что в разделе поддерживается {{Cite book}}.',
	'ts-citegen-Wrong-input' => '%s: значение не определено как правильный ввод.',
	'ts-citegen-Parsers' => 'Парсеры',
	'ts-citegen-Skins' => 'Результат',
	'ts-citegen-Skin-skins' => 'Темы оформления',
	'ts-citegen-Skin-outputformat' => 'Выходной формат',
	'ts-citegen-Template-lang' => 'Язык шаблона',
	'ts-citegen-Sources-title' => 'Источники',
	'ts-citegen-Sources-text' => 'Ниже представлен список использованных источников.',
	'ts-citegen-Sidebar-title' => 'Генератор цитирований',
	'ts-citegen-Sidebar-add-Firefox' => 'Добавить на боковую панель',
	'ts-citegen-Sidebar-add-Opera' => 'Добавить в Hotlist',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Добавить в Page Holder',
	'ts-citegen-Sidebar-add-IE-Mac-details' => 'После загрузки страницы откройте Page Holder, нажмите «Add», после чего используйте кнопку Page Holder Favorites для сохранения страницы в качестве избранной.',
	'ts-citegen-Tools' => 'Инструменты',
	'ts-citegen-Other-languages' => 'Другие языки',
	'ts-citegen-Save-it' => 'Текущий запрос',
	'ts-citegen-Errors-title' => 'Ошибки',
	'ts-citegen-Unavailable-SQL' => 'Ошибка: база данных тулсервера недоступна. Ответ MySQL: %s',
	'ts-citegen-base-disabled' => 'Ошибка: база данных %s недоступна',
);

/** Swedish (Svenska)
 * @author Ainali
 */
$messages['sv'] = array(
	'ts-citegen-Output-title' => 'Resultat',
	'ts-citegen-Sources-title' => 'Källor',
	'ts-citegen-Errors-title' => 'Fel',
);

/** Silesian (Ślůnski)
 * @author Herr Kriss
 */
$messages['szl'] = array(
	'ts-citegen-Title' => 'Richtowanjy cytatůw',
	'ts-citegen-Send' => 'Machnij',
	'ts-citegen-Input-title' => 'Dane',
	'ts-citegen-Input-text' => 'To je workcojg, kery robi szablůny cytowanjyo. Łůn tak zrobi, cobyś mioł szablůn cytowanjo we růżnistych godkach Wikipedyj. Podej dane (%s) na spodku, a skrypt Ci bydzie průbowoł wyrichtować szablůna. Pamjyntej - uobojyntnjy de kerego pola dosz co byś chcioł, bydzie dobrze, skrypt som wyrytichtuje szablůna tak jak trza.',
	'ts-citegen-Option-append-author-link' => 'Dociep wikilink ze autorym do szablůny',
	'ts-citegen-Option-append-newlines' => 'Dociep nowo linia pů kożdym paramytrze.',
	'ts-citegen-Option-add-references' => 'Dociep <ref> </ref> kole szablůny cytowanio.',
	'ts-citegen-Option-add-list' => 'Szrajbnij wikilista szablůnůw cytowonjyo.',
	'ts-citegen-Output-title' => 'Wynik',
	'ts-citegen-Output-select-disclaimer' => 'Pozůr: kej se wybierzesz godka, kej njy mo tokej szalbůny, to łůn Ci go njy wyrichtuje jak trza. To pole mo godki, kere zno, nale czasym je tak, co pokazuje francusko godka po tymu bo skrypt umjy wyrichtować ino francuski uodpowjednjyk.',
	'ts-citegen-Wrong-input' => '% je felerne',
	'ts-citegen-Parsers' => 'Bazy',
	'ts-citegen-Skins' => 'Wynik',
	'ts-citegen-Skin-skins' => 'Łoblyczynie',
	'ts-citegen-Skin-outputformat' => 'Do botůw',
	'ts-citegen-Template-lang' => 'Godka szablůny',
	'ts-citegen-Sources-title' => 'Zdrzůdła',
	'ts-citegen-Sources-text' => 'Na spodku je lista zdrzůdeł.',
	'ts-citegen-Sidebar-title' => 'Richtowanjy cytatůw',
	'ts-citegen-Sidebar-add-Firefox' => 'Dociep do Sidebar',
	'ts-citegen-Sidebar-add-Opera' => 'Dociep do Hotlist',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Dociep do Page Holder',
	'ts-citegen-Sidebar-add-IE-Mac-details' => 'Kej zajta śjy uodymnknjy, uodymknij Page Holder, naciś \'Dociep" a naciś knyfel "Favorites", coby boła Page Holder Favorite.',
	'ts-citegen-Tools' => 'Werkcojgi',
	'ts-citegen-Other-languages' => 'We inkszych godkach.',
	'ts-citegen-Save-it' => 'Co terozki robi',
	'ts-citegen-Errors-title' => 'Felery',
	'ts-citegen-Unavailable-SQL' => 'Feler: baza Toolservera je zawarto. MySQL pedziało: %s',
	'ts-citegen-base-disabled' => 'Feler: baza %s je zawarto',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'ts-citegen-Output-title' => 'ఫలితం',
	'ts-citegen-Sources-title' => 'మూలాలు',
	'ts-citegen-Tools' => 'పనిముట్లు',
	'ts-citegen-Other-languages' => 'ఇతర భాషలు',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'ts-citegen-Option-append-newlines' => 'Xuống dòng sau mỗi tham số',
	'ts-citegen-Option-add-references' => 'Kẹp các bản mẫu chú thích vào trong thẻ <ref>',
	'ts-citegen-Option-add-list' => 'Tạo danh sách bản mẫu chú thích',
	'ts-citegen-Output-title' => 'Kết quả',
	'ts-citegen-Parsers' => 'Bộ phân tích',
	'ts-citegen-Skin-skins' => 'Hình dạng',
	'ts-citegen-Skin-outputformat' => 'Định dạng cho ra',
	'ts-citegen-Template-lang' => 'Ngôn ngữ bản mẫu',
	'ts-citegen-Sources-title' => 'Nguồn',
	'ts-citegen-Sources-text' => 'Các nguồn ở dưới được sử dụng.',
	'ts-citegen-Sidebar-add-Firefox' => 'Thêm vào thanh bên',
	'ts-citegen-Sidebar-add-Opera' => 'Thêm vào Hotlist',
	'ts-citegen-Sidebar-add-IE-Mac' => 'Thêm vào Page Holder',
	'ts-citegen-Sidebar-add-IE-Mac-details' => 'Sau khi trang tải xong, mở Page Holder, rồi bấm “Add”, “Favorites”, và “Add to Page Holder Favorites”.',
	'ts-citegen-Tools' => 'Công cụ',
	'ts-citegen-Other-languages' => 'Ngôn ngữ khác',
	'ts-citegen-Save-it' => 'Truy vấn hiện tại',
	'ts-citegen-Errors-title' => 'Lỗi',
	'ts-citegen-Unavailable-SQL' => 'Lỗi: Cơ sở dữ liệu Toolserver gặp vấn đề MySQL: %s',
	'ts-citegen-base-disabled' => 'Lỗi: Cơ sở dữ liệu %s không có sẵn',
);
