<?php

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation, version 2
of the License.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

/**
 * A file for the WhiteList extension
 *
 * @package MediaWiki
 * @subpackage Extensions
 *
 * @author Paul Grinberg <gri6507@yahoo.com>
 * @author Mike Sullivan <ms-mediawiki@umich.edu>
 * @copyright Copyright © 2008, Paul Grinberg, Mike Sullivan
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$allMessages = array();

/** English
 * @author Paul Grinberg <gri6507@yahoo.com>
 * @author Mike Sullivan <ms-mediawiki@umich.edu>
 */
$allMessages['en'] = array(
	'whitelist-desc'              => 'Edit the access permissions of restricted users',
	'whitelistedit'               => 'Whitelist Access Editor',
	'whitelist'                   => 'Whitelist Pages',
	'mywhitelistpages'            => 'My Pages',
	'whitelistfor'                => "<center>Current information for <b>$1<b></center>",
	'whitelisttablemodify'        => 'Modify',
	'whitelisttablemodifyall'     => 'All',
	'whitelisttablemodifynone'    => 'None',
	'whitelisttablepage'          => 'Wiki Page',
	'whitelisttabletype'          => 'Access Type',
	'whitelisttableexpires'       => 'Expires On',
	'whitelisttablemodby'         => 'Last modified By',
	'whitelisttablemodon'         => 'Last modified On',
	'whitelisttableedit'          => 'Edit',
	'whitelisttableview'          => 'View',
	'whitelisttablenewdate'       => 'New Date:',
	'whitelisttablechangedate'    => 'Change Expiry Date',
	'whitelisttablesetedit'       => 'Set to Edit',
	'whitelisttablesetview'       => 'Set to View',
	'whitelisttableremove'        => 'Remove',
	'whitelistnewpagesfor'        => "Add new pages to <b>$1's</b> white list<br />
Use either * or % as wildcard character<br />",
	'whitelistnewtabledate'       => 'Expiry Date:',
	'whitelistnewtableedit'       => 'Set to Edit',
	'whitelistnewtableview'       => 'Set to View',
	'whitelistnewtableprocess'    => 'Process',
	'whitelistnewtablereview'     => 'Review',
	'whitelistselectrestricted'   => '== Select Restricted User Name ==',
	'whitelistpagelist'           => "{{SITENAME}} pages for $1",
	'whitelistnocalendar'         => "<font color='red' size=3>It looks like [http://www.mediawiki.org/wiki/Extension:Usage_Statistics Extension:UsageStatistics], a prerequisite for this extension, was not installed properly!</font>",
	'whitelistbadtitle'           => 'Bad title - ',
	'whitelistoverview'           => "== Overview of changes for $1 ==",
	'whitelistoverviewcd'         => "* Changing date to '''$1''' for [[:$2|$2]]",
	'whitelistoverviewsa'         => "* Setting access to '''$1''' for [[:$2|$2]]",
	'whitelistoverviewrm'         => "* Removing access to [[:$1|$1]]",
	'whitelistoverviewna'         => "* Adding [[:$1|$1]] to whitelist with access '''$2''' and '''$3''' expiry date",
	'whitelistrequest'            => "Request access to more pages",
	'whitelistrequestmsg'         => "$1 has requested access to the following pages:\n\n$2",
	'whitelistrequestconf'        => "Request for new pages was sent to $1",
	'whitelistnonrestricted'      => "User '''$1''' is not a restricted user.
This page is only applicable to restricted users",
	'whitelistnever'              => 'never',
	'whitelistnummatches'         => " - $1 matches",
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$allMessages['bg'] = array(
	'mywhitelistpages'        => 'Моите страници',
	'whitelistfor'            => '<center>Текуща информация за <b>$1</b></center>',
	'whitelisttablemodifyall' => 'Всички',
	'whitelisttableedit'      => 'Редактиране',
	'whitelisttableview'      => 'Преглед',
	'whitelisttableremove'    => 'Премахване',
	'whitelistbadtitle'       => 'Грешно заглавие -',
	'whitelistnever'          => 'никога',
	'whitelistnummatches'     => ' - $1 съвпадения',
);

/** French (Français)
 * @author Grondin
 */
$allMessages['fr'] = array(
	'whitelist-desc'            => 'Modifie les permission d’accès des utilisateurs à pouvoirs restreints',
	'whitelistedit'             => 'Éditeur de la liste blanche des accès',
	'whitelist'                 => 'Pages de listes blanches',
	'mywhitelistpages'          => 'Mes pages',
	'whitelistfor'              => '<center>Informations actuelles pour <b>$1</b></center>',
	'whitelisttablemodify'      => 'Modifier',
	'whitelisttablemodifyall'   => 'Tout',
	'whitelisttablemodifynone'  => 'Néant',
	'whitelisttablepage'        => 'Page wiki',
	'whitelisttabletype'        => 'Mode d’accès',
	'whitelisttableexpires'     => 'Expire le',
	'whitelisttablemodby'       => 'Modifié en dernier par',
	'whitelisttablemodon'       => 'Modifié en dernier le',
	'whitelisttableedit'        => 'Modifier',
	'whitelisttableview'        => 'Afficher',
	'whitelisttablenewdate'     => 'Nouvelle date :',
	'whitelisttablechangedate'  => 'Changer la date d’expiration',
	'whitelisttablesetedit'     => 'Paramètres pour l’édition',
	'whitelisttablesetview'     => 'Paramètres pour visionner',
	'whitelisttableremove'      => 'Retirer',
	'whitelistnewpagesfor'      => 'Ajoute de nouvelles pages à la liste blanche de <b>$1</b><br />
Utiliser soit le caractère * soit %<br />',
	'whitelistnewtabledate'     => 'Date d’expiration :',
	'whitelistnewtableedit'     => 'Paramètres d‘édition',
	'whitelistnewtableview'     => 'Paramètres pour visionner',
	'whitelistnewtableprocess'  => 'Traiter',
	'whitelistnewtablereview'   => 'Réviser',
	'whitelistselectrestricted' => '== Sélectionner un nom d’utilisateur à accès restreint ==',
	'whitelistpagelist'         => 'Pages de {{SITENAME}} pour $1',
	'whitelistnocalendar'       => "<font color='red' size=3>Il semble que le module [http://www.mediawiki.org/wiki/Extension:Usage_Statistics Extension:UsageStatistics], une extension prérequise, n’ait pas été installée convenablement !</font>",
	'whitelistbadtitle'         => 'Titre incorrect ‑',
	'whitelistoverview'         => '== Vue générale des changements pour $1 ==',
	'whitelistoverviewcd'       => "Modification de la date de '''$1''' pour [[:$2|$2]]",
	'whitelistoverviewsa'       => "* configurer l'accès de '''$1''' pour [[:$2|$2]]",
	'whitelistoverviewrm'       => '* Retrait de l’accès à [[:$1|$1]]',
	'whitelistoverviewna'       => "* Ajoute [[:$1|$1]] à la liste blanche avec les droits de '''$2''' avec pour date d’expiration le '''$3'''",
	'whitelistrequest'          => 'Demande d’accès à plus de pages',
	'whitelistrequestmsg'       => '$1 a demandé l’accès aux pages suivantes :

$2',
	'whitelistrequestconf'      => 'Une demande d’accès pour de nouvelles pages a été envoyée à $1',
	'whitelistnonrestricted'    => "L'utilisateur  '''$1''' n’est pas avec des droit restreints.
Cette page ne s’applique qu’aux utilisateurs disposant de droits restreints.",
	'whitelistnever'            => 'jamais',
	'whitelistnummatches'       => ' - $1 {{PLURAL:$1|occurence|occurences}}',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Lovekhmer
 */
$allMessages['km'] = array(
	'mywhitelistpages'         => 'ទំព័ររបស់ខ្ញុំ',
	'whitelisttablemodify'     => 'កែសំរួល',
	'whitelisttablemodifyall'  => 'ទាំងអស់',
	'whitelisttablemodifynone' => 'ទទេ',
	'whitelisttablepage'       => 'ទំព័រវិគី',
	'whitelisttablemodby'      => 'កែសំរួលចុងក្រោយដោយ',
	'whitelisttablemodon'      => 'កែសំរួលចុងក្រោយនៅ',
	'whitelisttableedit'       => 'កែប្រែ',
	'whitelisttableview'       => 'មើល',
	'whitelisttablenewdate'    => 'កាលបរិច្ឆេទថ្មី៖',
	'whitelisttablechangedate' => 'ផ្លាស់ប្តូរកាលបរិច្ឆេទផុតកំណត់',
	'whitelisttableremove'     => 'ដកចេញ',
	'whitelistnewtabledate'    => 'កាលបរិច្ឆេទផុតកំណត់៖',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$allMessages['nl'] = array(
	'whitelist-desc'            => 'Toegangsrechten voor gebruikers met beperkte rechten bewerken',
	'whitelistedit'             => 'Toegang via witte lijst',
	'whitelist'                 => "Pagina's op de witte lijst",
	'mywhitelistpages'          => "Mijn pagina's",
	'whitelistfor'              => '<center>Huidige informatie voor <b>$1<b></center>',
	'whitelisttablemodify'      => 'Bewerken',
	'whitelisttablemodifyall'   => 'Alle',
	'whitelisttablemodifynone'  => 'Geen',
	'whitelisttablepage'        => 'Wikipagina',
	'whitelisttabletype'        => 'Toegangstype',
	'whitelisttableexpires'     => 'Verloopt op',
	'whitelisttablemodby'       => 'Laatste bewerking door',
	'whitelisttablemodon'       => 'Laatste wijziging op',
	'whitelisttableedit'        => 'Bewerken',
	'whitelisttableview'        => 'Bekijken',
	'whitelisttablenewdate'     => 'Nieuwe datum:',
	'whitelisttablechangedate'  => 'Verloopdatum bewerken',
	'whitelisttablesetedit'     => 'Op bewerken instellen',
	'whitelisttablesetview'     => 'Op bekijken instellen',
	'whitelisttableremove'      => 'Verwijderen',
	'whitelistnewpagesfor'      => "Nieuwe pagina's aan de witte lijst voor <b>$1</b> toevoegen<br />
Gebruik * of % als wildcard<br />",
	'whitelistnewtabledate'     => 'Verloopdatum:',
	'whitelistnewtableedit'     => 'Op bewerken instellen',
	'whitelistnewtableview'     => 'Op bekijken instellen',
	'whitelistnewtableprocess'  => 'Verwerken',
	'whitelistnewtablereview'   => 'Controleren',
	'whitelistselectrestricted' => '== Gebruiker met beperkingen selecteren ==',
	'whitelistpagelist'         => "{{SITENAME}} pagina's voor $1",
	'whitelistnocalendar'       => "<font color='red' size=3>[http://www.mediawiki.org/wiki/Extension:Usage_Statistics Extension:UsageStatistics], een voorwaarde voor deze uitbreiding, lijkt niet juist geïnstalleerd!</font>",
	'whitelistbadtitle'         => 'Onjuiste naam -',
	'whitelistoverview'         => '== Overzicht van wijzigingen voor $1 ==',
	'whitelistoverviewcd'       => "* verloopdatum gewijzigd naar '''$1''' voor [[:$2|$2]]",
	'whitelistoverviewsa'       => "* toegangstype '''$1''' ingesteld voor [[:$2|$2]]",
	'whitelistoverviewrm'       => '* toegang voor [[:$1|$1]] wordt verwijderd',
	'whitelistoverviewna'       => "* [[:$1|$1]] wordt toegevoegd aan de witte lijst met toegangstype '''$1''' en verloopdatum '''$3'''",
	'whitelistrequest'          => "Toegang tot meer pagina's vragen",
	'whitelistrequestmsg'       => "$1 heeft toegang gevraagd tot de volgende pagina's:

$2",
	'whitelistrequestconf'      => "Het verzoek voor nieuwe pagina's is verzonden naar $1",
	'whitelistnonrestricted'    => "Gebruiker '''$1''' is geen gebruiker met beperkte rechten.
Deze pagina is alleen van toepassing op gebruikers met beperkte rechten.",
	'whitelistnever'            => 'nooit',
	'whitelistnummatches'       => '- $1 resultaten',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$allMessages['no'] = array(
	'mywhitelistpages'         => 'Mine sider',
	'whitelisttablemodify'     => 'Endre',
	'whitelisttablemodifyall'  => 'Alle',
	'whitelisttablemodifynone' => 'Ingen',
	'whitelisttablepage'       => 'Wikiside',
	'whitelisttabletype'       => 'Tilgangstype',
	'whitelisttableexpires'    => 'Utgår',
	'whitelistnever'           => 'aldri',
	'whitelistnummatches'      => '  - $1 treff',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$allMessages['oc'] = array(
	'whitelist-desc'            => 'Modifica las permissions d’accès dels utilizaires de poders restrenches',
	'whitelistedit'             => 'Editor de la lista blanca dels accèsses',
	'whitelist'                 => 'Paginas de listas blancas',
	'mywhitelistpages'          => 'Mas paginas',
	'whitelistfor'              => '<center>Entresenhas actualas per <b>$1</b></center>',
	'whitelisttablemodify'      => 'Modificar',
	'whitelisttablemodifyall'   => 'Tot',
	'whitelisttablemodifynone'  => 'Nonrés',
	'whitelisttablepage'        => 'Pagina wiki',
	'whitelisttabletype'        => 'Mòde d’accès',
	'whitelisttableexpires'     => 'Expira lo',
	'whitelisttablemodby'       => 'Modificat en darrièr per',
	'whitelisttablemodon'       => 'Modificat en darrièr lo',
	'whitelisttableedit'        => 'Modificar',
	'whitelisttableview'        => 'Afichar',
	'whitelisttablenewdate'     => 'Data novèla :',
	'whitelisttablechangedate'  => 'Cambiar la data d’expiracion',
	'whitelisttablesetedit'     => 'Paramètres per l’edicion',
	'whitelisttablesetview'     => 'Paramètres per visionar',
	'whitelisttableremove'      => 'Levar',
	'whitelistnewpagesfor'      => 'Ajusta de paginas novèlas a la lista blanca de <b>$1</b><br />
Utilizatz siá lo caractèr * siá %<br />',
	'whitelistnewtabledate'     => 'Data d’expiracion :',
	'whitelistnewtableedit'     => "Paramètres d'edicion",
	'whitelistnewtableview'     => 'Paramètres per visionar',
	'whitelistnewtableprocess'  => 'Tractar',
	'whitelistnewtablereview'   => 'Revisar',
	'whitelistselectrestricted' => "== Seleccionatz un nom d’utilizaire d'accès restrench ==",
	'whitelistpagelist'         => 'Paginas de {{SITENAME}} per $1',
	'whitelistnocalendar'       => "<font color='red' size=3>Sembla que lo modul [http://www.mediawiki.org/wiki/Extension:Usage_Statistics Extension:UsageStatistics], una extension prerequesa, siá pas estada installada coma caliá !</font>",
	'whitelistbadtitle'         => 'Títol incorrècte ‑',
	'whitelistoverview'         => '== Vista generala dels cambiaments per $1 ==',
	'whitelistoverviewcd'       => "Modificacion de la data de '''$1''' per [[:$2|$2]]",
	'whitelistoverviewsa'       => "* configurar l'accès de '''$1''' per [[:$2|$2]]",
	'whitelistoverviewrm'       => '* Retirament de l’accès a [[:$1|$1]]',
	'whitelistoverviewna'       => "* Ajusta [[:$1|$1]] a la lista blanca amb los dreches de '''$2''' amb per data d’expiracion lo '''$3'''",
	'whitelistrequest'          => 'Demanda d’accès a mai de paginas',
	'whitelistrequestmsg'       => '$1 a demandat l’accès a las paginas seguentas :

$2',
	'whitelistrequestconf'      => 'Una demanda d’accès per de paginas novèlas es estada mandada a $1',
	'whitelistnonrestricted'    => "L'utilizaire  '''$1''' es pas amb de dreches restrenches.
Aquesta pagina s’aplica pas qu’als utilizaires disposant de dreches restrenches.",
	'whitelistnever'            => 'jamai',
	'whitelistnummatches'       => ' - $1 {{PLURAL:$1|ocuréncia|ocuréncias}}',
);

/** Polish (Polski)
 * @author Wpedzich
 */
$allMessages['pl'] = array(
	'whitelist-desc'            => 'Edytuj możliwość dostępu dla użytkowników z ograniczeniami',
	'whitelistedit'             => 'Edytor dostępu do "białej listy"',
	'whitelist'                 => 'Strony z "białej listy"',
	'mywhitelistpages'          => 'Strony użytkownika',
	'whitelistfor'              => '<center>Aktualne informacje na temat <b>$1<b></center>',
	'whitelisttablemodify'      => 'Zmodyfikuj',
	'whitelisttablemodifyall'   => 'Wszystkie',
	'whitelisttablemodifynone'  => 'Żadna',
	'whitelisttablepage'        => 'Strona wiki:',
	'whitelisttabletype'        => 'Typ dostępu:',
	'whitelisttableexpires'     => 'Wygasa:',
	'whitelisttablemodby'       => 'Ostatnio zmodyfikowany przez:',
	'whitelisttablemodon'       => 'Data ostatniej modyfikacji:',
	'whitelisttableedit'        => 'Edytuj',
	'whitelisttableview'        => 'Podgląd',
	'whitelisttablenewdate'     => 'Nowa data:',
	'whitelisttablechangedate'  => 'Zmień datę wygaśnięcia:',
	'whitelisttablesetedit'     => 'Przełącz na edycję',
	'whitelisttablesetview'     => 'Przełącz na podgląd',
	'whitelisttableremove'      => 'Usuń',
	'whitelistnewpagesfor'      => 'Dodaje nowe strony do "białej listy" wiki <b>$1</b><br />
Możliwe jest stosowanie symboli wieloznacznych * i %<br />',
	'whitelistnewtabledate'     => 'Wygasa:',
	'whitelistnewtableedit'     => 'Przełącz na edycję',
	'whitelistnewtableview'     => 'Przełącz na podgląd',
	'whitelistnewtableprocess'  => 'Przetwórz',
	'whitelistnewtablereview'   => 'Przejrzyj',
	'whitelistselectrestricted' => '== Wybierz nazwę użytkownika z ograniczeniami ==',
	'whitelistpagelist'         => 'Strony $1 w serwisie {{SITENAME}}',
	'whitelistnocalendar'       => '<font color=\'red\' size=3>Prawdopodobnie wymagane do pracy tego modułu rozszerzenie "[http://www.mediawiki.org/wiki/Extension:Usage_Statistics Extension:UsageStatistics]" nie zostało poprawnie zainstalowane.</font>',
	'whitelistbadtitle'         => 'Nieprawidłowa nazwa -',
	'whitelistoverview'         => '== Przegląd zmian dla elementu $1 ==',
	'whitelistoverviewcd'       => "* Zmiana daty ograniczenia na '''$1''' w odniesieniu do elementu [[:$2:$2]]",
	'whitelistoverviewsa'       => "* Ustalanie dostępu dla elementu '''$1''' do elementu [[:$2|$2]]",
	'whitelistoverviewrm'       => '* Usuwanie dostępu do [[:$1|$1]]',
	'whitelistoverviewna'       => "* Dodawanie elementu [[:\$1|\$1]] do \"białej listy\" - dostęp dla '''\$2''', data wygaśnięcia '''\$3'''",
	'whitelistrequest'          => 'Zażądaj dostępu do większej ilości stron',
	'whitelistrequestmsg'       => 'Użytkownik $1 zażądał dostępu do następujących stron:

$2',
	'whitelistrequestconf'      => 'Żądanie utworzenia nowych stron zostało przesłane do $1',
	'whitelistnonrestricted'    => "Na użytkownika '''$1''' nie nałożono ograniczeń.
Ta strona ma zastosowanie tylko do użytkowników na których zostały narzucone ograniczenia.",
	'whitelistnever'            => 'nigdy',
	'whitelistnummatches'       => 'wyników: $1',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$allMessages['ps'] = array(
	'mywhitelistpages'         => 'زما پاڼې',
	'whitelisttablemodifyall'  => 'ټول',
	'whitelisttablemodifynone' => 'هېڅ',
	'whitelisttablepage'       => 'ويکي مخ',
	'whitelisttabletype'       => 'د لاسرسۍ ډول',
	'whitelisttablenewdate'    => 'نوې نېټه:',
	'whitelistnewtabledate'    => 'د پای نېټه:',
);

/** Swedish (Svenska)
 * @author M.M.S.
 */
$allMessages['sv'] = array(
	'mywhitelistpages'        => 'Mina sidor',
	'whitelistfor'            => '<center>Nuvarande information för <b>$1<b></center>',
	'whitelisttablemodifyall' => 'Alla',
	'whitelisttableedit'      => 'Redigera',
	'whitelisttableview'      => 'Visa',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$allMessages['te'] = array(
	'mywhitelistpages'        => 'నా పేజీలు',
	'whitelisttablemodifyall' => 'అన్నీ',
	'whitelisttablepage'      => 'వికీ పేజీ',
	'whitelisttablenewdate'   => 'కొత్త తేదీ:',
	'whitelisttableremove'    => 'తొలగించు',
	'whitelistnewtablereview' => 'సమీక్షించు',
	'whitelistnummatches'     => '  - $1 పోలికలు',
);

