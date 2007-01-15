<?php

/**
 * Internationalisation file for the Oversight extension
 */

function hrHideRevisionMessages() {
	return array(
	
/* English (Brion Vibber) */
'en' => array(
'hiderevision' => 'Permanently hide revisions',
// Empty form
'hiderevision-prompt' => 'Revision number to remove:',
'hiderevision-continue' => 'Continue',
// Confirmation form
'hiderevision-text' =>
"This should '''only''' be used for the following cases:
* Inappropriate personal information
*: ''home addresses and telephone numbers, social security numbers, etc''

'''Abuse of this system will result in loss of privileges.'''

Removed items will not be visible to anyone through the web site,
but the deletions are logged and can be restored manually by a
database administrator if you make a mistake.",
'hiderevision-reason' => 'Reason (will be logged privately):',
'hiderevision-submit' => 'Hide this data permanently',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Hide revision',
// Status & errors on action
'hiderevision-norevisions' => 'No revisions specified to delete.',
'hiderevision-noreason' => 'You must decribe the reason for this removal.',
'hiderevision-status' => 'Revision $1: $2',
'hiderevision-success' => 'Archived and deleted successfully.',
'hiderevision-error-missing' => 'Not found in database.',
'hiderevision-error-current' => 'Cannot delete the latest edit to a page. Revert this change first.',
'hiderevision-error-delete' => 'Could not archive; was it previously deleted?',
'hiderevision-archive-status' => 'Deleted revision from $1: $2',
// Logging
'oversight-log-hiderev' => 'removed an edit from $1',
// Oversight review page
'oversight' => 'Oversight',
'oversight-view' => 'details',
),

/* German (Raymond) */
'de' => array(
'hiderevision' => 'Versionen dauerhaft entfernen',
// Empty form
'hiderevision-prompt' => 'Zu entfernende Versionsnummer:',
'hiderevision-continue' => 'Weiter',
// Confirmation form
'hiderevision-text' =>
"Dies darf '''ausschließlich''' in den folgenden Fällen geschehen:
* Persönliche Informationen:
*: ''Realname, Adresse, Telefonnummer und ähnlicher privater Details''

'''Der Missbrauch dieses Systems zieht den Verlust dieser Rechte nach sich!'''

Entfernte Versionen sind durch Niemanden mehr über die Website einzusehen. 
Sie werden aber protokolliert und können bei einem Fehler durch einen Datenbankadministrator wiederhergestellt werden",
'hiderevision-reason' => 'Grund (wird unsichtbar protokolliert):',
'hiderevision-submit' => 'Entferne diese Daten dauerhaft',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Entferne Versionen',
// Status & errors on action
'hiderevision-norevisions' => 'Es wurde keine Version zum Entfernen angegeben.',
'hiderevision-noreason' => 'Sie müssen einen Grund für die Entfernung angeben.',
'hiderevision-status' => 'Version $1: $2',
'hiderevision-success' => 'Erfolgreich archiviert und entfernt.',
'hiderevision-error-missing' => 'In der Datenbank nicht gefunden.',
'hiderevision-error-current' => 'Die letzte Bearbeitung einer Seite kann nicht entfernt werden. Setze die Bearbeitung erst zurück.',
'hiderevision-error-delete' => 'Archivierung nicht möglich. Wurde sie zuvor gelöscht?',
'hiderevision-archive-status' => 'Gelöschte Versionen von $1: $2',
// Logging
'oversight-log-hiderev' => 'Entfernte eine Bearbeitung von $1',
// Oversight review page
'oversight' => 'Oversight',
'oversight-view' => 'Details',
),

/* French (Bertrand Grondin) */
'fr' => array(
'hiderevision' => 'Cacher définitivement les révisions',
// Empty form
'hiderevision-prompt' => 'Numéro d’édition à supprimer :',
'hiderevision-continue' => 'Continuer',
// Confirmation form
'hiderevision-text' =>
"Cette fonctionnalité doit être utilisée '''uniquement''' pour les cas suivants :
* Information personnelle inappropriée,
*: ''Adresse personnelle et numéro de téléphone, numéro de sécurité sociale, etc...''

''' L'abus de cette fonctionnalité impliquera la perte de ces privilèges.

Les articles effacés ne sont plus visible dans ce système, mais ces suppressions sont journalisées et peuvent être restaurées manuellement par un administrateur de la base de données si vous avez fait une erreur.",
'hiderevision-reason' => 'Motif (sera enregistré séparément) :',
'hiderevision-submit' => 'Cacher cette donnée de manière permanente',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Cacher la modification',
// Status & errors on action
'hiderevision-norevisions' => 'Aucune modification indiquée à supprimer.',
'hiderevision-noreason' => 'Vous devez indiquer la raison précise de cette suppression.',
'hiderevision-status' => 'Modification $1 : $2',
'hiderevision-success' => 'Archivé et supprimé avec succès.',
'hiderevision-error-missing' => 'Non trouvé dans la base de données.',
'hiderevision-error-current' => 'Ne peut supprimer la dernière révision dans une page. Faites une annulation d’édition auparavant.',
'hiderevision-error-delete' => 'Ne peut être archivé ; la page a peut-être été supprimée ?',
'hiderevision-archive-status' => 'Modification supprimée de $1 : $2',
// Logging
'oversight-log-hiderev' => 'a supprimé une édition de $1',
// Oversight review page
'oversight' => 'Oversight',
'oversight-view' => 'détails',
),

/* Portuguese (Lugusto) */
'pt' => array(
'hiderevision' => 'Ocultar revisões permanentemente',
// Empty form
'hiderevision-prompt' => 'Número da revisão (edição) a ser removida:',
'hiderevision-continue' => 'Avançar',
// Confirmation form
'hiderevision-text' =>
"Isto deverá ser utilizado '''apenas''' nos seguintes casos:
* Informações pessoais inadequadas
*: ''endereços residenciais e números de telefone, número do seguro social, etc''

'''Abusos com este recurso poderão resultar na perda dos privilégios de acesso.'''

Os itens removidos não estarão mais visíveis a todos neste sítio,
mas estarão registados e poderão ser restaurados manualmente
por administrador da base de dados, caso você tenha cometido um engano.",
'hiderevision-reason' => 'Motivo (será registado privadamente):',
'hiderevision-submit' => 'Ocultar estes dados permanentemente',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Ocultar revisões',
// Status & errors on action
'hiderevision-norevisions' => 'Não foram especificadas revisões a serem ocultadas.',
'hiderevision-noreason' => 'É necessário descrever o motivo para esta remoção.',
'hiderevision-status' => 'Revisão $1: $2',
'hiderevision-success' => 'Arquivado e deletado com sucesso.',
'hiderevision-error-missing' => 'Não foi localizada na base de dados.',
'hiderevision-error-current' => 'Não é possível ocultar a edição mais recente de uma página. Reverta a alteração primeiro.',
'hiderevision-error-delete' => 'Não é possível arquivar; não teria sido eliminada antes da tentativa?',
'hiderevision-archive-status' => 'Revisão ocultada de $1: $2',
// Logging
'oversight-log-hiderev' => 'removida uma edição de $1',
// Oversight review page
'oversight' => 'Oversight',
'oversight-view' => 'detalhes',
),

/* Serbian default (Sasa Stefanovic) */
'sr' => array(
'hiderevision' => 'Трајно сакриј ревизије',
// Empty form
'hiderevision-prompt' => 'Број ревизије за уклањање:',
'hiderevision-continue' => 'Настави',
// Confirmation form
'hiderevision-text' =>
"Ова опција треба да се користи '''само''' у следећим случајевима: 

* Неумесне личне информације 
*: ''кућне адресе, бројеви телефона, матични бројеви и сл.'' 

'''Злоупотреба овог система ће довести до губитка ових привилегија.'''

Уклоњене ставке неће бити видљиве никоме преко сајта, али се брисања записују 
и администратори базе података их могу ручно вратити ако направите грешку.",
'hiderevision-reason' => 'Разлог (биће записан приватно)::',
'hiderevision-submit' => 'Сакриј ове податке заувек',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Сакриј ревизију',
// Status & errors on action
'hiderevision-norevisions' => 'Није назначена ниједна ревизија за брисање.',
'hiderevision-noreason' => 'Морате дати разлог за ово уклањање.',
'hiderevision-status' => 'Ревизија $1: $2',
'hiderevision-success' => 'Успешно архивирање и брисање.',
'hiderevision-error-missing' => 'Није пронађено у бази података.',
'hiderevision-error-current' => 'Не могу да обришем најскорију измену на страници. Прво вратите измену.',
'hiderevision-error-delete' => 'Не могу да архивирам; да ли је претходно обрисана?',
'hiderevision-archive-status' => 'Обрисана ревизија из $1: $2',
// Logging
'oversight-log-hiderev' => 'уклоњена измена из $1',
// Oversight review page
'oversight' => 'Пропуст',
'oversight-view' => 'детаљи',
),

/* Serbian cyrillic (Sasa Stefanovic) */
'sr-ec' => array(
'hiderevision' => 'Трајно сакриј ревизије',
// Empty form
'hiderevision-prompt' => 'Број ревизије за уклањање:',
'hiderevision-continue' => 'Настави',
// Confirmation form
'hiderevision-text' =>
"Ова опција треба да се користи '''само''' у следећим случајевима: 

* Неумесне личне информације 
*: ''кућне адресе, бројеви телефона, матични бројеви и сл.'' 

'''Злоупотреба овог система ће довести до губитка ових привилегија.'''

Уклоњене ставке неће бити видљиве никоме преко сајта, али се брисања записују 
и администратори базе података их могу ручно вратити ако направите грешку.",
'hiderevision-reason' => 'Разлог (биће записан приватно)::',
'hiderevision-submit' => 'Сакриј ове податке заувек',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Сакриј ревизију',
// Status & errors on action
'hiderevision-norevisions' => 'Није назначена ниједна ревизија за брисање.',
'hiderevision-noreason' => 'Морате дати разлог за ово уклањање.',
'hiderevision-status' => 'Ревизија $1: $2',
'hiderevision-success' => 'Успешно архивирање и брисање.',
'hiderevision-error-missing' => 'Није пронађено у бази података.',
'hiderevision-error-current' => 'Не могу да обришем најскорију измену на страници. Прво вратите измену.',
'hiderevision-error-delete' => 'Не могу да архивирам; да ли је претходно обрисана?',
'hiderevision-archive-status' => 'Обрисана ревизија из $1: $2',
// Logging
'oversight-log-hiderev' => 'уклоњена измена из $1',
// Oversight review page
'oversight' => 'Пропуст',
'oversight-view' => 'детаљи',
),

/* Serbian latin (Sasa Stefanovic) */
'sr-el' => array(
'hiderevision' => 'Trajno sakrij revizije',
// Empty form
'hiderevision-prompt' => 'Broj revizije za uklanjanje:',
'hiderevision-continue' => 'Nastavi',
// Confirmation form
'hiderevision-text' =>
"Ova opcija treba da se koristi '''samo''' u sledećim slučajevima: 

* Neumesne lične informacije 
*: ''kućne adrese, brojevi telefona, matični brojevi i sl.'' 

'''Zloupotreba ovog sistema će dovesti do gubitka ovih privilegija.'''

Uklonjene stavke neće biti vidljive nikome preko sajta, ali se brisanja zapisuju 
i administratori baze podataka ih mogu ručno vratiti ako napravite grešku.",
'hiderevision-reason' => 'Razlog (biće zapisan privatno)::',
'hiderevision-submit' => 'Sakrij ove podatke zauvek',
// Tab displayed to allowed users on old revision display
'hiderevision-tab' => 'Sakrij reviziju',
// Status & errors on action
'hiderevision-norevisions' => 'Nije naznačena nijedna revizija za brisanje.',
'hiderevision-noreason' => 'Morate dati razlog za ovo uklanjanje.',
'hiderevision-status' => 'Revizija $1: $2',
'hiderevision-success' => 'Uspešno arhiviranje i brisanje.',
'hiderevision-error-missing' => 'Nije pronađeno u bazi podataka.',
'hiderevision-error-current' => 'Ne mogu da obrišem najskoriju izmenu na stranici. Prvo vratite izmenu.',
'hiderevision-error-delete' => 'Ne mogu da arhiviram; da li je prethodno obrisana?',
'hiderevision-archive-status' => 'Obrisana revizija iz $1: $2',
// Logging
'oversight-log-hiderev' => 'uklonjena izmena iz $1',
// Oversight review page
'oversight' => 'Propust',
'oversight-view' => 'detalji',
),

	);
}

?>
