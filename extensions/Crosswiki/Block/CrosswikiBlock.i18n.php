<?php
/**
 * Internationalisation file for extension CrosswikiBlock.
 *
 * @addtogroup Extensions
*/

$messages = array();

$messages['en'] = array(
	# Special page
	'crosswikiblock-desc'       => 'Allows to block users on other wikis using a [[Special:Crosswikiblock|special page]]',
	'crosswikiblock'            => 'Block user on other wiki',
	'crosswikiblock-header'     => 'This page allows to block user on other wiki.
Please check if you are allowed to act on this wiki and your actions match all policies.',
	'crosswikiblock-target'     => 'IP address or username and destination wiki:',
	'crosswikiblock-expiry'     => 'Expiry:',
	'crosswikiblock-reason'     => 'Reason:',
	'crosswikiblock-submit'     => 'Block this user',
	'crosswikiblock-anononly'   => 'Block anonymous users only',
	'crosswikiblock-nocreate'   => 'Prevent account creation',
	'crosswikiblock-autoblock'  => 'Automatically block the last IP address used by this user, and any subsequent IPs they try to edit from',
	'crosswikiblock-noemail'    => 'Prevent user from sending e-mail',

	# Errors and success message
	'crosswikiblock-nousername'     => 'No username was inputed',
	'crosswikiblock-local'          => 'Local blocks are not supported via this interface. Use [[Special:Blockip]]',
	'crosswikiblock-dbnotfound'     => 'Database $1 doesn\'t exist',
	'crosswikiblock-noname'         => '"$1" isn\'t a valid username.',
	'crosswikiblock-nouser'         => 'User "$3" is not found.',
	'crosswikiblock-noexpiry'       => 'Invalid expiry: $1.',
	'crosswikiblock-noreason'       => 'No reason specified.',
	'crosswikiblock-notoken'        => 'Invalid edit token.',
	'crosswikiblock-alreadyblocked' => 'User $3 is already blocked.',
	'crosswikiblock-success'        => "User '''$3''' blocked successfully.

Return to:
* [[Special:CrosswikiBlock|Block form]]
* [[$4]]",
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'crosswikiblock-desc'           => 'يسمح بمنع المستخدمين في ويكيات أخرى باستخدام [[Special:Crosswikiblock|صفحة خاصة]]',
	'crosswikiblock'                => 'منع مستخدم في ويكي آخر',
	'crosswikiblock-header'         => 'هذه الصفحة تسمح بمنع المستخدمين في ويكي آخر.
من فضلك تحقق لو كان مسموحا لك بالعمل في هذه الويكي وأفعالك تطابق كل السياسات.',
	'crosswikiblock-target'         => 'عنوان الأيبي أو اسم المستخدم والويكي المستهدف:',
	'crosswikiblock-expiry'         => 'الانتهاء:',
	'crosswikiblock-reason'         => 'السبب:',
	'crosswikiblock-submit'         => 'منع هذا المستخدم',
	'crosswikiblock-anononly'       => 'امنع المستخدمين المجهولين فقط',
	'crosswikiblock-nocreate'       => 'امنع إنشاء الحسابات',
	'crosswikiblock-autoblock'      => 'تلقائيا امنع آخر عنوان أيبي تم استخدامه بواسطة هذا المستخدم، وأي أيبيهات لاحقة يحاول التعديل منها',
	'crosswikiblock-noemail'        => 'امنع المستخدم من إرسال بريد إلكتروني',
	'crosswikiblock-nousername'     => 'لا اسم مستخدم تم إدخاله',
	'crosswikiblock-local'          => 'عمليات المنع المحلية غير مدعومة من خلال هذه الواجهة. استخدم [[Special:Blockip]]',
	'crosswikiblock-dbnotfound'     => 'قاعدة البيانات $1 غير موجودة',
	'crosswikiblock-noname'         => '"$1" ليس اسم مستخدم صحيحا.',
	'crosswikiblock-nouser'         => 'المستخدم "$3" غير موجود.',
	'crosswikiblock-noexpiry'       => 'تاريخ انتهاء غير صحيح: $1.',
	'crosswikiblock-noreason'       => 'لا سبب تم تحديده.',
	'crosswikiblock-notoken'        => 'نص تعديل غير صحيح.',
	'crosswikiblock-alreadyblocked' => 'المستخدم $3 ممنوع بالفعل.',
	'crosswikiblock-success'        => "المستخدم '''$3''' تم منعه بنجاح.

ارجع إلى:
* [[Special:CrosswikiBlock|استمارة المنع]]
* [[$4]]",
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'crosswikiblock-desc'           => 'Позволява блокирането на потребители в други уикита чрез [[Special:Crosswikiblock|специална страница]]',
	'crosswikiblock'                => 'Блокиране на потребител в друго уики',
	'crosswikiblock-header'         => 'Тази страница позволява блокирането на потребители в други уикита.
Необходимо е да проверите дали имате права да изпълните действието на това уики и дали не е в разрез с действащите политики.',
	'crosswikiblock-target'         => 'IP адрес или потребителско име и целево уики:',
	'crosswikiblock-reason'         => 'Причина:',
	'crosswikiblock-submit'         => 'Блокиране на този потребител',
	'crosswikiblock-anononly'       => 'Блокиране само на нерегистрирани потребители',
	'crosswikiblock-nocreate'       => 'Без създаване на сметки',
	'crosswikiblock-autoblock'      => 'Автоматично блокиране на посления използван от потребителя IP адрес и всички адреси, от които направи опит за редактиране',
	'crosswikiblock-noemail'        => 'Без възможност за изпращане на е-поща',
	'crosswikiblock-nousername'     => 'Не беше въведено потребителско име',
	'crosswikiblock-local'          => 'Локалните блокирания не се поддържат от този интерфейс. Използва се [[Special:Blockip]]',
	'crosswikiblock-dbnotfound'     => 'Не съществува база данни $1',
	'crosswikiblock-noname'         => '„$1“ не е валидно потребителско име.',
	'crosswikiblock-nouser'         => 'Не беше намерен потребител „$3“',
	'crosswikiblock-noreason'       => 'Не е посочена причина.',
	'crosswikiblock-alreadyblocked' => 'Потребител $3 е вече блокиран.',
	'crosswikiblock-success'        => "Потребител '''$3''' беше блокиран успешно.

Връщане към:
* [[Special:CrosswikiBlock|Формуляра за блокиране]]
* [[$4]]",
);

/** German (Deutsch)
 * @author Raimond Spekking
 */
$messages['de'] = array(
	# Special page
	'crosswikiblock-desc'       => 'Erlaubt die Sperre von Benutzern in anderen Wikis über eine [[Special:Crosswikiblock|Spezialseite]]',
	'crosswikiblock'            => 'Sperre Benutzer in einem anderen Wiki',
	'crosswikiblock-header'     => 'Diese Spezialseite erlaubt die Sperre eines Benutzers in einem anderen Wiki.
	Bitte prüfe, ob du die Befugnis hast, in diesem anderen Wiki zu sperren und ob deine Aktion deren Richtlinien entspricht.',
	'crosswikiblock-target'     => 'IP-Adresse oder Benutzername und Zielwiki:',
	'crosswikiblock-expiry'     => 'Sperrdauer:',
	'crosswikiblock-reason'     => 'Begründung:',
	'crosswikiblock-submit'     => 'IP-Adresse/Benutzer sperren',
	'crosswikiblock-anononly'   => 'Sperre nur anonyme Benutzer (angemeldete Benutzer mit dieser IP-Adresse werden nicht gesperrt). In vielen Fällen empfehlenswert.',
	'crosswikiblock-nocreate'   => 'Erstellung von Benutzerkonten verhindern',
	'crosswikiblock-autoblock'  => 'Sperre die aktuell von diesem Benutzer genutzte IP-Adresse sowie automatisch alle folgenden, von denen aus er Bearbeitungen oder das Anlegen von Benutzeraccounts versucht.',
	'crosswikiblock-noemail'    => 'E-Mail-Versand sperren',

	# Errors and success message
	'crosswikiblock-nousername'     => 'Es wurde kein Benutzername eingegeben',
	'crosswikiblock-local'          => 'Lokale Sperren werden durch dieses Interface nicht unterstützt. Benutze [[{{#special:Blockip}}]]',
	'crosswikiblock-dbnotfound'     => 'Datenbank $1 ist nicht vorhanden',
	'crosswikiblock-noname'         => '„$1“ ist kein gültiger Benutzername.',
	'crosswikiblock-nouser'         => 'Benutzer „$3“ nicht gefunden.',
	'crosswikiblock-noexpiry'       => 'Ungültige Sperrdauer: $1.',
	'crosswikiblock-noreason'       => 'Begründung fehlt.',
	'crosswikiblock-notoken'        => 'Ungültiges Bearbeitungs-Token.',
	'crosswikiblock-alreadyblocked' => 'Benutzer „$3“ ist bereits gesperrt.',
	'crosswikiblock-success'        => "Benutzer '''„$3“''' erfolgreich gesperrt.

Zurück zu:
* [[Special:CrosswikiBlock|Sperrformular]]
* [[$4]]",
);

/** French (Français)
 * @author Grondin
 * @author Urhixidur
 */
$messages['fr'] = array(
	'crosswikiblock-desc'           => "Permet de bloquer des utilisateurs sur d'autres wikis en utilisant [[Special:Crosswikiblock|une page spéciale]]",
	'crosswikiblock'                => 'Bloquer un utilisateur sur un autre wiki',
	'crosswikiblock-header'         => 'Cette page permet de bloquer un utilisateur sur un autre wiki.

Vérifiez si vous êtes habilité pour agir sur ce wiki et que vos actions respectent toutes les règles.',
	'crosswikiblock-target'         => "Adresse IP ou nom d'utilisateur et wiki de destination :",
	'crosswikiblock-expiry'         => 'Expiration :',
	'crosswikiblock-reason'         => 'Motif :',
	'crosswikiblock-submit'         => 'Bloquer cet utilisateur',
	'crosswikiblock-anononly'       => 'Bloquer uniquement les utilisateurs anonymes',
	'crosswikiblock-nocreate'       => 'Interdire la création de compte',
	'crosswikiblock-autoblock'      => "Bloque automatiquement la dernière adresse IP utilisée par cet utilisateur, et toutes les IP subséquentes qui essaient d'éditer",
	'crosswikiblock-noemail'        => "Interdire à l'utilisateur d'envoyer un courriel",
	'crosswikiblock-nousername'     => "Aucun nom d'utilisateur n'a été indiqué",
	'crosswikiblock-local'          => 'Les blocages locaux ne sont pas supportés au travers de cette interface. Utilisez [[Special:Blockip]].',
	'crosswikiblock-dbnotfound'     => 'La base de donnée « $1 » n’existe pas',
	'crosswikiblock-noname'         => '« $1 » n’est pas un nom d’utilisateur valide.',
	'crosswikiblock-nouser'         => 'L’utilisateur « $3 » est introuvable.',
	'crosswikiblock-noexpiry'       => 'Date ou durée d’expiration incorrecte : $1.',
	'crosswikiblock-noreason'       => 'Aucun motif indiqué.',
	'crosswikiblock-notoken'        => 'Édition prise incorrecte.',
	'crosswikiblock-alreadyblocked' => 'L’utilisateur « $3 » est déjà bloqué.',
	'crosswikiblock-success'        => "L’utilisateur '''$3''' a été bloqué avec succès.

Revenir vers :
* [[Special:CrosswikiBlock|Le formulaire de blocage]] ;
* [[$4]].",
);

/** Galician (Galego)
 * @author Alma
 * @author Xosé
 */
$messages['gl'] = array(
	'crosswikiblock-desc'           => 'Permite bloquear usuarios doutros wikis mediante unha [[Special:Crosswikiblock|páxina especial]]',
	'crosswikiblock'                => 'Usuario bloqueado noutro wiki',
	'crosswikiblock-expiry'         => 'Caducidade:',
	'crosswikiblock-reason'         => 'Razón:',
	'crosswikiblock-submit'         => 'Bloquear este usuario',
	'crosswikiblock-anononly'       => 'Bloquear só usuarios anónimos',
	'crosswikiblock-nocreate'       => 'Impedir a creación de contas',
	'crosswikiblock-noemail'        => 'Advertir ao usuario do envío de correo electrónico',
	'crosswikiblock-dbnotfound'     => 'A base de datos $1 non existe',
	'crosswikiblock-noname'         => '"$1" non é un nome de usuario válido.',
	'crosswikiblock-nouser'         => 'Non se atopa o usuario "$3".',
	'crosswikiblock-noexpiry'       => 'Caducidade non válida: $1.',
	'crosswikiblock-noreason'       => 'Ningunha razón especificada.',
	'crosswikiblock-alreadyblocked' => 'O usuario $3 xa está bloqueado.',
	'crosswikiblock-success'        => "O usuario '''$3''' foi bloqueado con éxito.

Voltar a:
* [[Special:CrosswikiBlock|Formulario de bloqueo]]
* [[$4]]",
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'crosswikiblock-desc'           => 'Dowola wužiwarjow na druhich wikijach z pomocu [[Special:Crosswikiblock|specialneje strony]] blokować',
	'crosswikiblock'                => 'Wužiwarja na druhim wikiju blokować',
	'crosswikiblock-header'         => 'Tuta strona dowola wužiwarja na druhim wikiju blokować.
Prošu pruwuj, hač maš dowolnosć na tym wikiju skutkować a swoje akcije wšěm prawidłam wotpowěduja.',
	'crosswikiblock-target'         => 'IP-adresa abo wužiwarske mjeno a cilowy wiki:',
	'crosswikiblock-expiry'         => 'Spadnjenje:',
	'crosswikiblock-reason'         => 'Přičina:',
	'crosswikiblock-submit'         => 'Tutoho wužiwarja blokować',
	'crosswikiblock-anononly'       => 'Jenož anonymnych wužiwarjow blokować',
	'crosswikiblock-nocreate'       => 'Wutworjenju konta zadźěwać',
	'crosswikiblock-autoblock'      => 'Awtomatisce poslednju IPa-dresu wužitu wot tutoho wužiwarja blokować, inkluziwnje naslědnych IP-adresow, z kotrychž pospytuje wobdźěłać',
	'crosswikiblock-noemail'        => 'Słanju e-mejlkow wot wužiwarja zadźěwać',
	'crosswikiblock-nousername'     => 'Njebu wužiwarske mjeno zapodate',
	'crosswikiblock-local'          => 'Lokalne blokowanja so přez tutón interfejs njepodpěruja. Wužij [[Special:Blockip]]',
	'crosswikiblock-dbnotfound'     => 'Datowa banka $1 njeeksistuje',
	'crosswikiblock-noname'         => '"$1" płaćiwe wužiwarske mjeno njeje.',
	'crosswikiblock-nouser'         => 'Wužiwar "$3" njebu namakany.',
	'crosswikiblock-noexpiry'       => 'Njepłaćiwe spadnjenje: $1.',
	'crosswikiblock-noreason'       => 'Žana přičina podata.',
	'crosswikiblock-notoken'        => 'Njepłaćiwy wobdźełanski token.',
	'crosswikiblock-alreadyblocked' => 'Wužiwar $3 je hižo zablokowany.',
	'crosswikiblock-success'        => "Wužiwar '''$3''' wuspěšnje zablokowany.

Wróćo k:
* [[Special:CrosswikiBlock|Blokowanski formular]]
* [[$4]]",
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'crosswikiblock'                => 'E Benotzer op enger anerer Wiki spären',
	'crosswikiblock-reason'         => 'Grond:',
	'crosswikiblock-submit'         => 'Dëse Benotzer spären',
	'crosswikiblock-anononly'       => 'Nëmmen anonym Benotzer spären',
	'crosswikiblock-nousername'     => 'Dir hutt kee Benotzernumm aginn',
	'crosswikiblock-dbnotfound'     => "D'Datebank $1 gëtt et net.",
	'crosswikiblock-noname'         => '"$1" ass kee gültege Benotzernumm.',
	'crosswikiblock-nouser'         => 'De Benotzer "$3" gouf net fonnt.',
	'crosswikiblock-alreadyblocked' => 'De Benotzer $3 ass scho gespaart.',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'crosswikiblock-desc'           => 'Laat toe om gebruikers op andere wikis te blokkeren via een [[Special:Crosswikiblock|speciale pagina]]',
	'crosswikiblock'                => 'Gebruiker blokkeren op een andere wiki',
	'crosswikiblock-header'         => 'Deze pagina laat toe om gebruikers te blokkeren op een andere wiki.
Gelieve te controleren of u de juiste rechten hebt op deze wiki en of uw acties het beleid volgt.',
	'crosswikiblock-target'         => 'IP-adres of gebruikersnaam en bestemmingswiki:',
	'crosswikiblock-expiry'         => 'Duur:',
	'crosswikiblock-reason'         => 'Reden:',
	'crosswikiblock-submit'         => 'Deze gebruiker blokkeren',
	'crosswikiblock-anononly'       => 'Alleen anonieme gebruikers blokkeren',
	'crosswikiblock-nocreate'       => 'Gebruiker aanmaken voorkomen',
	'crosswikiblock-autoblock'      => "Automatisch het laatste IP-adres gebruikt door deze gebruiker blokkeren, en elke volgende IP's waarmee ze proberen te bewerken",
	'crosswikiblock-noemail'        => 'Het verzenden van e-mails door deze gebruiker voorkomen',
	'crosswikiblock-nousername'     => 'Er werd geen gebruikersnaam opgegeven',
	'crosswikiblock-local'          => 'Plaatselijke blokkades worden niet ondersteund door dit formulier. Gebruik daarvoor [[Special:Blockip]].',
	'crosswikiblock-dbnotfound'     => 'Database $1 bestaat niet',
	'crosswikiblock-noname'         => '"$1" is geen geldige gebruikersnaam.',
	'crosswikiblock-nouser'         => 'Gebruiker "$3" is niet gevonden.',
	'crosswikiblock-noexpiry'       => 'Ongeldige duur: $1.',
	'crosswikiblock-noreason'       => 'Geen reden opgegeven.',
	'crosswikiblock-notoken'        => 'Onjuist bewerkingstoken.',
	'crosswikiblock-alreadyblocked' => 'Gebruiker $3 is al geblokkeerd.',
	'crosswikiblock-success'        => "Gebruiker '''$3''' succesvol geblokkeerd.

Teruggaan naar:
* [[Special:CrosswikiBlock|Blokkeerformulier]]
* [[$4]]",
);

/** Norwegian (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'crosswikiblock-desc'           => 'Gjør det mulig å blokkere brukere på andre wikier ved hjelp av en [[Special:Crosswikiblock|spesialside]]',
	'crosswikiblock'                => 'Blokker brukere på andre wikier',
	'crosswikiblock-header'         => 'Denne siden gjør at man kan blokkere brukere på andre wikier. Sjekk om du har tillatelse til å gjøre det på denne wikien, og at du følger alle retningslinjene.',
	'crosswikiblock-target'         => 'IP-adresse eller brukernavn og målwiki:',
	'crosswikiblock-expiry'         => 'Utløper:',
	'crosswikiblock-reason'         => 'Begrunnelse:',
	'crosswikiblock-submit'         => 'Blokker denne brukeren',
	'crosswikiblock-anononly'       => '{{int:Ipbanononly}}',
	'crosswikiblock-nocreate'       => '{{int:Ipbcreateaccount}}',
	'crosswikiblock-autoblock'      => '{{int:ipbenableautoblock}}',
	'crosswikiblock-noemail'        => '{{int:ipbemailban}}',
	'crosswikiblock-nousername'     => 'Ingen brukernavn ble skrevet inn',
	'crosswikiblock-local'          => 'Lokale blokkeringer støttes ikke av dette grensesnittet. Bruk [[Special:Blockip]]',
	'crosswikiblock-dbnotfound'     => 'Databasen $1 finnes ikke',
	'crosswikiblock-noname'         => '«$1» er ikke et gyldig brukernavn.',
	'crosswikiblock-nouser'         => 'Brukeren «$3» ble ikke funnet.',
	'crosswikiblock-noexpiry'       => 'Ugyldig utløpstid: $1.',
	'crosswikiblock-noreason'       => 'Ingen begrunnelse gitt.',
	'crosswikiblock-notoken'        => 'Ugyldig redigeringstegn.',
	'crosswikiblock-alreadyblocked' => '$3 er allerede blokkert.',
	'crosswikiblock-success'        => "'''$3''' er blokkert.

Tilbake til:
* [[Special:CrosswikiBlock|Blokkeringsskjemaet]]
* [[$4]]",
);

/** Polish (Polski)
 * @author Equadus
 */
$messages['pl'] = array(
	'crosswikiblock-dbnotfound' => 'Baza $1 nie istnieje',
);

/** Portuguese (Português)
 * @author Malafaya
 */
$messages['pt'] = array(
	'crosswikiblock-desc'           => 'Permite bloquear utilizadores noutros wikis usando uma [[{{ns:special}}:Crosswikiblock|página especial]]',
	'crosswikiblock'                => 'Bloquear utilizador noutro wiki',
	'crosswikiblock-expiry'         => 'Expiração:',
	'crosswikiblock-reason'         => 'Motivo:',
	'crosswikiblock-submit'         => 'Bloquear este utilizador',
	'crosswikiblock-anononly'       => 'Bloquear apenas utilizadores anónimos',
	'crosswikiblock-nocreate'       => 'Impedir criação de conta',
	'crosswikiblock-nousername'     => 'Nenhum nome de utilizador foi introduzido',
	'crosswikiblock-dbnotfound'     => 'A base de dados $1 não existe',
	'crosswikiblock-noname'         => '"$1" não é um nome de utilizador válido.',
	'crosswikiblock-nouser'         => 'O utilizador "$3" não foi encontrado.',
	'crosswikiblock-noexpiry'       => 'Expiração inválida: $1.',
	'crosswikiblock-noreason'       => 'Nenhum motivo especificado.',
	'crosswikiblock-alreadyblocked' => 'O utilizador $3 já está bloqueado.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'crosswikiblock-desc'           => 'Umožňuje blokovanie používateľov na iných wiki pomocou [[Special:Crosswikiblock|špeciálnej stránky]]',
	'crosswikiblock'                => 'Zablokovať používateľa na inej wiki',
	'crosswikiblock-header'         => 'Táto stránka umožňuje zablokovať používateľa na inej wiki.
Prosím, overte si, či máte povolené na danej wiki konať a vaše konanie je v súlade so všetkými pravidlami.',
	'crosswikiblock-target'         => 'IP adresa alebo používateľské meno a cieľová wiki:',
	'crosswikiblock-expiry'         => 'Expirácia:',
	'crosswikiblock-reason'         => 'Dôvod:',
	'crosswikiblock-submit'         => 'Zablokovať tohto používateľa',
	'crosswikiblock-anononly'       => 'Zablokovať iba anonymných používateľov',
	'crosswikiblock-nocreate'       => 'Zabrániť tvorbe účtov',
	'crosswikiblock-autoblock'      => 'Automaticky blokovať poslednú IP adresu, ktorú tento používateľ použil a akékoľvek ďalšie adresy, z ktorých sa pokúsia upravovať.',
	'crosswikiblock-noemail'        => 'Zabrániť používateľovi odosielať email',
	'crosswikiblock-nousername'     => 'Nebolo zadané používateľské meno',
	'crosswikiblock-local'          => 'Toto rozhranie nepodporuje lokálne blokovanie. Použite [[Special:Blockip]].',
	'crosswikiblock-dbnotfound'     => 'Databáza $1 neexistuje',
	'crosswikiblock-noname'         => '„$1“ nie je platné používateľské meno.',
	'crosswikiblock-nouser'         => 'Používateľ „$3“ nebol nájdený.',
	'crosswikiblock-noexpiry'       => 'Neplatná expirácia: $1.',
	'crosswikiblock-noreason'       => 'Nebol uvedený dôvod.',
	'crosswikiblock-notoken'        => 'Neplatný upravovací token.',
	'crosswikiblock-alreadyblocked' => 'Používateľ $3 je už zablokovaný.',
	'crosswikiblock-success'        => "Používateľ '''$3''' bol úspešne zablokovaný.

Vrátiť sa na:
* [[Special:CrosswikiBlock|Blokovací formulár]]
* [[$4]]",
);

/** Swedish (Svenska)
 * @author M.M.S.
 * @author Lejonel
 */
$messages['sv'] = array(
	'crosswikiblock-desc'           => 'Gör det möjligt att blockera användare på andra wikier med hjälp av en [[Special:Crosswikiblock|specialsida]]',
	'crosswikiblock'                => 'Blockera användare på en annan wiki',
	'crosswikiblock-expiry'         => 'Utgång:',
	'crosswikiblock-reason'         => 'Anledning:',
	'crosswikiblock-submit'         => 'Blockera denna användare',
	'crosswikiblock-noname'         => '"$1" är inte ett giltigt användarnamn.',
	'crosswikiblock-alreadyblocked' => 'Användare $3 är redan blockerad.',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'crosswikiblock-reason' => 'కారణం:',
);

