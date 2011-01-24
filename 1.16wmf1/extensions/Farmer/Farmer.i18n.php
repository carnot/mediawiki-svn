<?php
/**
 * Internationalisation file for Farmer extension.
 *
 * @addtogroup Extensions
 */

$messages = array();

# Original messages by Gregory Szorc <gregory.szorc@gmail.com>
$messages['en'] = array (
	'farmer'                                 => 'Farmer',
	'farmer-desc'                            => 'Manage a MediaWiki farm',
	'farmercantcreatewikis'                  => 'You are unable to create wikis because you do not have the createwikis privilege',
	'farmercreateurl'                        => 'URL',
	'farmercreatesitename'                   => 'Site name',
	'farmercreatenextstep'                   => 'Next step',
	'farmernewwikimainpage'                  =>  "== Welcome to your wiki ==
If you are reading this, your new wiki has been installed correctly.
You can [[Special:Farmer|customize your wiki]].",
	'farmerwikiurl'                          => 'http://$1.myfarm',
	'farmerinterwikiurl'                     => 'http://$1.myfarm/$2',
	'farmer-about'                           => 'About',
	'farmer-about-text'                      => 'MediaWiki Farmer allows you to manage a farm of MediaWiki wikis.',
	'farmer-list-wiki'                       => 'List of wikis',
	'farmer-list-wiki-text'                  => '[[$1|List]] all wikis on {{SITENAME}}',
	'farmer-createwiki'                      => 'Create a wiki',
	'farmer-createwiki-text'                 => '[[$1|Create]] a new wiki now!',
	'farmer-administration'                  => 'Farm administration',
	'farmer-administration-extension'        => 'Manage extensions',
	'farmer-administration-extension-text'   => '[[$1|Manage]] installed extensions.',
	'farmer-admimistration-listupdate'       => 'Farm list update', # Should this be Update farm list instead?
	'farmer-admimistration-listupdate-text'  => '[[$1|Update]] list of wikis on {{SITENAME}}',
	'farmer-administration-delete'           => 'Delete a wiki',
	'farmer-administration-delete-text'      => '[[$1|Delete]] a wiki from the farm',
	'farmer-administer-thiswiki'             => 'Administer this wiki',
	'farmer-administer-thiswiki-text'        => '[[$1|Administer]] changes to this wiki',
	'farmer-notavailable'                    => 'Not available',
	'farmer-notavailable-text'               => 'This feature is only available on the main wiki',
	'farmer-wikicreated'                     => 'Wiki created',
	'farmer-wikicreated-text'                => 'Your wiki has been created.
It is accessible at $1',
	'farmer-default'                         => 'By default, nobody has permissions on this wiki except you.
You can change the user privileges via $1',
	'farmer-wikiexists'                      => 'Wiki exists',
	'farmer-wikiexists-text'                 => 'The wiki you are attempting to create, \'\'\'$1\'\'\', already exists.
Please go back and try another name.',
	'farmer-confirmsetting'                  => 'Confirm wiki settings',
	'farmer-confirmsetting-name'             => 'Name',
	'farmer-confirmsetting-title'            => 'Title',
	'farmer-confirmsetting-description'      => 'Description',
	'farmer-confirmsetting-reason'           => 'Reason',
	'farmer-description'                     => 'Description',
	'farmer-confirmsetting-text'             => 'Your wiki, \'\'\'$1\'\'\', will be accessible via $3.
The project namespace will be \'\'\'$2\'\'\'.
Links to this namespace will be of the form \'\'\'<nowiki>[[$2:Page name]]</nowiki>\'\'\'.
If this is what you want, press the \'\'\'confirm\'\'\' button below.',
	'farmer-button-confirm'                  => 'Confirm',
	'farmer-button-submit'                   => 'Submit',
	'farmer-createwiki-form-title'           => 'Create a wiki',
	'farmer-createwiki-form-text1'           => 'Use the form below to create a new wiki.',
	'farmer-createwiki-form-help'            => 'Help',
	'farmer-createwiki-form-text2'           => "; Wiki name: The name of the wiki.
Contains only letters and numbers.
The wiki name will be used as part of the URL to identify your wiki.
For example, if you enter '''title''', then your wiki will be accessed via <nowiki>http://</nowiki>'''title'''.mydomain.",
	'farmer-createwiki-form-text3'           => '; Wiki title: Title of the wiki.
Will be used in the title of every page on your wiki.
Will also be the project namespace and interwiki prefix.',
	'farmer-createwiki-form-text4'           => '; Description: Description of wiki.
This is a text description about the wiki.
This will be displayed in the wiki list.',
	'farmer-createwiki-user'                 => 'Username',
	'farmer-createwiki-name'                 => 'Wiki name',
	'farmer-createwiki-title'                => 'Wiki title',
	'farmer-createwiki-description'          => 'Description',
	'farmer-createwiki-reason'               => 'Reason',
	'farmer-updatedlist'                     => 'Updated list',
	'farmer-notaccessible'                   => 'Not accessible',
	'farmer-notaccessible-test'              => 'This feature is only available on the parent wiki in the farm',
	'farmer-permissiondenied'                => 'Permission denied',
	'farmer-permissiondenied-text'           => 'You do not have permission to delete a wiki from the farm',
	'farmer-permissiondenied-text1'          => 'You do not have permission to access this page',
	'farmer-deleting'                        => 'The wiki "$1" has been deleted',
	'farmer-delete-confirm'                  => 'I confirm that I want to delete this wiki',
	'farmer-delete-confirm-wiki'             => "Wiki to delete: '''$1'''.",
	'farmer-delete-reason'                   => 'Reason for the deletion:',
	'farmer-delete-title'                    => 'Delete wiki',
	'farmer-delete-text'                     => 'Please select the wiki from the list below that you wish to delete',
	'farmer-delete-form'                     => 'Select a wiki',
	'farmer-delete-form-submit'              => 'Delete',
	'farmer-listofwikis'                     => 'List of wikis',
	'farmer-mainpage'                        => 'Main Page',
	'farmer-basic-title'                     => 'Basic parameters',
	'farmer-basic-title1'                    => 'Title',
	'farmer-basic-title1-text'               => 'Your wiki does not have a title. Set one <b>now</b>',
	'farmer-basic-description'               => 'Description',
	'farmer-basic-description-text'          => 'Set the description of your wiki below',
	'farmer-basic-permission'                => 'Permissions',
	'farmer-basic-permission-text'           => 'Using the form below, it is possible to alter permissions for users of this wiki.',
	'farmer-basic-permission-visitor'        => 'Permissions for every visitor',
	'farmer-basic-permission-visitor-text'   => 'The following permissions will be applied to every person who visits this wiki',
	'farmer-yes'                             => 'Yes',
	'farmer-no'                              => 'No',
	'farmer-basic-permission-user'           => 'Permissions for logged-in users',
	'farmer-basic-permission-user-text'      => 'The following permissions will be applied to every person who is logged into this wiki',
	'farmer-setpermission'                   => 'Set permissions',
	'farmer-defaultskin'                     => 'Default skin',
	'farmer-defaultskin-button'              => 'Set default skin',
	'farmer-extensions'                      => 'Active extensions',
	'farmer-extensions-button'               => 'Set active extensions',
	'farmer-extensions-extension-denied'     => 'You do not have permission to use this feature.
You must be a member of the farmeradmin group',
	'farmer-extensions-invalid'              => 'Invalid extension',
	'farmer-extensions-invalid-text'         => 'We could not add the extension because the file selected for inclusion could not be found',
	'farmer-extensions-available'            => 'Available extensions',
	'farmer-extensions-noavailable'          => 'No extensions are registered',
	'farmer-extensions-register'             => 'Register extension',
	'farmer-extensions-register-text1'       => 'Use the form below to register a new extension with the farm.
Once an extension is registered, all wikis will be able to use it.',
	'farmer-extensions-register-text2'       => "For the ''Include file'' parameter, enter the name of the PHP file as you would in LocalSettings.php.",
	'farmer-extensions-register-text3'       => "If the filename contains '''\$root''', that variable will be replaced with the MediaWiki root directory.",
	'farmer-extensions-register-text4'       => 'The current include paths are:',
	'farmer-extensions-register-name'        => 'Name',
	'farmer-extensions-register-includefile' => 'Include file',
	'farmer-error-exists'                    => 'Cannot create wiki. It already exists: $1',
	'farmer-error-noextwrite'                => 'Unable to write out extension file:',
	'farmer-log-name'                        => 'Wiki farm log',
	'farmer-log-header'                      => 'This is a log of changes made to the wiki farm.',
	'farmer-log-create'                      => 'created the wiki "$2"',
	'farmer-log-delete'                      => 'deleted the wiki "$2"',
	'right-farmeradmin'                      => 'Manage the wiki farm',
	'right-createwiki'                       => 'Create wikis in the wiki farm',
);

/** Message documentation (Message documentation)
 * @author Darth Kule
 * @author Fryed-peach
 * @author Jon Harald Søby
 * @author Meno25
 * @author Nike
 * @author Purodha
 */
$messages['qqq'] = array(
	'farmer-desc' => 'Shown in [[Special:Version]] as a short description of this extension. Do not translate links.',
	'farmercreateurl' => '{{optional}}',
	'farmernewwikimainpage' => 'Do not translate or change links.',
	'farmer-about' => '{{Identical|About}}',
	'farmer-list-wiki' => '{{Identical|List of wikis}}',
	'farmer-createwiki' => '{{Identical|Create a wiki}}',
	'farmer-confirmsetting-name' => '{{Identical|Name}}',
	'farmer-confirmsetting-title' => '{{Identical|Title}}',
	'farmer-confirmsetting-description' => '{{Identical|Description}}',
	'farmer-confirmsetting-reason' => '{{Identical|Reason}}',
	'farmer-description' => '{{Identical|Description}}',
	'farmer-confirmsetting-text' => 'You can ignore the warning about problematic link for now.',
	'farmer-button-confirm' => '{{Identical|Confirm}}',
	'farmer-button-submit' => '{{Identical|Submit}}',
	'farmer-createwiki-form-title' => '{{Identical|Create a wiki}}',
	'farmer-createwiki-form-help' => '{{Identical|Help}}',
	'farmer-createwiki-user' => '{{Identical|Username}}',
	'farmer-createwiki-description' => '{{Identical|Description}}',
	'farmer-createwiki-reason' => '{{Identical|Reason}}',
	'farmer-permissiondenied' => '{{Identical|Permission denied}}',
	'farmer-deleting' => '',
	'farmer-delete-form-submit' => '{{Identical|Delete}}',
	'farmer-listofwikis' => '{{Identical|List of wikis}}',
	'farmer-mainpage' => '{{Identical|Main page}}',
	'farmer-basic-title1' => '{{Identical|Title}}',
	'farmer-basic-description' => '{{Identical|Description}}',
	'farmer-yes' => '{{Identical|Yes}}',
	'farmer-no' => '{{Identical|No}}',
	'farmer-extensions-register-name' => '{{Identical|Name}}',
	'right-farmeradmin' => '{{doc-right|farmeradmin}}',
	'right-createwiki' => '{{doc-right|createwiki}}',
);

/** Faeag Rotuma (Faeag Rotuma)
 * @author Jose77
 */
$messages['rtm'] = array(
	'farmer-about' => 'Hün se',
	'farmer-createwiki-user' => 'Asa',
	'farmer-mainpage' => 'Pej Maha',
);

/** Karelian (Karjala)
 * @author Flrn
 */
$messages['krl'] = array(
	'farmer-mainpage' => 'Piälehyt',
	'farmer-basic-permission-upload' => 'Panna fajlit',
);

/** Niuean (ko e vagahau Niuē)
 * @author Jose77
 */
$messages['niu'] = array(
	'farmer-createwiki-form-help' => 'Lagomatai',
	'farmer-createwiki-user' => 'Matahigoa he tagata',
	'farmer-delete-form-submit' => 'Tamate',
	'farmer-mainpage' => 'Matapatu Lau',
);

/** Goanese Konkani (Latin) (कोंकणी/Konknni  (Latin))
 * @author Deepak D'Souza
 */
$messages['gom-latn'] = array(
	'farmer-basic-permission-upload' => 'fileo dhadd',
);

/** Afrikaans (Afrikaans)
 * @author Arnobarnard
 * @author Naudefj
 */
$messages['af'] = array(
	'farmer-confirmsetting' => 'Bevestig Wiki Opstelling',
	'farmer-confirmsetting-name' => 'Naam',
	'farmer-confirmsetting-title' => 'Titel',
	'farmer-description' => 'Beskrywing',
	'farmer-button-confirm' => 'Bevestig',
	'farmer-createwiki-form-help' => 'Hulp',
	'farmer-createwiki-user' => 'Gebruikersnaam',
	'farmer-delete-form-submit' => 'Skrap',
	'farmer-mainpage' => 'Tuisblad',
	'farmer-basic-title1' => 'Titel',
	'farmer-basic-description' => 'Beskrywing',
	'farmer-yes' => 'Ja',
	'farmer-no' => 'Nee',
	'farmer-extensions-register-name' => 'Naam',
);

/** Amharic (አማርኛ)
 * @author Codex Sinaiticus
 */
$messages['am'] = array(
	'farmer-confirmsetting-name' => 'ስም',
	'farmer-confirmsetting-title' => 'አርዕስት',
	'farmer-mainpage' => 'ዋና ገጽ',
	'farmer-basic-title1' => 'አርዕስት',
	'farmer-yes' => 'አዎ',
	'farmer-extensions-register-name' => 'ስም',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'farmer-confirmsetting-name' => 'Nombre',
	'farmer-button-confirm' => 'Confirmar',
	'farmer-button-submit' => 'Nimbiar',
	'farmer-extensions-register-name' => 'Nombre',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'farmer' => 'مزارع',
	'farmer-desc' => 'التحكم بمزرعة ميدياويكي',
	'farmercantcreatewikis' => 'أنت غير قادر على إنشاء ويكيات لأنك لا تمتلك الصلاحية createwikis',
	'farmercreateurl' => 'مسار',
	'farmercreatesitename' => 'اسم الموقع',
	'farmercreatenextstep' => 'الخطوة التالية',
	'farmernewwikimainpage' => '== مرحبا في الويكي الخاص بك ==
لو أنك تقرأ هذا، فالويكي الجديد الخاص بك تم تنصيبه بشكل صحيح.
يمكنك [[Special:Farmer|تخصيص الويكي الخاص بك]].',
	'farmer-about' => 'حول',
	'farmer-about-text' => 'مزارع ميدياويكي يسمح لك بإدارة مزرعة من ويكيات ميدياويكي.',
	'farmer-list-wiki' => 'قائمة الويكيات',
	'farmer-list-wiki-text' => '[[$1|عرض]] كل الويكيات في {{SITENAME}}',
	'farmer-createwiki' => 'إنشاء ويكي',
	'farmer-createwiki-text' => '[[$1|إنشاء]] ويكي جديد الآن!',
	'farmer-administration' => 'إدارة المزرعة',
	'farmer-administration-extension' => 'التحكم بالامتدادات',
	'farmer-administration-extension-text' => '[[$1|التحكم]] بالامتدادات المنصبة.',
	'farmer-admimistration-listupdate' => 'تحديث قائمة المزرعة',
	'farmer-admimistration-listupdate-text' => '[[$1|تحديث]] قائمة الويكيات في {{SITENAME}}',
	'farmer-administration-delete' => 'حذف ويكي',
	'farmer-administration-delete-text' => '[[$1|حذف]] ويكي من المزرعة',
	'farmer-administer-thiswiki' => 'إدارة هذه الويكي',
	'farmer-administer-thiswiki-text' => '[[$1|إدارة]] التغييرات إلى هذه الويكي',
	'farmer-notavailable' => 'غير متوفرة',
	'farmer-notavailable-text' => 'هذه الخاصية متوفرة فقط في الويكي الرئيسي',
	'farmer-wikicreated' => 'الويكي تم إنشاؤه',
	'farmer-wikicreated-text' => 'الويكي الخاص بك تم إنشاؤه.
يمكن الوصول إليه في $1',
	'farmer-default' => 'افتراضيا، لا أحد لديه سماحات في هذا الويكي فيماعداك.
يمكنك تغيير صلاحيات المستخدم من خلال $1',
	'farmer-wikiexists' => 'الويكي موجود',
	'farmer-wikiexists-text' => "الويكي التي تحاول إنشاءه، '''$1'''، موجود بالفعل.
من فضلك عد وجرب اسما آخر.",
	'farmer-confirmsetting' => 'تأكيد إعدادات الويكي',
	'farmer-confirmsetting-name' => 'الاسم',
	'farmer-confirmsetting-title' => 'العنوان',
	'farmer-confirmsetting-description' => 'الوصف',
	'farmer-confirmsetting-reason' => 'السبب',
	'farmer-description' => 'وصف',
	'farmer-confirmsetting-text' => "الويكي الخاص بك، '''$1'''، سيمكن الوصول إليه من خلال $3.
نطاق المشروع سيصبح '''$2'''.
الوصلات إلى هذا النطاق ستكون من الشكل '''<nowiki>[[$2:Page name]]</nowiki>'''.
لو أن هذا ما تريده، اضغط زر '''تأكيد''' بالأسفل.",
	'farmer-button-confirm' => 'تأكيد',
	'farmer-button-submit' => 'تنفيذ',
	'farmer-createwiki-form-title' => 'إنشاء ويكي',
	'farmer-createwiki-form-text1' => 'استخدم الاستمارة بالأسفل لإنشاء ويكي جديدة.',
	'farmer-createwiki-form-help' => 'مساعدة',
	'farmer-createwiki-form-text2' => "; اسم الويكي: الاسم الخاص بالويكي.
يحتوي فقط على حروف وأرقام.
اسم الويكي سيستخدم كجزء من المسار للتعرف على الويكي الخاصة بك.
على سبيل المثال، لو أنك أدخلت '''title'''، فسيصبح الويكي الخاص بك متاحا للوصول إليها من خلال <nowiki>http://</nowiki>'''title'''.mydomain.",
	'farmer-createwiki-form-text3' => '; عنوان الويكي: العنوان الخاص بالويكي.
سيستخدم في عنوان كل صفحة في الويكي الخاصة بك.
سيصبح أيضا نطاق المشروع وبادئة الإنترويكي.',
	'farmer-createwiki-form-text4' => '; الوصف: وصف الويكي.
هذا نص لوصف الويكي.
هذا سيعرض في قائمة الويكي.',
	'farmer-createwiki-user' => 'اسم المستخدم',
	'farmer-createwiki-name' => 'اسم الويكي',
	'farmer-createwiki-title' => 'عنوان الويكي',
	'farmer-createwiki-description' => 'الوصف',
	'farmer-createwiki-reason' => 'السبب',
	'farmer-updatedlist' => 'قائمة محدثة',
	'farmer-notaccessible' => 'لا يمكن الوصول إليه',
	'farmer-notaccessible-test' => 'هذه الخاصية متوفرة فقط في الويكي الأساسي في المزرعة',
	'farmer-permissiondenied' => 'السماح مرفوض',
	'farmer-permissiondenied-text' => 'أنت لا تمتلك السماح لحذف ويكي من المزرعة',
	'farmer-permissiondenied-text1' => 'أنت لا تمتلك السماح لرؤية هذه الصفحة',
	'farmer-deleting' => 'الويكي "$1" تم حذفه',
	'farmer-delete-confirm' => 'أنا أؤكد أنني أريد حذف هذا الويكي',
	'farmer-delete-confirm-wiki' => "الويكي للحذف: '''$1'''.",
	'farmer-delete-reason' => 'السبب للحذف:',
	'farmer-delete-title' => 'حذف الويكي',
	'farmer-delete-text' => 'من فضلك اختر الويكي من القائمة بالأسفل الذي ترغب في حذفه',
	'farmer-delete-form' => 'اختر ويكي',
	'farmer-delete-form-submit' => 'حذف',
	'farmer-listofwikis' => 'قائمة الويكيات',
	'farmer-mainpage' => 'الصفحة الرئيسية',
	'farmer-basic-title' => 'المحددات الأساسية',
	'farmer-basic-title1' => 'عنوان',
	'farmer-basic-title1-text' => 'الويكي الخاص بك لا يمتلك عنوانا.  حدد واحدا <b>الآن</b>',
	'farmer-basic-description' => 'وصف',
	'farmer-basic-description-text' => 'ضع وصف الويكي الخاصة بك بالأسفل',
	'farmer-basic-permission' => 'سماحات',
	'farmer-basic-permission-text' => 'باستخدام الاستمارة بالأسفل، من الممكن تعديل السماحات لمستخدمي هذا الويكي.',
	'farmer-basic-permission-visitor' => 'السماحات لكل زائر',
	'farmer-basic-permission-visitor-text' => 'السماحات التالية سيتم تطبيقها على كل شخص يزور هذه الويكي',
	'farmer-yes' => 'نعم',
	'farmer-no' => 'لا',
	'farmer-basic-permission-user' => 'السماحات للمستخدمين المسجلين',
	'farmer-basic-permission-user-text' => 'السماحات التالية سيتم تطبيقها على كل شخص مسجل للدخول إلى هذا الويكي',
	'farmer-setpermission' => 'ضبط السماحات',
	'farmer-defaultskin' => 'الواجهة الافتراضية',
	'farmer-defaultskin-button' => 'ضبط الواجهة الافتراضية',
	'farmer-extensions' => 'الامتدادات النشطة',
	'farmer-extensions-button' => 'ضبط الامتدادات النشطة',
	'farmer-extensions-extension-denied' => 'أنت لا تمتلك السماح لاستخدام هذه الخاصية.
يجب أن تكون عضوا في مجموعة إداريي المزرعة',
	'farmer-extensions-invalid' => 'امتداد غير صحيح',
	'farmer-extensions-invalid-text' => 'لم يمكننا إضافة الامتداد لأن الملف المختار للتضمين لم يمكن إيجاده',
	'farmer-extensions-available' => 'الامتدادات المتوفرة',
	'farmer-extensions-noavailable' => 'لا امتدادات مسجلة',
	'farmer-extensions-register' => 'تسجيل امتداد',
	'farmer-extensions-register-text1' => 'استخدم الاستمارة بالأسفل لتسجيل امتداد جديد للمزرعة.
متى تم تسجيل امتداد ما، كل الويكيات ستصبح قادرة على استخدامه.',
	'farmer-extensions-register-text2' => "لمحدد ''Include File''، أدخل اسم ملف PHP كما كنت ستفعل في LocalSettings.php.",
	'farmer-extensions-register-text3' => "لو أن اسم الملف يحتوي على '''\$root'''، هذا المتغير سيتم استبداله بمجلد الجذر للميدياويكي.",
	'farmer-extensions-register-text4' => 'مسارات التضمين الحالية هي:',
	'farmer-extensions-register-name' => 'الاسم',
	'farmer-extensions-register-includefile' => 'ضمن الملف',
	'farmer-error-exists' => 'لم يمكن إنشاء الويكي.  هو موجود بالفعل: $1',
	'farmer-error-noextwrite' => 'غير قادر على كتابة ملف الامتداد:',
	'farmer-log-name' => 'سجل مزرعة الويكي',
	'farmer-log-header' => 'هذا سجل بالتغييرات المعمولة لمزرعة الويكي.',
	'farmer-log-create' => 'أنشأ الويكي "$2"',
	'farmer-log-delete' => 'حذف الويكي "$2"',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 */
$messages['arz'] = array(
	'farmer' => 'مزارع',
	'farmer-desc' => 'التحكم بمزرعة ميدياويكي',
	'farmercantcreatewikis' => 'أنت غير قادر على إنشاء ويكيات لأنك لا تمتلك الصلاحية createwikis',
	'farmercreateurl' => 'مسار',
	'farmercreatesitename' => 'اسم الموقع',
	'farmercreatenextstep' => 'الخطوة التالية',
	'farmernewwikimainpage' => '== مرحبا فى الويكى الخاص بك ==
لو أنك تقرأ هذا، فالويكى الجديد الخاص بك تم تنصيبه بشكل صحيح.
يمكنك [[Special:Farmer|تخصيص الويكى الخاص بك]].',
	'farmer-about' => 'حول',
	'farmer-about-text' => 'مزارع ميدياويكى يسمح لك بإدارة مزرعة من ويكيات ميدياويكي.',
	'farmer-list-wiki' => 'قائمة الويكيات',
	'farmer-list-wiki-text' => '[[$1|عرض]] كل الويكيات فى {{SITENAME}}',
	'farmer-createwiki' => 'إنشاء ويكي',
	'farmer-createwiki-text' => '[[$1|إنشاء]] ويكى جديد الآن!',
	'farmer-administration' => 'إدارة المزرعة',
	'farmer-administration-extension' => 'التحكم بالامتدادات',
	'farmer-administration-extension-text' => '[[$1|التحكم]] بالامتدادات المنصبة.',
	'farmer-admimistration-listupdate' => 'تحديث قائمة المزرعة',
	'farmer-admimistration-listupdate-text' => '[[$1|تحديث]] قائمة الويكيات فى {{SITENAME}}',
	'farmer-administration-delete' => 'حذف ويكي',
	'farmer-administration-delete-text' => '[[$1|حذف]] ويكى من المزرعة',
	'farmer-administer-thiswiki' => 'إدارة هذه الويكي',
	'farmer-administer-thiswiki-text' => '[[$1|إدارة]] التغييرات إلى هذه الويكي',
	'farmer-notavailable' => 'غير متوفرة',
	'farmer-notavailable-text' => 'هذه الخاصية متوفرة فقط فى الويكى الرئيسي',
	'farmer-wikicreated' => 'الويكى تم إنشاؤه',
	'farmer-wikicreated-text' => 'الويكى الخاص بك تم إنشاؤه.
يمكن الوصول إليه فى $1',
	'farmer-default' => 'افتراضيا، لا أحد لديه سماحات فى هذا الويكى فيماعداك.
يمكنك تغيير صلاحيات المستخدم من خلال $1',
	'farmer-wikiexists' => 'الويكى موجود',
	'farmer-wikiexists-text' => "الويكى التى تحاول إنشاءه، '''$1'''، موجود بالفعل.
من فضلك عد وجرب اسما آخر.",
	'farmer-confirmsetting' => 'تأكيد إعدادات الويكي',
	'farmer-confirmsetting-name' => 'الاسم',
	'farmer-confirmsetting-title' => 'العنوان',
	'farmer-confirmsetting-description' => 'الوصف',
	'farmer-description' => 'وصف',
	'farmer-confirmsetting-text' => "الويكى الخاص بك، '''$1'''، سيمكن الوصول إليه من خلال $3.
نطاق المشروع سيصبح '''$2'''.
الوصلات إلى هذا النطاق ستكون من الشكل '''<nowiki>[[$2:Page name]]</nowiki>'''.
لو أن هذا ما تريده، اضغط زر '''تأكيد''' بالأسفل.",
	'farmer-button-confirm' => 'تأكيد',
	'farmer-button-submit' => 'تنفيذ',
	'farmer-createwiki-form-title' => 'إنشاء ويكي',
	'farmer-createwiki-form-text1' => 'استخدم الاستمارة بالأسفل لإنشاء ويكى جديدة.',
	'farmer-createwiki-form-help' => 'مساعدة',
	'farmer-createwiki-form-text2' => "; اسم الويكي: الاسم الخاص بالويكي.
يحتوى فقط على حروف وأرقام.
اسم الويكى سيستخدم كجزء من المسار للتعرف على الويكى الخاصة بك.
على سبيل المثال، لو أنك أدخلت '''title'''، فسيصبح الويكى الخاص بك متاحا للوصول إليها من خلال <nowiki>http://</nowiki>'''title'''.mydomain.",
	'farmer-createwiki-form-text3' => '; عنوان الويكي: العنوان الخاص بالويكي.
سيستخدم فى عنوان كل صفحة فى الويكى الخاصة بك.
سيصبح أيضا نطاق المشروع وبادئة الإنترويكي.',
	'farmer-createwiki-form-text4' => '; الوصف: وصف الويكي.
هذا نص لوصف الويكي.
هذا سيعرض فى قائمة الويكي.',
	'farmer-createwiki-user' => 'اسم المستخدم',
	'farmer-createwiki-name' => 'اسم الويكي',
	'farmer-createwiki-title' => 'عنوان الويكي',
	'farmer-createwiki-description' => 'الوصف',
	'farmer-updatedlist' => 'قائمة محدثة',
	'farmer-notaccessible' => 'لا يمكن الوصول إليه',
	'farmer-notaccessible-test' => 'هذه الخاصية متوفرة فقط فى الويكى الأساسى فى المزرعة',
	'farmer-permissiondenied' => 'السماح مرفوض',
	'farmer-permissiondenied-text' => 'أنت لا تمتلك السماح لحذف ويكى من المزرعة',
	'farmer-permissiondenied-text1' => 'أنت لا تمتلك السماح لرؤية هذه الصفحة',
	'farmer-deleting' => 'حذف $1',
	'farmer-delete-title' => 'حذف الويكي',
	'farmer-delete-text' => 'من فضلك اختر الويكى من القائمة بالأسفل الذى ترغب فى حذفه',
	'farmer-delete-form' => 'اختر ويكي',
	'farmer-delete-form-submit' => 'حذف',
	'farmer-listofwikis' => 'قائمة الويكيات',
	'farmer-mainpage' => 'الصفحة الرئيسية',
	'farmer-basic-title' => 'المحددات الأساسية',
	'farmer-basic-title1' => 'عنوان',
	'farmer-basic-title1-text' => 'الويكى الخاص بك لا يمتلك عنوانا.  حدد واحدا <b>الآن</b>',
	'farmer-basic-description' => 'وصف',
	'farmer-basic-description-text' => 'ضع وصف الويكى الخاصة بك بالأسفل',
	'farmer-basic-permission' => 'سماحات',
	'farmer-basic-permission-text' => 'باستخدام الاستمارة بالأسفل، من الممكن تعديل السماحات لمستخدمى هذا الويكي.',
	'farmer-basic-permission-visitor' => 'السماحات لكل زائر',
	'farmer-basic-permission-visitor-text' => 'السماحات التالية سيتم تطبيقها على كل شخص يزور هذه الويكي',
	'farmer-yes' => 'نعم',
	'farmer-no' => 'لا',
	'farmer-basic-permission-user' => 'السماحات للمستخدمين المسجلين',
	'farmer-basic-permission-user-text' => 'السماحات التالية سيتم تطبيقها على كل شخص مسجل للدخول إلى هذا الويكي',
	'farmer-setpermission' => 'ضبط السماحات',
	'farmer-defaultskin' => 'الواجهة الافتراضية',
	'farmer-defaultskin-button' => 'ضبط الواجهة الافتراضية',
	'farmer-extensions' => 'الامتدادات النشطة',
	'farmer-extensions-button' => 'ضبط الامتدادات النشطة',
	'farmer-extensions-extension-denied' => 'أنت لا تمتلك السماح لاستخدام هذه الخاصية.
يجب أن تكون عضوا فى مجموعة إداريى المزرعة',
	'farmer-extensions-invalid' => 'امتداد غير صحيح',
	'farmer-extensions-invalid-text' => 'لم يمكننا إضافة الامتداد لأن الملف المختار للتضمين لم يمكن إيجاده',
	'farmer-extensions-available' => 'الامتدادات المتوفرة',
	'farmer-extensions-noavailable' => 'لا امتدادات مسجلة',
	'farmer-extensions-register' => 'تسجيل امتداد',
	'farmer-extensions-register-text1' => 'استخدم الاستمارة بالأسفل لتسجيل امتداد جديد للمزرعة.
متى تم تسجيل امتداد ما، كل الويكيات ستصبح قادرة على استخدامه.',
	'farmer-extensions-register-text2' => "لمحدد ''Include File''، أدخل اسم ملف PHP كما كنت ستفعل فى LocalSettings.php.",
	'farmer-extensions-register-text3' => "لو أن اسم الملف يحتوى على '''\$root'''، هذا المتغير سيتم استبداله بمجلد الجذر للميدياويكي.",
	'farmer-extensions-register-text4' => 'مسارات التضمين الحالية هي:',
	'farmer-extensions-register-name' => 'الاسم',
	'farmer-extensions-register-includefile' => 'ضمن الملف',
	'farmer-error-exists' => 'لم يمكن إنشاء الويكي.  هو موجود بالفعل: $1',
	'farmer-error-noextwrite' => 'غير قادر على كتابة ملف الامتداد:',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 */
$messages['be-tarask'] = array(
	'farmer' => 'Фэрмэр',
	'farmer-desc' => 'Кіраваньне фэрмай MediaWiki',
	'farmercantcreatewikis' => 'Вы ня можаце стварыць вікі, таму што ня маеце адпаведных правоў',
	'farmercreatesitename' => 'Назва сайта',
	'farmercreatenextstep' => 'Наступны крок',
	'farmernewwikimainpage' => '== Вітаем у Вашай вікі ==
Калі Вы чытаеце гэты тэкст, гэта азначае, што Вашая новая вікі была пасьпяхова ўсталяваная.
Вы можаце далей [[Special:Farmer|канфігураваць Вашую вікі]].',
	'farmer-about' => 'Пра фэрму',
	'farmer-about-text' => 'Пашырэньне фэрмер MediaWiki дазваляе Вам кіраваць фэрмай (групай сэрвэраў) вікі.',
	'farmer-list-wiki' => 'Сьпіс вікі',
	'farmer-list-wiki-text' => '[[$1|Сьпіс]] усіх вікі на сайце {{SITENAME}}',
	'farmer-createwiki' => 'Стварыць вікі',
	'farmer-createwiki-text' => '[[$1|Стварыць]] новую вікі!',
	'farmer-administration' => 'Кіраваньне фэрмай',
	'farmer-administration-extension' => 'Кіраваньне пашырэньнямі',
	'farmer-administration-extension-text' => '[[$1|Кіраваньне]] усталяванымі пашырэньнямі.',
	'farmer-admimistration-listupdate' => 'Абнаўленьне сьпісу фэрмаў',
	'farmer-admimistration-listupdate-text' => '[[$1|Абнаўленьне]] сьпісу вікі на сайце {{SITENAME}}',
	'farmer-administration-delete' => 'Выдаліць вікі',
	'farmer-administration-delete-text' => '[[$1|Выдаліць]] вікі з фэрмы',
	'farmer-administer-thiswiki' => 'Кіраваць гэтай вікі',
	'farmer-administer-thiswiki-text' => '[[$1|Адміністратыўныя]] зьмены ў гэтай вікі',
	'farmer-notavailable' => 'Не даступна',
	'farmer-notavailable-text' => 'Гэта магчымасьць даступна толькі ў галоўнай вікі',
	'farmer-wikicreated' => 'Вікі створаная',
	'farmer-wikicreated-text' => 'Ваша вікі была створаная.
Яна даступная на $1',
	'farmer-default' => 'Па змоўчваньні, ніхто, акрамя Вас, ня мае правоў у гэтай вікі.
Вы можаце зьмяніць правы ўдзельнікаў праз $1',
	'farmer-wikiexists' => 'Вікі існуе',
	'farmer-wikiexists-text' => "Вікі '''$1''', якую Вы спрабуеце стварыць, ужо існуе.
Калі ласка, вярніцеся і паспрабуйце іншую назву.",
	'farmer-confirmsetting' => 'Пацьвердзіць устаноўкі вікі',
	'farmer-confirmsetting-name' => 'Назва',
	'farmer-confirmsetting-title' => 'Назва',
	'farmer-confirmsetting-description' => 'Апісаньне',
	'farmer-confirmsetting-reason' => 'Прычына',
	'farmer-description' => 'Апісаньне',
	'farmer-confirmsetting-text' => "Ваша вікі, '''$1''', будзе даступна па адрасу $3.
Прастора назваў праекту будзе '''$2'''.
Спасылкі на гэту прастору назваў будуць у форме '''<nowiki>[[$2:Назва старонкі]]</nowiki>'''.
Калі гэта тое, што Вы жадаеце, націсьніце кнопку '''пацьвердзіць''' унізе.",
	'farmer-button-confirm' => 'Пацьвердзіць',
	'farmer-button-submit' => 'Адправіць',
	'farmer-createwiki-form-title' => 'Стварэньне вікі',
	'farmer-createwiki-form-text1' => 'Выкарыстоўвайце форму ніжэй, каб стварыць новую вікі.',
	'farmer-createwiki-form-help' => 'Дапамога',
	'farmer-createwiki-form-text2' => "; Назва вікі: Гэта назва вікі.
Можа ўтрымліваць толькі літары і лічбы.
Назва вікі будзе выкарыстоўвацца як частка URL-адрасу для вызначэньня Вашай вікі.
Напрыклад, калі ўведзяце '''title''', то Вашая вікі будзе даступна па адрасу <nowiki>http://</nowiki>'''title'''.mydomain.",
	'farmer-createwiki-form-text3' => '; Назва вікі: Гэта назва вікі.
Будзе выкарыстоўвацца ў назьве на кожнай старонцы ў Вашай вікі.
Таксама будзе выкарыстоўвацца ў прасторы назваў праекту і інтэрвікі-прэфікс.',
	'farmer-createwiki-form-text4' => '; Апісаньне: Апісаньне вікі.
Гэта тэкставае апісаньне вікі.
Яно будзе выкарыстоўвацца ў сьпісе вікі.',
	'farmer-createwiki-user' => 'Імя ўдзельніка',
	'farmer-createwiki-name' => 'Назва вікі',
	'farmer-createwiki-title' => 'Загаловак вікі',
	'farmer-createwiki-description' => 'Апісаньне',
	'farmer-createwiki-reason' => 'Прычына',
	'farmer-updatedlist' => 'Абноўлены сьпіс',
	'farmer-notaccessible' => 'Не даступна',
	'farmer-notaccessible-test' => 'Гэта магчымасьць даступная толькі на мацярынскай вікі фэрмы',
	'farmer-permissiondenied' => 'Доступ забаронены',
	'farmer-permissiondenied-text' => 'Вы ня маеце правоў на выдаленьне вікі з фэрмы',
	'farmer-permissiondenied-text1' => 'Вы ня маеце дазволу на доступ да гэтай старонкі',
	'farmer-deleting' => 'Вікі «$1» была выдаленая',
	'farmer-delete-confirm' => 'Я пацьвярджаю, што жадаю выдаліць гэту вікі',
	'farmer-delete-confirm-wiki' => "Вікі на выдаленьне: '''$1'''.",
	'farmer-delete-reason' => 'Прычына выдаленьня:',
	'farmer-delete-title' => 'Выдаленьне вікі',
	'farmer-delete-text' => 'Калі ласка, выберыце вікі, якую Вы жадаеце выдаліць, са сьпісу ніжэй',
	'farmer-delete-form' => 'Выбар вікі',
	'farmer-delete-form-submit' => 'Выдаліць',
	'farmer-listofwikis' => 'Сьпіс вікі',
	'farmer-mainpage' => 'Галоўная старонка',
	'farmer-basic-title' => 'Асноўныя парамэтры',
	'farmer-basic-title1' => 'Назва',
	'farmer-basic-title1-text' => 'Вашая вікі ня мае загалоўка. Устанавіце яго <b>зараз</b>',
	'farmer-basic-description' => 'Апісаньне',
	'farmer-basic-description-text' => 'Увядзіце апісаньне Вашай вікі ніжэй',
	'farmer-basic-permission' => 'Правы',
	'farmer-basic-permission-text' => 'Выкарыстоўвайце форму ніжэй, каб кіраваць правамі ўдзельнікаў гэтай вікі.',
	'farmer-basic-permission-visitor' => 'Правы для ўсіх наведвальнікаў',
	'farmer-basic-permission-visitor-text' => 'Наступнымі правамі будзе валодаць кожны наведвальнік гэтай вікі',
	'farmer-yes' => 'Так',
	'farmer-no' => 'Не',
	'farmer-basic-permission-user' => 'Правы зарэгістраваных удзельнікаў',
	'farmer-basic-permission-user-text' => 'Наступнымі правамі будзе валодаць кожны зарэгістраваны ўдзельнік гэтай вікі',
	'farmer-setpermission' => 'Устанавіць правы',
	'farmer-defaultskin' => 'Афармленьне па змоўчваньні',
	'farmer-defaultskin-button' => 'Устанавіць афармленьне па змоўчваньні',
	'farmer-extensions' => 'Актыўныя пашырэньні',
	'farmer-extensions-button' => 'Усталяваць актыўныя пашырэньні',
	'farmer-extensions-extension-denied' => 'Вы ня маеце правоў для выкарыстаньня гэтай магчымасьці.
Вы павінны ўваходзіць у групу адміністратараў фэрмы',
	'farmer-extensions-invalid' => 'Няслушнае пашырэньне',
	'farmer-extensions-invalid-text' => 'Вы ня можаце дадаць пашырэньне, таму што выбраны для даданьня файл ня знойдзены',
	'farmer-extensions-available' => 'Даступныя пашырэньні',
	'farmer-extensions-noavailable' => 'Няма зарэгістраваных пашырэньняў',
	'farmer-extensions-register' => 'Зарэгістраваныя пашырэньні',
	'farmer-extensions-register-text1' => 'Выкарыстоўвайце форму ніжэй для рэгістрацыі новага пашырэньня на фэрме.
Пасьля таго, як пашырэньне будзе зарэгістраванае, усе вікі змогуць яго выкарыстоўваць.',
	'farmer-extensions-register-text2' => "Увядзіце назву PHP-файла для парамэтру ''Include file'', так як у LocalSettings.php.",
	'farmer-extensions-register-text3' => "Калі назва файла ўтрымлівае '''\$root''', то гэта пераменная будзе замененая на карэнную дырэкторыю MediaWiki.",
	'farmer-extensions-register-text4' => 'Існуючыя шляхі для ўключэньня:',
	'farmer-extensions-register-name' => 'Назва',
	'farmer-extensions-register-includefile' => 'Уключыць файл',
	'farmer-error-exists' => 'Немагчыма стварыць вікі. Яна ўжо існуе: $1',
	'farmer-error-noextwrite' => 'Немагчыма запісаць файл пашырэньня:',
	'farmer-log-name' => 'Журнал вікі-фэрмы',
	'farmer-log-header' => 'Гэта журнал зьменаў зробленых на вікі-фэрме.',
	'farmer-log-create' => 'створаная вікі «$2»',
	'farmer-log-delete' => 'выдаленая вікі «$2»',
	'right-farmeradmin' => 'кіраваньне вікі-фэрмай',
	'right-createwiki' => 'стварэньне вікі на вікі-фэрме',
);

/** Bulgarian (Български)
 * @author Borislav
 * @author DCLXVI
 */
$messages['bg'] = array(
	'farmer' => 'Фермер',
	'farmer-desc' => 'Управление на МедияУики ферма',
	'farmercantcreatewikis' => 'Не можете да създавате уикита, тъй като нямате необходимите права („createwikis“)',
	'farmercreateurl' => 'Адрес',
	'farmercreatesitename' => 'Име на сайта',
	'farmercreatenextstep' => 'Следваща стъпка',
	'farmernewwikimainpage' => '== Добре дошли във Вашето уики ==
Ако виждате това, значи вашето ново уики е инсталирано правилно. За настройки на уикито може да се използва [[Special:Farmer]].',
	'farmer-about' => 'Информация',
	'farmer-about-text' => 'МедияУики Фермер позволява управлението на ферма от МедияУики уикита.',
	'farmer-list-wiki' => 'Списък на уикита',
	'farmer-list-wiki-text' => '[[$1|Списък]] на всички налични уикита в {{SITENAME}}',
	'farmer-createwiki' => 'Създаване на уики',
	'farmer-createwiki-text' => '[[$1|Създаване]] на ново уики',
	'farmer-administration' => 'Администриране на фермата',
	'farmer-administration-extension' => 'Управление на разширенията',
	'farmer-administration-extension-text' => '[[$1|Управление]] на инсталираните допълнения.',
	'farmer-admimistration-listupdate-text' => '[[$1|Обновяване]] на списъка с уикитата в {{SITENAME}}',
	'farmer-administration-delete' => 'Изтриване на уики',
	'farmer-administration-delete-text' => '[[$1|Изтриване]] на уики от фермата',
	'farmer-administer-thiswiki' => 'Администриране на това уики',
	'farmer-notavailable-text' => 'Тази възможност е достъпна само на основното уики',
	'farmer-wikicreated' => 'Уикито беше създадено',
	'farmer-wikicreated-text' => 'Уикито беше създадено.  Достъпно е на адрес $1',
	'farmer-default' => 'По подразбиране никой не притежава права на това уики освен вас. Потребителските права могат да бъадт променени чрез $1',
	'farmer-wikiexists' => 'Уикито съществува',
	'farmer-wikiexists-text' => "Уикито, което се опитвате да създадете, '''$1''', вече съществува. Необходимо е да се избере друго име.",
	'farmer-confirmsetting' => 'Потвърждаване на уики-настройките',
	'farmer-confirmsetting-name' => 'Име',
	'farmer-confirmsetting-title' => 'Заглавие',
	'farmer-confirmsetting-description' => 'Описание',
	'farmer-description' => 'Описание',
	'farmer-confirmsetting-text' => "Вашето уики '''$1''' ще бъде достъпно на адрес $3.
Проектното именно пространство е '''$2'''.
Препратките към това именно пространство ще са от вида '''<nowiki>[[$2:Page name]]</nowiki>'''.
Ако това е желанието ви, натиснете бутона '''потвърждаване''' по-долу.",
	'farmer-button-confirm' => 'Потвърждаване',
	'farmer-button-submit' => 'Изпращане',
	'farmer-createwiki-form-title' => 'Създаване на уики',
	'farmer-createwiki-form-text1' => 'Формулярът по-долу служи за създаване на ново уики.',
	'farmer-createwiki-form-help' => 'Помощ',
	'farmer-createwiki-form-text2' => "; Име на уикито: Може да съдържа само букви и числа.  Името на уикито ще бъде използвано като част от адреса на уикито.  Напр. ако името е '''title''', уикито ще бъде достъпно на адрес <nowiki>http://</nowiki>'''title'''.mydomain.",
	'farmer-createwiki-form-text3' => '; Заглавие на уикито: Заглавие на уикито.  Използва се в заглавието на всяка страница на уикито.  Също така е проектно именно пространство и представка за междууики.',
	'farmer-createwiki-form-text4' => '; Описание: Описание на уикито.  Текстово описание на уикито.  Показва се в списъка с уикита.',
	'farmer-createwiki-user' => 'Потребителско име',
	'farmer-createwiki-name' => 'Име на уикито',
	'farmer-createwiki-title' => 'Заглавие на уикито',
	'farmer-createwiki-description' => 'Описание',
	'farmer-notaccessible' => 'Недостъпно',
	'farmer-notaccessible-test' => 'Тази възможност е достъпна само на основното уики от фермата',
	'farmer-permissiondenied' => 'Достъпът е отказан',
	'farmer-permissiondenied-text' => 'Нямате права да изтривате уики от фермата',
	'farmer-permissiondenied-text1' => 'Нямате права да отворите тази страница',
	'farmer-deleting' => 'Изтриване на $1',
	'farmer-delete-title' => 'Изтриване на уики',
	'farmer-delete-text' => 'Изберете уикито, което желаете да изтриете, от списъка по-долу',
	'farmer-delete-form' => 'Избор на уики',
	'farmer-delete-form-submit' => 'Изтриване',
	'farmer-listofwikis' => 'Списък на уикитата',
	'farmer-mainpage' => 'Начална страница',
	'farmer-basic-title' => 'Основни параметри',
	'farmer-basic-title1' => 'Заглавие',
	'farmer-basic-title1-text' => 'Уикито няма заглавие. Необходимо е да се въведе заглавие',
	'farmer-basic-description' => 'Описание',
	'farmer-basic-description-text' => 'По-долу е необходимо да се въведе описание на уикито',
	'farmer-basic-permission' => 'Права',
	'farmer-basic-permission-text' => 'Чрез формуляра по-долу е възможно да бъдат променени правата за достъп на потребителите на уикито.',
	'farmer-basic-permission-visitor' => 'Права за всеки посетител',
	'farmer-yes' => 'Да',
	'farmer-no' => 'Не',
	'farmer-defaultskin' => 'Облик по подразбиране',
	'farmer-defaultskin-button' => 'Настройване на облик по подразбиране',
	'farmer-extensions-extension-denied' => 'Нямате права да използвате тази възможност на софтуера.
Необходимо е да притежавате членство в групата farmeradmin',
	'farmer-extensions-invalid' => 'Невалидно разширение',
	'farmer-extensions-invalid-text' => 'Разширението не може да бъде добавено, тъуй като избраният файл за включване не може да бъде открит',
	'farmer-extensions-available' => 'Налични разширения',
	'farmer-extensions-noavailable' => 'Не са регистрирани разширения',
	'farmer-extensions-register' => 'Регистриране на разширение',
	'farmer-extensions-register-text1' => 'Формулярът по-долу служи за регистриране на нови разширения за фермата. След като бъде регистрирано ново разширение, всички уикита ще могат да го използват.',
	'farmer-extensions-register-text3' => "Ако името на файла съдържа '''\$root''', тази променлива ще бъде заменена с основната директория на МедияУики.",
	'farmer-extensions-register-text4' => 'Текущите пътища за включване са:',
	'farmer-extensions-register-name' => 'Име',
	'farmer-extensions-register-includefile' => 'Включване на файл',
	'farmer-error-exists' => 'Уикито не може да бъде създадено, тъй като вече съществува: $1',
);

/** Bengali (বাংলা)
 * @author Zaheen
 */
$messages['bn'] = array(
	'farmer-delete-form-submit' => 'মুছে ফেলা হোক',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'farmer-about' => 'Diwar-benn',
	'farmer-list-wiki' => 'Roll ar wikioù',
	'farmer-createwiki' => 'Krouiñ ur wiki',
	'farmer-createwiki-form-help' => 'Skoazell',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'farmer' => 'Farmer',
	'farmer-desc' => 'Upravljanje MediaWiki farmom',
	'farmercantcreatewikis' => 'Vi niste u mogućnosti da napravite wiki jer nemate privilegije za pravljenje (createwikis)',
	'farmercreatesitename' => 'Ime sajta',
	'farmercreatenextstep' => 'slijedeći korak',
	'farmernewwikimainpage' => '== Dobrodošli na Vaš wiki ==
Ako čitate ovo, Vaš novi wiki je pravilno instaliran.
Možete [[Special:Farmer|prilagoditi Vaš wiki]].',
	'farmer-about' => 'O',
	'farmer-about-text' => 'MediaWiki Farmer Vam omogućava upravljanje farmom MediaWiki wikija.',
	'farmer-list-wiki' => 'Spisak wikija',
	'farmer-list-wiki-text' => '[[$1|Spisak]] svih wikija na {{SITENAME}}',
	'farmer-createwiki' => 'Napravi wiki',
	'farmer-createwiki-text' => '[[$1|Napravite]] novi wiki sad!',
	'farmer-administration' => 'Upravljanje farmom',
	'farmer-administration-extension' => 'Upravljanje proširenjima',
	'farmer-administration-extension-text' => '[[$1|Upravljaj]] instaliranim proširenjima.',
	'farmer-admimistration-listupdate' => 'Ažuriranje spiska farme',
	'farmer-admimistration-listupdate-text' => '[[$1|Ažuriranje]] spiska wikija na {{SITENAME}}',
	'farmer-administration-delete' => 'Obriši wiki',
	'farmer-administration-delete-text' => '[[$1|Obriši]] wiki iz farme',
	'farmer-administer-thiswiki' => 'Administriraj ovaj wiki',
	'farmer-administer-thiswiki-text' => '[[$1|Administriraj]] promjenama na ovoj wiki',
	'farmer-notavailable' => 'Nije dostupno',
	'farmer-notavailable-text' => 'Ova mogućnost je dostupna samo na glavnoj wiki',
	'farmer-wikicreated' => 'Wiki je napravljen',
	'farmer-wikicreated-text' => 'Vaš wiki je napravljen.
Dostupan je na $1',
	'farmer-wikiexists' => 'Wiki postoji',
	'farmer-confirmsetting' => 'Potvrdi wiki postavke',
	'farmer-confirmsetting-name' => 'Ime',
	'farmer-confirmsetting-title' => 'Naslov',
	'farmer-confirmsetting-description' => 'Opis',
	'farmer-confirmsetting-reason' => 'Razlog',
	'farmer-description' => 'Opis',
	'farmer-button-confirm' => 'Potvrdi',
	'farmer-button-submit' => 'Pošalji',
	'farmer-createwiki-form-title' => 'Napravi wiki',
	'farmer-createwiki-form-help' => 'Pomoć',
	'farmer-createwiki-user' => 'Korisničko ime',
	'farmer-createwiki-name' => 'Ime wikija',
	'farmer-createwiki-description' => 'Opis',
	'farmer-createwiki-reason' => 'Razlog',
	'farmer-notaccessible' => 'Ne može se pristupiti',
	'farmer-delete-title' => 'Obriši wiki',
	'farmer-delete-form' => 'Odaberi wiki',
	'farmer-delete-form-submit' => 'Obriši',
	'farmer-mainpage' => 'Početna stranica',
	'farmer-basic-title1' => 'Naslov',
	'farmer-basic-permission' => 'Dopuštenja',
	'farmer-basic-permission-upload' => 'Postavi datoteke',
	'farmer-yes' => 'Da',
	'farmer-no' => 'Ne',
	'farmer-extensions-register-name' => 'Ime',
);

/** Catalan (Català)
 * @author Jordi Roqué
 * @author SMP
 * @author Solde
 */
$messages['ca'] = array(
	'farmercreatesitename' => 'Nom del lloc',
	'farmercreatenextstep' => 'Següent pas',
	'farmer-about' => 'Quant a',
	'farmer-createwiki' => 'Crea una wiki',
	'farmer-confirmsetting-name' => 'Nom',
	'farmer-confirmsetting-title' => 'Títol',
	'farmer-confirmsetting-description' => 'Descripció',
	'farmer-confirmsetting-reason' => 'Raó',
	'farmer-description' => 'Descripció',
	'farmer-button-submit' => 'Tramet',
	'farmer-createwiki-form-title' => 'Crea una wiki',
	'farmer-createwiki-description' => 'Descripció',
	'farmer-createwiki-reason' => 'Motiu',
	'farmer-delete-form-submit' => 'Elimina',
	'farmer-basic-title1' => 'Títol',
	'farmer-basic-description' => 'Descripció',
	'farmer-yes' => 'Sí',
	'farmer-no' => 'No',
	'farmer-extensions-register-name' => 'Nom',
);

/** Chamorro (Chamoru)
 * @author Jatrobat
 */
$messages['ch'] = array(
	'farmer-mainpage' => 'Fanhaluman',
	'farmer-basic-permission-upload' => "Na'kåtga hulu' atkibu",
);

/** Czech (Česky)
 * @author Matěj Grabovský
 */
$messages['cs'] = array(
	'farmer-desc' => 'Správa farmy MediaWiki',
	'farmercreatesitename' => 'Název lokality',
	'farmercreatenextstep' => 'Další krok',
	'farmer-about' => 'O stránce',
	'farmer-list-wiki' => 'Seznam wiki',
	'farmer-list-wiki-text' => '[[$1|Seznam]] všech wiki na {{GRAMMAR:local|{{SITENAME}}}}',
	'farmer-createwiki' => 'Vytvořit wiki',
	'farmer-createwiki-text' => '[[$1|Vytvořte]] novou wiki teď!',
	'farmer-administration' => 'Správa farmy',
	'farmer-createwiki-user' => 'Uživatelské jméno',
);

/** Church Slavic (Словѣ́ньскъ / ⰔⰎⰑⰂⰡⰐⰠⰔⰍⰟ)
 * @author ОйЛ
 */
$messages['cu'] = array(
	'farmer-createwiki-form-help' => 'по́мощь',
	'farmer-delete-form-submit' => 'поничьжє́ниѥ',
);

/** Danish (Dansk)
 * @author Jon Harald Søby
 */
$messages['da'] = array(
	'farmer-description' => 'Beskrivelse',
	'farmer-button-confirm' => 'Bekræft',
	'farmer-createwiki-form-help' => 'Hjælp',
	'farmer-createwiki-user' => 'Brugernavn',
	'farmer-createwiki-description' => 'Beskrivelse',
	'farmer-delete-form-submit' => 'Slet',
	'farmer-mainpage' => 'Forside',
	'farmer-basic-title1' => 'Titel',
	'farmer-basic-description' => 'Beskrivelse',
	'farmer-yes' => 'Ja',
	'farmer-no' => 'Nej',
	'farmer-extensions-register-name' => 'Navn',
);

/** German (Deutsch)
 * @author Als-Holder
 * @author ChrisiPK
 * @author Jan Luca
 * @author Leithian
 * @author Melancholie
 * @author MichaelFrey
 * @author Pill
 * @author Purodha
 * @author Revolus
 * @author Umherirrender
 */
$messages['de'] = array(
	'farmer' => 'Farmer',
	'farmer-desc' => 'Verwalte eine MediaWiki-Farm',
	'farmercantcreatewikis' => 'Du kannst kein Wiki anlegen, da dir das Recht („createwikis“) dazu fehlt.',
	'farmercreatesitename' => 'Name der Website',
	'farmercreatenextstep' => 'Nächster Schritt',
	'farmernewwikimainpage' => '== Willkommen in deinem Wiki ==

Wenn du diesen Text liest, hast du dein neues Wiki korrekt installiert.
Du kannst es nach deinen Wünschen [[Special:Farmer|anpassen]].',
	'farmer-about' => 'Über',
	'farmer-about-text' => 'MediaWiki-Farmer ermöglicht es dir mehre MediaWikis zu verwalten.',
	'farmer-list-wiki' => 'Liste Wikis auf',
	'farmer-list-wiki-text' => '[[$1|Liste]] aller Wikis auf {{SITENAME}}',
	'farmer-createwiki' => 'Ein Wiki anlegen',
	'farmer-createwiki-text' => '[[$1|Erstelle]] jetzt ein neues Wiki.',
	'farmer-administration' => 'Farm-Administration',
	'farmer-administration-extension' => 'Erweiterungen verwalten',
	'farmer-administration-extension-text' => '[[$1|Verwalte]] installierte Erweiterungen.',
	'farmer-admimistration-listupdate' => 'Farmenliste aktualisieren',
	'farmer-admimistration-listupdate-text' => '[[$1|Aktualisiere]] die Liste der Wikis auf {{SITENAME}}',
	'farmer-administration-delete' => 'Ein Wiki löschen',
	'farmer-administration-delete-text' => '[[$1|Lösche]] ein Wiki von der Farm',
	'farmer-administer-thiswiki' => 'Administriere dieses Wiki',
	'farmer-administer-thiswiki-text' => '[[$1|Verwalte]] dieses Wiki',
	'farmer-notavailable' => 'Nicht verfügbar.',
	'farmer-notavailable-text' => 'Dieses Feature ist nur im Hauptwiki verfügbar',
	'farmer-wikicreated' => 'Wiki erstellt',
	'farmer-wikicreated-text' => 'Dein Wiki wurde erstellt.
Es befindet sich hier: $1',
	'farmer-default' => 'Am Anfang hat keiner außer dir irgendwelche Rechte in diesem Wiki.
Mittels $1 kannst du die Benutzerrechte verwalten',
	'farmer-wikiexists' => 'Wiki existiert',
	'farmer-wikiexists-text' => "Das Wiki – '''$1''' –, das du versuchst anzulegen, existiert bereits.
Bitte kehre zurück und versuche es mit einem anderen Namen",
	'farmer-confirmsetting' => 'Wiki-Einstellungen bestätigen',
	'farmer-confirmsetting-name' => 'Name',
	'farmer-confirmsetting-title' => 'Titel',
	'farmer-confirmsetting-description' => 'Beschreibung',
	'farmer-confirmsetting-reason' => 'Grund',
	'farmer-description' => 'Beschreibung',
	'farmer-confirmsetting-text' => "Dein Wiki – '''$1''' – wird über $3 erreichbar sein.
Der Projektnamensraum wird '''$2''' heißen.
Links zu diesem Namensraum werden die Form '''<nowiki>[[$2:Seitenname]]</nowiki>''' haben.
Wenn alles korrekt ist, so bestätige dies mit einem Klick auf '''Bestätigen'''.",
	'farmer-button-confirm' => 'Bestätigen',
	'farmer-button-submit' => 'Absenden',
	'farmer-createwiki-form-title' => 'Ein Wiki erstellen',
	'farmer-createwiki-form-text1' => 'Benutze das folgende Formular, um ein neues Wiki anzulegen.',
	'farmer-createwiki-form-help' => 'Hilfe',
	'farmer-createwiki-form-text2' => "; Wikiname: Der Name des Wikis.
Es darf nur die Buchstaben A–Z und Zahlen enthalten.
Der Wikiname wird als Teil der URL zum Wiki verwendet.
Wenn du zum Beispiel '''Name''' angibst, wird die URL zum Wiki <nowiki>http://</nowiki>'''name'''.example.com/ heißen.",
	'farmer-createwiki-form-text3' => '; Wikiname: Name des Wiki.
Er wird auf jeder Seite des Wikis verwendet.
Er wird ebenfalls der Titel des Projektnamensraumes und der Interwiki-Präfix sein.',
	'farmer-createwiki-form-text4' => '; Beschreibung: Beschreibung des Wikis.
Dieser Text beschreibt das Wiki und wird auf der Liste der Wikis angezeigt.',
	'farmer-createwiki-user' => 'Benutzername',
	'farmer-createwiki-name' => 'Wikiname',
	'farmer-createwiki-title' => 'Wikititel',
	'farmer-createwiki-description' => 'Beschreibung',
	'farmer-createwiki-reason' => 'Grund',
	'farmer-updatedlist' => 'Liste aktualisieren',
	'farmer-notaccessible' => 'Nicht verfügbar',
	'farmer-notaccessible-test' => 'Dieses Feature ist nur im Elternwiki der Farm verfügbar',
	'farmer-permissiondenied' => 'Zugriff verweigert',
	'farmer-permissiondenied-text' => 'Es ist dir nicht gestattet, ein Wiki von der Farm zu löschen',
	'farmer-permissiondenied-text1' => 'Es ist dir nicht gestattet, auf diese Seite zuzugreifen',
	'farmer-deleting' => 'Das Wiki $1 wurde gelöscht',
	'farmer-delete-confirm' => 'Ich bestätige, dass ich dieses Wiki löschen möchte',
	'farmer-delete-confirm-wiki' => "Zu löschendes Wiki: '''$1'''.",
	'farmer-delete-reason' => 'Grund der Löschung:',
	'farmer-delete-title' => 'Wiki löschen',
	'farmer-delete-text' => 'Bitte wähle das Wiki das du löschen willst aus der Liste aus',
	'farmer-delete-form' => 'Wähle ein Wiki',
	'farmer-delete-form-submit' => 'Löschen',
	'farmer-listofwikis' => 'Liste der Wikis',
	'farmer-mainpage' => 'Hauptseite',
	'farmer-basic-title' => 'Grundsätzliche Parameter',
	'farmer-basic-title1' => 'Titel',
	'farmer-basic-title1-text' => 'Dein Wiki hat keinen Titel. Bitte setze ihn <b>jetzt</b>',
	'farmer-basic-description' => 'Beschreibung',
	'farmer-basic-description-text' => 'Füge unten die Beschreibung deines Wikis ein',
	'farmer-basic-permission' => 'Rechte',
	'farmer-basic-permission-text' => 'Mit dem folgenden Formular ist es möglich, die Benutzerrechte des Wikis zu verändern.',
	'farmer-basic-permission-visitor' => 'Gastrechte',
	'farmer-basic-permission-visitor-text' => 'Die folgenden Rechte gelten für Gäste im Wiki',
	'farmer-yes' => 'Ja',
	'farmer-no' => 'Nein',
	'farmer-basic-permission-user' => 'Rechte angemeldeter Benutzer',
	'farmer-basic-permission-user-text' => 'Die folgenden Rechte gelten für angemeldete Benutzer',
	'farmer-setpermission' => 'Rechte setzen',
	'farmer-defaultskin' => 'Standardskin',
	'farmer-defaultskin-button' => 'Standardskin setzen',
	'farmer-extensions' => 'Aktive Erweiterungen',
	'farmer-extensions-button' => 'Aktive Erweiterungen setzen',
	'farmer-extensions-extension-denied' => 'Es ist dir nicht gestattet, dieses Feature zu benutzen, denn dafür müsstest du der Admingruppe dieser Farm angehören',
	'farmer-extensions-invalid' => 'Ungültige Erweiterung',
	'farmer-extensions-invalid-text' => 'Die Erweiterung konnte nicht hinzugefügt werden, weil die zur Einbindung ausgewählte Datei nicht gefunden werden konnte',
	'farmer-extensions-available' => 'Verfügbare Erweiterungen',
	'farmer-extensions-noavailable' => 'Es wurden keine Erweiterungen registriert',
	'farmer-extensions-register' => 'Erweiterung anmelden',
	'farmer-extensions-register-text1' => 'Verwende die untenstehende Maske, um eine neue Erweiterung für die Farm zu registrieren.
Sobald eine Erweiterung registriert ist, können alle Wikis sie verwenden.',
	'farmer-extensions-register-text2' => "Gib den Namen der PHP-Datei im ''Include file''-Parameter so an, wie du ihn in LocalSettings.php angeben würdest.",
	'farmer-extensions-register-text3' => "Wenn der Dateiname '''\$root''' enthält, wird diese Variable durch das MediaWiki-Wurzelverzeichnis ersetzt.",
	'farmer-extensions-register-text4' => 'Die aktuell beinhalteten Pfade sind:',
	'farmer-extensions-register-name' => 'Name',
	'farmer-extensions-register-includefile' => 'Datei einbinden',
	'farmer-error-exists' => 'Das Wiki kann nicht angelegt werden, weil es bereits existiert: $1',
	'farmer-error-noextwrite' => 'Schreiben der Erweiterungsdatei nicht möglich:',
	'farmer-log-name' => 'Wiki-Farm Logbuch',
	'farmer-log-header' => 'Dieses Logbuch zeigt die Änderung an der Wiki-Farm.',
	'farmer-log-create' => 'erstellte das Wiki „$2“',
	'farmer-log-delete' => 'löschte das Wiki „$2“',
	'right-farmeradmin' => 'Wiki-Farm verwalten',
	'right-createwiki' => 'Wikis in der Wiki-Farm erstellen',
);

/** German (formal address) (Deutsch (Sie-Form))
 * @author ChrisiPK
 * @author MichaelFrey
 */
$messages['de-formal'] = array(
	'farmer-default' => 'Am Anfang hat keiner außer ihnen irgendwelche Rechte in diesem Wiki.
Mittels $1 können Sie die Benutzerrechte verwalten',
	'farmer-extensions-register-text1' => 'Verwenden Sie die untenstehende Maske, um eine neue Erweiterung für die Farm zu registrieren.
Sobald eine Erweiterung registriert ist, können alle Wikis sie verwenden.',
	'farmer-extensions-register-text2' => "Geben Sie den Namen der PHP-Datei im ''Include file''-Parameter so an, wie Sie ihn in LocalSettings.php angeben würden.",
);

/** Lower Sorbian (Dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'farmer' => 'Farmaŕ',
	'farmer-desc' => 'Farmu MediaWiki zastojaś',
	'farmercantcreatewikis' => 'Njamóžoš wikije napóraś, dokulaž njamaš pšawo ("createwikis")',
	'farmercreatesitename' => 'Mě sedła',
	'farmercreatenextstep' => 'Pśiducy kšac',
	'farmernewwikimainpage' => '== Witaj do swójogo wikija ==
Jolic to cytaš, twój wiki jo korektnje instalěrowany.
Móžoš [[Special:Farmer|swój wiki pśiměriś]].',
	'farmer-about' => 'Wó',
	'farmer-about-text' => 'MediaWiki Farmaŕ śi zmóžnja farmu wikijow MediaWiki zastojaś.',
	'farmer-list-wiki' => 'Lisćina wikijow',
	'farmer-list-wiki-text' => 'Wše wikije na {{GRAMMAR:lokatiw|{{SITENAME}}}} [[$1|nalicyś]]',
	'farmer-createwiki' => 'Wiki napóraś',
	'farmer-createwiki-text' => '[[$1|Napóraj]] něnto nowy wiki!',
	'farmer-administration' => 'Zastojanje farmy',
	'farmer-administration-extension' => 'Rozšyrjenja zastojaś',
	'farmer-administration-extension-text' => 'Instalěrowane rozšyrjenja [[$1|zastojaś]].',
	'farmer-admimistration-listupdate' => 'Aktualizacija lisćiny farmow',
	'farmer-admimistration-listupdate-text' => 'Lisćinu wikijow na {{GRAMMAR:lokatiw|{{SITENAME}}}} [[$1|aktualizěrowaś]]',
	'farmer-administration-delete' => 'Wiki lašowaś',
	'farmer-administration-delete-text' => 'Wiki z farmy [[$1|lašowaś]]',
	'farmer-administer-thiswiki' => 'Toś ten wiki administrěrowaś',
	'farmer-administer-thiswiki-text' => 'Změny toś togo wikija [[$1|administrěrowaś]]',
	'farmer-notavailable' => 'Njejo k dispoziciji',
	'farmer-notavailable-text' => 'Tuta funkcija stoj jano w głownem wikiju k dispoziciji',
	'farmer-wikicreated' => 'Wiki napórany',
	'farmer-wikicreated-text' => 'Twój wiki jo se napórał.
Jo pśistupny na $1',
	'farmer-default' => 'Po standarźe nichten njama pšawa za toś ten wiki, mimo tebje.
Móžoš wužywarske pšawa pśez $1 změniś.',
	'farmer-wikiexists' => 'Wiki eksistěrujo',
	'farmer-wikiexists-text' => "Wiki, kótaryž wopytujoš napóraś, '''$1''', južo eksistěrujo.
Pšosym źi slědk a wopytaj druge mě.",
	'farmer-confirmsetting' => 'Nastajenja wikija wobkšuśiś',
	'farmer-confirmsetting-name' => 'Mě',
	'farmer-confirmsetting-title' => 'Titel',
	'farmer-confirmsetting-description' => 'Wopisanje',
	'farmer-confirmsetting-reason' => 'Pśicyna',
	'farmer-description' => 'Wopisanje',
	'farmer-confirmsetting-text' => "Twój wiki, '''$1''', buźo pśistupny pśez $3.
Projektowy mjenjowy rum buźo '''$2'''.
Wótkaze k toś tomu mjenjowemu rumoju změju formu '''<nowiki>[[$2:Page name]]</nowiki>'''.
Jolic to coš, tłoc na slědujucy tłocašk '''wobkšuśiś'''.",
	'farmer-button-confirm' => 'Wobkšuśiś',
	'farmer-button-submit' => 'Wótpósłaś',
	'farmer-createwiki-form-title' => 'Wiki napóraś',
	'farmer-createwiki-form-text1' => 'Wužyj slědujucy formular, aby napórał nowy wiki.',
	'farmer-createwiki-form-help' => 'Pomoc',
	'farmer-createwiki-form-text2' => "; Wiki name: Mě wikija.
Wopśimujo jano pismiki a cyfry.
Mě wikija buźo se ako źěl URL wužywaś, aby identificěrował twój wiki.
Na pśikład, jolic zapódawaš '''titel''', ga twój wiki buźo pśistupny pśez <nowiki>http://</nowiki>'''titel'''.mójadomena.",
	'farmer-createwiki-form-text3' => '; Wiki title: Titel wikija.
Buźo se w titelu kuždego boka w twójom wikiju wužywaś.
Buźo teke mjenjowy rum projekta a prefiks interwiki.',
	'farmer-createwiki-form-text4' => '; Wopisanje: Wopisanje wikija.
To jo tekstowe wopisanje wikija.
To buźo se w lisćinje wikijow zwobraznjowaś.',
	'farmer-createwiki-user' => 'Wužywarske mě',
	'farmer-createwiki-name' => 'Mě wikija',
	'farmer-createwiki-title' => 'Titel wikija',
	'farmer-createwiki-description' => 'Wopisanje',
	'farmer-createwiki-reason' => 'Pśicyna',
	'farmer-updatedlist' => 'Lisćina zaktualizěrowana',
	'farmer-notaccessible' => 'Njepśistupny',
	'farmer-notaccessible-test' => 'Toś ta funkcija stoj jano w głownem wikiju farmy k dispoziciji',
	'farmer-permissiondenied' => 'Pšawo wótpokazane',
	'farmer-permissiondenied-text' => 'Njamaš pšawo wiki z farmy lašowaś',
	'farmer-permissiondenied-text1' => 'Njamaš pšawo, aby měł pśistup na toś ten bok',
	'farmer-deleting' => 'Wiki "$1" jo se wulašował',
	'farmer-delete-confirm' => 'Jo, cu toś ten wiki wulašowaś',
	'farmer-delete-confirm-wiki' => "Wiki, kótaryž ma se lašowaś: '''$1'''",
	'farmer-delete-reason' => 'Pśicyna za wulašowanje:',
	'farmer-delete-title' => 'Wiki lašowaś',
	'farmer-delete-text' => 'Pšosym wubjeŕ wiki, kótaryž coš lašowaś, ze slědujuceje lisćiny',
	'farmer-delete-form' => 'Wubjeŕ wiki',
	'farmer-delete-form-submit' => 'Lašowaś',
	'farmer-listofwikis' => 'Lisćina wikijow',
	'farmer-mainpage' => 'Głowny bok',
	'farmer-basic-title' => 'Zakładne parametry',
	'farmer-basic-title1' => 'Titel',
	'farmer-basic-title1-text' => 'Twój wiki njama titel. Daj jaden <b>něnto</b>',
	'farmer-basic-description' => 'Wopisanje',
	'farmer-basic-description-text' => 'Zapódaj dołojce wopisanje swójogo wikija',
	'farmer-basic-permission' => 'Pšawa',
	'farmer-basic-permission-text' => 'Z pomocu slědujucego formulara jo móžno pšawa za wužywarjow toś togo wikija změniś.',
	'farmer-basic-permission-visitor' => 'Pšawa za kuždego woglědowarja',
	'farmer-basic-permission-visitor-text' => 'Slědujuce pšawa płaśe za kuždu wósobu, kótaraž woglědujo k toś tomu wikijoju',
	'farmer-yes' => 'Jo',
	'farmer-no' => 'Ně',
	'farmer-basic-permission-user' => 'Pšawa za pśizjawjonych wužywarjow',
	'farmer-basic-permission-user-text' => 'Slědujuce pšawa płaśe za kuždu wósobu, kótaraž jo w toś tom wikiju pśizjawjona',
	'farmer-setpermission' => 'Pšawa stajiś',
	'farmer-defaultskin' => 'Standardna drastwa',
	'farmer-defaultskin-button' => 'Standardnu drastwu nastajiś',
	'farmer-extensions' => 'Aktiwne rozšyrjenja',
	'farmer-extensions-button' => 'Aktiwne rozšyrjenja stajiś',
	'farmer-extensions-extension-denied' => 'Njamaš pšawo toś tu funkciju wužywaś.
Musyš cłonk kupki farmarskich administratorow byś.',
	'farmer-extensions-invalid' => 'Njepłaśiwe rozšyrjenje',
	'farmer-extensions-invalid-text' => 'Njejo było móžno rozšyrjenje pśidaś, dokulaž za zapśěegnjenje wubrana dataja njejo dała se namakaś.',
	'farmer-extensions-available' => 'K dispoziciji stojece rozšyrjenja',
	'farmer-extensions-noavailable' => 'Žedne rozšyrjenja zregistrěrowane',
	'farmer-extensions-register' => 'Rozšyrjenje registrěrowaś',
	'farmer-extensions-register-text1' => 'Wužyj slědujucy formular, aby registrěrował nowe rozšyrjenje pśi farmje.
Gaž rozšyrjenje je zregistrěrowane, wše wikije mógu jo wužywaś.',
	'farmer-extensions-register-text2' => "Za parameter ''Include file'' zapódaj mě PHP-dataje, ako by było w dataji LocalSettings.php.",
	'farmer-extensions-register-text3' => "Jolic datajowe mě wopśimujo '''\$root''', ta wariabla buźo se pśez kórjenjowy zapis MediaWiki wuměnjaś.",
	'farmer-extensions-register-text4' => 'Aktualne sćažki include su:',
	'farmer-extensions-register-name' => 'Mě',
	'farmer-extensions-register-includefile' => 'Dataju zapśěgnuś',
	'farmer-error-exists' => 'Wiki njedajo se napóraś, eksistěrujo južo: $1',
	'farmer-error-noextwrite' => 'Njemóžno dataju rozšyrjenja pisaś:',
	'farmer-log-name' => 'Protokol wikijowego farma',
	'farmer-log-header' => 'To jo protokol změnow, kótarež su se na wikijowem farmje cynili.',
	'farmer-log-create' => 'jo załožył wiki "$2"',
	'farmer-log-delete' => 'jo wulašował wiki "$2"',
	'right-farmeradmin' => 'Wikijowu farmu zastojaś',
	'right-createwiki' => 'Wikije we wikijowej farmje napóraś',
);

/** Ewe (Eʋegbe) */
$messages['ee'] = array(
	'farmer-list-wiki' => 'Wikiwo ƒe xexlẽme',
	'farmer-createwiki-form-help' => 'Kpekpeɖeŋu',
	'farmer-delete-form-submit' => 'Tutui',
	'farmer-listofwikis' => 'Wikiwo ƒe xexlẽme',
);

/** Greek (Ελληνικά)
 * @author Consta
 * @author Crazymadlover
 */
$messages['el'] = array(
	'farmercreatenextstep' => 'Επόμενο βήμα',
	'farmer-createwiki' => 'Δημιουργήστε ένα Wiki',
	'farmer-createwiki-text' => '[[$1|Δημιουργήστε]] ένα νέο wiki τώρα!',
	'farmer-administration-delete' => 'Διαγράψτε ένα Wiki',
	'farmer-confirmsetting-name' => 'Όνομα',
	'farmer-confirmsetting-title' => 'Τίτλος',
	'farmer-confirmsetting-description' => 'Περιγραφή',
	'farmer-description' => 'Περιγραφή',
	'farmer-button-confirm' => 'Επιβεβαίωση',
	'farmer-button-submit' => 'Υποβολή',
	'farmer-createwiki-form-title' => 'Δημιουργήστε ένα Wiki',
	'farmer-createwiki-user' => 'Όνομα χρήστη',
	'farmer-createwiki-description' => 'Περιγραφή',
	'farmer-delete-form' => 'Επιλέξτε ένα wiki',
	'farmer-mainpage' => 'Κύρια Σελίδα',
	'farmer-basic-title' => 'Βασικοί Παράμετροι',
	'farmer-basic-title1' => 'Τίτλος',
	'farmer-basic-description' => 'Περιγραφή',
	'farmer-basic-permission-createpage' => 'Δημιουργήστε νέες σελίδες',
	'farmer-basic-permission-createtalk' => 'Δημιουργήστε σελίδες συζήτησης',
	'farmer-yes' => 'Ναι',
	'farmer-no' => 'Όχι',
	'farmer-extensions-register-name' => 'Όνομα',
);

/** Esperanto (Esperanto)
 * @author Amikeco
 * @author Yekrats
 */
$messages['eo'] = array(
	'farmer-desc' => 'Administri MediaWiki-vikiaron',
	'farmercreatesitename' => 'Nomo de retejo',
	'farmercreatenextstep' => 'Posta ŝtupo',
	'farmernewwikimainpage' => '== Bonvenon al via vikio ==
Se vi legas tion ĉi, via vikio estas sukcese instalita.
Vi povas [[Special:Farmer|agordi vian vikion]].',
	'farmer-about' => 'Pri',
	'farmer-list-wiki' => 'Listo de Vikioj',
	'farmer-list-wiki-text' => '[[$1|Listigi]] ĉiujn vikiojn en {{SITENAME}}',
	'farmer-createwiki' => 'Krei Vikion',
	'farmer-createwiki-text' => '[[$1|Kreu]] novan vikion nun!',
	'farmer-administration-extension' => 'Kontroli Etendilojn',
	'farmer-administration-extension-text' => '[[$1|Administru]] instalitajn etendilojn.',
	'farmer-admimistration-listupdate-text' => '[[$1|Ĝisdatigi]] liston de vikioj en {{SITENAME}}',
	'farmer-administration-delete' => 'Forigi Vikion',
	'farmer-administration-delete-text' => '[[$1|Forigi]] vikion de the vikiaro.',
	'farmer-administer-thiswiki' => 'Administru ĉi vikion',
	'farmer-administer-thiswiki-text' => '[[$1|Administri]] ŝanĝojn al ĉi tiu vikion',
	'farmer-notavailable' => 'Ne atingebla',
	'farmer-notavailable-text' => 'Ĉi tiu ilo estas nur havebla en la ĉefa vikio.',
	'farmer-wikicreated' => 'Vikio estas kreita',
	'farmer-wikicreated-text' => 'Via vikio estis kreita. Ĝi estas havebla ĉe $1',
	'farmer-wikiexists' => 'Vikio ekzistas',
	'farmer-confirmsetting' => 'Konfirmu Vikiajn Parametrojn',
	'farmer-confirmsetting-name' => 'Nomo',
	'farmer-confirmsetting-title' => 'Titolo',
	'farmer-confirmsetting-description' => 'Priskribo',
	'farmer-description' => 'Priskribo',
	'farmer-button-confirm' => 'Konfirmi',
	'farmer-button-submit' => 'Ek',
	'farmer-createwiki-form-title' => 'Krei Vikion',
	'farmer-createwiki-form-text1' => 'Uzu la jenan kamparon por krei novan vikion.',
	'farmer-createwiki-form-help' => 'Helpo',
	'farmer-createwiki-form-text4' => '; Priskribo: Priskribo de vikio.
Ĉi tiu estas teksta priskribo pri la vikio.
Ĉi tiu estos montrita en la vikia listo.',
	'farmer-createwiki-user' => 'Salutnomo',
	'farmer-createwiki-name' => 'Vikia nomo',
	'farmer-createwiki-title' => 'Vikia titolo',
	'farmer-createwiki-description' => 'Priskribo',
	'farmer-updatedlist' => 'Ĝisdatigi liston',
	'farmer-notaccessible' => 'Ne atingebla',
	'farmer-permissiondenied' => 'Permeso neita',
	'farmer-permissiondenied-text1' => 'Vi ne havas rajtojn por vidi tiun ĉi paĝon',
	'farmer-deleting' => 'Forigante $1',
	'farmer-delete-title' => 'Forigi vikion',
	'farmer-delete-form' => 'Elektu vikion',
	'farmer-delete-form-submit' => 'Forigi',
	'farmer-listofwikis' => 'Listo de Vikioj',
	'farmer-mainpage' => 'Ĉefpaĝo',
	'farmer-basic-title' => 'Bazaj Parametroj',
	'farmer-basic-title1' => 'Titolo',
	'farmer-basic-title1-text' => 'Via vikio ne havas titolon. Faru titolon NUN',
	'farmer-basic-description' => 'Priskribo',
	'farmer-basic-description-text' => 'Faru la priskribon de via vikio suben',
	'farmer-basic-permission' => 'Permesoj',
	'farmer-basic-permission-visitor' => 'Permesoj por Ĉiu Vizitanto',
	'farmer-basic-permission-view' => 'Vidi ĉiujn paĝojn',
	'farmer-basic-permission-edit' => 'Redakti ĉiujn paĝojn',
	'farmer-basic-permission-createpage' => 'Krei novajn paĝojn',
	'farmer-basic-permission-createtalk' => 'Krei diskuto-paĝojn',
	'farmer-basic-permission-move' => 'Movi paĝojn',
	'farmer-basic-permission-upload' => 'Alŝuti dosierojn',
	'farmer-basic-permission-minoredit' => 'Permesigi etajn redaktojn',
	'farmer-yes' => 'Jes',
	'farmer-no' => 'Ne',
	'farmer-basic-permission-user' => 'Rajtoj por Ensalutitaj Uzantoj',
	'farmer-setpermission' => 'Fari permesojn',
	'farmer-defaultskin' => 'Defaŭlta Veston',
	'farmer-defaultskin-button' => 'Konfiguru Defaŭltan Veston',
	'farmer-extensions' => 'Aktivaj Etendiloj',
	'farmer-extensions-button' => 'Faru Aktivajn Etendilojn',
	'farmer-extensions-extension-denied' => "Vi ne havas permeson por uzi ĉi tiu ilon.
Vi nepre estu membro de la ''farmeradmin'' grupo.",
	'farmer-extensions-invalid' => 'Nevalida Etendilo',
	'farmer-extensions-available' => 'Atingeblaj Etendiloj',
	'farmer-extensions-noavailable' => 'Neniuj etendiloj estas registritaj',
	'farmer-extensions-register' => 'Registri Etendilon',
	'farmer-extensions-register-name' => 'Nomo',
	'farmer-extensions-register-includefile' => 'Inkluzivi dosieron',
	'farmer-error-exists' => 'Ne povas krei vikion. Ĝi jam ekzistas: $1',
);

/** Spanish (Español)
 * @author Crazymadlover
 * @author Imre
 * @author Jatrobat
 * @author Sanbec
 */
$messages['es'] = array(
	'farmercantcreatewikis' => 'Eres incapaz de crear wikis porque no tienes privilegios createwikis',
	'farmercreatesitename' => 'Nombre del sitio',
	'farmercreatenextstep' => 'Próximo paso',
	'farmernewwikimainpage' => '== Bienvenido a tu wiki ==
Si estás leyendo esto, tu nuevo wiki ha sido instalado correctamente.
Puedes [[Special:Farmer|personalizar tu wiki]].',
	'farmer-about' => 'Acerca de',
	'farmer-list-wiki' => 'Lista de wikis',
	'farmer-list-wiki-text' => '[[$1|listar]] todos los wikis en {{SITENAME}}',
	'farmer-createwiki' => 'Crear un wiki',
	'farmer-createwiki-text' => '[[$1|Crear]] un nuevo wiki ahora!',
	'farmer-administration-extension' => 'Administrar extensiones',
	'farmer-administration-extension-text' => '[[$1|Administrar]] extensiones instaladas.',
	'farmer-admimistration-listupdate-text' => '[[$1|Actualizar]] lista de wikis en {{SITENAME}}',
	'farmer-administration-delete' => 'Borrar un wiki',
	'farmer-administer-thiswiki' => 'Administrar este wiki',
	'farmer-administer-thiswiki-text' => '[[$1|Administrar]] cambios a este wiki',
	'farmer-notavailable' => 'No disponible',
	'farmer-notavailable-text' => 'Esta característica está solamente disponible en el wiki principal',
	'farmer-wikicreated' => 'Wiki creado',
	'farmer-wikicreated-text' => 'Su wiki ha sido creado.
Es accesible en $1',
	'farmer-default' => 'Por defecto, nadie tiene permisos en este wiki excepto tú.
Puedes cambiar los privilegios de usuario a través de $1',
	'farmer-wikiexists' => 'El wiki existe',
	'farmer-confirmsetting' => 'Confirmar configuraciones de wiki',
	'farmer-confirmsetting-name' => 'Nombre',
	'farmer-confirmsetting-title' => 'Título',
	'farmer-confirmsetting-description' => 'Descripción',
	'farmer-confirmsetting-reason' => 'Razón',
	'farmer-description' => 'Descripción',
	'farmer-button-confirm' => 'Confirmar',
	'farmer-button-submit' => 'Enviar',
	'farmer-createwiki-form-title' => 'Crear un wiki',
	'farmer-createwiki-form-text1' => 'Usar el formulario de abajo para crear un nuevo wiki.',
	'farmer-createwiki-form-help' => 'Ayuda',
	'farmer-createwiki-form-text4' => '; Descripción: Descripción del wiki.
Este es un texto descriptivo acerca del wiki.
Esto se mostrará en la lista wiki.',
	'farmer-createwiki-user' => 'Nombre de usuario',
	'farmer-createwiki-name' => 'Nombre de wiki',
	'farmer-createwiki-title' => 'Título de wiki',
	'farmer-createwiki-description' => 'Descripción',
	'farmer-createwiki-reason' => 'Razón',
	'farmer-updatedlist' => 'Lista actualizada',
	'farmer-notaccessible' => 'No accesible',
	'farmer-permissiondenied' => 'Permiso denegado',
	'farmer-permissiondenied-text1' => 'No tiene permiso para acceder a esta página',
	'farmer-deleting' => 'El wiki "$1" ha sido borrado',
	'farmer-delete-confirm' => 'Confirmo que deseo borrar este wiki',
	'farmer-delete-confirm-wiki' => "Wiki a borrar: '''$1'''.",
	'farmer-delete-reason' => 'Razones para el borrado:',
	'farmer-delete-title' => 'Borrar wiki',
	'farmer-delete-text' => 'Por favor seleccione el wiki de la lista de abajo que desea borrar',
	'farmer-delete-form' => 'Seleccione un wiki',
	'farmer-delete-form-submit' => 'Borrar',
	'farmer-listofwikis' => 'Lista de wikis',
	'farmer-mainpage' => 'Página Principal',
	'farmer-basic-title' => 'Parámetros básicos',
	'farmer-basic-title1' => 'Título',
	'farmer-basic-description' => 'Descripción',
	'farmer-basic-permission' => 'Permisos',
	'farmer-basic-permission-text' => 'Usando el formulario de abajo, es posible alterar los permisos para los usuarios de este wiki.',
	'farmer-basic-permission-visitor' => 'Permisos para todo visitante',
	'farmer-basic-permission-visitor-text' => 'Los siguientes permisos serán aplicados a toda persona que visite este wiki',
	'farmer-basic-permission-view' => 'Ver todas las páginas',
	'farmer-basic-permission-edit' => 'Editar todas las páginas',
	'farmer-basic-permission-createpage' => 'Crear nuevas páginas',
	'farmer-basic-permission-createtalk' => 'Crear páginas de discusión',
	'farmer-basic-permission-move' => 'Mover páginas',
	'farmer-basic-permission-upload' => 'Subir archivos',
	'farmer-basic-permission-minoredit' => 'Permitir ediciones menores',
	'farmer-yes' => 'Sí',
	'farmer-no' => 'No',
	'farmer-basic-permission-user' => 'Permisos para usuarios que han iniciado sesión',
	'farmer-setpermission' => 'Configurar permisos',
	'farmer-defaultskin' => 'Piel por defecto',
	'farmer-defaultskin-button' => 'Configurar piel por defecto',
	'farmer-extensions' => 'Extensiones activas',
	'farmer-extensions-button' => 'Configurar extensiones activas',
	'farmer-extensions-invalid' => 'Extensión inválida',
	'farmer-extensions-available' => 'Extensiones disponibles',
	'farmer-extensions-noavailable' => 'Ninguna extensión está registrada',
	'farmer-extensions-register' => 'Registrar extensión',
	'farmer-extensions-register-text4' => 'Las actuales rutas incluídas son:',
	'farmer-extensions-register-name' => 'Nombre',
	'farmer-extensions-register-includefile' => 'Incluir archivo',
	'farmer-error-exists' => 'No se puede crear wiki. Ya existe: $1',
	'farmer-log-create' => 'Creado el wiki "$2"',
	'farmer-log-delete' => 'Borrado el wiki "$2"',
);

/** Estonian (Eesti)
 * @author Silvar
 */
$messages['et'] = array(
	'farmer-createwiki-user' => 'Kasutajanimi',
	'farmer-createwiki-name' => 'Wiki nimi',
	'farmer-createwiki-title' => 'Wiki pealkiri',
	'farmer-createwiki-description' => 'Kirjeldus',
	'farmer-createwiki-reason' => 'Põhjus',
	'farmer-updatedlist' => 'Uuendatud nimekiri',
	'farmer-notaccessible' => 'Pole kättesaadav',
	'farmer-notaccessible-test' => 'See võimalus on olemas ainult serveri farmi, kesksel-vikil',
	'farmer-permissiondenied' => 'Õigused puuduvad',
	'farmer-permissiondenied-text' => 'Sul pole õigusi, et kustutada wikit farmist',
	'farmer-permissiondenied-text1' => 'Sul pole õigusi, sellele lehele ligipääsuks',
	'farmer-deleting' => 'Viki "$1" on kustutatud',
	'farmer-delete-confirm' => 'Ma kinnitan, et ma tahan seda vikit kustutada',
	'farmer-delete-confirm-wiki' => "Kustuta Viki: '''$1'''.",
	'farmer-delete-reason' => 'Põhjus selle kustutamiseks:',
	'farmer-delete-title' => 'Kustuta Viki',
	'farmer-delete-text' => 'Palun vali alt nimekirjast viki mida sa soovid kustutada',
	'farmer-delete-form' => 'Vali viki',
	'farmer-delete-form-submit' => 'Kustuta',
	'farmer-listofwikis' => 'Vikide nimekiri',
	'farmer-mainpage' => 'Esileht',
	'farmer-basic-title' => 'Põhi parametrid',
	'farmer-basic-title1' => 'Pealkiri',
);

/** Basque (Euskara)
 * @author An13sa
 * @author Theklan
 */
$messages['eu'] = array(
	'farmer' => 'Nekazaria',
	'farmer-desc' => 'MediaWiki basetxe bat kudeatu',
	'farmercantcreatewikis' => 'Ezin dituzu wikiak sortu ez daukazulako createwikis eskumenik',
	'farmercreateurl' => 'URL',
	'farmercreatesitename' => 'Lekuaren izena',
	'farmercreatenextstep' => 'Hurrengo pausoa',
	'farmernewwikimainpage' => '== Ongietorria zure wikira ==
Hau irakurtzen bazaude zure wiki berria ondo instalatu da.
[[Special:Farmer|Zure wikia aldatu]] ahal duzu.',
);

/** Finnish (Suomi)
 * @author Cimon Avaro
 * @author Crt
 * @author Nike
 * @author Str4nd
 */
$messages['fi'] = array(
	'farmer' => 'Wikipelto',
	'farmercantcreatewikis' => 'Et voi luoda uusia wikejä, koska sivulla ei ole <tt>createwikis</tt>-oikeutta.',
	'farmercreatesitename' => 'Sivuston nimi',
	'farmercreatenextstep' => 'Seuraava askel',
	'farmernewwikimainpage' => '== Tervetuloa wikiisi ==
Jos luet tätä, uusi wikisi on asennettu onnistuneesti. Voit halutessasi [[Special:Farmer|muuttaa wikin asetuksia]].',
	'farmer-about' => 'Tietoja',
	'farmer-about-text' => 'MediaWikin Farmer-laajennus mahdollistaa oman wikipellon hallitsemisen.',
	'farmer-list-wiki' => 'Wikilista',
	'farmer-list-wiki-text' => '[[$1|Lista]] kaikista {{SITENAME}}-sivuston wikeistä',
	'farmer-createwiki' => 'Uusi wiki',
	'farmer-createwiki-text' => '[[$1|Luo]] uusi wiki',
	'farmer-administration' => 'Pellon ylläpito',
	'farmer-administration-extension' => 'Laajennokset',
	'farmer-administration-extension-text' => '[[$1|Valitse]] käytettävät laajennokset.',
	'farmer-administration-delete' => 'Poista wiki',
	'farmer-notavailable' => 'Ei saatavilla',
	'farmer-wikicreated' => 'Wiki luotu',
	'farmer-confirmsetting' => 'Vahvista wikin asetukset',
	'farmer-confirmsetting-name' => 'Nimi',
	'farmer-confirmsetting-description' => 'Kuvaus',
	'farmer-description' => 'Kuvaus',
	'farmer-button-confirm' => 'Vahvista',
	'farmer-button-submit' => 'Lähetä',
	'farmer-createwiki-form-title' => 'Luo wiki',
	'farmer-createwiki-form-text1' => 'Luo uusi wiki alla olevalla lomakkeella.',
	'farmer-createwiki-form-help' => 'Ohje',
	'farmer-createwiki-user' => 'Käyttäjätunnus',
	'farmer-createwiki-name' => 'Wikin nimi',
	'farmer-createwiki-title' => 'Wikin otsikko',
	'farmer-createwiki-description' => 'Kuvaus',
	'farmer-updatedlist' => 'Päivitetty lista',
	'farmer-permissiondenied' => 'Käyttö estetty',
	'farmer-delete-title' => 'Poista wiki',
	'farmer-delete-form' => 'Valitse wiki',
	'farmer-delete-form-submit' => 'Poista',
	'farmer-listofwikis' => 'Lista wikeistä',
	'farmer-mainpage' => 'Etusivu',
	'farmer-basic-title1' => 'Otsikko',
	'farmer-basic-title1-text' => 'Wikilläsi ei ole otsikkoa.  Aseta se <b>nyt</b>',
	'farmer-basic-description' => 'Kuvaus',
	'farmer-basic-description-text' => 'Lisää kuvaus wikistäsi alle',
	'farmer-basic-permission' => 'Käyttöoikeudet',
	'farmer-basic-permission-view' => 'Näytä kaikki sivut',
	'farmer-basic-permission-edit' => 'Muokkaa kaikkia sivuja',
	'farmer-basic-permission-createpage' => 'Luo uusia sivuja',
	'farmer-basic-permission-createtalk' => 'Luo keskustelusivuja',
	'farmer-basic-permission-move' => 'Siirrä sivuja',
	'farmer-basic-permission-upload' => 'Tallenna tiedostoja',
	'farmer-basic-permission-minoredit' => 'Salli pienet muokkaukset',
	'farmer-yes' => 'Kyllä',
	'farmer-no' => 'Ei',
	'farmer-defaultskin' => 'Oletusulkoasu',
	'farmer-defaultskin-button' => 'Aseta oletusulkoasu',
	'farmer-extensions' => 'Käytössä olevat laajennukset',
	'farmer-extensions-button' => 'Muuta käytössä olevia laajennuksia',
	'farmer-extensions-invalid' => 'Virheellinen laajennus',
	'farmer-extensions-available' => 'Saatavilla olevat laajennukset',
	'farmer-extensions-noavailable' => 'Yhtään laajennusta ei ole rekisteröity',
	'farmer-extensions-register' => 'Rekisteröi laajennus',
	'farmer-extensions-register-name' => 'Nimi',
	'farmer-extensions-register-includefile' => 'Sisällytä tiedosto',
	'farmer-error-exists' => 'Wikiä ei voitu luoda.  Se on jo olemassa: $1',
);

/** French (Français)
 * @author Crochet.david
 * @author Dereckson
 * @author Grondin
 * @author IAlex
 * @author PieRRoMaN
 * @author Urhixidur
 * @author Verdy p
 */
$messages['fr'] = array(
	'farmer' => 'Administration Multi Wikis',
	'farmer-desc' => 'Administre plusieurs wikis',
	'farmercantcreatewikis' => 'Vous ne pouvez pas créer des wikis car vous n’avez pas l’habilitation « createwikis » nécessaire pour cela.',
	'farmercreateurl' => 'adresse URL',
	'farmercreatesitename' => 'Nom du site',
	'farmercreatenextstep' => 'Étape suivante',
	'farmernewwikimainpage' => '== Bienvenue dans votre Wiki ==
Si vous lisez ce message, ceci indique que votre wiki a été installé correctement.
Vous pouvez [[Special:Farmer|individualiser votre wiki]].',
	'farmer-about' => 'À propos',
	'farmer-about-text' => 'L’extension MediaWiki Farmer vous permet, en permanence, d’organiser un ensemble de wikis issu du logiciel MediaWiki.',
	'farmer-list-wiki' => 'Liste des wikis',
	'farmer-list-wiki-text' => '[[$1|Lister]] tous les wikis sur ce site.',
	'farmer-createwiki' => 'Créer un Wiki',
	'farmer-createwiki-text' => '[[$1|Créer]] maintenant un nouveau wiki.',
	'farmer-administration' => 'Administration générale',
	'farmer-administration-extension' => 'Organiser les extensions',
	'farmer-administration-extension-text' => '[[$1|Organiser]] les extensions installées.',
	'farmer-admimistration-listupdate' => 'Mise à jour des la liste des Wikis',
	'farmer-admimistration-listupdate-text' => '[[$1|Mettre à jour]] la liste des wikis sur ce site.',
	'farmer-administration-delete' => 'Supprimer un Wiki',
	'farmer-administration-delete-text' => '[[$1|Supprimer]] un wiki depuis ce site d’administration générale',
	'farmer-administer-thiswiki' => 'Administrer ce Wiki',
	'farmer-administer-thiswiki-text' => '[[$1|Administrer]] les changements sur ce wiki.',
	'farmer-notavailable' => 'Non disponible',
	'farmer-notavailable-text' => 'Ce programme n’est disponible que sur le site principal',
	'farmer-wikicreated' => 'Wiki créé',
	'farmer-wikicreated-text' => 'Votre wiki a été créé. Il est disponible sur $1',
	'farmer-default' => 'Personne ne dispose, par défaut, de permissions sur ce wiki à part vous. Vous pouvez changer les privilèges utilisateur via $1',
	'farmer-wikiexists' => 'Le Wiki existe',
	'farmer-wikiexists-text' => "Le wiki intitulé '''$1''' et que vous vouliez créer, existe déjà.  Nous vous invitons à retourner en arrière et d’essayer un nouveau nom.",
	'farmer-confirmsetting' => 'Confirmer les paramètres du Wiki',
	'farmer-confirmsetting-name' => 'Nom',
	'farmer-confirmsetting-title' => 'Titre',
	'farmer-confirmsetting-description' => 'Description',
	'farmer-confirmsetting-reason' => 'Motif',
	'farmer-description' => 'Description',
	'farmer-confirmsetting-text' => "Votre wiki, '''$1''', sera accessible depuis l’adresse $3.
L'espace de noms du projet sera '''$2'''.
Les liens vers cet espace de noms seront de la forme '''<nowiki>[[$2:Nom de la page]]</nowiki>'''.
Si c’est bien ce que vous voulez, cliquez sur le bouton '''Confirmer''' ci-dessous.",
	'farmer-button-confirm' => 'Confirmer',
	'farmer-button-submit' => 'Soumettre',
	'farmer-createwiki-form-title' => 'Créer un Wiki',
	'farmer-createwiki-form-text1' => 'Utilisez le formulaire ci-dessous pour créer un nouveau wiki.',
	'farmer-createwiki-form-help' => 'Aide',
	'farmer-createwiki-form-text2' => "; Nom du Wiki : Le nom du Wiki.  Il ne contient que des lettres et des chiffres. Le nom du wiki sera utilisé comme une partie de l'adresse afin de l'identifier. À titre d'exemple, si vous entrez '''titre''', votre wiki sera accessible sur <nowiki>http://</nowiki>'''titre'''.mondomaine.",
	'farmer-createwiki-form-text3' => '; Titre du Wiki : Le titre du wiki.  Il sera utilisé dans le titre de chaque page de votre wiki. Il prendra le nom de l’espace « Project » ainsi que le préfixe interwiki.',
	'farmer-createwiki-form-text4' => '; Description : Description du wiki. Ceci consiste en un texte décrivant le wiki. Il sera affiché dans la liste des wikis.',
	'farmer-createwiki-user' => 'Nom de l’utilisateur',
	'farmer-createwiki-name' => 'Nom du Wiki',
	'farmer-createwiki-title' => 'Titre du Wiki',
	'farmer-createwiki-description' => 'Description',
	'farmer-createwiki-reason' => 'Motif',
	'farmer-updatedlist' => 'Liste mise à jour',
	'farmer-notaccessible' => 'Non accessible',
	'farmer-notaccessible-test' => 'Ce programme est disponible uniquement sur le wiki principal de cet ensemble de projets.',
	'farmer-permissiondenied' => 'Permission refusée',
	'farmer-permissiondenied-text' => 'Vous n’avez pas la permission de supprimer un wiki depuis le site d’administration général.',
	'farmer-permissiondenied-text1' => 'Il ne vous est pas permis d’accéder à cette page.',
	'farmer-deleting' => 'Le wiki « $1 » a été supprimé',
	'farmer-delete-confirm' => 'Je confirme que je veux supprimer ce wiki',
	'farmer-delete-confirm-wiki' => "Wiki à supprimer : '''$1'''.",
	'farmer-delete-reason' => 'Motif de suppression :',
	'farmer-delete-title' => 'Supprimer un Wiki',
	'farmer-delete-text' => 'Veuillez sélectionner le wiki que vous désirez supprimer depuis la liste ci-dessous.',
	'farmer-delete-form' => 'Selectionnez un wiki',
	'farmer-delete-form-submit' => 'Supprimer',
	'farmer-listofwikis' => 'Liste des Wikis',
	'farmer-mainpage' => 'Accueil',
	'farmer-basic-title' => 'Paramètres de base',
	'farmer-basic-title1' => 'Titre',
	'farmer-basic-title1-text' => "Votre wiki ne dispose pas de titre. Indiquez en un '''maintenant'''",
	'farmer-basic-description' => 'Description',
	'farmer-basic-description-text' => 'Indiquez dans le cadre ci-dessous la description de votre wiki.',
	'farmer-basic-permission' => 'Habilitations',
	'farmer-basic-permission-text' => 'En utilisant le formulaire ci-dessous, il est possible de changer les habilitations des utilisateurs de ce wiki.',
	'farmer-basic-permission-visitor' => 'Habilitations pour chaque visiteur',
	'farmer-basic-permission-visitor-text' => 'Les habilitations suivantes seront applicables pour toutes les personnes qui visiteront ce wiki.',
	'farmer-yes' => 'Oui',
	'farmer-no' => 'Non',
	'farmer-basic-permission-user' => 'Habilitations pour les utilisateurs enregistrés',
	'farmer-basic-permission-user-text' => 'Les habilitations suivantes seront applicables à tous les utilisateurs enregistrés sur ce wiki.',
	'farmer-setpermission' => 'Configurer les habilitations',
	'farmer-defaultskin' => 'Apparences par défaut',
	'farmer-defaultskin-button' => 'Configurer l’apparence par défaut',
	'farmer-extensions' => 'Extensions actives',
	'farmer-extensions-button' => 'Configurer les extensions actives',
	'farmer-extensions-extension-denied' => 'Vous n’êtes pas habilité{{GENDER:||e|(e)}} pour l’utilisation de cette fonctionnalité. Vous devez être membre des administrateurs de l’administration multi wikis.',
	'farmer-extensions-invalid' => 'Extension invalide',
	'farmer-extensions-invalid-text' => 'Nous ne pouvons ajouter cette extension car le fichier sélectionné pour l’inclusion est introuvable.',
	'farmer-extensions-available' => 'Extensions disponibles',
	'farmer-extensions-noavailable' => 'Aucune extension n’est enregistrée.',
	'farmer-extensions-register' => 'Enregistrer une extension',
	'farmer-extensions-register-text1' => 'Utilisez le formulaire ci-dessous pour enregistrer une nouvelle extension avec cette fonctionnalité. Une fois l’extension enregistrée, tous les wikis pourront l’utiliser.',
	'farmer-extensions-register-text2' => "En ce qui concerne le paramètre ''Fichier Include'', indiquez le nom du fichier PHP que vous voulez dans LocalSettings.php.",
	'farmer-extensions-register-text3' => "Si le nom du fichier contient '''\$root''', cette variable sera remplacée par le répertoire racine de MediaWiki.",
	'farmer-extensions-register-text4' => 'Les chemins actuels des fichiers include sont :',
	'farmer-extensions-register-name' => 'Nom',
	'farmer-extensions-register-includefile' => 'Fichier à inclure',
	'farmer-error-exists' => 'L’interface ne peut créer le Wiki.  Il existe déjà : $1',
	'farmer-error-noextwrite' => 'Impossible d’écrire le fichier d’extension suivant :',
	'farmer-log-name' => 'Journal de la ferme wiki',
	'farmer-log-header' => 'Ce journal contient les modifications apportées à la ferme wiki.',
	'farmer-log-create' => 'a créé le wiki « $2 »',
	'farmer-log-delete' => 'a supprimé le wiki « $2 »',
	'right-farmeradmin' => 'Gérer la ferme de wikis',
	'right-createwiki' => 'Créer des wikis dans la ferme de wikis',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'farmercreateurl' => 'l’adrèce',
);

/** Western Frisian (Frysk)
 * @author Snakesteuben
 */
$messages['fy'] = array(
	'farmer-description' => 'Beskriuwing',
	'farmer-createwiki-user' => 'Meidoggernamme',
	'farmer-createwiki-description' => 'Beskriuwing',
	'farmer-delete-form-submit' => 'Wiskje',
	'farmer-mainpage' => 'Haadside',
	'farmer-basic-description' => 'Beskriuwing',
	'farmer-basic-permission-upload' => 'Triemmen oplade',
	'farmer-yes' => 'Ja',
);

/** Galician (Galego)
 * @author Alma
 * @author Toliño
 * @author Xosé
 */
$messages['gl'] = array(
	'farmer' => 'Granxeiro',
	'farmer-desc' => 'Xestionar unha granxa MediaWiki',
	'farmercantcreatewikis' => 'Non pode crear wikis porque non ten os privilexios de creación de wikis',
	'farmercreatesitename' => 'Nome do sitio web',
	'farmercreatenextstep' => 'Seguinte paso',
	'farmernewwikimainpage' => '== Dámoslle a benvida ao seu wiki ==
Se está a ler isto, o seu novo wiki foi instalado correctamente.
Pode [[Special:Farmer|personalizar o seu wiki]].',
	'farmer-about' => 'Acerca de',
	'farmer-about-text' => 'O granxeiro MediaWiki permítelle xestionar unha granxa de wikis MediaWiki.',
	'farmer-list-wiki' => 'Lista dos wikis',
	'farmer-list-wiki-text' => '[[$1|Lista]] de todos os sitios de {{SITENAME}}',
	'farmer-createwiki' => 'Crear un wiki',
	'farmer-createwiki-text' => '[[$1|Crear]] xa un novo wiki!',
	'farmer-administration' => 'Administración da granxa',
	'farmer-administration-extension' => 'Xestionar as extensións',
	'farmer-administration-extension-text' => '[[$1|Administrar]] as extensións instaladas.',
	'farmer-admimistration-listupdate' => 'Actualización da lista da granxa',
	'farmer-admimistration-listupdate-text' => '[[$1|Actualizar]] a lista de wikis en {{SITENAME}}',
	'farmer-administration-delete' => 'Eliminar un wiki',
	'farmer-administration-delete-text' => '[[$1|Borrar]] un wiki da granxa',
	'farmer-administer-thiswiki' => 'Administrar este wiki',
	'farmer-administer-thiswiki-text' => '[[$1|Administrar]] os cambios deste wiki',
	'farmer-notavailable' => 'Non dispoñíbel',
	'farmer-notavailable-text' => 'Esta característica só está dispoñible no wiki principal',
	'farmer-wikicreated' => 'Wiki creado',
	'farmer-wikicreated-text' => 'O seu wiki foi creado.
É accesíbel en $1',
	'farmer-default' => 'Por omisión, ninguén dispón de permisos neste wiki a excepción de vostede.
Pode modificar os privilexios de usuario mediante $1',
	'farmer-wikiexists' => 'O wiki existe',
	'farmer-wikiexists-text' => "O wiki que está intentando crear, '''$1''', xa existe.
Por favor volva atrás e ténteo con outro nome.",
	'farmer-confirmsetting' => 'Confirmar as configuracións do wiki',
	'farmer-confirmsetting-name' => 'Nome',
	'farmer-confirmsetting-title' => 'Título',
	'farmer-confirmsetting-description' => 'Descrición',
	'farmer-confirmsetting-reason' => 'Motivo',
	'farmer-description' => 'Descrición',
	'farmer-confirmsetting-text' => "O seu wiki, '''$1''', será accesible desde $3.
O espazo de nomes do proxecto será '''$2'''.
As ligazóns cara a este espazo de nomes serán da seginte forma: '''<nowiki>[[$2:Nome da páxina]]</nowiki>'''.
Se isto é o que quere, prema no botón '''Confirmar''' de embaixo.",
	'farmer-button-confirm' => 'Confirmar',
	'farmer-button-submit' => 'Enviar',
	'farmer-createwiki-form-title' => 'Crear un wiki',
	'farmer-createwiki-form-text1' => 'Use el formulario de embaixo para crear un novo wiki.',
	'farmer-createwiki-form-help' => 'Axuda',
	'farmer-createwiki-form-text2' => "; Nome do wiki: o nome do wiki.
Contén só letras e números.
O nome do wiki será usado como parte da URL para identificar o seu wiki.
Por exemplo, se introduce '''título''', poderá acceder ao seu wiki desde <nowiki>http://</nowiki>'''título'''.mydomain.",
	'farmer-createwiki-form-text3' => '; Título do wiki: título do wiki.
Será usado no título de cada páxina no seu wiki.
Tamén será o espazo de nomes e o prefixo do interwiki do proxecto.',
	'farmer-createwiki-form-text4' => '; Descrición: descrición do wiki.
Este é un texto descritivo sobre o wiki.
Isto será amosado na lista dos wikis.',
	'farmer-createwiki-user' => 'Nome do usuario',
	'farmer-createwiki-name' => 'Nome do wiki',
	'farmer-createwiki-title' => 'Título do wiki',
	'farmer-createwiki-description' => 'Descrición',
	'farmer-createwiki-reason' => 'Motivo',
	'farmer-updatedlist' => 'Lista actualizada',
	'farmer-notaccessible' => 'Inaccesíbel',
	'farmer-notaccessible-test' => 'Esta característica só está dispoñible no wiki pai da granxa',
	'farmer-permissiondenied' => 'Permiso denegado',
	'farmer-permissiondenied-text' => 'Non ten permiso para borrar un wiki da granxa',
	'farmer-permissiondenied-text1' => 'Non ten permiso para acceder a esta páxina',
	'farmer-deleting' => 'O wiki "$1" foi borrado',
	'farmer-delete-confirm' => 'Confirmo que quero borrar este wiki',
	'farmer-delete-confirm-wiki' => "Wiki a borrar: '''$1'''.",
	'farmer-delete-reason' => 'Motivo para o borrado:',
	'farmer-delete-title' => 'Eliminar o wiki',
	'farmer-delete-text' => 'Por favor, seleccione o wiki que quere eliminar na lista de embaixo',
	'farmer-delete-form' => 'Seleccionar un wiki',
	'farmer-delete-form-submit' => 'Eliminar',
	'farmer-listofwikis' => 'Lista dos wikis',
	'farmer-mainpage' => 'Portada',
	'farmer-basic-title' => 'Parámetros básicos',
	'farmer-basic-title1' => 'Título',
	'farmer-basic-title1-text' => 'O seu wiki non ten un título. Elixa un AGORA',
	'farmer-basic-description' => 'Descrición',
	'farmer-basic-description-text' => 'Poña a descrición do seu wiki embaixo',
	'farmer-basic-permission' => 'Permisos',
	'farmer-basic-permission-text' => 'Usando o formulario de embaixo, é posíbel mudar os permisos para os usuarios deste wiki.',
	'farmer-basic-permission-visitor' => 'Permisos para cada visitante',
	'farmer-basic-permission-visitor-text' => 'Os seguintes permisos serán aplicados a calquera persoa que visite este wiki',
	'farmer-yes' => 'Si',
	'farmer-no' => 'Non',
	'farmer-basic-permission-user' => 'Permisos para os usuarios rexistrados',
	'farmer-basic-permission-user-text' => 'Os seguintes permisos serán aplicados a cada persoa que estea rexistrada neste wiki',
	'farmer-setpermission' => 'Elixir permisos',
	'farmer-defaultskin' => 'Apariencia por defecto',
	'farmer-defaultskin-button' => 'Fixar a apariencia por defecto',
	'farmer-extensions' => 'Extensións activas',
	'farmer-extensions-button' => 'Elixir extensións activas',
	'farmer-extensions-extension-denied' => 'Non ten permiso para usar esta característica.
Debe ser un membro do grupo da administración da granxa',
	'farmer-extensions-invalid' => 'Extensión non válida',
	'farmer-extensions-invalid-text' => 'Non podemos engadir a extensión porque o arquivo seleccionado para incluír non se pode atopar',
	'farmer-extensions-available' => 'Extensións dispoñíbeis',
	'farmer-extensions-noavailable' => 'Non hai extensións rexistradas',
	'farmer-extensions-register' => 'Rexistrar a extensión',
	'farmer-extensions-register-text1' => 'Use o formulario de embaixo para rexistrar unha nova extención coa granxa.
Unha vez que a extensión estea rexistrada, todos os wikis poderana usar.',
	'farmer-extensions-register-text2' => "Para o parámetro ''Incluír o ficheiro'' insira o nome do ficheiro PHP como o quere en LocalSettings.php.",
	'farmer-extensions-register-text3' => "Se o nome do ficheiro contén '''\$root''', esa variable será reemprazada coa raíz do directorio MediaWiki.",
	'farmer-extensions-register-text4' => 'Os camiños incluídos actualmente son:',
	'farmer-extensions-register-name' => 'Nome',
	'farmer-extensions-register-includefile' => 'Incluír o ficheiro',
	'farmer-error-exists' => 'Non pode crear o wiki. Xa existe: $1',
	'farmer-error-noextwrite' => 'Non pode escribir a extensión do ficheiro:',
	'farmer-log-name' => 'Rexistro do wiki granxa',
	'farmer-log-header' => 'Este é un rexistro dos cambios feitos no wiki granxa.',
	'farmer-log-create' => 'creou o wiki "$2"',
	'farmer-log-delete' => 'eliminou o wiki "$2"',
	'right-farmeradmin' => 'Xestionar o wiki granxa',
	'right-createwiki' => 'Crear wikis no wiki granxa',
);

/** Gothic (Gothic)
 * @author Jocke Pirat
 */
$messages['got'] = array(
	'farmer-delete-form-submit' => 'Taíran',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'farmercreatesitename' => 'Ὄνομα ἱστοτόπου',
	'farmercreatenextstep' => 'Ἑπόμενον βῆμα',
	'farmer-about' => 'Περί',
	'farmer-createwiki' => 'Ποιεῖν ϝίκι τι',
	'farmer-administration-delete' => 'Διαγράφειν ϝίκι τι',
	'farmer-notavailable' => 'Μὴ διαθέσιμος',
	'farmer-confirmsetting-name' => 'Ὄνομα',
	'farmer-confirmsetting-title' => 'Ἐπιγραφή',
	'farmer-confirmsetting-description' => 'Περιγραφή',
	'farmer-description' => 'Περιγραφή',
	'farmer-button-confirm' => 'Κυροῦν',
	'farmer-button-submit' => 'Ὑποβάλλειν',
	'farmer-createwiki-form-title' => 'Ποιεῖν ϝίκι τι',
	'farmer-createwiki-form-help' => 'Βοήθεια',
	'farmer-createwiki-user' => 'Ὄνομα χρωμένου',
	'farmer-createwiki-description' => 'Περιγραφή',
	'farmer-delete-form-submit' => 'Σβεννύναι',
	'farmer-mainpage' => 'Κυρία Δέλτος',
	'farmer-basic-title1' => 'Ἐπιγραφή',
	'farmer-basic-description' => 'Περιγραφή',
	'farmer-yes' => 'Ναί',
	'farmer-no' => 'Οὐ',
	'farmer-extensions-register-name' => 'Ὄνομα',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 * @author J. 'mach' wust
 */
$messages['gsw'] = array(
	'farmer' => 'Wiki-Buur',
	'farmer-desc' => 'E MediaWiki-Hof verwalte',
	'farmercantcreatewikis' => 'Du chasch kei Wiki aalege, wel Dir s Rächt („createwikis“) dezue fählt.',
	'farmercreatesitename' => 'Name vu dr Website',
	'farmercreatenextstep' => 'Nechschte Schritt',
	'farmernewwikimainpage' => '== Willchu in Dyynem Wiki ==

Wänn Du dää Täxt liisesch, no hesch Dyy nej Wiki inschtalliert.
Du chasch s no Dyyne Winsch [[Special:Farmer|aapasse]].',
	'farmer-about' => 'Iber',
	'farmer-about-text' => 'MediaWiki-Farmer macht s Dir megli, mehreri MediaWiki z verwalte.',
	'farmer-list-wiki' => 'Wiki uflischte',
	'farmer-list-wiki-text' => '[[$1|Lischt]] vu allene Wiki uf {{SITENAME}}',
	'farmer-createwiki' => 'E Wiki aalege',
	'farmer-createwiki-text' => '[[$1|Leg]] jetz e nej Wiki aa.',
	'farmer-administration' => 'Hof-Verwaltig',
	'farmer-administration-extension' => 'Erwyterige verwalte',
	'farmer-administration-extension-text' => '[[$1|Verwalt]] inschtallierti Erwyterige.',
	'farmer-admimistration-listupdate' => 'Heflischt aktualisiere',
	'farmer-admimistration-listupdate-text' => '[[$1|Aktualisier]] d Lischt vu dr Wiki uf {{SITENAME}}',
	'farmer-administration-delete' => 'E Wiki lesche',
	'farmer-administration-delete-text' => '[[$1|Lesch]] e Wiki vum Hof',
	'farmer-administer-thiswiki' => 'Des Wiki verwalte',
	'farmer-administer-thiswiki-text' => 'Des Wiki [[$1|verwalte]]',
	'farmer-notavailable' => 'Nit verfiegbar',
	'farmer-notavailable-text' => 'Des Feature isch numen im Hauptwiki verfiegbar',
	'farmer-wikicreated' => 'Wiki aagleit',
	'farmer-wikicreated-text' => 'Dyy Wiki isch aagleit wore.
S isch doo: $1',
	'farmer-default' => 'Am Aafang het nieme ußer Dir irgedweleni Rächt in däm Wiki.
Mit $1 chasch d Benutzerrächt ändere',
	'farmer-wikiexists' => 'Wiki git s',
	'farmer-wikiexists-text' => "S Wiki – '''$1''' –, wu Du versuechsch aazlege, git s scho.
Bitte gang zrugg un versuech s mit eme andere Name",
	'farmer-confirmsetting' => 'Wiki-Yystellige bstätige',
	'farmer-confirmsetting-name' => 'Name',
	'farmer-confirmsetting-title' => 'Titel',
	'farmer-confirmsetting-description' => 'Bschryybig',
	'farmer-confirmsetting-reason' => 'Grund',
	'farmer-description' => 'Bschryybig',
	'farmer-confirmsetting-text' => "Dyy Wiki, '''$1''', wird iber $3 erreichbar syy.
Dr Projektnamensruum wird '''$2''' heiße.
Gleicher zue däm Namensruum wäre d Gstalt '''<nowiki>[[$2:Page name]]</nowiki>''' haa.
Wänn alles korräkt isch, no bstätig des mit eme Druck uf '''Bstätige'''.",
	'farmer-button-confirm' => 'Bstätige',
	'farmer-button-submit' => 'Abschicke',
	'farmer-createwiki-form-title' => 'E Wiki aalege',
	'farmer-createwiki-form-text1' => 'Bruuch des Formular go ne nej Wiki aalege.',
	'farmer-createwiki-form-help' => 'Hilf',
	'farmer-createwiki-form-text2' => "; Wikiname: Dr Name vum Wiki.
S derfe nume d Buechstaben A–Z un Zahle din syy.
Dr Wikiname wird as Teil vu dr URL zum Wiki bruucht.
Wänn Du zum Byypil '''Name''' aagisch, no wird d URL zum Wiki <nowiki>http://</nowiki>'''name'''.example.com/ heiße.",
	'farmer-createwiki-form-text3' => '; Wikiname: Name vum Wiki.
Er wird uf jedere Syte vum Wiki bruucht.
Er wird au dr Titel vum Projäktnamensruum un vum Interwiki-Präfix syy.',
	'farmer-createwiki-form-text4' => '; Bschryybig: Bschryybig vum Wiki.
Dää Täxt bschrybt s Wiki un wird uf dr Lischt vu dr Wiki aazeigt.',
	'farmer-createwiki-user' => 'Benutzername',
	'farmer-createwiki-name' => 'Wikiname',
	'farmer-createwiki-title' => 'Wikititel',
	'farmer-createwiki-description' => 'Bschryybig',
	'farmer-createwiki-reason' => 'Grund',
	'farmer-updatedlist' => 'Lischt aktualisiere',
	'farmer-notaccessible' => 'Nit verfiegbar',
	'farmer-notaccessible-test' => 'Des Feature isch numen im Elterewiki vum Hof verfiegbar',
	'farmer-permissiondenied' => 'Zuegriff verweigeret',
	'farmer-permissiondenied-text' => 'Du derfsch kei Wiki vum Hof lesche',
	'farmer-permissiondenied-text1' => 'Du derfsch uf die Syte nit zuegryfe',
	'farmer-deleting' => 'S Wiki „$1“ isch glescht wore',
	'farmer-delete-confirm' => 'Ich bstätig, ass i des Wiki will lesche',
	'farmer-delete-confirm-wiki' => "Wiki, wu soll glescht wäre: '''$1'''.",
	'farmer-delete-reason' => 'Grund fir d Leschig:',
	'farmer-delete-title' => 'Wiki lesche',
	'farmer-delete-text' => 'Bitte wehl s Wiki, wu Du witt leschen, us dr Lischt uus',
	'farmer-delete-form' => 'Wehl e Wiki',
	'farmer-delete-form-submit' => 'Lesche',
	'farmer-listofwikis' => 'Lischt vu dr Wiki',
	'farmer-mainpage' => 'Hauptsyte',
	'farmer-basic-title' => 'Grundsätzligi Parameter',
	'farmer-basic-title1' => 'Titel',
	'farmer-basic-title1-text' => 'Dyy Wiki het no kei Titel. Bitte setz en <b>jetz</b>',
	'farmer-basic-description' => 'Bschryybig',
	'farmer-basic-description-text' => 'Fieg unte d Bschryybig vu Dyynem Wiki yy',
	'farmer-basic-permission' => 'Rächt',
	'farmer-basic-permission-text' => 'Mit däm Formular isch s megli, d Benutzerrächt vum Wiki s ändere.',
	'farmer-basic-permission-visitor' => 'Gaschträcht',
	'farmer-basic-permission-visitor-text' => 'Die Rächt gälte fir Gescht im Wiki',
	'farmer-yes' => 'Jo',
	'farmer-no' => 'Nei',
	'farmer-basic-permission-user' => 'Rächt vu aagmäldete Benutzer',
	'farmer-basic-permission-user-text' => 'Die Rächt gälte fir aagmäldeti Benutzer',
	'farmer-setpermission' => 'Rächt setze',
	'farmer-defaultskin' => 'Standardoberflächi',
	'farmer-defaultskin-button' => 'Standardoberflächi setze',
	'farmer-extensions' => 'Alli Erwyterige',
	'farmer-extensions-button' => 'Aktivi Erwyterige setze',
	'farmer-extensions-extension-denied' => 'Du derfsch des Feature nit verwände, wel dodefir mießtsch zu dr Ammanne vu däm Hof ghere',
	'farmer-extensions-invalid' => 'Nit giltigi Erwyterig',
	'farmer-extensions-invalid-text' => 'D Erwyterig het nit chenne zuegfiegt wäre, wel d Datei, wu zue dr Yybindig uusgwehlt woren isch, isch nit gfunde wore',
	'farmer-extensions-available' => 'Verfiegbari Erwyterige',
	'farmer-extensions-noavailable' => 'S sin kei Erwyterige regischtriert wore',
	'farmer-extensions-register' => 'Erwyterig aamälde',
	'farmer-extensions-register-text1' => 'Bruuch die Maschke unte go ne neji Erwyterig fir dr Hof regischtriere.
Wänn e Erwyterig regischtriert isch, chenne alli Wiki si bruuche.',
	'farmer-extensions-register-text2' => "Gib dr Name vu dr PHP-Datei im ''Include file''-Parameter eso aa, wie Du ne in LocalSettings.php tetsch aagee.",
	'farmer-extensions-register-text3' => "Wänn s im Dateiname '''\$root''' din het, wird die Variable dur s MediaWiki-Wurzelverzeichnis ersetzt.",
	'farmer-extensions-register-text4' => 'D Pfad, wu s aktuäll din het, sin:',
	'farmer-extensions-register-name' => 'Name',
	'farmer-extensions-register-includefile' => 'Datei yybinde',
	'farmer-error-exists' => 'S Wiki cha nit aagleit wäre, wel s es scho git: $1',
	'farmer-error-noextwrite' => 'D Erwyterigsdatei schryybe isch nit megli:',
	'farmer-log-name' => 'Wiki-Hof-Logbuech',
	'farmer-log-header' => 'Des isch e Logbuech vu dr Änderige, wu am Wiki-Hof gmacht wore sin.',
	'farmer-log-create' => 'het s Wiki „$2“ aagleit',
	'farmer-log-delete' => 'het s Wiki „$2“ glescht',
	'right-farmeradmin' => 'Dr Wiki-Hof verwalte',
	'right-createwiki' => 'Wikis uf em Wiki-Hof aalege',
);

/** Gujarati (ગુજરાતી)
 * @author Dineshjk
 */
$messages['gu'] = array(
	'farmer-createwiki-user' => 'સભ્ય નામ:',
);

/** Manx (Gaelg)
 * @author MacTire02
 */
$messages['gv'] = array(
	'farmer' => 'Eirinagh',
	'farmer-desc' => 'Gowaltys MediaWiki y reirey',
	'farmercreatesitename' => 'Ennym yn ynnyd',
	'farmercreatenextstep' => 'Yn chied keim elley',
	'farmer-about' => 'Mychione',
	'farmer-list-wiki' => 'Rolley dagh ooilley Wiki',
	'farmer-list-wiki-text' => '[[$1|Rolley]] dagh ooilley wiki er {{SITENAME}}',
	'farmer-createwiki' => 'Croo Wiki',
	'farmer-createwiki-text' => '[[$1|Croo]] wiki noa nish!',
	'farmer-administration' => 'Reirey gowaltys',
	'farmer-administration-delete' => 'Wiki y scryssey',
	'farmer-administration-delete-text' => '[[$1|Scryss]] wiki ass y gowaltys',
	'farmer-administer-thiswiki' => 'Yn Wiki shoh y reirey',
	'farmer-wikicreated' => "Ta'n Wiki crooit",
	'farmer-confirmsetting-name' => 'Ennym',
	'farmer-confirmsetting-title' => 'Ard-ennym',
	'farmer-confirmsetting-description' => 'Tuarastyl',
	'farmer-description' => 'Tuarastyl',
	'farmer-button-submit' => 'Cur roish',
	'farmer-createwiki-form-title' => 'Croo Wiki',
	'farmer-createwiki-form-help' => 'Cooney',
	'farmer-createwiki-user' => 'Ennym yn ymmydeyr',
	'farmer-createwiki-name' => 'Ennym y Wiki',
	'farmer-createwiki-title' => 'Ard-ennym y Wiki',
	'farmer-createwiki-description' => 'Tuarastyl',
	'farmer-deleting' => 'Va\'n wiki "$1" scrysst magh',
	'farmer-delete-title' => 'Scryss Wiki',
	'farmer-delete-form' => 'Gow wiki myr reih',
	'farmer-delete-form-submit' => 'Scryssey',
	'farmer-listofwikis' => 'Rolley dagh ooilley Wiki',
	'farmer-mainpage' => 'Ard-ghuillag',
	'farmer-basic-title1' => 'Ard-ennym',
	'farmer-basic-title1-text' => 'Cha nel kione-ghraue ec dty wiki. Cur ard-ennym da <b>nish</b>',
	'farmer-basic-description' => 'Tuarastyl',
	'farmer-yes' => 'Ta',
	'farmer-no' => 'Cha',
	'farmer-extensions-register-name' => 'Ennym',
	'farmer-extensions-register-includefile' => 'Goaill stiagh y coadan',
);

/** Hakka (Hak-kâ-fa)
 * @author Hakka
 */
$messages['hak'] = array(
	'farmer-createwiki-user' => 'Yung-fu-miàng',
	'farmer-delete-form-submit' => 'Chhù-thet',
	'farmer-mainpage' => 'Thèu-chông',
);

/** Hawaiian (Hawai`i)
 * @author Kalani
 * @author Singularity
 */
$messages['haw'] = array(
	'farmer-about' => 'E pili ana',
	'farmer-mainpage' => 'Papa kinohi',
	'farmer-basic-permission-upload' => 'Ho‘ouka i nā waihona',
	'farmer-extensions-register-name' => 'Inoa',
);

/** Hebrew (עברית)
 * @author Rotemliss
 * @author YaronSh
 */
$messages['he'] = array(
	'farmer' => 'חוואי',
	'farmer-desc' => 'ניהול חוות מדיה־ויקי',
	'farmercantcreatewikis' => 'אין באפשרותכם ליצור אתרי ויקי כיוון שאין לכם את ההרשאה createwikis',
	'farmercreateurl' => 'כתובת',
	'farmercreatesitename' => 'שם האתר',
	'farmercreatenextstep' => 'הצעד הבא',
	'farmernewwikimainpage' => '== ברוכים הבאים לוויקי שלכם ==
אם אתם קוראים זאת, הוויקי החדש שלכם מותקן כראוי.
תוכלו [[Special:Farmer|להתאים את הוויקי שלכם]].',
	'farmer-about' => 'אודות',
	'farmer-about-text' => 'החוואי של מדיה־ויקי מאפשר לכם לנהל חווה של אתרי ויקי במדיה־ויקי',
	'farmer-list-wiki' => 'רשימת אתרי ויקי',
	'farmer-list-wiki-text' => '[[$1|הצגת]] כל אתרי הוויקי ב־{{SITENAME}}',
	'farmer-createwiki' => 'יצירת אתר ויקי',
	'farmer-createwiki-text' => '[[$1|יצירת]] אתר ויקי חדש כעת!',
	'farmer-administration' => 'ניהול חווה',
	'farmer-administration-extension' => 'ניהול הרחבות',
	'farmer-administration-extension-text' => '[[$1|ניהול]] הרחבות מותקנות.',
	'farmer-admimistration-listupdate' => 'עדכון רשימת החווה',
	'farmer-admimistration-listupdate-text' => '[[$1|עדכון]] רשימת אתרי הוויקי ב{{grammar:תחילית|{{SITENAME}}}}',
	'farmer-administration-delete' => 'מחיקת ויקי',
	'farmer-administration-delete-text' => '[[$1|מחיקת]] ויקי מהחווה',
	'farmer-administer-thiswiki' => 'ניהול ויקי זה',
	'farmer-administer-thiswiki-text' => '[[$1|ניהול]] השינויים לוויקי זה',
	'farmer-notavailable' => 'לא זמין',
	'farmer-notavailable-text' => 'תכונה זו זמינה עבור הוויקי הראשי בלבד',
	'farmer-wikicreated' => 'הוויקי נוצר',
	'farmer-wikicreated-text' => 'הוויקי שלכם נוצר.
ניתן לגשת אליו ב־$1',
	'farmer-default' => 'כברירת מחדל, לאף אחד אין הרשאות לוויקי זה מלבדך.
ניתן לשנות את הרשאות המשתמש דרך $1',
	'farmer-wikiexists' => 'הוויקי קיים',
	'farmer-wikiexists-text' => "הוויקי שהנכם מנסים ליצור '''$1''', כבר קיים.
יש לחזור ולנסות שם אחר.",
	'farmer-confirmsetting' => 'אישור הגדרות הוויקי',
	'farmer-confirmsetting-name' => 'שם',
	'farmer-confirmsetting-title' => 'כותרת',
	'farmer-confirmsetting-description' => 'תיאור',
	'farmer-confirmsetting-reason' => 'סיבה',
	'farmer-description' => 'תיאור',
	'farmer-confirmsetting-text' => "הוויקי שלכם , '''$1''', יהיה נגיש דרך $3.
מרחב השם של המיזם יהיה '''$2'''.
קישורים למרחב שם זה יהיו מהצורה  '''<nowiki>[[$2:שם העמוד]]</nowiki>'''.
אם זהו רצונכם, לחצו על כפתור ה'''אישור''' שלהלן.",
	'farmer-button-confirm' => 'אישור',
	'farmer-button-submit' => 'שליחה',
	'farmer-createwiki-form-title' => 'יצירת ויקי',
	'farmer-createwiki-form-text1' => 'השתמשו בטופס שלהלן ליצירת ויקי חדש.',
	'farmer-createwiki-form-help' => 'עזרה',
	'farmer-createwiki-form-text2' => "; שם הוויקי: השם של הוויקי.
מכיל אותיות ומספרים בלבד.
שם הוויקי ישמש כחלק מהכתובת ה־URL של הוויקי שלכם.
לדוגמה, במידה ותזינו '''title''', אזי ניתן יהיה לגשת אל הוויקי שלכם דרך <nowiki>http://</nowiki>'''title'''.mydomain.",
	'farmer-createwiki-form-text3' => '; כותרת הוויקי: הכותרת של הוויקי.
ישמש בכותרת של כל דף בוויקי שלכם.
כמו כן, ישמש כמרחב השם של המיזם וכקידומת הבינוויקי.',
	'farmer-createwiki-form-text4' => '; תיאור: התיאור של הוויקי.
זהו תיאור מילולי של הוויקי.
תיאור זה יוצג ברשימת אתרי הוויקי.',
	'farmer-createwiki-user' => 'שם המשתמש',
	'farmer-createwiki-name' => 'שם הוויקי',
	'farmer-createwiki-title' => 'כותרת הוויקי',
	'farmer-createwiki-description' => 'תיאור',
	'farmer-createwiki-reason' => 'סיבה',
	'farmer-updatedlist' => 'רשימה מעודכנת',
	'farmer-notaccessible' => 'לא נגיש',
	'farmer-notaccessible-test' => 'תכונה זו זמינה עבור הוויקי הראשי בחווה בלבד',
	'farmer-permissiondenied' => 'הגישה נדחתה',
	'farmer-permissiondenied-text' => 'אין לכם הרשאה למחוק ויקי מהחווה',
	'farmer-permissiondenied-text1' => 'אין לכם הרשאות גישה לדף זה',
	'farmer-deleting' => 'אתר הוויקי "$1" נמחק',
	'farmer-delete-confirm' => 'אני מאשר כי ברצוני למחוק את אתר הוויקי הזה',
	'farmer-delete-confirm-wiki' => "אתר ויקי למחיקה: '''$1'''.",
	'farmer-delete-reason' => 'סיבת המחיקה:',
	'farmer-delete-title' => 'מחיקת הוויקי',
	'farmer-delete-text' => 'אנא בחרו מהרשימה שלהלן את הוויקי שברצונכם למחוק',
	'farmer-delete-form' => 'בחירת ויקי',
	'farmer-delete-form-submit' => 'מחיקה',
	'farmer-listofwikis' => 'רשימת אתרי הוויקי',
	'farmer-mainpage' => 'עמוד ראשי',
	'farmer-basic-title' => 'פרמטרים בסיסיים',
	'farmer-basic-title1' => 'כותרת',
	'farmer-basic-title1-text' => 'לוויקי שלכם אין כותרת.  הגדירו אחת <b>כעת</b>',
	'farmer-basic-description' => 'תיאור',
	'farmer-basic-description-text' => 'הגדירו את תיאור הוויקי שלכם להלן',
	'farmer-basic-permission' => 'הרשאות',
	'farmer-basic-permission-text' => 'באמצעות הטופס שלהלן, ניתן לשנות את הרשאות המשתמשים בוויקי זה',
	'farmer-basic-permission-visitor' => 'ההרשאות של כל אורח',
	'farmer-basic-permission-visitor-text' => 'ההרשאות הבאות יחולו על כל אחד המבקר בוויקי זה',
	'farmer-yes' => 'כן',
	'farmer-no' => 'לא',
	'farmer-basic-permission-user' => 'הרשאות למשתמשים רשומים',
	'farmer-basic-permission-user-text' => 'ההרשאות הבאות יחולו על כל משתמש רשום באתר זה',
	'farmer-setpermission' => 'הגדרת הרשאות',
	'farmer-defaultskin' => 'עיצוב ברירת המחדל',
	'farmer-defaultskin-button' => 'הגדרת עיצוב ברירת המחדל',
	'farmer-extensions' => 'הרחבות פעילות',
	'farmer-extensions-button' => 'הגדרת ההרחבות הפעילות',
	'farmer-extensions-extension-denied' => 'אין לכם הרשאות לשנות תכונה זו.
עליכם להיות חברים בקבוצה farmeradmin',
	'farmer-extensions-invalid' => 'הרחבה בלתי תקינה',
	'farmer-extensions-invalid-text' => 'לא ניתן להוסיף את ההרחבה כיוון שהקובץ שנבחר להכללה אינו קיים',
	'farmer-extensions-available' => 'הרחבות אפשריות',
	'farmer-extensions-noavailable' => 'לא נרשמו הרחבות',
	'farmer-extensions-register' => 'רשימת הרחבה',
	'farmer-extensions-register-text1' => 'ניתן להשתמש בטופס שלהלן כדי לרשום הרחבה חדשה בחווה.
לאחר שההרחבה תירשם, כל אתרי הוויקי יוכלו להשתמש בה.',
	'farmer-extensions-register-text2' => "בפרמטר '''קובץ להכללה''', כתבו את שם קובץ ה־PHP כפי שיש לכותבו ב־LocalSettings.php.",
	'farmer-extensions-register-text3' => "אם שם הקובץ מכיל '''\$root''', משתנה זה יוחלף בתיקייה הראשית של מדיה־ויקי.",
	'farmer-extensions-register-text4' => 'נתיבי ההכללה הנוכחיים הינם:',
	'farmer-extensions-register-name' => 'שם',
	'farmer-extensions-register-includefile' => 'קובץ להכללה',
	'farmer-error-exists' => 'לא ניתן ליצור ויקי.  הוויקי כבר קיים: $1',
	'farmer-error-noextwrite' => 'לא ניתן לכתוב קובץ הרחבה:',
	'farmer-log-name' => 'יומן חוות אתרי הוויקי',
	'farmer-log-header' => 'זהו יומן השינויים שנערכו בחוות אתרי הוויקי.',
	'farmer-log-create' => 'יצר את אתר הוויקי "$2"',
	'farmer-log-delete' => 'מחק את אתר הוויקי "$2"',
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 */
$messages['hi'] = array(
	'farmer' => 'फ़ार्मर',
	'farmer-desc' => 'एक मीडियाविकि फ़ार्म बनायें',
	'farmercantcreatewikis' => 'आप विकि बना नहीं सकते हैं क्योंकी इसके लिये आवश्यक अधिकार आपके पास नहीं हैं',
	'farmercreatesitename' => 'साईट का नाम',
	'farmercreatenextstep' => 'अगला स्टेप',
	'farmernewwikimainpage' => '== आपके विकिमें स्वागत ==
अगर आप यह पढ पा रहें हैं, तो आपका नया विकि शुरू हो चुका हैं। आपका विकि आपकी पसंदोंके अनुसार बदलने के लिये, कृपया [[Special:Farmer]] यहां जायें।',
	'farmer-about' => 'के बारे में',
	'farmer-about-text' => 'मीडियाविकी का फ़ार्मर आपको मीडियाविकि मैनेज करने के लिये सहायता देता हैं।',
	'farmer-list-wiki' => 'विकियोंकी सूची',
	'farmer-list-wiki-text' => '{{SITENAME}} पर उपलब्ध सभी विकियोंकी [[$1|सूची]]',
	'farmer-createwiki' => 'विकि बनायें',
	'farmer-createwiki-text' => 'अभी एक विकि [[$1|तैयार]] करें!',
	'farmer-administration' => 'फ़ार्म प्रबंधन',
	'farmer-administration-extension' => 'एक्स्टेंशन मैनेज करें',
	'farmer-administration-extension-text' => 'इन्स्टॉल किये हुए एक्स्टेंशन को [[$1|मैनेज]] करें।',
	'farmer-admimistration-listupdate' => 'फ़ार्म सूची अपडेट',
	'farmer-admimistration-listupdate-text' => '{{SITENAME}} पर उपलब्ध विकि सूची [[$1|अपडेट]]',
	'farmer-administration-delete' => 'विकि हटायें',
	'farmer-administration-delete-text' => 'इस फ़ार्मसे एक विकि [[$1|हटायें]]',
	'farmer-administer-thiswiki' => 'इस विकिका प्रबंधन करें',
	'farmer-administer-thiswiki-text' => 'इस विकिमें हुए बदलावोंका [[$1|प्रबंधन]] करें',
	'farmer-notavailable' => 'उपलब्ध नहीं हैं',
	'farmer-notavailable-text' => 'यह फीचर सिर्फ मुख्य विकिपर उपलब्ध हैं',
	'farmer-wikicreated' => 'विकि बना दिया है',
	'farmer-wikicreated-text' => 'आपका विकि बन गया हैं।
वह $1 यहां देखा जा सकता है',
	'farmer-default' => 'आपके अलावा इस विकिपर किसीकोभी कुछभी अधिकार नहीं हैं। आप $1 में जाकर सदस्य अधिकार बदल सकतें हैं',
	'farmer-wikiexists' => 'विकि पहलेसे अस्तित्वमें हैं',
	'farmer-wikiexists-text' => "आप जिसे चाहते हैं वह '''$1''' विकि पहलेसे अस्तित्व में हैं।
कृपया पीछे जाकर दुसरे नाम से कोशीश करें",
	'farmer-confirmsetting' => 'विकि सेटींग निश्चित करें',
	'farmer-confirmsetting-name' => 'नाम',
	'farmer-confirmsetting-title' => 'शीर्षक',
	'farmer-confirmsetting-description' => 'ज़ानकारी',
	'farmer-description' => 'ज़ानकारी',
	'farmer-button-confirm' => 'निश्चित करें',
	'farmer-button-submit' => 'भेजें',
	'farmer-createwiki-form-title' => 'विकि बनायें',
	'farmer-createwiki-form-text1' => 'नया विकि बनाने के लिये नीचे दिये गये फ़ार्म का इस्तेमाल करें।',
	'farmer-createwiki-form-help' => 'सहायता',
	'farmer-createwiki-user' => 'सदस्यनाम',
	'farmer-createwiki-name' => 'विकि नाम',
	'farmer-createwiki-title' => 'विकि शीर्षक',
	'farmer-createwiki-description' => 'ज़ानकारी',
	'farmer-updatedlist' => 'अपडेटेड सूची',
	'farmer-notaccessible' => 'उपलब्ध नहीं',
	'farmer-notaccessible-test' => 'यह फ़ीचर सिर्फ फ़ार्मके मुख्य विकिपर ही उपलब्ध हैं',
	'farmer-permissiondenied' => 'अनुमति नहीं दी',
	'farmer-permissiondenied-text' => 'इस फ़ार्म से विकि हटानेकी आपको अनुमति नहीं हैं',
	'farmer-permissiondenied-text1' => 'यह पन्ना देखनेकी आपको अनुमति नहीं हैं',
	'farmer-deleting' => '$1 को हटा रहें हैं',
	'farmer-delete-title' => 'विकि हटायें',
	'farmer-delete-text' => 'कृपया नीचे की सूचीसे हटाने के लिये विकि चुनें',
	'farmer-delete-form' => 'विकि चुनें',
	'farmer-delete-form-submit' => 'हटायें',
	'farmer-listofwikis' => 'विकि सूची',
	'farmer-mainpage' => 'मुखपृष्ठ',
	'farmer-basic-title' => 'बेसिक पैरेमीटर्स',
	'farmer-basic-title1' => 'शीर्षक',
	'farmer-basic-title1-text' => 'आपके विकिको शीर्षक नहीं दिया हुआ हैं। अभी दें',
	'farmer-basic-description' => 'ज़ानकारी',
	'farmer-basic-description-text' => 'आपके विकिके बारे में ज़ानकारी नीचे दें',
	'farmer-basic-permission' => 'अनुमति',
	'farmer-basic-permission-text' => 'नीचे दिये फ़ार्म का इस्तेमाल करके इस विकिपर सदस्योंको मिलनेवाली अनुमतियाँ बदली जा सकती हैं।',
	'farmer-basic-permission-visitor' => 'सभी भेंट देने वालोंके लिये अनुमति',
	'farmer-basic-permission-visitor-text' => 'नीचे दी हुई अनुमतियाँ सभी भेंट देनेवालोंको दी जायेगी',
	'farmer-basic-permission-view' => 'सभी पन्ने देखें',
	'farmer-basic-permission-edit' => 'सभी पन्ने संपादित करें',
	'farmer-basic-permission-createpage' => 'नये पन्ने बनायें',
	'farmer-basic-permission-createtalk' => 'वार्ता पृष्ठ बनायें',
	'farmer-basic-permission-move' => 'पन्ने स्थानांतरित करें',
	'farmer-basic-permission-upload' => 'फ़ाईल अपलोड करें',
	'farmer-basic-permission-reupload' => 'फ़ाईल फिरसे अपलोड करें (पुराना अवतरण हटायें)',
	'farmer-basic-permission-minoredit' => 'छोटे बदलाव करने दें',
	'farmer-yes' => 'हां',
	'farmer-no' => 'नहीं',
	'farmer-basic-permission-user' => 'लॉग इन किये हुए सदस्योंके लिये अनुमति',
	'farmer-basic-permission-user-text' => 'नीचे दी गई अनुमतियाँ विकि पर लॉग इन करने वाले सभी सदस्योंको दी जायेगी',
	'farmer-setpermission' => 'अनुमति दें',
	'farmer-defaultskin' => 'डिफॉल्ट स्कीन',
	'farmer-defaultskin-button' => 'डिफॉल्ट स्कीन चुनें',
	'farmer-extensions' => 'कार्यरत एक्स्टेंशन',
	'farmer-extensions-button' => 'कार्यरत एक्स्टेंशन्स सैट करें',
	'farmer-extensions-extension-denied' => 'आपको यह फ़ीचर इस्तेमाल करने की अनुमति नहीं हैं।
आप फ़ार्मर प्रबंधक ग्रुपमें होना आवश्यक हैं',
	'farmer-extensions-invalid' => 'अवैध एक्स्टेंशन',
	'farmer-extensions-invalid-text' => 'एक्स्टेंशन बढाया नहीं जा सका क्योंकी चुनी हुई फ़ाईल मिली नहीं',
	'farmer-extensions-available' => 'उपलब्ध एक्स्टेंशन्स',
	'farmer-extensions-noavailable' => 'कोईभी एक्स्टेंशन पंजिकृत नहीं हैं',
	'farmer-extensions-register' => 'एक्स्टेंशन पंजिकृत करें',
	'farmer-extensions-register-text2' => "''फ़ाईल मिलायें'' पॅरॅमीटरके लिये PHP फ़ाईल का नाम LocalSettings.php में जैसे दिया था वैसे दिजीयें।",
	'farmer-extensions-register-text3' => "अगर फ़ाईल नाममें '''\$root''' हैं, तो वह मीडियाविकिके मूल डाइरेक्टरीसे बदला जायेगा।",
	'farmer-extensions-register-text4' => 'अभीके इन्क्ल्यूड पाथ इस प्रकार हैं:',
	'farmer-extensions-register-name' => 'नाम',
	'farmer-extensions-register-includefile' => 'फ़ाईल मिलायें',
	'farmer-error-exists' => 'विकि बना नहीं सकते। वह पहले से अस्तित्वमें हैं: $1',
	'farmer-error-noextwrite' => 'एक्स्टेंशन फ़ाईल लिख नहीं पायें:',
);

/** Hiligaynon (Ilonggo)
 * @author Jose77
 */
$messages['hil'] = array(
	'farmer-createwiki-form-help' => 'Bulig',
	'farmer-createwiki-user' => 'Ngalan sang Manog-gamit',
	'farmer-delete-form-submit' => 'Panason',
	'farmer-mainpage' => 'Mayor nga Panid',
	'farmer-basic-permission-upload' => 'Mag karga mga files',
);

/** Croatian (Hrvatski)
 * @author Dalibor Bosits
 */
$messages['hr'] = array(
	'farmer-delete-form-submit' => 'Izbriši',
	'farmer-yes' => 'Da',
	'farmer-no' => 'Ne',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'farmer' => 'Farmar',
	'farmer-desc' => 'Farmu MediaWiki zrjadować',
	'farmercantcreatewikis' => 'Njemóžeš wikije wutworić, dokelž nimaš prawo za wutworjenje wikijow',
	'farmercreatesitename' => 'Mjeno sydła',
	'farmercreatenextstep' => 'Přichodny krok',
	'farmernewwikimainpage' => '== Witaj do twojeho Wikija ==
Jeli to čitaš, je so twój nowy wiki korektnje instalował.
Móžeš [[Special:Farmer|swój wiki přiměrić]].',
	'farmer-about' => 'Wo',
	'farmer-about-text' => 'MediaWiki Farmer ći dowola farmu wikijow MediaWiki zrjadować.',
	'farmer-list-wiki' => 'Lisćina Wikijow',
	'farmer-list-wiki-text' => '[[$1|Nalistuj]] wšě wikije we {{GRAMMAR:Lokatiw|{{SITENAME}}}}',
	'farmer-createwiki' => 'Wiki wutworić',
	'farmer-createwiki-text' => '[[$1|Wutwor]] nětko nowy wiki!',
	'farmer-administration' => 'Farmowa administracija',
	'farmer-administration-extension' => 'Rozšěrjenja zrjadować',
	'farmer-administration-extension-text' => 'Instalowane rozšěrjenja [[$1|zrjadować]]',
	'farmer-admimistration-listupdate' => 'Aktualizacija farmoweje lisćiny',
	'farmer-admimistration-listupdate-text' => '[[$1|Zaktualizuj]] lisćinu wikijow we {{GRAMMAR:Lokatiw|{{SITENAME}}}}',
	'farmer-administration-delete' => 'Wiki wušmórnyć',
	'farmer-administration-delete-text' => 'Wiki z farmy [[$1|wušmórnyć]]',
	'farmer-administer-thiswiki' => 'Tutón wiki administrować',
	'farmer-administer-thiswiki-text' => 'Změny na tutym wikiju [[$1|administrować]]',
	'farmer-notavailable' => 'Nic k dispoziciji',
	'farmer-notavailable-text' => 'Tuta funkcija jenož na hłownym wikiju k dispoziciji steji',
	'farmer-wikicreated' => 'Wiki wutworjeny',
	'farmer-wikicreated-text' => 'Twój wiki je so wutworił. Je pola $1 přistupny',
	'farmer-default' => 'Po standardźe nichtó nimo tebje dowolnosće we tutym wikiju nima. Móžeš wužiwarske prawa  z $1 změnić.',
	'farmer-wikiexists' => 'Wiki eksistuje',
	'farmer-wikiexists-text' => "Wiki, kotryž pospytuješ wutworjeć, '''$1''', hižo eksistuje. Prošu wróć so a spytaj druhe mjeno.",
	'farmer-confirmsetting' => 'Wikijowe nastajenja potwjerdźić',
	'farmer-confirmsetting-name' => 'Mjeno',
	'farmer-confirmsetting-title' => 'Titul',
	'farmer-confirmsetting-description' => 'Wopisanje',
	'farmer-confirmsetting-reason' => 'Přičina',
	'farmer-description' => 'Wopisanje',
	'farmer-confirmsetting-text' => "Twój wiki, '''$1''', budźe přez $3 přistupny być.
Projektowy mjenowy rum budźe '''$2'''.
Wotkazy k tutomu mjenowemu rumej změja formu '''<nowiki>[[$2:Page name]]</nowiki>'''.
Jeli to je to, štož chceš, stłóč deleka tłóčatko '''potwjerdźić'''.",
	'farmer-button-confirm' => 'Potwjerdźić',
	'farmer-button-submit' => 'Wotesłać',
	'farmer-createwiki-form-title' => 'Wiki wutworić',
	'farmer-createwiki-form-text1' => 'Wužij slědowacy formular, zo by nowy wiki wutworił.',
	'farmer-createwiki-form-help' => 'Pomoc',
	'farmer-createwiki-form-text2' => "; Wikijowe mjeno: Mjeno wikija. Wobsahuje jenož pismiki a ličby. Wikijowe mjeno budźe so jako dźěl URL wužiwać, zo by waš wiki identifikowało. Na přikład, jeli zapodaš '''titul''', da budźe twój wiki přez <nowiki>http://</nowiki>'''titul'''.mojadomejna přistupny.",
	'farmer-createwiki-form-text3' => '; Wikijowy titul: Titul wikija. Budźe so wužiwać w titulu kóždeje strony we weašim wikiju. Budźe tež projektowy mjenowy rum a interwikijowy prefiks.',
	'farmer-createwiki-form-text4' => '; Wopisanje: Wopisanje wikija. To je tekstowe wopisanje wo wikiju. Te budźe so we wikijowej lisćinje jewić.',
	'farmer-createwiki-user' => 'Wužiwarske mjeno',
	'farmer-createwiki-name' => 'Mjeno wikija',
	'farmer-createwiki-title' => 'Titul wikija',
	'farmer-createwiki-description' => 'Wopisanje',
	'farmer-createwiki-reason' => 'Přičina',
	'farmer-updatedlist' => 'Zaktualizowana lisćina',
	'farmer-notaccessible' => 'Njepřistupny',
	'farmer-notaccessible-test' => 'Tuta funkcija jenož w nadrjadowanym wikiju we farmje k dispoziciji steji',
	'farmer-permissiondenied' => 'Dowolnosć zapowědźena',
	'farmer-permissiondenied-text' => 'Nimaš dowolnosć, zo by wiki z farmy wušmórnył',
	'farmer-permissiondenied-text1' => 'Nimaš dowolnosć, zo by do tuteje strony zastupił',
	'farmer-deleting' => 'Wiki "$1" je so wušmórnył',
	'farmer-delete-confirm' => 'Haj, chcu tutón wiki zničić',
	'farmer-delete-confirm-wiki' => "Wiki, kotryž ma so zničić: '''$1'''.",
	'farmer-delete-reason' => 'Přičina za zničenje:',
	'farmer-delete-title' => 'Wiki wušmórnyć',
	'farmer-delete-text' => 'Prošu wubjer wiki ze slědowaceje lisćiny, kotryž chceš wušmórnyć',
	'farmer-delete-form' => 'Wiki wubrać',
	'farmer-delete-form-submit' => 'Wušmórnyć',
	'farmer-listofwikis' => 'Lisćina wikijow',
	'farmer-mainpage' => 'Hłowna strona',
	'farmer-basic-title' => 'Zakładne parametry',
	'farmer-basic-title1' => 'Titul',
	'farmer-basic-title1-text' => 'Twój wiki titul nima. Postaj NĚTKO jedyn.',
	'farmer-basic-description' => 'Wopisanje',
	'farmer-basic-description-text' => 'Postaj wopisanje slědowaceho wikija',
	'farmer-basic-permission' => 'Dowolnosće',
	'farmer-basic-permission-text' => 'Z pomocu slědowaceho formulara móžeš prawa za wužiwarjow tutoho wikija změnić.',
	'farmer-basic-permission-visitor' => 'Prawa za kóždeho wopytowarja',
	'farmer-basic-permission-visitor-text' => 'Slědowace dowolnosće nałožuja so na kóždu wosobu, kotraž tutón wiki wopytuje.',
	'farmer-yes' => 'Haj',
	'farmer-no' => 'Ně',
	'farmer-basic-permission-user' => 'Prawa za přizjewjenych wužiwarjow',
	'farmer-basic-permission-user-text' => 'Slědowace prawa budu so na kóždu wosobu nałožować, kotraž je so pola tutoho wikija přizjewiła.',
	'farmer-setpermission' => 'Prawa postajić',
	'farmer-defaultskin' => 'Standardny šat',
	'farmer-defaultskin-button' => 'Standardny šat nastajić',
	'farmer-extensions' => 'Aktiwne rozšěrjenja',
	'farmer-extensions-button' => 'Aktiwne rozšěrjenja nastajić',
	'farmer-extensions-extension-denied' => 'Nimaš dowolnosć, zo by tutu funkciju wužiwał. Dyrbiš čłon skupiny administratorow Farmera.',
	'farmer-extensions-invalid' => 'Njepłaćiwe rozšěrjenje',
	'farmer-extensions-invalid-text' => 'Njemóžachmy rozšěrjenje přidać, dokelž dataja, kotraž bu za zapřijeće wubrana, njebu namakana.',
	'farmer-extensions-available' => 'K dispoziciji stejace rozšěrjenja',
	'farmer-extensions-noavailable' => 'Njejsu žane rozšěrjenja zregistrowane',
	'farmer-extensions-register' => 'Rozšěrjenje registrować',
	'farmer-extensions-register-text1' => 'Wužij slědowacy formular, zo by nowe rozšěrjenje pola farmy registrował. Tak ruče kaž rozšěrjenje je so zregistrowało, móža wšě wikije je wužiwać.',
	'farmer-extensions-register-text2' => "Zapodaj za parameter ''Dataju zapřijeć'' mjeno dataje PHP tak, kaž by to w dataji LocalSettings.php činił.",
	'farmer-extensions-register-text3' => "Jeli datajowe mjeno '''\$root''' wobsahuje, budźe so tuta wariabla přez korjenjowy zapis narunować.",
	'farmer-extensions-register-text4' => 'Tuchwilne puće za zapřijimanje su:',
	'farmer-extensions-register-name' => 'Mjeno',
	'farmer-extensions-register-includefile' => 'Dataju zapřijeć',
	'farmer-error-exists' => 'Wiki njeda so wutowrić. Eksistuje hižo: $1',
	'farmer-error-noextwrite' => 'Rozšěrjenska dataja njeda so wupisać:',
	'farmer-log-name' => 'Protokol wikijoweho farma',
	'farmer-log-header' => 'To je protokol změnow, kotrež su so na wikijowym farmje činili.',
	'farmer-log-create' => 'je wiki "$2" załožił',
	'farmer-log-delete' => 'je wiki "$2" zničił',
	'right-farmeradmin' => 'Wikijowu formu zrjadować',
	'right-createwiki' => 'Wikije we wikijowej farmje wutworić',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author Dorgan
 */
$messages['hu'] = array(
	'farmer' => 'Farmer',
	'farmer-desc' => 'MediaWiki farm beállítása',
	'farmercantcreatewikis' => 'Nem készíthetsz wikiket, mert nincsenek wikikészítői jogaid',
	'farmercreatesitename' => 'Oldal neve',
	'farmercreatenextstep' => 'Következő lépés',
	'farmernewwikimainpage' => '==Üdvözlünk a wikidben==
Ha ezt olvasod, akkor az új wikid helyesen lett feltelepítve.
A wiki testreszabásához látogasd meg a [[Special:Farmer]] lapot.',
	'farmer-about' => 'Célja',
	'farmer-about-text' => 'A MediaWiki Farmer lehetővé teszi számodra MediaWiki wikik farmjának kezelését.',
	'farmer-list-wiki' => 'Wikik listája',
	'farmer-list-wiki-text' => '{{SITENAME}} összes wikijének [[$1|listája]]',
	'farmer-createwiki' => 'Wiki létrehozása',
	'farmer-createwiki-text' => 'Új wiki [[$1|készítése]] most!',
	'farmer-administration' => 'Farm adminisztráció',
	'farmer-administration-extension' => 'Kiterjesztések kezelése',
	'farmer-administration-extension-text' => 'Telepített kiterjesztések [[$1|kezelése]].',
	'farmer-admimistration-listupdate' => 'Wikik listájának frissítése',
	'farmer-admimistration-listupdate-text' => '{{SITENAME}}-wikik listájának [[$1|frissítése]]',
	'farmer-administration-delete' => 'Wiki törlése',
	'farmer-administration-delete-text' => 'Wiki [[$1|törlése]] a farmról',
	'farmer-administer-thiswiki' => 'Wiki adminisztrálása',
	'farmer-administer-thiswiki-text' => 'Változtatások [[$1|végzése]] a wikin',
	'farmer-notavailable' => 'Nem elérhető',
	'farmer-notavailable-text' => 'Ez a funkció csak a főwikiből érhető el',
	'farmer-wikicreated' => 'Wiki elkészítve',
	'farmer-wikicreated-text' => 'A wikid elkészült.  Elérhető $1 címen',
	'farmer-default' => 'Alapértelmezésként rajtad kívül senkinek nincsenek jogai a wikin. A $1 lapon keresztük változtathatod meg a felhasználói jogokat.',
	'farmer-wikiexists' => 'Wiki már létezik',
	'farmer-wikiexists-text' => "A wiki, amelyet megpróbáltál elkészíteni, '''$1''', már létezik.  Menj vissza, és próbálj meg egy másik nevet.",
	'farmer-confirmsetting' => 'Beállítások megerősítése',
	'farmer-confirmsetting-name' => 'Név',
	'farmer-confirmsetting-title' => 'Cím',
	'farmer-confirmsetting-description' => 'Leírás',
	'farmer-description' => 'Leírás',
	'farmer-confirmsetting-text' => "A wikid, '''$1''', elérhető a $3 címen.
A projektnévtér '''$2''' lesz.
Az erre a névtérre hivatkozó linkek formája '''<nowiki>[[$2:Page Name]]</nowiki>''' lesz.
Ha ez az, amit szeretnél, akkor kattints a '''megerősítés''' gombra.",
	'farmer-button-confirm' => 'Megerősítés',
	'farmer-button-submit' => 'Elküldés',
	'farmer-createwiki-form-title' => 'Wiki létrehozása',
	'farmer-createwiki-form-text1' => 'Az alábbi űrlap segítségével új wikit hozhatsz létre.',
	'farmer-createwiki-form-help' => 'Segítség',
	'farmer-createwiki-form-text2' => "; Wiki neve: A wiki leendő neve.  Csak betűek és számokat tartalmazhat.  A wiki nevét azonosításra használjuk az URL részeként.  Például ha a '''nev''' szöveget adod meg, akkor a wikid a <nowiki>http://</nowiki>'''nev'''.mydomain címről lesz elérhető.",
	'farmer-createwiki-form-text3' => '; Wiki címe: A wiki leendő címe.  Ez lesz a címe minden oldalnak a wikin, a projektnévtér és az interwiki előtag.',
	'farmer-createwiki-form-text4' => '; Leírás: A wiki leírása.  Ez egy szöveges leírás a wikiről.  A wikilistában fog megjelenni.',
	'farmer-createwiki-user' => 'Felhasználói név',
	'farmer-createwiki-name' => 'Wiki neve',
	'farmer-createwiki-title' => 'Wiki címe',
	'farmer-createwiki-description' => 'Leírás',
	'farmer-updatedlist' => 'Frissített lista',
	'farmer-notaccessible' => 'Nem elérhető',
	'farmer-notaccessible-test' => 'Ez a funkció csak a farm szülőwikijéből érhető el',
	'farmer-permissiondenied' => 'Engedély megtagadva',
	'farmer-permissiondenied-text' => 'Nincsen jogod wikit törölni a farmról',
	'farmer-permissiondenied-text1' => 'Nincs jogod az oldal megtekintéséhez',
	'farmer-deleting' => '$1 törlése',
	'farmer-delete-title' => 'Wiki törlése',
	'farmer-delete-text' => 'Válaszd ki a listából azt a wikit, amelyet törölni szeretnél',
	'farmer-delete-form' => 'Wiki kiválasztása',
	'farmer-delete-form-submit' => 'Törlés',
	'farmer-listofwikis' => 'Wikik listája',
	'farmer-mainpage' => 'Kezdőlap',
	'farmer-basic-title' => 'Alapparaméterek',
	'farmer-basic-title1' => 'Cím',
	'farmer-basic-title1-text' => 'A wikidnek nincs címe.  Adj meg egyet MOST',
	'farmer-basic-description' => 'Leírás',
	'farmer-basic-description-text' => 'Add meg a wikid leírását lent',
	'farmer-basic-permission' => 'Jogok',
	'farmer-basic-permission-text' => 'Az alábbi űrlap használatával beállíthatod a wiki felhasználóinak jogait.',
	'farmer-basic-permission-visitor' => 'Minden látogató jogai',
	'farmer-basic-permission-visitor-text' => 'A következő jogok fognak vonatkozni a wiki összes látogatójára',
	'farmer-yes' => 'Igen',
	'farmer-no' => 'Nem',
	'farmer-basic-permission-user' => 'Bejelentkezett felhasználók jogai',
	'farmer-basic-permission-user-text' => 'Az alábbi jogok fognak vonatkozni a wikire bejelentkező összes személyre',
	'farmer-setpermission' => 'Jogok beállítása',
	'farmer-defaultskin' => 'Alapértelmezett felület',
	'farmer-defaultskin-button' => 'Alapértelmezett felület beállítása',
	'farmer-extensions' => 'Aktív kiterjesztések',
	'farmer-extensions-button' => 'Aktív kiterjesztések beállítása',
	'farmer-extensions-extension-denied' => 'Nincs jogod a funkció használatára.  A farmeradminok csoportjába kell tartoznod.',
	'farmer-extensions-invalid' => 'Érvénytelen kiterjesztés',
	'farmer-extensions-invalid-text' => 'Nem tudtam hozzáadni a kiterjesztést, mert a beillesztésre kiválaszott fájl nem található',
	'farmer-extensions-available' => 'Elérhető kiterjesztések',
	'farmer-extensions-noavailable' => 'Nincsenek kiterjesztések regisztrálva',
	'farmer-extensions-register' => 'Kiterjesztés regisztrálása',
	'farmer-extensions-register-text1' => 'Az alábbi űrlap használatával új kiterjesztést regisztrálhatsz a farmra.  Miután egy kiterjesztést regisztráltál, minden wikin használható lesz.',
	'farmer-extensions-register-text2' => "A ''beillesztett fájl'' paraméterhez add meg annak a PHP fájlnak a nevét, amelyet beraknál a LocalSettings.php-be.",
	'farmer-extensions-register-text3' => "Ha a fájlnév tartalmazza a '''\$root''' paramétert, akkor az le lesz cserélve a MediaWiki gyökérkönyvtárára.",
	'farmer-extensions-register-text4' => 'A jelenleg figyelembe vett könyvtárak:',
	'farmer-extensions-register-name' => 'Név',
	'farmer-extensions-register-includefile' => 'Beillesztett fájl',
	'farmer-error-exists' => 'A wiki nem hozható létre.  Már létezik: $1',
	'farmer-error-noextwrite' => 'Nem sikerült írni a kiterjesztés fájlába:',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'farmer' => 'Fermero',
	'farmer-desc' => 'Gerer un ferma MediaWiki',
	'farmercantcreatewikis' => 'Tu non pote crear wikis proque tu non ha le privilegio "createwikis"',
	'farmercreatesitename' => 'Nomine del sito',
	'farmercreatenextstep' => 'Proxime passo',
	'farmernewwikimainpage' => '== Benvenite a tu wiki ==
Si tu lege isto, tu nove wiki ha essite installate correctemente.
Tu pote [[Special:Farmer|personalisar tu wiki]].',
	'farmer-about' => 'A proposito',
	'farmer-about-text' => 'Le extension MediaWiki Farmer te permitte gerer un "ferma" de wikis MediaWiki.',
	'farmer-list-wiki' => 'Lista de wikis',
	'farmer-list-wiki-text' => '[[$1|Lista]] de tote le wikis in {{SITENAME}}',
	'farmer-createwiki' => 'Crear un wiki',
	'farmer-createwiki-text' => '[[$1|Crear]] un nove wiki ora!',
	'farmer-administration' => 'Administration del ferma',
	'farmer-administration-extension' => 'Gerer extensiones',
	'farmer-administration-extension-text' => '[[$1|Gerer]] le extensiones installate.',
	'farmer-admimistration-listupdate' => 'Actusliation del lista de fermas',
	'farmer-admimistration-listupdate-text' => '[[$1|Actualisar]] le lista de wikis in {{SITENAME}}',
	'farmer-administration-delete' => 'Deler un wiki',
	'farmer-administration-delete-text' => '[[$1|Deler]] un wiki del ferma',
	'farmer-administer-thiswiki' => 'Administrar iste wiki',
	'farmer-administer-thiswiki-text' => '[[$1|Administrar]] cambios in iste wiki',
	'farmer-notavailable' => 'Non disponibile',
	'farmer-notavailable-text' => 'Iste function es solmente disponibile in le wiki principal',
	'farmer-wikicreated' => 'Wiki create',
	'farmer-wikicreated-text' => 'Tu wiki ha essite create.
Illo es accessibile a $1',
	'farmer-default' => 'Per predefinition, necuno ha permissiones in iste wiki a exception de te.
Tu pote cambiar le privilegios del usatores via $1',
	'farmer-wikiexists' => 'Le wiki existe',
	'farmer-wikiexists-text' => "Le wiki que tu tenta crear, '''$1''', existe ja.
Per favor retorna e prova un altere nomine.",
	'farmer-confirmsetting' => 'Confirmar configurationes del wiki',
	'farmer-confirmsetting-name' => 'Nomine',
	'farmer-confirmsetting-title' => 'Titulo',
	'farmer-confirmsetting-description' => 'Description',
	'farmer-confirmsetting-reason' => 'Motivo',
	'farmer-description' => 'Description',
	'farmer-confirmsetting-text' => "Tu wiki, '''$1''', essera accessibile via $3.
Le spatio de nomines del projecto essera '''$2'''.
Omne ligamines verso iste spatio de nomines habera le forma '''<nowiki>[[$2:Nomine de pagina]]</nowiki>'''.
Si isto es lo que tu vole, preme le button '''confirmar''' infra.",
	'farmer-button-confirm' => 'Confirmar',
	'farmer-button-submit' => 'Submitter',
	'farmer-createwiki-form-title' => 'Crear un wiki',
	'farmer-createwiki-form-text1' => 'Usa le formulario infra pro crear un nove wiki.',
	'farmer-createwiki-form-help' => 'Adjuta',
	'farmer-createwiki-form-text2' => "; Nomine del wiki: Le nomine del wiki.
Contine solmente litteras e numeros.
Le nomine del wiki facera parte del adresse URL pro identificar tu wiki.
Per exemplo, si tu entra '''titulo''', alora tu wiki essera accessibile via <nowiki>http://</nowiki>'''titulo'''.midominio.",
	'farmer-createwiki-form-text3' => '; Titulo del wiki: Le titulo del wiki.
Essera usate in le titulo de cata pagina in tu wiki.
Essera etiam le spatio de nomines e prefixo interwiki del projecto.',
	'farmer-createwiki-form-text4' => '; Description: Le description del wiki.
Isto es un texto explicative super le wiki,
pro figurar in le lista de wikis.',
	'farmer-createwiki-user' => 'Nomine de usator',
	'farmer-createwiki-name' => 'Nomine del wiki',
	'farmer-createwiki-title' => 'Titulo del wiki',
	'farmer-createwiki-description' => 'Description',
	'farmer-createwiki-reason' => 'Motivo',
	'farmer-updatedlist' => 'Lista actualisate',
	'farmer-notaccessible' => 'Non accessibile',
	'farmer-notaccessible-test' => 'Iste function es solmente disponibile in le wiki principal del ferma',
	'farmer-permissiondenied' => 'Permission refusate',
	'farmer-permissiondenied-text' => 'Tu non ha le permission de deler un wiki del ferma',
	'farmer-permissiondenied-text1' => 'Tu non ha le permission de acceder a iste pagina',
	'farmer-deleting' => 'Le wiki "$1" ha essite delite',
	'farmer-delete-confirm' => 'Io confirma que io vole deler iste wiki',
	'farmer-delete-confirm-wiki' => "Wiki a deler: '''$1'''.",
	'farmer-delete-reason' => 'Motivo del deletion:',
	'farmer-delete-title' => 'Deler wiki',
	'farmer-delete-text' => 'Per favor selige le wiki que tu vole deler del lista infra',
	'farmer-delete-form' => 'Selige un wiki',
	'farmer-delete-form-submit' => 'Deler',
	'farmer-listofwikis' => 'Lista de wikis',
	'farmer-mainpage' => 'Pagina principal',
	'farmer-basic-title' => 'Parametros de base',
	'farmer-basic-title1' => 'Titulo',
	'farmer-basic-title1-text' => 'Tu wiki non ha un titulo. Defini un titulo <b>ora</b>',
	'farmer-basic-description' => 'Description',
	'farmer-basic-description-text' => 'Defini a basso le description de tu wiki',
	'farmer-basic-permission' => 'Permissiones',
	'farmer-basic-permission-text' => 'Con le formulario infra, es possibile alterar permissiones pro usatores de iste wiki.',
	'farmer-basic-permission-visitor' => 'Permissiones pro omne visitator',
	'farmer-basic-permission-visitor-text' => 'Le sequente permissiones se applicara a omne persona qui visita iste wiki',
	'farmer-yes' => 'Si',
	'farmer-no' => 'No',
	'farmer-basic-permission-user' => 'Permissiones pro usatores identificate',
	'farmer-basic-permission-user-text' => 'Le sequente permissiones se applicara a omne persona qui ha aperite un session in iste wiki',
	'farmer-setpermission' => 'Definir permissiones',
	'farmer-defaultskin' => 'Stilo predefinite',
	'farmer-defaultskin-button' => 'Predefinir un stilo',
	'farmer-extensions' => 'Extensiones active',
	'farmer-extensions-button' => 'Definir extensiones active',
	'farmer-extensions-extension-denied' => 'Tu non ha le permission de usar iste function.
Tu debe esser un membro del gruppo "farmeradmin"',
	'farmer-extensions-invalid' => 'Extension invalide',
	'farmer-extensions-invalid-text' => 'Nos non poteva adder le extension proque le file seligite pro inclusion non poteva esser trovate',
	'farmer-extensions-available' => 'Extensiones disponibile',
	'farmer-extensions-noavailable' => 'Nulle extension es registrate',
	'farmer-extensions-register' => 'Registrar extension',
	'farmer-extensions-register-text1' => 'Usa le formulario infra pro registrar un nove extension in le ferma.
Quando un extension es registrate, tote le wikis potera usar lo.',
	'farmer-extensions-register-text2' => "Pro le parametro ''Includer file'', entra le nomine del file PHP como tu lo facerea in le file LocalSettings.php.",
	'farmer-extensions-register-text3' => "Si le nomine del file contine '''\$root''', ille variable se reimplaciara per le directorio radice de MediaWiki.",
	'farmer-extensions-register-text4' => 'Le camminos de inclusion actual es:',
	'farmer-extensions-register-name' => 'Nomine',
	'farmer-extensions-register-includefile' => 'File de inclusion',
	'farmer-error-exists' => 'Non pote crear wiki. Illo existe ja: $1',
	'farmer-error-noextwrite' => 'Impossibile scriber al file de extension:',
	'farmer-log-name' => 'Registro del ferma wiki',
	'farmer-log-header' => 'Isto es un registro de modificationes facite al ferma de wikis.',
	'farmer-log-create' => 'creava le wiki "$2"',
	'farmer-log-delete' => 'deleva le wiki "$2"',
	'right-farmeradmin' => 'Gerer le ferma de wikis',
	'right-createwiki' => 'Crear wikis in le ferma de wikis',
);

/** Indonesian (Bahasa Indonesia)
 * @author Irwangatot
 * @author Rex
 */
$messages['id'] = array(
	'farmer-confirmsetting-title' => 'Judul',
	'farmer-createwiki-user' => 'Nama pengguna',
	'farmer-basic-title1' => 'Judul',
	'farmer-yes' => 'Ya',
	'farmer-no' => 'Tidak',
	'farmer-extensions-register-name' => 'Nama',
);

/** Ido (Ido)
 * @author Malafaya
 */
$messages['io'] = array(
	'farmer-confirmsetting-title' => 'Titulo',
	'farmer-basic-title1' => 'Titulo',
	'farmer-yes' => 'Yes',
);

/** Icelandic (Íslenska)
 * @author S.Örvarr.S
 */
$messages['is'] = array(
	'farmer-confirmsetting-name' => 'Nafn',
	'farmer-createwiki-user' => 'Notandanafn',
);

/** Italian (Italiano)
 * @author Darth Kule
 * @author Pietrodn
 */
$messages['it'] = array(
	'farmer' => 'Fattore',
	'farmer-desc' => 'Gestisce una fattoria MediaWiki',
	'farmercantcreatewikis' => "Non puoi creare wiki perché non possiedi i privilegi ''createwikis''",
	'farmercreatesitename' => 'Nome sito',
	'farmercreatenextstep' => 'Passo successivo',
	'farmernewwikimainpage' => '== Benvenuto nella tua nuova wiki ==
Se stai leggendo questo messaggio, la tua wiki è stata installata correttamente.
Puoi [[Special:Farm|personalizzare la tua wiki]].',
	'farmer-about' => 'Informazioni',
	'farmer-about-text' => 'MediaWiki Farmer ti consente di gestire una fattoria di wiki MediaWiki.',
	'farmer-list-wiki' => 'Elenco di wiki',
	'farmer-list-wiki-text' => '[[$1|Elenca]] tutte le wiki su {{SITENAME}}',
	'farmer-createwiki' => 'Crea una wiki',
	'farmer-createwiki-text' => '[[$1|Crea]] una nuova wiki ora!',
	'farmer-administration' => 'Amministrazione della fattoria',
	'farmer-administration-extension' => 'Gestisci estensioni',
	'farmer-administration-extension-text' => '[[$1|Gestisci]] estensioni installate.',
	'farmer-admimistration-listupdate' => 'Aggiornamento della lista della fattoria',
	'farmer-admimistration-listupdate-text' => "[[$1|Aggiorna]] l'elenco delle wiki su {{SITENAME}}",
	'farmer-administration-delete' => 'Cancella una wiki',
	'farmer-administration-delete-text' => '[[$1|Elimina]] una wiki dalla fattoria',
	'farmer-administer-thiswiki' => 'Amministra questa wiki',
	'farmer-administer-thiswiki-text' => '[[$1|Amministra]] i cambiamenti a questa wiki',
	'farmer-notavailable' => 'Non disponibile',
	'farmer-notavailable-text' => 'Questa caratteristica è disponibile solo sulla wiki principale',
	'farmer-wikicreated' => 'Wiki creata',
	'farmer-wikicreated-text' => 'La tua wiki è stata creata.
È accessibile a $1',
	'farmer-default' => 'Per default, nessuno ha permessi su questa wiki eccetto te.
Puoi cambiare i privilegi degli utenti attraverso $1',
	'farmer-wikiexists' => 'La wiki esiste',
	'farmer-wikiexists-text' => "La wiki che stai provando a creare, '''$1''', esiste già.
Torna indietro e prova a inserire un altro nome.",
	'farmer-confirmsetting' => 'Conferma le impostazioni della wiki',
	'farmer-confirmsetting-name' => 'Nome',
	'farmer-confirmsetting-title' => 'Titolo',
	'farmer-confirmsetting-description' => 'Descrizione',
	'farmer-description' => 'Descrizione',
	'farmer-confirmsetting-text' => "La tua wiki, '''$1''', sarà accessibile attraverso $3.
Il namespace progetto sarà '''$2'''.
I collegamenti a questo namespace saranno del tipo '''<nowiki>[[$2:Page name]]</nowiki>'''.
Se è questo quello che vuoi, premi il pulstante '''conferma''' di seguito.",
	'farmer-button-confirm' => 'Conferma',
	'farmer-button-submit' => 'Invia',
	'farmer-createwiki-form-title' => 'Crea una wiki',
	'farmer-createwiki-form-text1' => 'Usa il modulo di seguito per creare una nuova wiki.',
	'farmer-createwiki-form-help' => 'Aiuto',
	'farmer-createwiki-form-text2' => "; Nome wiki: Il nome della wiki
Contiene solo lettere e numeri.
Il nome della wiki sarà usato come parte dell'URL per identificare la tua wiki.
Per esempio, se inserisci '''titolo''', allora la tua wiki sarà accessibile attraverso <nowiki>http://</nowiki>'''titolo'''.miodominio.",
	'farmer-createwiki-form-text3' => '; Titolo wiki: Titolo della wiki.
Sarà usato nel titolo di ogni pagina della tua wiki.
Sarà anche il nome del namespace progetto e dei prefissi degli interwiki.',
	'farmer-createwiki-form-text4' => "; Descrizione: Descrizione della wiki.
Questa è una descrizione della wiki.
Sarà mostrato nell'elenco delle wiki.",
	'farmer-createwiki-user' => 'Nome utente',
	'farmer-createwiki-name' => 'Nome wiki',
	'farmer-createwiki-title' => 'Titolo wiki',
	'farmer-createwiki-description' => 'Descrizione',
	'farmer-updatedlist' => 'Elenco aggiornato',
	'farmer-notaccessible' => 'Non accessibile',
	'farmer-notaccessible-test' => 'Questa funzione è disponibile solo per la wiki genitore nella fattoria',
	'farmer-permissiondenied' => 'Permesso negato',
	'farmer-permissiondenied-text' => 'Non hai il permesso di eliminare una wiki dalla fattoria',
	'farmer-permissiondenied-text1' => 'Non hai il permesso di accedere a questa pagina',
	'farmer-deleting' => 'Il sito "$1" è stato cancellato',
	'farmer-delete-title' => 'Cancella wiki',
	'farmer-delete-text' => "Seleziona nell'elenco la wiki che desideri cancellare",
	'farmer-delete-form' => 'Seleziona una wiki',
	'farmer-delete-form-submit' => 'Cancella',
	'farmer-listofwikis' => 'Elenco di wiki',
	'farmer-mainpage' => 'Pagina principale',
	'farmer-basic-title' => 'Parametri base',
	'farmer-basic-title1' => 'Titolo',
	'farmer-basic-title1-text' => 'La tua wiki non ha un titolo. Impostane uno <b>ora</b>',
	'farmer-basic-description' => 'Descrizione',
	'farmer-basic-description-text' => 'Imposta la descrizione della tua wiki di seguito',
	'farmer-basic-permission' => 'Permessi',
	'farmer-basic-permission-text' => 'Utilizzando il modulo seguente è possibile modificare i permessi degli utenti di questa wiki.',
	'farmer-basic-permission-visitor' => 'Permessi per tutti i visitatori',
	'farmer-basic-permission-visitor-text' => 'I permessi seguenti saranno applicati a tutte le persone che visiteranno questa wiki',
	'farmer-yes' => 'Sì',
	'farmer-no' => 'No',
	'farmer-basic-permission-user' => 'Permessi per gli utenti registrati',
	'farmer-basic-permission-user-text' => 'I permessi seguenti saranno applicati a tutti gli utenti registrati su questa wiki che avranno effettuato il login',
	'farmer-setpermission' => 'Imposta permessi',
	'farmer-defaultskin' => 'Skin di default',
	'farmer-defaultskin-button' => 'Imposta skin di default',
	'farmer-extensions' => 'Attiva estensioni',
	'farmer-extensions-button' => 'Imposta estensioni attive',
	'farmer-extensions-extension-denied' => 'Non hai il permesso di utilizzare questa funzione.
Devi essere un membro del gruppo farmeradmin',
	'farmer-extensions-invalid' => 'Estensione non valida',
	'farmer-extensions-invalid-text' => "Non è stato possibile aggiungere l'estensione perché il file selezionato per l'inclusione non può essere trovato",
	'farmer-extensions-available' => 'Estensioni disponibile',
	'farmer-extensions-noavailable' => 'Nessuna estensione è stata registrata',
	'farmer-extensions-register' => 'Registra estensione',
	'farmer-extensions-register-text1' => "Usa il modulo qui sotto per registrare una nuova estensione con la fattoria.
Una volta che l'estensione sarà stata registrata, tutte le wiki potranno usarla.",
	'farmer-extensions-register-text2' => "Per il parametro ''Include file'', inserisci il nome del file PHP come desideri in LocalSettings.php.",
	'farmer-extensions-register-text3' => "Se il nome del file contiene '''\$root''', quella variabile sarà sostituita con la cartella principale di MediaWiki.",
	'farmer-extensions-register-text4' => 'I percorsi attuali inclusi sono:',
	'farmer-extensions-register-name' => 'Nome',
	'farmer-extensions-register-includefile' => 'Includi file',
	'farmer-error-exists' => 'Impossibile creare wiki. Esiste già :$1',
	'farmer-error-noextwrite' => 'Impossibile scrivere file estensione:',
);

/** Japanese (日本語)
 * @author Fryed-peach
 * @author Hosiryuhosi
 * @author JtFuruhata
 */
$messages['ja'] = array(
	'farmer' => 'ウィキファーム管理',
	'farmer-desc' => 'MediaWiki ファームを管理する',
	'farmercantcreatewikis' => '新規ウィキ作成(createwikis)権限がないため、ウィキを作成できません',
	'farmercreatesitename' => 'サイト名',
	'farmercreatenextstep' => '次の手順',
	'farmernewwikimainpage' => '== あなたのウィキにようこそ ==
もしあなたがこれを読んでいるのなら、新しいウィキは正しくインストールされました。[[Special:Farmer|あなたのウィキをカスタマイズする]]ことができます。',
	'farmer-about' => '解説',
	'farmer-about-text' => 'MediaWiki Farmer を使うと MediaWiki のウィキファームを管理できるようになります。',
	'farmer-list-wiki' => 'ウィキ一覧',
	'farmer-list-wiki-text' => '{{SITENAME}} 上の全ウィキを[[$1|一覧する]]',
	'farmer-createwiki' => 'ウィキを作成する',
	'farmer-createwiki-text' => '新しいウィキを[[$1|作成する]]',
	'farmer-administration' => 'ファーム管理',
	'farmer-administration-extension' => '拡張機能を管理する',
	'farmer-administration-extension-text' => 'インストール済みの拡張機能を[[$1|管理する]]',
	'farmer-admimistration-listupdate' => 'ウィキ一覧を更新する',
	'farmer-admimistration-listupdate-text' => '{{SITENAME}} 上のウィキ一覧を[[$1|更新する]]',
	'farmer-administration-delete' => 'ウィキを削除する',
	'farmer-administration-delete-text' => 'ウィキをファームから[[$1|削除する]]',
	'farmer-administer-thiswiki' => 'このウィキを管理する',
	'farmer-administer-thiswiki-text' => 'このウィキへの変更を[[$1|管理する]]',
	'farmer-notavailable' => '利用不可',
	'farmer-notavailable-text' => 'この機能はメインウィキでのみ利用可能です',
	'farmer-wikicreated' => 'ウィキが作成されました',
	'farmer-wikicreated-text' => 'あなたのウィキが作成されました。$1 でアクセス可能です',
	'farmer-default' => '既定では、あなたを除く誰もこのウィキで許可をもっていません。利用者権限については $1 で変更できます',
	'farmer-wikiexists' => 'ウィキが存在します',
	'farmer-wikiexists-text' => "あなたが作成しようとしたウィキ '''$1''' は既に存在します。戻って別の名前を試してください。",
	'farmer-confirmsetting' => 'ウィキの設定を確認する',
	'farmer-confirmsetting-name' => '名前',
	'farmer-confirmsetting-title' => 'タイトル',
	'farmer-confirmsetting-description' => '概要',
	'farmer-confirmsetting-reason' => '理由',
	'farmer-description' => '概要',
	'farmer-confirmsetting-text' => "あなたのウィキ '''$1''' は $3 でアクセスが可能になります。プロジェクト名前空間は '''$2''' になり、その名前空間へのリンクは '''<nowiki>[[$2:ページ名]]</nowiki>''' という形式になります。これで希望通りならば、以下の'''確認'''ボタンを押してください。",
	'farmer-button-confirm' => '確認',
	'farmer-button-submit' => '送信',
	'farmer-createwiki-form-title' => 'ウィキを作成する',
	'farmer-createwiki-form-text1' => '新しいウィキを作成するには以下のフォームを使ってください。',
	'farmer-createwiki-form-help' => 'ヘルプ',
	'farmer-createwiki-form-text2' => "; ウィキ名: ウィキの名前。
文字と数字のみから成る。ウィキ名はあなたのウィキを識別するURLの一部として使われます。例えば、'''title''' と入力すると、あなたのウィキは <nowiki>http://</nowiki>'''title'''.mydomain というような形式でアクセスされます。",
	'farmer-createwiki-form-text3' => '; ウィキタイトル: ウィキのタイトル。
あなたのウィキのすべてのページのタイトルで使われます。また、プロジェクト名前空間とインターウィキ接頭辞にもなります。',
	'farmer-createwiki-form-text4' => '; 概要: ウィキの概要。
ウィキについての解説文です。これはウィキ一覧で表示されます。',
	'farmer-createwiki-user' => '利用者名',
	'farmer-createwiki-name' => 'ウィキ名',
	'farmer-createwiki-title' => 'ウィキタイトル',
	'farmer-createwiki-description' => '概要',
	'farmer-createwiki-reason' => '理由',
	'farmer-updatedlist' => '更新済みの一覧',
	'farmer-notaccessible' => 'アクセス不可',
	'farmer-notaccessible-test' => 'この機能はファームの親ウィキでのみ利用可能です',
	'farmer-permissiondenied' => '不許可',
	'farmer-permissiondenied-text' => 'あなたはファームからウィキを削除する許可がありません。',
	'farmer-permissiondenied-text1' => 'あなたはこのページにアクセスする許可がありません',
	'farmer-deleting' => 'ウィキ「$1」は削除されました',
	'farmer-delete-confirm' => '私はこのウィキの削除を望むことを確認します。',
	'farmer-delete-confirm-wiki' => "削除するウィキ: '''$1'''",
	'farmer-delete-reason' => '削除の理由:',
	'farmer-delete-title' => 'ウィキを削除する',
	'farmer-delete-text' => '削除したいウィキを以下のリストから選んでください',
	'farmer-delete-form' => 'ウィキを選択する',
	'farmer-delete-form-submit' => '削除',
	'farmer-listofwikis' => 'ウィキ一覧',
	'farmer-mainpage' => 'メインページ',
	'farmer-basic-title' => '基本的なパラメータ',
	'farmer-basic-title1' => 'タイトル',
	'farmer-basic-title1-text' => 'あなたのウィキにはタイトルがありません。<b>今</b>付けてください',
	'farmer-basic-description' => '概要',
	'farmer-basic-description-text' => 'あなたのウィキの概要を以下に書いてください',
	'farmer-basic-permission' => '許可',
	'farmer-basic-permission-text' => '以下のフォームを使うと、このウィキの利用者へ与える許可を変更することができます。',
	'farmer-basic-permission-visitor' => 'すべての訪問者への許可',
	'farmer-basic-permission-visitor-text' => '以下の許可はこのウィキを訪問したすべての人に適用されます',
	'farmer-yes' => 'はい',
	'farmer-no' => 'いいえ',
	'farmer-basic-permission-user' => 'ログイン利用者への許可',
	'farmer-basic-permission-user-text' => '以下の許可はこのウィキにログインしているすべての人に適用されます',
	'farmer-setpermission' => '許可を設定',
	'farmer-defaultskin' => 'デフォルトのスキン',
	'farmer-defaultskin-button' => 'デフォルトのスキンを設定',
	'farmer-extensions' => '利用する拡張機能',
	'farmer-extensions-button' => '利用する拡張機能を設定',
	'farmer-extensions-extension-denied' => 'あなたにはこの機能を使う許可がありません。ウィキファームの管理者グループ (farmeradmin) の一員である必要があります',
	'farmer-extensions-invalid' => '無効な拡張機能',
	'farmer-extensions-invalid-text' => 'インクルードすべきファイルが見つからなかったため、この拡張機能を追加することができませんでした',
	'farmer-extensions-available' => '利用可能な拡張機能',
	'farmer-extensions-noavailable' => '登録されている拡張機能はありません。',
	'farmer-extensions-register' => '拡張機能を登録',
	'farmer-extensions-register-text1' => '拡張機能をファームに新規登録するには以下のフォームを使ってください。拡張機能は一度登録されると、すべてのウィキで利用可能となります。',
	'farmer-extensions-register-text2' => 'パラメータ「インクルードファイル」には、LocalSettings.php に記述するPHPファイルの名前を入力してください。',
	'farmer-extensions-register-text3' => "ファイル名が '''\$root''' を含んでいる場合は、その変数が MediaWiki のルートディレクトリに置換されます。",
	'farmer-extensions-register-text4' => '現在のインクルードパス:',
	'farmer-extensions-register-name' => '名前',
	'farmer-extensions-register-includefile' => 'インクルードファイル',
	'farmer-error-exists' => 'ウィキを作成できません。既に存在しています: $1',
	'farmer-error-noextwrite' => '拡張機能ファイルへの書き出しができません:',
	'farmer-log-name' => 'ウィキファーム記録',
	'farmer-log-header' => 'これはウィキファームに対してなされた変更の記録です。',
	'farmer-log-create' => 'ウィキ「$2」を作成しました',
	'farmer-log-delete' => 'ウィキ「$2」を削除しました',
	'right-farmeradmin' => 'ウィキファームを管理する',
	'right-createwiki' => 'ウィキファーム内にウィキを作成する',
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 */
$messages['jv'] = array(
	'farmercreatesitename' => 'Jeneng situs',
	'farmercreatenextstep' => 'Tahap sabanjuré',
	'farmernewwikimainpage' => '== Sugeng rawuh ing Wiki Panjenengan ==
Menawa panjenengan maca iki, wiki anyar panjenengan wis diinstalasi sacara bener.
Kanggo nata wiki panjenengan, mangga nuwèni [[Special:Farmer]].',
	'farmer-about' => 'Perkara',
	'farmer-list-wiki' => 'Daftar Wiki',
	'farmer-createwiki' => 'Nggawé sawijining Wiki',
	'farmer-createwiki-text' => '[[$1|Nggawé]] wiki anyar saiki!',
	'farmer-administration-delete' => 'Mbusak sawijining Wiki',
	'farmer-administer-thiswiki' => 'Urusana Wiki iki',
	'farmer-notavailable' => 'Ora ana',
	'farmer-notavailable-text' => 'Fitur iki namung kacepakaké ing wiki utama',
	'farmer-wikicreated' => 'Wikiné wis digawé',
	'farmer-wikicreated-text' => 'Wiki panjenengan wis digawé.
Iku bisa diaksès ing $1',
	'farmer-wikiexists' => 'Wikiné èksis',
	'farmer-confirmsetting' => 'Konfirmasi Sètting Wiki',
	'farmer-confirmsetting-name' => 'Jeneng',
	'farmer-confirmsetting-title' => 'Irah-irahan',
	'farmer-confirmsetting-description' => 'Dèskripsi',
	'farmer-description' => 'Dèskripsi',
	'farmer-button-confirm' => 'Konfirmasi',
	'farmer-button-submit' => 'Kirim',
	'farmer-createwiki-form-title' => 'Nggawé sawijining Wiki',
	'farmer-createwiki-form-text1' => 'Enggonen formulir ing ngisor iki kanggo nggawé wiki anyar.',
	'farmer-createwiki-form-help' => 'Pitulung',
	'farmer-createwiki-user' => 'Jeneng panganggo',
	'farmer-createwiki-name' => 'Jeneng wiki',
	'farmer-createwiki-title' => 'Irah-irahan wiki',
	'farmer-createwiki-description' => 'Dèskripsi',
	'farmer-updatedlist' => 'Daftar sing dianyari',
	'farmer-notaccessible' => 'Ora bisa diaksès',
	'farmer-permissiondenied' => 'Idin ditolak',
	'farmer-permissiondenied-text1' => 'Panjenengan ora duwé idin kanggo ngaksès kaca iki',
	'farmer-deleting' => 'Mbusak $1',
	'farmer-delete-title' => 'Busak Wiki',
	'farmer-delete-form' => 'Pilihen sawijining wiki',
	'farmer-delete-form-submit' => 'Busak',
	'farmer-mainpage' => 'Kaca Utama',
	'farmer-basic-title1' => 'Irah-irahan (judhul):',
	'farmer-basic-title1-text' => 'Wiki panjenengan ora duwé irah-irahan. Wènèhana SAIKI',
	'farmer-basic-description' => 'Dèskripsi',
	'farmer-basic-permission' => 'Kabèh idin',
	'farmer-basic-permission-edit' => 'Sunting kabèh kaca',
	'farmer-basic-permission-createpage' => 'Nggawé kaca-kaca anyar',
	'farmer-basic-permission-upload' => 'Ngunggahaké berkas-berkas',
	'farmer-yes' => 'Iya',
	'farmer-no' => 'Ora',
	'farmer-defaultskin' => 'Kulit Baku',
	'farmer-defaultskin-button' => 'Sèt Kulit Baku',
	'farmer-extensions-invalid' => 'Èkstènsi Ora Absah',
	'farmer-extensions-available' => 'Èkstènsi sing Ana',
	'farmer-extensions-register-name' => 'Jeneng',
	'farmer-extensions-register-includefile' => 'Mèlu Lebokna Berkas',
	'farmer-error-exists' => 'Ora bisa nggawé wiki. Sebabé wis ana: $1',
);

/** Georgian (ქართული)
 * @author Malafaya
 */
$messages['ka'] = array(
	'farmer-confirmsetting-name' => 'სახელი',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 * @author Lovekhmer
 * @author Thearith
 * @author គីមស៊្រុន
 */
$messages['km'] = array(
	'farmercantcreatewikis' => 'អ្នក​មិន​អាច​បង្កើត​វិគី​ទេ ពីព្រោះ​អ្នក​គ្មាន​អភ័យឯកសិទ្ឋិ​ក្នុង​ការបង្កើតវិគីទេ។',
	'farmercreatesitename' => 'ឈ្មោះតំបន់បណ្ដាញ',
	'farmercreatenextstep' => 'ជំហានបន្ទាប់',
	'farmernewwikimainpage' => '== សូមស្វាគមន៍ការមកកាន់វិគីរបស់លោកអ្នក ==
ប្រសិនបើអ្នកកំពុងតែអាន មានន័យថាវិគីថ្មីរបស់លោកអ្នកត្រូវបានដំឡើងត្រឹមត្រូវហើយ។

អ្នក​អាច​[[Special:Farmer|ប្ដូរ​វិគី​របស់​អ្នក​តាមបំណង]]។',
	'farmer-about' => 'អំពី',
	'farmer-list-wiki' => 'បញ្ជីវិគី',
	'farmer-list-wiki-text' => '[[$1|បញ្ជី]]នៃរាល់វិគី​នៅលើ {{SITENAME}}',
	'farmer-createwiki' => 'បង្កើតវិគី',
	'farmer-createwiki-text' => '[[$1|បង្កើត]]វិគីថ្មីមួយទៅ!',
	'farmer-administration-extension-text' => '[[$1|គ្រប់គ្រង]]ផ្នែកបន្ថែមដែលបានដំឡើង។',
	'farmer-admimistration-listupdate-text' => '[[$1|បន្ទាន់សម័យ]] បញ្ជី​នៃ​វិគី​លើ {{SITENAME}}',
	'farmer-administration-delete' => 'លុបវិគីចេញ',
	'farmer-administer-thiswiki' => 'អភិរក្សវិគីនេះ',
	'farmer-notavailable' => 'មិន​អាច​រកបាន',
	'farmer-wikicreated' => 'វិគីត្រូវបានបង្កើតហើយ',
	'farmer-wikiexists' => 'វិគីមានរូចហើយ',
	'farmer-wikiexists-text' => "វិគី​ដែលអ្នក​កំពុងព្យាយាមបង្កើត ('''$1''') មានរួចហើយ។ សូម​ត្រឡប់ក្រោយ​ហើយ​ព្យាយាម​ប្រើឈ្មោះផ្សេងទៀត។",
	'farmer-confirmsetting' => 'បញ្ជាក់ទទួលស្គាល់ ការកំណត់ វិគី',
	'farmer-confirmsetting-name' => 'ឈ្មោះ​៖',
	'farmer-confirmsetting-title' => 'ចំណងជើង​៖',
	'farmer-confirmsetting-description' => 'ការពិពណ៌នា​៖',
	'farmer-description' => 'ការពិពណ៌នា',
	'farmer-button-confirm' => 'បញ្ជាក់ទទួលស្គាល់',
	'farmer-button-submit' => 'ដាក់ស្នើ',
	'farmer-createwiki-form-title' => 'បង្កើតវិគី',
	'farmer-createwiki-form-text1' => 'ប្រើប្រាស់​បែបបទ​ខាងក្រោម ដើម្បី​បង្កើត​វិគី​ថ្មី​មួយ​។',
	'farmer-createwiki-form-help' => 'ជំនួយ',
	'farmer-createwiki-user' => 'ឈ្មោះអ្នកប្រើប្រាស់',
	'farmer-createwiki-name' => 'ឈ្មោះវិគី',
	'farmer-createwiki-title' => 'ចំណងជើងវិគី',
	'farmer-createwiki-description' => 'ការពិពណ៌នា',
	'farmer-updatedlist' => 'បញ្ជីត្រូវបានធ្វើឱ្យទាន់សម័យហើយ',
	'farmer-permissiondenied-text1' => 'អ្នក​ពុំ​មាន​ការអនុញ្ញាត​ឱ្យ​ចូលដំណើរការ​ទំព័រ​នេះ​ទេ',
	'farmer-deleting' => 'លុប$1ចេញ',
	'farmer-delete-title' => 'លុបចេញ វិគី',
	'farmer-delete-text' => 'ចូរ​ជ្រើសយក​វិគី​ពីបញ្ជីខាងក្រោម ដែល​អ្នកប្រាថ្នា​លុបចេញ',
	'farmer-delete-form' => 'ជ្រើសរើសវិគី',
	'farmer-delete-form-submit' => 'លុបចេញ',
	'farmer-listofwikis' => 'បញ្ជីវិគី',
	'farmer-mainpage' => 'ទំព័រដើម',
	'farmer-basic-title1' => 'ចំណងជើង',
	'farmer-basic-title1-text' => 'វិគីរបស់លោកអ្នកមិនទាន់មានចំណងជើងទេ។ សូមដាក់ចំណងជើងឱ្យវាពេលនេះ!',
	'farmer-basic-description' => 'ការពិពណ៌នា',
	'farmer-basic-permission' => 'ការអនុញ្ញាត',
	'farmer-basic-permission-view' => 'មើលគ្រប់ទំព័រ',
	'farmer-basic-permission-edit' => 'កែប្រែគ្រប់ទំព័រ',
	'farmer-basic-permission-createpage' => 'បង្កើតទំព័រថ្មីៗ',
	'farmer-basic-permission-createtalk' => 'បង្កើតទំព័រពិភាក្សា',
	'farmer-basic-permission-move' => 'ប្តូរទីតាំងទំព័រ',
	'farmer-basic-permission-upload' => 'ផ្ទុកឯកសារឡើង',
	'farmer-basic-permission-minoredit' => 'អនុញ្ញាតកំណែប្រែតិចតួច',
	'farmer-yes' => 'បាទ/ចាស',
	'farmer-no' => 'ទេ',
	'farmer-setpermission' => 'កំណត់​សិទ្ធិ',
	'farmer-defaultskin' => 'សំបកលំនាំដើម',
	'farmer-defaultskin-button' => 'កំណត់​សំបក​លំនាំដើម',
	'farmer-extensions' => 'ផ្នែកបន្ថែម​សកម្ម',
	'farmer-extensions-button' => 'កំណត់​ផ្នែកបន្ថែម​សកម្ម',
	'farmer-extensions-register-name' => 'ឈ្មោះ',
	'farmer-error-exists' => 'មិនអាចបង្កើតវិគីបានទេ។ វាមានរួចជាស្រេចហើយ៖$1',
);

/** Krio (Krio)
 * @author Jose77
 */
$messages['kri'] = array(
	'farmer-delete-form-submit' => 'Dilit',
	'farmer-mainpage' => 'Men Pej',
);

/** Kinaray-a (Kinaray-a)
 * @author Jose77
 */
$messages['krj'] = array(
	'farmer-about' => 'Angut sa Iwan',
	'farmer-createwiki-form-help' => 'Bolig',
	'farmer-delete-form-submit' => 'Para',
	'farmer-mainpage' => 'Pono nga Pahina',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'farmer' => 'MediaWiki Farmer - ene Shtall voll Wikis',
	'farmer-desc' => 'Donn ene Shtall voll MediaWiki Wikis verwallde.',
	'farmercantcreatewikis' => 'Do kanns kei Wiki neu aanlääje. Do fäählt Der et Rääch dozo („<i lang="en">createwikis</i>“)',
	'farmercreateurl' => 'URL',
	'farmercreatesitename' => 'Dä Webßait iere Name',
	'farmercreatenextstep' => 'Der näkßte Schrett',
	'farmernewwikimainpage' => '== Wellkumme op Dingem Wiki ==
Wann De dat heh lësse kannß, dann eß Ding Wiki öhndlesch opjesaz.
Öm Dingem Wiki sing Ėnshtëllonge zerääsch ze maache, doh jangk op di Sigk [[Special:Farmer]].',
	'farmer-about' => 'Üvver',
	'farmer-about-text' => 'MediaWiki Farmer hellef Der, ene Shtall voll met MediaWiki Wikis ze verwallde.',
	'farmer-list-wiki' => 'Lėßß met_te Wikiiß',
	'farmer-list-wiki-text' => 'Donn all de Wikis op dä {{SITENAME}} [[$1|oplist]]',
	'farmer-createwiki' => 'E Wikki aanlääje',
	'farmer-createwiki-text' => 'Donn jetz e [[$1|neu Wiki aanlääje]]!',
	'farmer-administration' => 'Ene Shtall voll MediaWiki Wikis verwallde',
	'farmer-administration-extension' => 'ßoffwäer-Zosätz verwallde',
	'farmer-administration-extension-text' => 'Don de [[$1|enshtalleete Zosatz-Projramme verwallde]].',
	'farmer-admimistration-listupdate' => 'Leß met Wikis op der neuste Shtand bränge',
	'farmer-admimistration-listupdate-text' => 'Donn de {{SITENAME}} ier [[$1|Wiki Leß ändere]].',
	'farmer-administration-delete' => 'E Wikki fott maache',
	'farmer-administration-delete-text' => 'Donn [[$1|e Wiki hee fottlohße]].',
	'farmer-administer-thiswiki' => 'Donn dit Wiki hee verwallde',
	'farmer-administer-thiswiki-text' => 'Donn [[$1|dat Wiki hee verwallde]].',
	'farmer-notavailable' => 'Ham_mer nit',
	'farmer-notavailable-text' => 'Die Müjjeleschkeit hät mer bloß em Houpwiki',
	'farmer-wikicreated' => 'Wikki aanjelaat',
	'farmer-wikicreated-text' => 'Ding Wiki es aanjelaat.
Mer fengk et unger $1',
	'farmer-default' => 'Shtandattmäßesch hät Keine ußer Dir öhnds_e Rääsch en dämm Wiki.
Do kanns dä Metmaacher ier Rääschte em Wiki ändere övver: $1',
	'farmer-wikiexists' => 'Dat Wikki jidd_et alldt',
	'farmer-wikiexists-text' => 'Dat Wiki „$1“, wat De aanlääje wells, dat jidd-et ald.
Bes esu joot, jangk zerök un versök ene andere Name.',
	'farmer-confirmsetting' => 'Enstellunge för dat Wiki bestätije',
	'farmer-confirmsetting-name' => 'Name',
	'farmer-confirmsetting-title' => 'Tittel',
	'farmer-confirmsetting-description' => 'Beschrevve',
	'farmer-confirmsetting-reason' => 'Jrond',
	'farmer-description' => 'Beschrievung',
	'farmer-confirmsetting-text' => "Ding Wiki met däm Name '''$1''' weed övver $3 zo fenge sin.
Dä Name för däm Projäk sing Appachtemang weed doh '''$2''' sin.
Links op dat Appachtemang weede en dä Aat '''[<nowiki />[$2:Siggetittel]]''' sin.
Wann dat dat es, wat De wells, dann klecks De dä Knopp „'''{{int:farmer-button-confirm}}'''“ unge.",
	'farmer-button-confirm' => 'Beshtätije',
	'farmer-button-submit' => 'Loß Jonn!',
	'farmer-createwiki-form-title' => 'E nöü Wikki opmaache',
	'farmer-createwiki-form-text1' => 'Övver dat Fommulaa hee kanns De e neu Wiki opmaache.',
	'farmer-createwiki-form-help' => 'Hölp',
	'farmer-createwiki-form-text2' => "; Däm Wiki singe Name :
Do dren sin eckersch Bochshtave un Zeffere, sönß nix.
Dä Name weed jebruch, öm als ene Deil en däm singe URL, op Ding Wiki ze zeije.
Wann De hee zem Beishpell '''tittel''' enndräähß, dann weed Ding Wiki met däm URL <nowiki>http://</nowiki>'''tittel'''.mydomain/ ze fenge sin.",
	'farmer-createwiki-form-text3' => '; Däm Wiki singe Tittel :
Dä weed en jeede Sigg en Dingem Wiki als Tittel jebruch.
Dä weed och dä Name vun däm Appachtemang met dä Sigge övver et Projäk waade.
Zojoderläz es dä dä Försatz för de Engewiki-Lenks op Ding Wiki, wann De esu jet ennjeschalldt häs.',
	'farmer-createwiki-form-text4' => '; Beschrievung :
Dä Text beschrief Ding Wiki, un weed en dä Leß met de Wikis aanjezeich.',
	'farmer-createwiki-user' => 'Metmaacher',
	'farmer-createwiki-name' => 'Däm Wiki singe Name',
	'farmer-createwiki-title' => 'Däm Wiki singe Tittel',
	'farmer-createwiki-description' => 'Beschrievung',
	'farmer-createwiki-reason' => 'Jrond',
	'farmer-updatedlist' => 'Leß op der neuste Shtand brenge',
	'farmer-notaccessible' => 'Nit zojänglesch',
	'farmer-notaccessible-test' => 'Dat es en Müjjeleschkeit, die De bloß em Vatterwiki en dämm Shtall vun Wikis häß.',
	'farmer-permissiondenied' => 'Dat es nit älaup',
	'farmer-permissiondenied-text' => 'Do häs nit dat Rääsch, hee en dä Farm e Wiki fottzeschmiiße',
	'farmer-permissiondenied-text1' => 'Do häs nit dat Rääsch, op hee die Sigg zozejriife',
	'farmer-deleting' => 'Dat Wiki „$1“ es jez fottjeschmeße',
	'farmer-delete-confirm' => 'Esch donn beschtähtejje, dat dat Wiki fott sull.',
	'farmer-delete-confirm-wiki' => "Dat Wiki zom Fottschmiiße: '''$1'''.",
	'farmer-delete-reason' => 'Der Jrond för et Fottschmiiße:',
	'farmer-delete-title' => 'E Wikki fott maache',
	'farmer-delete-text' => 'Donn dat Wiki uß dä Leß hee unge ußsöke, wat De fottschmiiße wells',
	'farmer-delete-form' => 'Don e Wiki ußsöke',
	'farmer-delete-form-submit' => 'Fott domet!',
	'farmer-listofwikis' => 'Less fun de Wikis',
	'farmer-mainpage' => 'Houpsigg',
	'farmer-basic-title' => 'Grundläje Parammeetere',
	'farmer-basic-title1' => 'Tittel',
	'farmer-basic-title1-text' => 'Ding Wiki hät keine Tittel. Donn <b>jetz</b> eine aanjevve.',
	'farmer-basic-description' => 'Beschrievung',
	'farmer-basic-description-text' => 'Jif unge de Beschrievung för Ding Wiki en',
	'farmer-basic-permission' => 'Rääschde',
	'farmer-basic-permission-text' => 'Met dämm Fommulaa unge, kanns De de Rääschte för de Metmaachere en dämm Wiki ändere.',
	'farmer-basic-permission-visitor' => '!!Fuzzy!!Räächte för Jeder Minsch ...........',
	'farmer-basic-permission-visitor-text' => 'Hee die Rääschte kritt jede Besöker dä en hee dat Wiki kütt',
	'farmer-yes' => 'Joh',
	'farmer-no' => 'Nää',
	'farmer-basic-permission-user' => 'Räächte för enjelogg Metmaacher',
	'farmer-basic-permission-user-text' => 'De Räächte hee noh kritt Jede, dä sesch en dämm Wiki enlogg',
	'farmer-setpermission' => 'Räächte sätze',
	'farmer-defaultskin' => 'Standat-Övverfläsch',
	'farmer-defaultskin-button' => 'Standat-Övverfläsch Endraare!',
	'farmer-extensions' => 'Aktive Zosäz för dem Wiki sing ßofwäer',
	'farmer-extensions-button' => 'Donn de aktive Zosatz-ßoffwäer setze',
	'farmer-extensions-extension-denied' => 'Do häs nit dat Rääsch, hee die Müjjleschkeit ze bruche.
Doför möötß De ald en dä Metmaacher-Jropp <code lang="en">farmeradmin</code> sin.',
	'farmer-extensions-invalid' => 'Onjöltijje Zosatz zom Wiki',
	'farmer-extensions-invalid-text' => 'Dä Zosatz zom Wiki kunnt nit opjenumme un enjedraare wäde.
Mer han die Datei nit jefonge, die enjefööch wäde mööt.',
	'farmer-extensions-available' => 'Zosätz zom Wiki, die zor Wahl stonn',
	'farmer-extensions-noavailable' => 'Kein Zosätz zom Wiki enjedraare',
	'farmer-extensions-register' => 'Ene Zosatz zom Wiki endraare',
	'farmer-extensions-register-text1' => 'Met hee däm Fomulaa kanns De ene Zosatz för dem Wiki sing ßofwäer för Ding MediaWiki Farm opnämme lohße. Wann dat jemaat es, dann künne all de Wikis se bruche.',
	'farmer-extensions-register-text2' => 'Em <i lang="en">include file</i> Parrameter, do jif dä Name för en <code>.php</code> Datei esu aan, wie De die och en dä Datei <code>LocalSettings.php</code> endraare wööds.',
	'farmer-extensions-register-text3' => 'Wann en däm Name fun dä Dattëj <code>$root</code> dren shtish, dann shtëjt dat för dat Aanfangß_Fo\'zëjshnėß fun_de MedijaWikki ßofwäe.',
	'farmer-extensions-register-text4' => 'Em Momang sen jez de Paade för Dateie per <code>include</code> ze lade:',
	'farmer-extensions-register-name' => 'Name',
	'farmer-extensions-register-includefile' => '<i lang="en">include file</i>',
	'farmer-error-exists' => 'Dat Wikki „$1“ jidd_et alldt. Dat kan_nid_norr_enß nöü aanjelaat wääde.',
	'farmer-error-noextwrite' => 'Mer kunnte de Datei met dä Zosätz nit schriive:',
	'farmer-log-name' => 'Et Logboch fum Shtall vull Wikis',
	'farmer-log-header' => 'Dat Logboch hee zeisch de Änderunge aan däm Shtal vull Wikis.',
	'farmer-log-create' => 'hät dat Wiki „$2“ aanjelaat',
	'farmer-log-delete' => 'hät dat Wiki „$2“ fottjeschmeße',
	'right-farmeradmin' => 'Ene Shtall vull Wikis verwallde',
	'right-createwiki' => 'Neu Wikis en der Shtall vun de Wikis erin donn',
);

/** Kurdish (Latin) (Kurdî / كوردی (Latin))
 * @author Bangin
 */
$messages['ku-latn'] = array(
	'farmer-basic-permission-upload' => "Wêneyan ya data'yan barbike",
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'farmer' => 'Administratioun vu méi Wikien',
	'farmer-desc' => 'Méi Wikien organiséieren',
	'farmercantcreatewikis' => 'Dir kënnt keng nei Wiki opmaachen well dir keng "cratewiki"-Rechter hutt',
	'farmercreatesitename' => 'Numm vum Site',
	'farmercreatenextstep' => 'Nächste Schrëtt',
	'farmernewwikimainpage' => '==Wëllkomm op ärer Wiki ==
Wann Dir dëst liest, gouf är Wiki korrekt installéiert.
Dir kënnt [[Special:Farmer|är Wiki elo astellen]].',
	'farmer-about' => 'Iwwer',
	'farmer-list-wiki' => 'Lëscht vun de Wikien',
	'farmer-list-wiki-text' => '[[$1|Lëscht]] vun alle Wikien op {{SITENAME}}',
	'farmer-createwiki' => 'Eng Wiki ufänken',
	'farmer-createwiki-text' => '[[$1|Maacht]] elo eng nei Wiki!',
	'farmer-administration' => 'Gestioun dëser Lëscht vu Wikien',
	'farmer-administration-extension' => 'Erweiderungen organiséieren',
	'farmer-administration-extension-text' => '[[$1|Organiséiert]] déi installeiert Erweiderungen.',
	'farmer-admimistration-listupdate' => 'Aktualisatioun vun der Lëscht vun de Wikien',
	'farmer-admimistration-listupdate-text' => 'Lëscht vun de Wikien op {{SITENAME}} [[$1|aktualiséieren]]',
	'farmer-administration-delete' => 'E Wiki läschen',
	'farmer-administration-delete-text' => 'Eng Wiki vun der Lëscht [[$1|läschen]]',
	'farmer-administer-thiswiki' => 'Dës Wiki administréieren',
	'farmer-notavailable' => 'Net disponibel',
	'farmer-notavailable-text' => 'Dëse Programm ass nëmmen op der Haapt-Wiki disponibel',
	'farmer-wikicreated' => 'Wiki gemaach',
	'farmer-wikiexists' => "D'Wiki gëtt et",
	'farmer-confirmsetting' => "Confirméiert d'Astellunge vun der Wiki",
	'farmer-confirmsetting-name' => 'Numm',
	'farmer-confirmsetting-title' => 'Iwwerschrëft',
	'farmer-confirmsetting-description' => 'Beschreiwung',
	'farmer-confirmsetting-reason' => 'Grond',
	'farmer-description' => 'Beschreiwung',
	'farmer-button-confirm' => 'Confirméieren',
	'farmer-button-submit' => 'Späicheren',
	'farmer-createwiki-form-title' => 'Eng Wiki ufänken',
	'farmer-createwiki-form-text1' => 'Benotzt de Formulaire hei ënnendrënner fir eng nei Wiki opzemaachen.',
	'farmer-createwiki-form-help' => 'Hëllef',
	'farmer-createwiki-user' => 'Benotzernumm',
	'farmer-createwiki-name' => 'Numm vun der Wiki',
	'farmer-createwiki-title' => 'Titel vun der Wiki',
	'farmer-createwiki-description' => 'Beschreiwung',
	'farmer-createwiki-reason' => 'Grond',
	'farmer-updatedlist' => 'Geännert Lëscht',
	'farmer-notaccessible' => 'Net zougänglech',
	'farmer-permissiondenied' => 'Erlaabnis refuséiert',
	'farmer-permissiondenied-text' => 'Dir hutt nët déi néideg Rechter fir eng Wiki vun dëser Lëscht ze läschen',
	'farmer-permissiondenied-text1' => 'Dir hut net déi néideg Rechter fir op dës Säit ze goen',
	'farmer-deleting' => 'D\'Wiki "$1"  gouf geläscht',
	'farmer-delete-confirm' => 'Ech confirméieren datt ech dës Wiki läsche well',
	'farmer-delete-confirm-wiki' => "Wiki fir ze läschen: '''$1'''.",
	'farmer-delete-reason' => "Grond fir d'Läschen:",
	'farmer-delete-title' => 'Wiki läschen',
	'farmer-delete-text' => "Wielt d'Wiki déi Dir läsche wëllt aus der Lëscht hei ënnendrënner eraus",
	'farmer-delete-form' => 'Wielt eng Wiki eraus',
	'farmer-delete-form-submit' => 'Läschen',
	'farmer-listofwikis' => 'Lëscht vun de Wikien',
	'farmer-mainpage' => 'Haaptsäit',
	'farmer-basic-title' => 'Basisparameteren',
	'farmer-basic-title1' => 'Titel',
	'farmer-basic-title1-text' => "Är Wiki huet keen Titel. Gitt '''elo''' een un.",
	'farmer-basic-description' => 'Beschreiwung',
	'farmer-basic-description-text' => "Gitt d'Beschreiwung vun ärer Wiki hei ënnedrënner an",
	'farmer-basic-permission' => 'Rechter',
	'farmer-basic-permission-visitor' => 'Rechter fir jidfereen',
	'farmer-yes' => 'Jo',
	'farmer-no' => 'Neen',
	'farmer-basic-permission-user' => 'Rechter fir ageloggte Benotzer',
	'farmer-basic-permission-user-text' => 'Dës Rechter kréien all déi Persounen déi op dëser Wiki ageloggt sinn',
	'farmer-setpermission' => 'Rechter configuréieren',
	'farmer-extensions' => 'Aktiv Erweiderungen',
	'farmer-extensions-button' => 'Aktiv Erweiderungen astellen',
	'farmer-extensions-extension-denied' => 'Dir kënnt dës Fonctionalitéit net benotzen.
Dir musst dofir Member vum Grupp vun den Administrateure sinn.',
	'farmer-extensions-invalid' => 'Ongëlteg Erweiderung',
	'farmer-extensions-invalid-text' => "D'Erweiderung konnt net derbäigesat ginn wëll den erausgesichte Fichier deen derbäigesat sollt ginn net fonnt gouf.",
	'farmer-extensions-available' => 'Disponibel Erweiderungen',
	'farmer-extensions-noavailable' => 'Et ass keng Erweiderung registréiert',
	'farmer-extensions-register' => 'Erweiderung ofspäicheren',
	'farmer-extensions-register-name' => 'Numm',
	'farmer-error-exists' => "D'Wiki kann net gemaach ginn. Et gëtt se schonn: $1",
	'farmer-log-name' => 'Logbuch vun dëser Lëscht vu Wikien',
	'farmer-log-create' => 'huet d\'Wiki "$2" ugeluecht',
	'farmer-log-delete' => 'huet d\'Wiki "$2" geläscht',
);

/** Lithuanian (Lietuvių)
 * @author Tomasdd
 */
$messages['lt'] = array(
	'farmer-delete-form-submit' => 'Ištrinti',
);

/** Eastern Mari (Олык Марий)
 * @author Сай
 */
$messages['mhr'] = array(
	'farmer-createwiki-form-help' => 'Полшык',
	'farmer-createwiki-user' => 'Пайдаланышын лӱмжӧ',
	'farmer-delete-form-submit' => 'Шӧраш',
	'farmer-mainpage' => 'Тӱҥ лаштык',
	'farmer-basic-permission-upload' => 'Файлым пурташ',
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 */
$messages['ml'] = array(
	'farmer' => 'കാര്യസ്ഥന്‍',
	'farmer-desc' => 'മീഡിയാവിക്കി പാടം പരിപാലിക്കുക',
	'farmercantcreatewikis' => 'വിക്കി സൃഷ്ടിക്കുവാനുള്ള അവകാശം താങ്കള്‍ക്ക് നല്‍കിയിട്ടില്ലാത്തതിനാല്‍ വിക്കി സൃഷ്ടിക്കുവാന്‍ താങ്കള്‍ക്ക് സാധിക്കില്ല',
	'farmercreatesitename' => 'സൈറ്റിന്റെ പേര്‌',
	'farmercreatenextstep' => 'അടുത്ത ഘട്ടം',
	'farmernewwikimainpage' => '== താങ്കളുടെ വിക്കിയിലേക്ക് സ്വാഗതം ==
താങ്കള്‍ക്ക് ഇതു വായിക്കുവാന്‍ സാധിക്കുന്നെണ്ടെങ്കില്‍ താങ്കളുടെ പുതിയ വിക്കി വിജയകരമായി ഇന്‍സ്റ്റാള്‍ ചെയ്തിരിക്കുന്നു. താങ്കളുടെ വിക്കി പരിപാലിക്കുവാന്‍ [[Special:Farmer]] സന്ദര്‍ശിക്കുക.',
	'farmer-about' => 'വിവരണം',
	'farmer-about-text' => 'മീഡിയാവിക്കി കാര്യസ്ഥന്‍ എന്ന പദവി മീഡിയാവിക്കി വിക്കികളുടെ പാടം പരിപാലിക്കുന്നതിനു താങ്കളെ സഹായിക്കും.',
	'farmer-list-wiki' => 'വിക്കികളുടെ പട്ടിക',
	'farmer-list-wiki-text' => '{{SITENAME}} സം‌രംഭത്തിലുള്ള [[$1|വിക്കികളുടെ പട്ടിക]]',
	'farmer-createwiki' => 'ഒരു വിക്കി സൃഷ്ടിക്കുക',
	'farmer-createwiki-text' => 'പുതിയൊരു വിക്കി [[$1|സൃഷ്ടിക്കുക]]!',
	'farmer-administration' => 'പാടത്തിന്റെ കാര്യനിര്‍‌വഹണം',
	'farmer-administration-extension' => 'എക്സ്റ്റെന്‍ഷന്‍ പരിപാലിക്കുക',
	'farmer-administration-extension-text' => 'ഇന്‍സ്റ്റാള്‍ ചെയ്ത എക്സ്റ്റന്‍ഷനുകള്‍  [[$1|പരിപാലിക്കുക]].',
	'farmer-admimistration-listupdate' => 'വിക്കിപാടത്തിന്റെ പട്ടികയുടെ പുതുക്കല്‍',
	'farmer-admimistration-listupdate-text' => '{{SITENAME}} സം‌രംഭത്തില്‍ വിക്കികളുടെ [[$1|പട്ടിക]] പുതുക്കുക',
	'farmer-administration-delete' => 'വിക്കി മായ്ക്കുക',
	'farmer-administration-delete-text' => 'പാടത്തു നിന്നു ഒരു വിക്കി [[$1|ഒഴിവാക്കുക]]',
	'farmer-administer-thiswiki' => 'ഈ വിക്കിയെ പരിപാലിക്കുക',
	'farmer-administer-thiswiki-text' => 'ഈ വിക്കിയിലെ മാറ്റങ്ങള്‍ [[$1|നിരീക്ഷിക്കുക]]',
	'farmer-notavailable' => 'ലഭ്യമല്ല',
	'farmer-notavailable-text' => 'ഈ സവിശേഷത പ്രധാനവിക്കിയില്‍ മാത്രമേ ലഭ്യമുള്ളൂ',
	'farmer-wikicreated' => 'വിക്കി സൃഷ്ടിക്കപ്പെട്ടിരിക്കുന്നു',
	'farmer-wikicreated-text' => 'നിങ്ങളുടെ വിക്കി സൃഷ്ടിക്കപ്പെട്ടിരിക്കുന്നു.
അത് $1 എന്ന വിലാസത്തില്‍ ലഭ്യമാണ്‌.',
	'farmer-default' => 'ഈ വിക്കിയില്‍ സ്വതവെ താങ്കള്‍ക്ക് മാത്രമേ പ്രത്യേകാവകാശങ്ങള്‍ ഉള്ളൂ. ഉപയോക്താക്കളുടെ അവകാശങ്ങള്‍ $1 എന്ന താളിലൂടെ താങ്കള്‍ക്ക് മാറ്റാവുന്നതാണ്‌.',
	'farmer-wikiexists' => 'വിക്കി നിലവിലുണ്ട്',
	'farmer-wikiexists-text' => "താങ്കള്‍ സൃഷ്ടിക്കുവാന്‍ ശ്രമിക്കുന്ന '''$1''' എന്ന വിക്കി നിലവിലുണ്ട്. ദയവായി തിരിച്ചു പോയി മറ്റൊരു പേരു തിരഞ്ഞെടുക്കൂ.",
	'farmer-confirmsetting' => 'വിക്കിയുടെ ക്രമീകരണങ്ങള്‍ സ്ഥിരീകരിക്കുക',
	'farmer-confirmsetting-name' => 'പേര്',
	'farmer-confirmsetting-title' => 'ശീര്‍ഷകം',
	'farmer-confirmsetting-description' => 'വിവരണം',
	'farmer-description' => 'വിവരണം',
	'farmer-confirmsetting-text' => "താങ്കളുടെ വിക്കിയിലേക്ക് '''$1''', $3 എന്ന വിലാസത്തിലൂടെ എത്താവുന്നതാണ്‌.
പദ്ധതിയുടെ നേംസ്പേസ് '''$2''' എന്നായിരിക്കും.
ഈ നേംസ്പേസിലേക്കുള്ള കണ്ണികള്‍ '''<nowiki>[[$2:Page Name]]</nowiki>''' എന്ന രൂപത്തില്‍ ആയിരിക്കും.
ഇതാണു താങ്കള്‍ക്ക് വേണ്ടതെങ്കില്‍ താഴെയുള്ള '''ഉറപ്പിക്കുക''' എന്ന ബട്ടണ്‍ അമര്‍ത്തുക.",
	'farmer-button-confirm' => 'സ്ഥിരീകരിക്കുക',
	'farmer-button-submit' => 'സമര്‍പ്പിക്കുക',
	'farmer-createwiki-form-title' => 'ഒരു വിക്കി സൃഷ്ടിക്കുക',
	'farmer-createwiki-form-text1' => 'പുതിയൊരു വിക്കി ഉണ്ടാക്കാന്‍ താഴെയുള്ള ഫോം ഉപയോഗിക്കുക',
	'farmer-createwiki-form-help' => 'സഹായം',
	'farmer-createwiki-form-text2' => "; Wiki name: വിക്കിയുടെ പേര്‌.
അക്ഷരങ്ങളും അക്കങ്ങളും മാത്രമേ പാടുള്ളൂ.
താങ്കളൂടെ വിക്കിയെ തിരിച്ചറിയുവാന്‍ സഹായിക്കുന്ന URL-ല്‍ ഈ പേര്‌ ആയിരിക്കും കാണുക.
ഉദാഹരണത്തിനു താങ്കള്‍ '''title''' എന്നു ചേര്‍ത്താല്‍, താങ്കളുടെ വിക്കിയിലേക്ക്  <nowiki>http://</nowiki>'''title'''.mydomain എന്ന വിലാസത്തിലൂടെ ആവും എത്തിപ്പെടാവുന്നത്.",
	'farmer-createwiki-form-text3' => '; Wiki name: വിക്കിയുടെ തലക്കെട്ട്
വിക്കിയിലെ ഓരോ താളിന്റേയും ശീര്‍ഷകത്തില്‍ ഈ തലക്കെട്ടായിരിക്കും ഉപയോഗിക്കുക.
അതു തന്നെ ആയിരിക്കും പദ്ധതിയുടെ നേംസ്പേസും ഇന്റര്‍‌വിക്കി പൂര്‍വ്വപ്രത്യയവും.',
	'farmer-createwiki-form-text4' => '; Description: വിക്കിയെക്കുറിച്ചുള്ള വിവരണം.
വിക്കിയെക്കുറിച്ചുള്ള വിവരണം.
വിക്കികളുടെ പട്ടികയില്‍ ഈ വിവരണം ആയിരിക്കും പ്രദര്‍ശിപ്പിക്കുക.',
	'farmer-createwiki-user' => 'ഉപയോക്തൃനാമം',
	'farmer-createwiki-name' => 'വിക്കിയുടെ പേര്‌',
	'farmer-createwiki-title' => 'വിക്കിയുടെ തലക്കെട്ട്',
	'farmer-createwiki-description' => 'വിവരണം',
	'farmer-updatedlist' => 'പുതുക്കിയ പട്ടിക',
	'farmer-notaccessible' => 'എത്തിപ്പെടാന്‍ പറ്റിയില്ല',
	'farmer-notaccessible-test' => 'ഈ സവിശേഷത വിക്കിപാടത്തുള്ള പേരന്റ് വിക്കിക്കു മാത്രമേ ബാധകമാവൂ.',
	'farmer-permissiondenied' => 'പ്രവേശനം നിഷേധിച്ചിരിക്കുന്നു',
	'farmer-permissiondenied-text' => 'പാടത്തു നിന്നു ഒരു വിക്കി ഒഴിവാക്കാനുള്ള അനുവാദം നിങ്ങള്‍ക്കില്ല',
	'farmer-permissiondenied-text1' => 'ഈ താളില്‍ പ്രവേശിക്കുവാന്‍ താങ്കള്‍ക്ക് അനുമതിയില്ല',
	'farmer-deleting' => '"$1" മായ്ച്ചുകൊണ്ടിരിക്കുന്നു',
	'farmer-delete-title' => 'വിക്കി മായ്ക്കുക',
	'farmer-delete-text' => 'താങ്കള്‍ ഒഴിവാക്കാന്‍ ഉദ്ദേശിക്കുന്ന വിക്കി താഴെയുള്ള പട്ടികയില്‍ നിന്നു തിരഞ്ഞെടുക്കുക',
	'farmer-delete-form' => 'ഒരു വിക്കി തിരഞ്ഞെടുക്കുക',
	'farmer-delete-form-submit' => 'മായ്ക്കുക',
	'farmer-listofwikis' => 'വിക്കികളുടെ പട്ടിക',
	'farmer-mainpage' => 'പ്രധാന താള്‍',
	'farmer-basic-title1' => 'ശീര്‍ഷകം',
	'farmer-basic-title1-text' => 'നിങ്ങളുടെ വിക്കിക്ക് ഒരു തലക്കെട്ടില്ല. ഇപ്പോള്‍ ഒന്ന് ഉണ്ടാക്കൂ.',
	'farmer-basic-description' => 'വിവരണം',
	'farmer-basic-description-text' => 'താങ്കളുടെ വിക്കിയെ കുറിച്ചുള്ള വിവരണം താഴെ ചേര്‍ക്കൂ',
	'farmer-basic-permission' => 'അനുമതികള്‍',
	'farmer-basic-permission-text' => 'ഈ വിക്കിയിലെ ഉപയോക്താക്കളുടെ അവകാശങ്ങളില്‍ മാറ്റം വരുത്താന്‍ താങ്കള്‍ക്ക്  താഴെയുള്ള ഫോം ഉപയോഗികാവുന്നതാണ്‌.',
	'farmer-basic-permission-visitor' => 'എല്ലാ സന്ദര്‍ശകര്‍ക്കുമുള്ള അവകാശങ്ങള്‍',
	'farmer-basic-permission-visitor-text' => 'താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്ന അവകാശങ്ങള്‍ വിക്കിയിലെ ഓരോ ഉപയോക്താവിനും ബാധകമായിരിക്കും.',
	'farmer-yes' => 'ശരി',
	'farmer-no' => 'അല്ല',
	'farmer-basic-permission-user' => 'ലോഗിന്‍ ചെയ്ത ഉപയോക്താക്കള്‍ക്കുള്ള അവകാശങ്ങള്‍',
	'farmer-basic-permission-user-text' => 'താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്ന അവകാശങ്ങള്‍ വിക്കിയില്‍ ലോഗിന്‍ ചെയ്യുന്ന ഓരോ ഉപയോക്താവിനും ബാധകമായിരിക്കും',
	'farmer-setpermission' => 'അവകാശങ്ങള്‍ ക്രമീകരിക്കുക',
	'farmer-defaultskin' => 'സ്വതവേയുള്ള രൂപം',
	'farmer-defaultskin-button' => 'സ്വതവെ പ്രദര്‍ശിപ്പിക്കേണ്ട രൂപം സജ്ജീകരിക്കുക',
	'farmer-extensions' => 'സജീവമായ എക്സ്റ്റെന്‍ഷനുകള്‍',
	'farmer-extensions-button' => 'സജീവമായ എക്സ്റ്റെന്‍ഷനുകള്‍ ക്രമീകരിക്കുക',
	'farmer-extensions-extension-denied' => 'ഈ സവിശേഷത ഉപയോഗിക്കുവാനുള്ള അനുമതി താങ്കള്‍ക്കില്ല.
താങ്കള്‍ അതിനു  farmeradmin ഗ്രൂപ്പിലെ അം‌ഗമായിരിക്കണം',
	'farmer-extensions-invalid' => 'അസാധുവായ എക്സ്റ്റെന്‍ഷന്‍',
	'farmer-extensions-available' => 'ലഭ്യമായ എക്സ്റ്റെന്‍ഷനുകള്‍',
	'farmer-extensions-noavailable' => 'എക്സ്റ്റെഷനുകള്‍ ഒന്നും രജിസ്റ്റര്‍ ചെയ്തിട്ടില്ല',
	'farmer-extensions-register' => 'എക്സ്റ്റെന്‍ഷന്‍ രെജിസ്റ്റര്‍ ചെയ്യുക',
	'farmer-extensions-register-text1' => 'ഈ വിക്കി പാടത്ത് പുതിയൊരു എക്സ്റ്റെന്‍ഷന്‍ രെജിസ്റ്റര്‍ ചെയ്യുവാന്‍ താഴെയുള്ള ഫോം ഉപയോഗിക്കുക.
എക്സ്റ്റെന്‍ഷന്‍ രെജിസ്റ്റര്‍ ചെയ്തതിനു ശെഷം ഈ വിക്കിപാടത്തുള്ള എല്ലാ വിക്കികള്‍ക്കും അതുപയോഗിക്കാം.',
	'farmer-extensions-register-name' => 'പേര്‌',
	'farmer-error-exists' => 'വിക്കി സൃഷ്ടിക്കുന്നതിനു കഴിഞ്ഞില്ല. അതു ഇപ്പോഴെ നിലവിലുണ്ട്: $1',
);

/** Marathi (मराठी)
 * @author Kaustubh
 * @author Mahitgar
 */
$messages['mr'] = array(
	'farmer' => 'फार्मर',
	'farmer-desc' => 'एक मीडियाविकि फार्म संपादा',
	'farmercantcreatewikis' => 'तुम्ही विकि तयार करू शकत नाही कारण त्यासाठी आवश्यक अधिकार तुम्हाला नाहीत',
	'farmercreateurl' => 'URL',
	'farmercreatesitename' => 'संकेतस्थळाचे नाव',
	'farmercreatenextstep' => 'पुढची पायरी',
	'farmernewwikimainpage' => '== तुमच्या विकिमध्ये स्वागत ==
जर तुम्ही हे वाचू शकत असाल, तर तुमचा नवीन विकि व्यवस्थितरित्या सुरू झालेला आहे. तुमचा विकि तुमच्या पसंतीनुसार बदलण्यासाठी, कृपया [[Special:Farmer]] इथे भेट द्या.',
	'farmer-about' => 'बद्दल माहिती',
	'farmer-about-text' => 'मीडियाविकिचा फार्मर तुम्हाला मीडियाविकि विकि सांभाळण्यासाठी मदत करतो.',
	'farmer-list-wiki' => 'विकिंची यादी',
	'farmer-list-wiki-text' => '{{SITENAME}} वरील सर्व विकिंची [[$1|यादी]]',
	'farmer-createwiki' => 'विकि तयार करा',
	'farmer-createwiki-text' => 'आत्ता एक विकि [[$1|तयार]] करा!',
	'farmer-administration' => 'फार्मचे प्रबंधन',
	'farmer-administration-extension' => 'विस्तार प्रबंधन करा',
	'farmer-administration-extension-text' => 'प्रस्थापना केलेल्या विस्तारांचे [[$1|प्रबंधन]] करा.',
	'farmer-admimistration-listupdate' => 'फार्म यादी ताजीतवानी करा',
	'farmer-admimistration-listupdate-text' => '{{SITENAME}} वरील विकिंची यादी [[$1|ताजीतवानी करा]]',
	'farmer-administration-delete' => 'विकि वगळा',
	'farmer-administration-delete-text' => 'या फार्म मधील एक विकि [[$1|वगळा]]',
	'farmer-administer-thiswiki' => 'ह्या विकिचे प्रबंधन करा',
	'farmer-administer-thiswiki-text' => 'या विकितील बदलांचे [[$1|प्रबंधन]] करा',
	'farmer-notavailable' => 'उपलब्ध नाही',
	'farmer-notavailable-text' => 'हे फीचर फक्त मुख्य विकिवर उपलब्ध आहे',
	'farmer-wikicreated' => 'विकि तयार झालेला आहे',
	'farmer-wikicreated-text' => 'तुमचा विकि तयार झालेला आहे. तो $1 इथे पाहता येईल',
	'farmer-default' => 'तुम्ही सोडून इतरांना या विकिवर कसलीही परवानगी नाही. तुम्ही $1 मधून सदस्य अधिकारांमध्ये बदल करू शकता',
	'farmer-wikiexists' => 'विकि अगोदरच अस्तित्वात आहे',
	'farmer-wikiexists-text' => "तुम्ही तयार करू इच्छित असलेला '''$1''' विकि, अगोदरच अस्तित्वात आहे. कृपया मागे जाऊन दुसर्‍या नावाने प्रयत्न करा.",
	'farmer-confirmsetting' => 'विकि सेटिंगची खात्री करा',
	'farmer-confirmsetting-name' => 'नाव',
	'farmer-confirmsetting-title' => 'शीर्षक',
	'farmer-confirmsetting-description' => 'माहिती',
	'farmer-description' => 'माहिती',
	'farmer-confirmsetting-text' => "तुमचा विकि, '''$1''', तुम्ही $3 इथे पाहू शकता.
या विकिचे प्रकल्प नामविश्व '''$2''' हे असेल.
या नामविश्वाचे दुवे '''<nowiki>[[$2:लेखाचे शीर्षक]]</nowiki>''' असे असतील.
जर तुम्हाला हेच अभिप्रेत असेल तर खालील '''खात्री करा''' ह्या कळीवर टिचकी मारा.",
	'farmer-button-confirm' => 'खात्री करा',
	'farmer-button-submit' => 'पाठवा',
	'farmer-createwiki-form-title' => 'विकि तयार करा',
	'farmer-createwiki-form-text1' => 'नवीन विकि तयार करण्यासाठी खालील अर्ज वापरा.',
	'farmer-createwiki-form-help' => 'साहाय्य',
	'farmer-createwiki-form-text2' => "; विकिचे नाव: विकिचे नाग. यामध्ये फक्त अक्षरे व अंक असू शकतात. विकिचे नाव तुमच्या विकिला ओळखण्यासाठी URL मध्ये वापरले जाईल. उदा. जर तुमच्या विकिचे नाव '''शीर्षक''' असेल, तर तुमचा विकि <nowiki>http://</nowiki>'''शीर्षक'''.mydomain इथे दिसेल.",
	'farmer-createwiki-form-text3' => '; विकि शीर्षक: विकिचे शीर्षक. हे प्रत्येक पानाच्या शीर्षकात वापरले जाईल. हे तुमचे प्रकल्प नामविश्व असेल तसेच आंतरविकीचे चिन्ह असेल.',
	'farmer-createwiki-form-text4' => '; माहिती: विकिची माहिती. ही मजकूरात लिहिलेली विकिबद्दलची माहिती असेल. ही विकिंच्या यादीत दाखविली जाईल.',
	'farmer-createwiki-user' => 'सदस्यनाम',
	'farmer-createwiki-name' => 'विकि नाव',
	'farmer-createwiki-title' => 'विकि शीर्षक',
	'farmer-createwiki-description' => 'माहिती',
	'farmer-updatedlist' => 'नवीन यादी',
	'farmer-notaccessible' => 'उपलब्ध नाही',
	'farmer-notaccessible-test' => 'हे फीचर फक्त फार्म मधील पालक विकिवर उपलब्ध आहे',
	'farmer-permissiondenied' => 'परवानगी नाकारली',
	'farmer-permissiondenied-text' => 'या फार्म मधील विकि वगळण्याची तुम्हाला परवानगी नाही',
	'farmer-permissiondenied-text1' => 'हे पान पहाण्याची तुम्हाला परवानगी नाही',
	'farmer-deleting' => '$1 ला वगळत आहे',
	'farmer-delete-title' => 'विकि वगळा',
	'farmer-delete-text' => 'कृपया खालील यादीतून वगळण्यासाठीचा विकि निवडा',
	'farmer-delete-form' => 'विकि निवडा',
	'farmer-delete-form-submit' => 'वगळा',
	'farmer-listofwikis' => 'विकिंची यादी',
	'farmer-mainpage' => 'मुखपृष्ठ',
	'farmer-basic-title' => 'मुख्य पॅरॅमीटर्स',
	'farmer-basic-title1' => 'शीर्षक',
	'farmer-basic-title1-text' => 'तुमच्या विकिला शीर्षक दिलेले नाही. आत्ता द्या',
	'farmer-basic-description' => 'माहिती',
	'farmer-basic-description-text' => 'तुमच्या विकिची माहिती खाली द्या',
	'farmer-basic-permission' => 'परवानग्या',
	'farmer-basic-permission-text' => 'खालील अर्ज वापरून या विकिवरील सदस्यांना मिळणार्‍या परवानग्या बदलता येतील.',
	'farmer-basic-permission-visitor' => 'सर्व भेट देणार्‍यांसाठी परवानग्या',
	'farmer-basic-permission-visitor-text' => 'खालील परवानग्या या विकिला भेट देणार्‍या सर्वांना देण्यात येतील',
	'farmer-yes' => 'हो',
	'farmer-no' => 'नाही',
	'farmer-basic-permission-user' => 'प्रवेश केलेल्या सदस्यांसाठी परवानग्या',
	'farmer-basic-permission-user-text' => 'खालील परवानग्या या विकिवर प्रवेश केलेल्या सर्वांना देण्यात येतील',
	'farmer-setpermission' => 'परवानग्या द्या',
	'farmer-defaultskin' => 'मूळ त्वचा',
	'farmer-defaultskin-button' => 'मूळ त्वचा निवडा',
	'farmer-extensions' => 'कार्यरत विस्तार',
	'farmer-extensions-button' => 'कार्यरत विस्तारांची आखणी करा',
	'farmer-extensions-extension-denied' => 'हे फिचर वापरण्याची परवानगी तुम्हाला नाही. तुम्ही या फार्मर प्रबंधक गटात सदस्य असणे आवश्यक आहे',
	'farmer-extensions-invalid' => 'अयोग्य विस्तार',
	'farmer-extensions-invalid-text' => 'एक्स्टेंशन वाढवू शकलो नाही कारण संचिका सापडली नाही',
	'farmer-extensions-available' => 'उपलब्ध विस्तार',
	'farmer-extensions-noavailable' => 'कोणत्याही विस्ताराची नोंदणी झालेली नाही',
	'farmer-extensions-register' => 'विस्ताराची नोंद्णी करा',
	'farmer-extensions-register-text1' => 'नवीन एक्स्टेंशन वाढविण्यासाठी खालील अर्ज वापरा. एकदा का एक्स्टेंशन वाढले की या फार्म मधील सर्व विकि ते वापरू शकतील.',
	'farmer-extensions-register-text2' => "''संचिका मिळवा'' पॅरॅमीटरसाठी PHP संचिकेचे नाव LocalSettings.php मध्ये जसे दिले तसे द्या.",
	'farmer-extensions-register-text3' => "जर संचिका नावात '''\$root''' असेल, तर ते मीडियाविकिच्या मूळ डिरेक्टरीने बदलले जाईल.",
	'farmer-extensions-register-text4' => 'सध्याचे मिळवायचे मार्ग (include path) असे आहेत:',
	'farmer-extensions-register-name' => 'नाव',
	'farmer-extensions-register-includefile' => 'संचिका मिळवा',
	'farmer-error-exists' => 'विकि तयार करू शकत नाही. तो अगोदरच अस्तित्वात आहे: $1',
	'farmer-error-noextwrite' => 'एक्स्टेंशन संचिका लिहू शकलेलो नाही:',
);

/** Maltese (Malti)
 * @author Roderick Mallia
 */
$messages['mt'] = array(
	'farmer-createwiki-user' => 'Isem l-utent',
);

/** Mirandese (Mirandés)
 * @author Malafaya
 */
$messages['mwl'] = array(
	'farmer-mainpage' => 'Páigina Percipal',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 * @author Sura
 */
$messages['myv'] = array(
	'farmer' => 'Хермер',
	'farmer-notavailable' => 'Кедь маласо арась',
	'farmer-confirmsetting-name' => 'Лемезэ',
	'farmer-confirmsetting-title' => 'Коняксозо',
	'farmer-confirmsetting-description' => 'Чарькодевтемгакс',
	'farmer-description' => 'Чарькодевтемгакс',
	'farmer-button-confirm' => 'Кемекстамс',
	'farmer-createwiki-description' => 'Чарькодевтемгакс',
	'farmer-delete-form-submit' => 'Нардамс',
	'farmer-basic-title1' => 'Конякс',
	'farmer-basic-description' => 'Чарькодевтемгакс',
	'farmer-yes' => 'Истя',
	'farmer-no' => 'Арась',
	'farmer-extensions-register-name' => 'Лемезэ',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'farmer-confirmsetting-name' => 'Tōcāitl',
	'farmer-button-submit' => 'Tiquihuāz',
	'farmer-createwiki-form-title' => 'Ticchīhuāz cē huiqui',
	'farmer-createwiki-user' => 'Tlatequitiltilīltōcāitl',
	'farmer-createwiki-name' => 'Huiqui tōcāitl',
	'farmer-deleting' => 'Mopolocah $1',
	'farmer-delete-title' => 'Ticpolōz huiqui',
	'farmer-delete-form-submit' => 'Ticpolōz',
	'farmer-listofwikis' => 'Mochi huiqui',
	'farmer-mainpage' => 'Calīxatl',
	'farmer-basic-title1' => 'Tōcāitl',
	'farmer-basic-permission-view' => 'Tiquinttāz mochi zāzanilli',
	'farmer-basic-permission-edit' => 'Tiquimpatlāz mochi zāzanilli',
	'farmer-basic-permission-createpage' => 'Tiquinchīhuāz mochi zāzanilli',
	'farmer-basic-permission-createtalk' => 'Tiquinchīhuāz tēixnāmiquiliztli zāzanilli',
	'farmer-basic-permission-move' => 'Tiquimpatlāz zāzanilli',
	'farmer-basic-permission-upload' => 'Tiquinquetzāz tlahcuilōlli',
	'farmer-yes' => 'Quēmah',
	'farmer-no' => 'Ahmo',
	'farmer-extensions-register-name' => 'Tōcāitl',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'farmer-about' => 'Över',
	'farmer-createwiki' => 'Wiki nee opstellen',
	'farmer-createwiki-text' => '[[$1|Stell]] nu en nee Wiki op!',
	'farmer-mainpage' => 'Hööftsiet',
	'farmer-yes' => 'Jo',
	'farmer-no' => 'Nee',
	'farmer-extensions-register-name' => 'Naam',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'farmer' => "Meerdere wiki's beheren",
	'farmer-desc' => 'Een uitbreiding om verschillende MediaWiki-wikis via een hoofdwiki mee te beheren',
	'farmercantcreatewikis' => "U kunt geen wiki's aanmaken, omdat u het recht ''createwikis'' niet hebt",
	'farmercreatesitename' => 'Sitenaam',
	'farmercreatenextstep' => 'Volgende stap',
	'farmernewwikimainpage' => '== Welkom bij uw wiki ==
Als u dit leest, is uw wiki geïnstalleerd.
U kunt uw [[Special:Farmer|wiki aanpassen]].',
	'farmer-about' => 'Over',
	'farmer-about-text' => "Met MediaWikiFarmer kunt u een farm van MediaWiki wiki's beheren.",
	'farmer-list-wiki' => "Lijst van wiki's",
	'farmer-list-wiki-text' => "Alle wiki's op {{SITENAME}} [[$1|bekijken]]",
	'farmer-createwiki' => 'Een wiki maken',
	'farmer-createwiki-text' => '[[$1|Maak]] nu een nieuwe wiki!',
	'farmer-administration' => 'Farm beheren',
	'farmer-administration-extension' => 'Uitbreidingen beheren',
	'farmer-administration-extension-text' => 'Geïnstalleerde uitbreidingen [[$1|beheren]].',
	'farmer-admimistration-listupdate' => 'Farmlijst bijwerken',
	'farmer-admimistration-listupdate-text' => "De lijst van wiki's in {{SITENAME}} [[$1|bijwerken]]",
	'farmer-administration-delete' => 'Een wiki verwijderen',
	'farmer-administration-delete-text' => 'Een wiki uit de farm [[$1|verwijderen]]',
	'farmer-administer-thiswiki' => 'Deze wiki beheren',
	'farmer-administer-thiswiki-text' => 'Wijzigingen aan deze wiki [[$1|toepassen]]',
	'farmer-notavailable' => 'Niet beschikbaar',
	'farmer-notavailable-text' => 'Deze functie is alleen beschikbaar op de hoofdwiki',
	'farmer-wikicreated' => 'Wiki gemaakt',
	'farmer-wikicreated-text' => 'Uw wiki is gemaakt. Het is bereikbaar op $1',
	'farmer-default' => 'Standaard heeft niemand de rechten op deze wiki behalve u. U kunt de gebruikersrechten wijzigen via $1',
	'farmer-wikiexists' => 'Wiki bestaat',
	'farmer-wikiexists-text' => "De wiki die u probeert te maken, '''$1''', bestaat al. Gelieve terug te gaan en met een andere naam te proberen.",
	'farmer-confirmsetting' => 'Instellingen bevestigen',
	'farmer-confirmsetting-name' => 'Naam',
	'farmer-confirmsetting-title' => 'Titel',
	'farmer-confirmsetting-description' => 'Beschrijving',
	'farmer-confirmsetting-reason' => 'Reden',
	'farmer-description' => 'Beschrijving',
	'farmer-confirmsetting-text' => "Uw wiki '''$1''' wordt bereikbaar via $3.
De projectnaamruimte wordt '''$2'''.
Een verwijzing naar deze naamruimte wordt '''<nowiki>[[$2:Paginanaam]]</nowiki>'''.
Als dit in orde is, druk dan op de knop '''bevestigen'''.",
	'farmer-button-confirm' => 'Bevestigen',
	'farmer-button-submit' => 'Opslaan',
	'farmer-createwiki-form-title' => 'Een wiki maken',
	'farmer-createwiki-form-text1' => 'Gebruik het formulier hieronder om een nieuwe wiki te maken.',
	'farmer-createwiki-form-help' => 'Hulp',
	'farmer-createwiki-form-text2' => "; Naam wiki: de naam van de wiki. Bevat alleen letters en cijfers. De naam van de wiki wordt gebruikt als onderdeel van de URL om uw wiki te identificeren. Als u bijvoorbeeld '''titel''' opgeeft, dan is uw wiki te bereiken via <nowiki>http://</nowiki>'''titel'''.mijndomein.",
	'farmer-createwiki-form-text3' => '; Naam wiki: naam van de wiki. Deze naam wordt gebruikt op iedere pagina van uw wiki. De naam wordt ook gebruikt in de projectnaamruimte en als interwikivoorvoegsel.',
	'farmer-createwiki-form-text4' => '; Omschrijving: omschrijving van deze wiki. Deze tekst is te lezen in de wikilijst.',
	'farmer-createwiki-user' => 'Gebruikersnaam',
	'farmer-createwiki-name' => 'Wikinaam',
	'farmer-createwiki-title' => 'Wikititel',
	'farmer-createwiki-description' => 'Beschrijving',
	'farmer-createwiki-reason' => 'Reden',
	'farmer-updatedlist' => 'Bijgewerkte lijst',
	'farmer-notaccessible' => 'Niet bereikbaar',
	'farmer-notaccessible-test' => 'Deze optie is alleen beschikbaar in de hoofdwiki van de farm',
	'farmer-permissiondenied' => 'Geen toegang',
	'farmer-permissiondenied-text' => 'U hebt geen rechten om een wiki uit de farm te verwijderen',
	'farmer-permissiondenied-text1' => 'U hebt geen rechten om deze pagina te bekijken',
	'farmer-deleting' => 'De wiki "$1" is verwijderd',
	'farmer-delete-confirm' => 'Ik bevestig dat ik deze wiki wil verwijderen',
	'farmer-delete-confirm-wiki' => "Te verwijderen wiki: '''$1'''.",
	'farmer-delete-reason' => 'Reden voor verwijderen:',
	'farmer-delete-title' => 'Wiki verwijderen',
	'farmer-delete-text' => 'Geef in de onderstaande lijst aan welke wiki u wilt verwijderen',
	'farmer-delete-form' => 'Een wiki selecteren',
	'farmer-delete-form-submit' => 'Verwijderen',
	'farmer-listofwikis' => "Lijst van wiki's",
	'farmer-mainpage' => 'Hoofdpagina',
	'farmer-basic-title' => 'Basisinstellingen',
	'farmer-basic-title1' => 'Titel',
	'farmer-basic-title1-text' => 'Uw wiki heeft geen naam. Geef deze NU op',
	'farmer-basic-description' => 'Beschrijving',
	'farmer-basic-description-text' => 'Stel de beschrijving van uw wiki hieronder in',
	'farmer-basic-permission' => 'Rechten',
	'farmer-basic-permission-text' => 'Met het onderstaande formulier kunt u de rechten voor de gebruikers van deze wiki wijzigen.',
	'farmer-basic-permission-visitor' => 'Rechten voor iedere bezoeker',
	'farmer-basic-permission-visitor-text' => 'De volgende rechten zijn van toepassing op iedere bezoeker van de wiki',
	'farmer-yes' => 'Ja',
	'farmer-no' => 'Nee',
	'farmer-basic-permission-user' => 'Rechten voor aangemelde gebruikers',
	'farmer-basic-permission-user-text' => 'De volgende rechten zijn van toepassing op iedere aangemelde gebruiker van de wiki',
	'farmer-setpermission' => 'Rechten instellen',
	'farmer-defaultskin' => 'Standaard skin',
	'farmer-defaultskin-button' => 'Standaardskin instellen',
	'farmer-extensions' => 'Actieve uitbreidingen',
	'farmer-extensions-button' => 'Actieve uitbreidingen instellen',
	'farmer-extensions-extension-denied' => "U hebt geen toegang tot deze optie.
U moet lid zijn van de groep ''farmeradmin''.",
	'farmer-extensions-invalid' => 'Ongeldige uitbreidingen',
	'farmer-extensions-invalid-text' => 'De uitbreiding kon niet toegevoegd worden omdat het toe te voegen bestand niet is aangetroffen',
	'farmer-extensions-available' => 'Beschikbare uitbreidingen',
	'farmer-extensions-noavailable' => 'Er zijn geen uitbreidingen geregistreerd',
	'farmer-extensions-register' => 'Uitbreidingen toevoegen',
	'farmer-extensions-register-text1' => "Gebruik het onderstaande formulier om een uitbreiding voor de farm te registreren. Als een uitbreiding geregistreerd is, kunnen alle wiki's er gebruik van maken.",
	'farmer-extensions-register-text2' => "Voeg voor de parameter ''Includebestand'' de naam van het PHP-bestand in dat u als LocalSettings.php wikt gebruiken.",
	'farmer-extensions-register-text3' => "Als de bestandsnaam '''\$root''' bevat, wordt de variabele vervangen door de rootmap van MediaWiki.",
	'farmer-extensions-register-text4' => 'De volgende paden worden meegenomen:',
	'farmer-extensions-register-name' => 'Naam',
	'farmer-extensions-register-includefile' => 'Bestand opnemen',
	'farmer-error-exists' => 'De wiki kan niet aangemaakt worden. Deze bestaat al: $1',
	'farmer-error-noextwrite' => 'Het uitbreidingsbestand kon niet weggeschreven worden:',
	'farmer-log-name' => 'wikifarmlogboek',
	'farmer-log-header' => 'Dit is een logboek met de wijzigingen aan de wikifarm.',
	'farmer-log-create' => 'heeft de wiki "$2" aangemaakt',
	'farmer-log-delete' => 'heeft de wiki "$2" verwijderd',
	'right-farmeradmin' => 'De wikifarm beheren',
	'right-createwiki' => "Wiki's aanmaken in de wikifarm",
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Gunnernett
 * @author Harald Khan
 * @author Jon Harald Søby
 */
$messages['nn'] = array(
	'farmer' => 'Handsam wikisamling',
	'farmer-desc' => 'Hald ei MediaWiki-samling ved like',
	'farmercantcreatewikis' => 'Du kan ikkje oppretta wikiar av di du ikkje har dei rette rettane',
	'farmercreatesitename' => 'Sidenamn',
	'farmercreatenextstep' => 'Neste steg',
	'farmernewwikimainpage' => '== Velkomen til wikien din ==
Om du les dette, har den nye wikien din vorten installert rett.
Du kan [[Special:Farmer|skreddarsy wikien din]].',
	'farmer-about' => 'Om',
	'farmer-about-text' => 'MediaWiki Farmer lèt deg halda ei heil samling av MediaWiki-wikiar ved like.',
	'farmer-list-wiki' => 'Lista over wikiar',
	'farmer-list-wiki-text' => '[[$1|Lista]] over alle wikiane på {{SITENAME}}',
	'farmer-createwiki' => 'Opprett ein wiki',
	'farmer-createwiki-text' => '[[$1|Opprett]] ein ny wiki no!',
	'farmer-administration' => 'Handsaming av wikisamling',
	'farmer-administration-extension' => 'Handsam utvidingar',
	'farmer-administration-extension-text' => '[[$1|Handsam]] installerte utvidingar.',
	'farmer-admimistration-listupdate' => 'Oppdater wikisamlingslista',
	'farmer-admimistration-listupdate-text' => '[[$1|Oppdater]] lista over wikiar på {{SITENAME}}',
	'farmer-administration-delete' => 'Slett ein wiki',
	'farmer-administration-delete-text' => '[[$1|Slett]] ein wiki frå samlinga',
	'farmer-administer-thiswiki' => 'Administrer denne wikien',
	'farmer-administer-thiswiki-text' => '[[$1|Administrer]] endringar i denne wikien',
	'farmer-notavailable' => 'Ikkje tilgjengeleg',
	'farmer-notavailable-text' => 'Denne eigenskapen er berre tilgjengeleg på hovudwikien',
	'farmer-wikicreated' => 'Wiki oppretta',
	'farmer-wikicreated-text' => 'Wikien din har vorten oppretta.
Han er tilgjengeleg på $1',
	'farmer-default' => 'Som utgangspunkt er det ingen utanom deg som har rettar på wikien.
Du kan endra brukarrettar gjennom $1',
	'farmer-wikiexists' => 'Wikien finst',
	'farmer-wikiexists-text' => "Wikien du freistar å oppretta, '''$1''', finst frå før.
Gå tilbake og freist med eit anna namn.",
	'farmer-confirmsetting' => 'Stadfest instillingane til wikien',
	'farmer-confirmsetting-name' => 'Namn',
	'farmer-confirmsetting-title' => 'Tittel',
	'farmer-confirmsetting-description' => 'Skildring',
	'farmer-confirmsetting-reason' => 'Grunngjeving',
	'farmer-description' => 'Skildring',
	'farmer-confirmsetting-text' => "Wikien din, '''$1''', vil vera tilgjengeleg gjennom $3.
Prosjektnamnerommet vil vera '''$2'''.
Lenkjer til namnerommet vil vera på forma '''<nowiki>[[$2:Sidenamn]]</nowiki>'''.
Om dette er det du vil, trykk på knappen ''{{int:Farmer-button-confirm}}'' nedanfor.",
	'farmer-button-confirm' => 'Stadfest',
	'farmer-button-submit' => 'Lagra',
	'farmer-createwiki-form-title' => 'Opprett ein wiki',
	'farmer-createwiki-form-text1' => 'Nytt skjemaet nedanfor for å oppretta ein ny wiki.',
	'farmer-createwiki-form-help' => 'Hjelp',
	'farmer-createwiki-form-text2' => "; Namnet på wikien: Namnet på wikien.
Inneheld berre bokstavar og tal. Namnet på wikien vil verta nytta i adressa for å identifisera wikien. Om du til dømes skriv inn ''tittel'', vil wikien din vera tilgjengeleg på <nowiki>http://</nowiki>''tittel''.mydomain.",
	'farmer-createwiki-form-text3' => '; Tittel på wikien: Tittelen på wikien.
Vil verta nytta i tittelen på kvar sida på wikien din. Han vil òg verta nytta som namn på prosjektnamnerommet og som interwikiprefiks.',
	'farmer-createwiki-form-text4' => '; Skildring: Skildring av wikien.
Dette er ein tekst som skildrar wikien.
Han vil verta vist i wikilista.',
	'farmer-createwiki-user' => 'Brukarnamn',
	'farmer-createwiki-name' => 'Namn på wiki',
	'farmer-createwiki-title' => 'Tittel på wiki',
	'farmer-createwiki-description' => 'Skildring',
	'farmer-createwiki-reason' => 'Grunn',
	'farmer-updatedlist' => 'Oppdatert lista',
	'farmer-notaccessible' => 'Utan tilgjenge',
	'farmer-notaccessible-test' => 'Dette er berre tilgjengeleg på opphavswikien i wikisamlinga',
	'farmer-permissiondenied' => 'Tilgjenge nekta',
	'farmer-permissiondenied-text' => 'Du har ikkje løyve til å sletta wikiar frå wikisamlinga',
	'farmer-permissiondenied-text1' => 'Du har ikkje løyve til å gå inn på denne sida',
	'farmer-deleting' => 'Wikien «$1» har vorte sletta',
	'farmer-delete-confirm' => 'Eg stadfestar at eg ynskjer å sletta denne wikien',
	'farmer-delete-confirm-wiki' => "Wiki som skal slettast: '''$1'''.",
	'farmer-delete-reason' => 'Grunn for slettinga:',
	'farmer-delete-title' => 'Slett wiki',
	'farmer-delete-text' => 'Oppgje frå lista under kva wiki du vil sletta',
	'farmer-delete-form' => 'Vel ein wiki',
	'farmer-delete-form-submit' => 'Slett',
	'farmer-listofwikis' => 'Lista over wikiar',
	'farmer-mainpage' => 'Hovudside',
	'farmer-basic-title' => 'Grunnparametrar',
	'farmer-basic-title1' => 'Tittel',
	'farmer-basic-title1-text' => 'Wikien din manglar ein tittel.  Vel ein <b>no</b>',
	'farmer-basic-description' => 'Skildring',
	'farmer-basic-description-text' => 'Gje ei skildring av wikien din nedanfor',
	'farmer-basic-permission' => 'Løyve',
	'farmer-basic-permission-text' => 'Ved å nytta skjemaet nedanfor kan du endra brukarrettar på wikien.',
	'farmer-basic-permission-visitor' => 'Rettar for alle vitjande',
	'farmer-basic-permission-visitor-text' => 'Dei følgjande rettane vil verta gjevne til alle som vitjar wikien',
	'farmer-yes' => 'Ja',
	'farmer-no' => 'Nei',
	'farmer-basic-permission-user' => 'Rettar for innlogga brukarar',
	'farmer-basic-permission-user-text' => 'Dei følgjande rettane vil verta gjevne til alle innlogga brukarar',
	'farmer-setpermission' => 'Fastsett rettar',
	'farmer-defaultskin' => 'Standardutsjånad',
	'farmer-defaultskin-button' => 'Set standardutsjånad',
	'farmer-extensions' => 'Aktive utvidingar',
	'farmer-extensions-button' => 'Set aktive utvidingar',
	'farmer-extensions-extension-denied' => 'Du har ikkje tilgjenge til denne funksjonen.
Du må vera medlem av brukargruppa farmeradmin for å nytta han',
	'farmer-extensions-invalid' => 'Ugyldig utviding',
	'farmer-extensions-invalid-text' => 'Me kunne ikkje leggja til utvidinga då fila som vart vald for inkludering ikkje kunne verta funnen.',
	'farmer-extensions-available' => 'Tilgjengelege utvidingar',
	'farmer-extensions-noavailable' => 'Ingen utvidingar er registrerte',
	'farmer-extensions-register' => 'Registrer utviding',
	'farmer-extensions-register-text1' => 'Nytt skjemaet under for å registrera ei ny utviding hos wikisamlinga.
Når ei utviding er registrert, vil alle wikiane kunna nytta seg av ho.',
	'farmer-extensions-register-text2' => "For parameteren ''Inkluder fil'', skriv inn namnet på PHP-fila slik du ville ha gjort det i LocalSettings.php.",
	'farmer-extensions-register-text3' => "I fall filnamnet inneheld '''\$root''', vil variabelen verta erstatta med rotmappa til MediaWiki.",
	'farmer-extensions-register-text4' => 'Dei noverande inkluderte stigane er:',
	'farmer-extensions-register-name' => 'Namn',
	'farmer-extensions-register-includefile' => 'Inkluder fil',
	'farmer-error-exists' => 'Kan ikkje oppretta wikien. Han finst frå før: $1',
	'farmer-error-noextwrite' => 'Kunne ikkje skriva ut utvidingsfil:',
	'farmer-log-name' => 'Wiki farm loggføring',
	'farmer-log-header' => 'Dette er ei loggføring av endringar gjort med wiki-farmen.',
	'farmer-log-create' => 'oppretta wikien «$2»',
	'farmer-log-delete' => 'sletta wikien «$2»',
	'right-farmeradmin' => 'Administrer wiki-farmen',
	'right-createwiki' => 'Opprett wikiar på wiki-farmen',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Audun
 * @author Harald Khan
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'farmer' => 'Farmer',
	'farmer-desc' => 'Hold en MediaWiki-farm ved like',
	'farmercantcreatewikis' => 'Du kan ikke opprette wikier fordi du ikke har de riktige rettighetene',
	'farmercreatesitename' => 'Sidenavn',
	'farmercreatenextstep' => 'Neste steg',
	'farmernewwikimainpage' => '== Velkommen til wikien din ==
Om du leser dette, har din nye wiki blitt installert korrekt. Du kan [[Special:Farmer|skreddersy wikien din]].',
	'farmer-about' => 'Om',
	'farmer-about-text' => 'MediaWiki Farmer lar deg holde en hel farm av MediaWiki-wikier ved like.',
	'farmer-list-wiki' => 'Liste over wikier',
	'farmer-list-wiki-text' => '[[$1|Liste]] over alle wikiene på {{SITENAME}}',
	'farmer-createwiki' => 'Opprett en wiki',
	'farmer-createwiki-text' => '[[$1|Opprett]] en ny wiki nå!',
	'farmer-administration' => 'Farmadministrasjon',
	'farmer-administration-extension' => 'Hold utvidelser vedlike',
	'farmer-administration-extension-text' => 'Hold installerte utvidelser [[$1|ved like]].',
	'farmer-admimistration-listupdate' => 'Oppdater farmliste',
	'farmer-admimistration-listupdate-text' => '[[$1|Oppdater]] liste over wikier på {{SITENAME}}',
	'farmer-administration-delete' => 'Fjern en wiki',
	'farmer-administration-delete-text' => '[[$1|Fjern]] en wiki fra farmen',
	'farmer-administer-thiswiki' => 'Administrer denne wikien',
	'farmer-administer-thiswiki-text' => '[[$1|Administrer]] endringer i denne wikien',
	'farmer-notavailable' => 'Ikke tilgjengelig',
	'farmer-notavailable-text' => 'Denne egenskapen er bare tilgjengelig på hovedwikien',
	'farmer-wikicreated' => 'Wiki opprettet',
	'farmer-wikicreated-text' => 'Wikien din har blitt opprettet. Den er tilgjengelig på $1',
	'farmer-default' => 'Som utgangspunkt er det ingen andre enn deg som har rettigheter på denne wikien. Du kan endre brukerrettigheter via $1',
	'farmer-wikiexists' => 'Wikien finnes',
	'farmer-wikiexists-text' => "Wikien du prøver å opprette, '''$1''', finnes allerede. Gå tilbake og prøv med et annet navn.",
	'farmer-confirmsetting' => 'Bekreft wikiens innstillinger',
	'farmer-confirmsetting-name' => 'Navn',
	'farmer-confirmsetting-title' => 'Tittel',
	'farmer-confirmsetting-description' => 'Beskrivelse',
	'farmer-confirmsetting-reason' => 'Grunn',
	'farmer-description' => 'Beskrivelse',
	'farmer-confirmsetting-text' => "Wikien din, '''$1''', vil være tilgjengelig via $3.
Prosjektnavnerommet vil være '''$2'''.
Lenker til dette navnerommet vil være på formen '''<nowiki>[[$2:Sidenavn]]</nowiki>'''.
Om dette er det du vil, trykk på knappen ''{{int:Farmer-button-confirm}}'' nedenunder.",
	'farmer-button-confirm' => 'Bekreft',
	'farmer-button-submit' => 'Lagre',
	'farmer-createwiki-form-title' => 'Opprett en wiki',
	'farmer-createwiki-form-text1' => 'Bruk skjemaet nedenfor for å opprette en ny wiki.',
	'farmer-createwiki-form-help' => 'Hjelp',
	'farmer-createwiki-form-text2' => "; Wikiens navn
: Navnet på wikien. Inneholder kun bokstaver og tall. Wikiens navn vil brukes i URL-en for å identifisere wikien. Om du for eksempel skriver inn ''tittel'', vil wikien din være tilgjengelig via <nowiki>http://</nowiki>''tittel''.mydomain.",
	'farmer-createwiki-form-text3' => '; Wikiens tittel
: Tittelen på wikien. Vil bli brukt i tittelen på enhver side på wikien din. Vil også brukes som navn på prosjektnavnerommet og som interwikiprefiks.',
	'farmer-createwiki-form-text4' => '; Bekskrivelse
: Beskrivelse av wikien. Denne vil vises i listen over wikier.',
	'farmer-createwiki-user' => 'Brukernavn',
	'farmer-createwiki-name' => 'Wikiens navn',
	'farmer-createwiki-title' => 'Wikiens tittel',
	'farmer-createwiki-description' => 'Beskrivelse',
	'farmer-createwiki-reason' => 'Grunn',
	'farmer-updatedlist' => 'Oppdatert liste',
	'farmer-notaccessible' => 'Utilgjengelig',
	'farmer-notaccessible-test' => 'Dette er kun tilgjengelig på farmens opphavswiki',
	'farmer-permissiondenied' => 'Tilgang nektet',
	'farmer-permissiondenied-text' => 'Du har ikke tillatelse til å fjerne wikier',
	'farmer-permissiondenied-text1' => 'Du har ikke tillatelse til å gå inn på denne siden',
	'farmer-deleting' => 'Sletter $1',
	'farmer-delete-confirm' => 'Jeg bekrefter at jeg vil slette denne wikien',
	'farmer-delete-confirm-wiki' => "Wiki som skal slettes: '''$1'''.",
	'farmer-delete-reason' => 'Grunn for sletting:',
	'farmer-delete-title' => 'Fjern wiki',
	'farmer-delete-text' => 'Vennligst velg hvilken wiki du vil fjerne fra listen nedenunder',
	'farmer-delete-form' => 'Velg en wiki',
	'farmer-delete-form-submit' => 'Slett',
	'farmer-listofwikis' => 'Liste over wikier',
	'farmer-mainpage' => 'Hovedside',
	'farmer-basic-title' => 'Grunnparametere',
	'farmer-basic-title1' => 'Tittel',
	'farmer-basic-title1-text' => 'Wikien din har ikke en tittel. Velg en NÅ',
	'farmer-basic-description' => 'Beskrivelse',
	'farmer-basic-description-text' => 'Sett en beskrivelse for wikien din nedenfor',
	'farmer-basic-permission' => 'Tillatelser',
	'farmer-basic-permission-text' => 'Ved å bruke skjemaet under kan du endre brukeres rettigheter på denne wikien.',
	'farmer-basic-permission-visitor' => 'Rettigheter for alle besøkende',
	'farmer-basic-permission-visitor-text' => 'Følgende rettigheter vil bli gitt til alle som besøker wikien',
	'farmer-yes' => 'Ja',
	'farmer-no' => 'Nei',
	'farmer-basic-permission-user' => 'Rettigheter for innloggede brukere',
	'farmer-basic-permission-user-text' => 'Følgende rettigheter vil gis til alle innloggede brukere',
	'farmer-setpermission' => 'Sett rettigheter',
	'farmer-defaultskin' => 'Standardutseende',
	'farmer-defaultskin-button' => 'Sett standardutseende',
	'farmer-extensions' => 'Aktive utvidelser',
	'farmer-extensions-button' => 'Sett aktive utvidelser',
	'farmer-extensions-extension-denied' => 'Du har ikke tillatelse til å bruke denne funksjonen. Du må være medlem av brukergruppa farmeradmin',
	'farmer-extensions-invalid' => 'Ugyldig utvidelse',
	'farmer-extensions-invalid-text' => 'Vi kunne ikke legge til utvidelsen fordi filen som var valgt for inkludering ikke kunne bli funnet',
	'farmer-extensions-available' => 'Tilgjengelige utvidelser',
	'farmer-extensions-noavailable' => 'Ingen utvidelser er registrert',
	'farmer-extensions-register' => 'Registrer utvidelser',
	'farmer-extensions-register-text1' => 'Bruk skjemaet nedenfor for å registrere en ny utvidelse hos farmen. Når en utvidelse er registrert vil alle wikiene kunne bruke den.',
	'farmer-extensions-register-text2' => "For parameteret ''Inkluder fil'', skriv inn navnet på PHP-filen slik du ville gjort det i LocalSettings.php.",
	'farmer-extensions-register-text3' => "Dersom filnavnet inneholder '''\$root''', vil den variabelen erstattes med rotmappen til MediaWiki.",
	'farmer-extensions-register-text4' => 'De nåværende inkluderte stiene er:',
	'farmer-extensions-register-name' => 'Navn',
	'farmer-extensions-register-includefile' => 'Inkluder fil',
	'farmer-error-exists' => 'Kan ikke opprette wikien. Den finnes allerede: $1',
	'farmer-error-noextwrite' => 'Kunne ikke skrive ut utvidelsesfil:',
	'farmer-log-name' => 'Wiki farm loggen',
	'farmer-log-header' => 'Dette er en endringslogg for wiki-farmen.',
	'farmer-log-create' => 'opprettet wikien "$2"',
	'farmer-log-delete' => 'slettet wikien "$2"',
	'right-farmeradmin' => 'Administrer wiki-farmen',
	'right-createwiki' => 'Opprett wikier på wiki-farmen',
);

/** Northern Sotho (Sesotho sa Leboa)
 * @author Mohau
 */
$messages['nso'] = array(
	'farmer-list-wiki' => 'Lenano la di-Wiki',
	'farmer-createwiki' => 'Hlama Wiki',
	'farmer-administration-delete' => 'Phumula Wiki',
	'farmer-wikicreated' => 'Wiki e hlomilwe',
	'farmer-confirmsetting-name' => 'Leina',
	'farmer-confirmsetting-title' => 'Thaetlele',
	'farmer-createwiki-form-help' => 'Thušo',
	'farmer-createwiki-user' => 'Leina la mošomiši',
	'farmer-createwiki-name' => 'Leina la Wiki',
	'farmer-createwiki-title' => 'Thaetlele ya Wiki',
	'farmer-deleting' => 'Phumutše $1',
	'farmer-delete-form-submit' => 'Phumula',
	'farmer-listofwikis' => 'Lenano la di-Wiki',
	'farmer-basic-title1' => 'Thaetlele',
	'farmer-basic-permission-view' => 'Nyakorela matlakala ka moka',
	'farmer-basic-permission-edit' => 'Fetola matlakala ka moka',
	'farmer-basic-permission-createpage' => 'Hloma letlakala le lempsha',
	'farmer-basic-permission-createtalk' => 'Hloma matlakala a dipoledišano',
	'farmer-basic-permission-move' => 'Huduša matlakala',
	'farmer-basic-permission-minoredit' => 'Dumella diphetogo tše nnyenyane',
	'farmer-yes' => 'Ee',
	'farmer-no' => 'Aowa',
	'farmer-extensions-register-name' => 'Leina',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'farmer' => 'Administracion Multi Wikis',
	'farmer-desc' => 'Administra mantun wiki',
	'farmercantcreatewikis' => 'Podètz pas crear de wikis perque avètz pas l’abilitacion « createwikis » necessària per aquò.',
	'farmercreateurl' => "L'adreça",
	'farmercreatesitename' => 'Nom del sit',
	'farmercreatenextstep' => 'Etapa seguenta',
	'farmernewwikimainpage' => '== Benvenguda dins vòstre Wiki ==
Se legissètz aqueste messatge, aquò indica que vòstre wiki es estat installat corrèctament.
Podètz [[Special:Farmer|individualizar vòstre wiki]].',
	'farmer-about' => 'A prepaus',
	'farmer-about-text' => 'L’extension MediaWiki Farmer vos permet, en permanéncia, d’organizar un ensemble de wikis eissit del logicial MediaWiki.',
	'farmer-list-wiki' => 'Lista dels wikis',
	'farmer-list-wiki-text' => '[[$1|Lista]] totes los wikis sus aqueste sit.',
	'farmer-createwiki' => 'Crear un Wiki',
	'farmer-createwiki-text' => '[[$1|Crear]] ara un wiki novèl.',
	'farmer-administration' => 'Administracion generala',
	'farmer-administration-extension' => 'Organizar las extensions',
	'farmer-administration-extension-text' => '[[$1|Organiza]] las extensions installadas.',
	'farmer-admimistration-listupdate' => 'Mesa a jorn de la lista dels Wikis',
	'farmer-admimistration-listupdate-text' => '[[$1|Mesa a jorn]] de la lista dels wikis sus aqueste sit.',
	'farmer-administration-delete' => 'Suprimir un Wiki',
	'farmer-administration-delete-text' => '[[$1|Suprimir]] un wiki dempuèi aqueste sit d’administracion generala',
	'farmer-administer-thiswiki' => 'Administrar aqueste Wiki',
	'farmer-administer-thiswiki-text' => '[[$1|Administrar]] los cambiaments sus aqueste wiki.',
	'farmer-notavailable' => 'Pas disponible',
	'farmer-notavailable-text' => 'Aqueste programa es pas disponible que sul sit principal',
	'farmer-wikicreated' => 'Wiki creat',
	'farmer-wikicreated-text' => 'Vòstre wiki es estat creat.
Es accessible sus $1',
	'farmer-default' => "Per defaut, degun dispausa pas de permissions sus aqueste wiki a despart de vos. Podètz cambiar los privilègis d'utilizaire via $1",
	'farmer-wikiexists' => 'Lo Wiki existís',
	'farmer-wikiexists-text' => "Lo wiki intitolat '''$1''' que voliatz crear, existís ja.  Vos convidam a tornar en rière e a ensajar un nom novèl.",
	'farmer-confirmsetting' => 'Confirmar los paramètres del Wiki',
	'farmer-confirmsetting-name' => 'Nom',
	'farmer-confirmsetting-title' => 'Títol',
	'farmer-confirmsetting-description' => 'Descripcion',
	'farmer-confirmsetting-reason' => 'Rason',
	'farmer-description' => 'Descripcion',
	'farmer-confirmsetting-text' => "Vòstre wiki, '''$1''', serà accessible dempuèi l’adreça $3.
L’espaci de nom del projècte serà '''$2'''.
Los ligams cap a aqueste espaci auràn la forma de '''<nowiki>[[$2:Nom de la pagina]]</nowiki>'''.
S’es plan çò que volètz, cicatz sul boton '''Confirmar''' çaijós.",
	'farmer-button-confirm' => 'Confirmar',
	'farmer-button-submit' => 'Sometre',
	'farmer-createwiki-form-title' => 'Crear un Wiki',
	'farmer-createwiki-form-text1' => 'Utilizatz lo formulari çaijós per crear un wiki novèl.',
	'farmer-createwiki-form-help' => 'Ajuda',
	'farmer-createwiki-form-text2' => "; Nom del Wiki : Lo nom del Wiki.  Conten pas que de letras e de chifras. Lo nom del wiki serà utilizat coma una partida de l'adreça per l'identificar. A títol d'exemple, se entratz '''títol''', vòstre wiki serà accessible sus <nowiki>http://</nowiki>'''títol'''.mondomeni.",
	'farmer-createwiki-form-text3' => '; Títol del Wiki : Lo títol del wiki. Serà utilizat dins lo títol de cada pagina de vòstre wiki. Prendrà lo nom de l’espaci « Project » e mai lo prefix interwiki.',
	'farmer-createwiki-form-text4' => '; Descripcion : Descripcion del wiki. Aquò consistís en un tèxte que descriu lo wiki. Serà afichat dins la lista dels wikis.',
	'farmer-createwiki-user' => 'Nom de l’utilizaire',
	'farmer-createwiki-name' => 'Nom del Wiki',
	'farmer-createwiki-title' => 'Títol del Wiki',
	'farmer-createwiki-description' => 'Descripcion',
	'farmer-createwiki-reason' => 'Rason',
	'farmer-updatedlist' => 'Lista mesa a jorn',
	'farmer-notaccessible' => 'Pas accessible',
	'farmer-notaccessible-test' => "Aqueste programa es disponible unicament sul wiki principal d'aquest ensemble de projèctes.",
	'farmer-permissiondenied' => 'Permission refusada',
	'farmer-permissiondenied-text' => 'Avètz pas la permission de suprimir un wiki dempuèi lo sit d’administracion general.',
	'farmer-permissiondenied-text1' => 'Vos es pas permes d’accedir a aquesta pagina.',
	'farmer-deleting' => 'Lo wiki « $1 » es estat suprimit',
	'farmer-delete-confirm' => 'Confirmi que vòli suprimir aqueste wiki',
	'farmer-delete-confirm-wiki' => "Wiki de suprimir : '''$1'''.",
	'farmer-delete-reason' => 'Motiu de supression :',
	'farmer-delete-title' => 'Suprimir un Wiki',
	'farmer-delete-text' => 'Seleccionatz lo wiki que desiratz suprimir dempuèi la lista çaijós.',
	'farmer-delete-form' => 'Seleccionatz un wiki',
	'farmer-delete-form-submit' => 'Suprimir',
	'farmer-listofwikis' => 'Lista dels Wikis',
	'farmer-mainpage' => 'Acuèlh',
	'farmer-basic-title' => 'Paramètres de basa',
	'farmer-basic-title1' => 'Títol',
	'farmer-basic-title1-text' => "Vòstre wiki dispausa pas de títol. Indicatz-ne un '''ara'''",
	'farmer-basic-description' => 'Descripcion',
	'farmer-basic-description-text' => 'Indicatz dins lo quadre çaijós la descripcion de vòstre wiki.',
	'farmer-basic-permission' => 'Abilitacions',
	'farmer-basic-permission-text' => "En utilizant lo formulari çaijós, es possible de cambiar las abilitacions dels utilizaires d'aqueste wiki.",
	'farmer-basic-permission-visitor' => 'Abilitacions per cada visitaire',
	'farmer-basic-permission-visitor-text' => 'Las abilitacions seguentas seràn aplicablas per totas las personas que visitaràn aqueste wiki.',
	'farmer-yes' => 'Òc',
	'farmer-no' => 'Non',
	'farmer-basic-permission-user' => 'Abilitacions pels utilizaires enregistrats',
	'farmer-basic-permission-user-text' => 'Las abilitacions seguentas seràn aplicablas a totes los utilizaires enregistrats sus aqueste wiki.',
	'farmer-setpermission' => 'Configurar las abilitacions',
	'farmer-defaultskin' => 'Aparéncias per defaut',
	'farmer-defaultskin-button' => 'Configurar l’aparéncia per defaut',
	'farmer-extensions' => 'Extensions activas',
	'farmer-extensions-button' => 'Configurar las extensions activas',
	'farmer-extensions-extension-denied' => "Sètz pas abilitat per l’utilizacion d'aquesta foncionalitat. Vos cal èsser membre dels administrators de l’administracion multi wikis.",
	'farmer-extensions-invalid' => 'Extension invalida',
	'farmer-extensions-invalid-text' => 'Podèm pas apondre aquesta extension perque lo fichièr seleccionat per l’inclusion es introbable.',
	'farmer-extensions-available' => 'Extensions disponiblas',
	'farmer-extensions-noavailable' => "Cap d'extension es pas enregistrada.",
	'farmer-extensions-register' => 'Enregistrar una extension',
	'farmer-extensions-register-text1' => 'Utilizatz lo formulari çaijós per enregistrar una extension novèla amb aquesta foncionalitat. Un còp l’extension enregistrada, totes los wikis la poiràn utilizar.',
	'farmer-extensions-register-text2' => "Per çò que concernís lo paramètre ''Fichier Include'', indicatz lo nom del fichièr PHP que voldretz dins LocalSettings.php.",
	'farmer-extensions-register-text3' => "Se lo nom del fichièr conten '''\$root''', aquesta variabla serà remplaçada pel repertòri raiç de MediaWiki.",
	'farmer-extensions-register-text4' => 'Los camins actuals dels fichièrs include son :',
	'farmer-extensions-register-name' => 'Nom',
	'farmer-extensions-register-includefile' => 'Fichièr Include',
	'farmer-error-exists' => 'L’interfàcia pòt pas crear lo Wiki. Existís ja : $1',
	'farmer-error-noextwrite' => 'Impossible d’escriure lo fichièr d’extension seguent :',
	'farmer-log-name' => 'Jornal de la bòria wiki',
	'farmer-log-header' => 'Aqueste jornal conten las modificacions aportadas a la bòria wiki.',
	'farmer-log-create' => 'a creat lo wiki « $2 »',
	'farmer-log-delete' => 'a suprimit lo wiki « $2 »',
	'right-farmeradmin' => 'Gerir la bòria de wikis',
	'right-createwiki' => 'Crear de wikis dins la bòria de wikis',
);

/** Oriya (ଓଡ଼ିଆ)
 * @author Jose77
 */
$messages['or'] = array(
	'farmer-createwiki-form-help' => 'ସାହାଜ୍ଯ',
	'farmer-mainpage' => 'ପ୍ରଧାନ ପ୍ରୁଷ୍ଟ୍ଆ',
);

/** Ossetic (Иронау)
 * @author Amikeco
 */
$messages['os'] = array(
	'farmer-confirmsetting-title' => 'Сæргонд',
	'farmer-createwiki-user' => 'Архайæджы ном',
	'farmer-delete-form-submit' => 'Аппар',
	'farmer-basic-title1' => 'Сæргонд',
	'farmer-yes' => 'О',
	'farmer-no' => 'Нæ',
);

/** Deitsch (Deitsch)
 * @author Xqt
 */
$messages['pdc'] = array(
	'farmer-about' => 'Iwwer',
	'farmer-createwiki-form-help' => 'Hilf',
	'farmer-delete-form-submit' => 'Lösche',
	'farmer-mainpage' => 'Haaptblatt',
);

/** Plautdietsch (Plautdietsch)
 * @author Slomox
 */
$messages['pdt'] = array(
	'farmer-createwiki-user' => 'Bruckernome',
);

/** Polish (Polski)
 * @author Derbeth
 * @author Equadus
 * @author Leinad
 * @author Masti
 * @author McMonster
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'farmer' => 'Farmer',
	'farmer-desc' => 'Zarządzanie farmą MediaWiki',
	'farmercantcreatewikis' => 'Nie możesz utworzyć nowej wiki, ponieważ nie masz uprawnienia createwiki.',
	'farmercreatesitename' => 'Nazwa witryny',
	'farmercreatenextstep' => 'Następny etap',
	'farmernewwikimainpage' => '== Witamy w swojej Wiki ==
Jeżeli czytasz ten tekst, oznacza to, że Twoja nowa wiki została zainstalowana prawidłowo.
Możesz [[Special:Farmer|dostosować wiki do swoich potrzeb]].',
	'farmer-about' => 'O farmie',
	'farmer-about-text' => 'Farmer MediaWiki pozwala na zarządzanie farmą wiki.',
	'farmer-list-wiki' => 'Spis Wiki',
	'farmer-list-wiki-text' => '[[$1|Spis]] wszystkich wiki na {{GRAMMAR:MS.lp|{{SITENAME}}}}',
	'farmer-createwiki' => 'Utwórz Wiki',
	'farmer-createwiki-text' => '[[$1|Stwórz]] teraz nową wiki!',
	'farmer-administration' => 'Zarządzanie farmą',
	'farmer-administration-extension' => 'Zarządzanie rozszerzeniami',
	'farmer-administration-extension-text' => '[[$1|Zarządzaj]] zainstalowanymi rozszerzeniami.',
	'farmer-admimistration-listupdate' => 'Aktualizacja spisu farmy',
	'farmer-admimistration-listupdate-text' => '[[$1|Aktualizacja]] spisu wiki na {{GRAMMAR:MS.lp|{{SITENAME}}}}',
	'farmer-administration-delete' => 'Usuń Wiki',
	'farmer-administration-delete-text' => '[[$1|Usuń]] wiki z farmy',
	'farmer-administer-thiswiki' => 'Zarządzaj tą Wiki',
	'farmer-administer-thiswiki-text' => '[[$1|Rejestr zarządzania]] tą wiki',
	'farmer-notavailable' => 'Niedostępne',
	'farmer-notavailable-text' => 'Ta funkcjonalność dostępna jest tylko na głównej wiki',
	'farmer-wikicreated' => 'Wiki została utworzona',
	'farmer-wikicreated-text' => 'Twoja wiki została utworzona.
Dostępna jest pod adresem $1',
	'farmer-default' => 'Domyślnie, nikt oprócz Ciebie nie ma uprawnień na tej wiki.
Możesz zmienić uprawnienia użytkowników poprzez $1',
	'farmer-wikiexists' => 'Wiki już istnieje',
	'farmer-wikiexists-text' => "Wiki którą próbujesz utworzyć '''$1''' już istnieje.
Spróbuj utworzyć wiki pod inną nazwą.",
	'farmer-confirmsetting' => 'Zapisz ustawienia Wiki',
	'farmer-confirmsetting-name' => 'Nazwa',
	'farmer-confirmsetting-title' => 'Tytuł',
	'farmer-confirmsetting-description' => 'Opis',
	'farmer-description' => 'Opis',
	'farmer-confirmsetting-text' => "Wiki '''$1''' będzie dostępna pod adresem $3.
Przestrzeń nazw projektu to '''$2'''.
Odnośniki do stron w tej przestrzeni będą postaci '''<nowiki>[[$2:Nazwa strony]]</nowiki>'''.
Jeśli wszystko się się zgadza, wciśnij znajdujący się poniżej przycisk '''Zapisz'''.",
	'farmer-button-confirm' => 'Zapisz',
	'farmer-button-submit' => 'Wyślij',
	'farmer-createwiki-form-title' => 'Utwórz Wiki',
	'farmer-createwiki-form-text1' => 'Użyj poniższego formularza aby utworzyć nową wiki.',
	'farmer-createwiki-form-help' => 'Pomoc',
	'farmer-createwiki-form-text2' => "; Nazwa wiki – jest to nazwa wiki.
Nazwa może zawierać wyłącznie litery i cyfry.
Będzie ona używana jako składowa adresu URL, by jednoznacznie ją identyfikować.
Jeżeli na przykład wprowadzisz nazwę '''las''', wiki będzie dostępna pod adresem <nowiki>http://</nowiki>'''las'''.mojadomena.",
	'farmer-createwiki-form-text3' => '; Tytuł wiki – jest to tytuł wiki.
Zostanie użyty jako tytuł na każdej stronie wiki.
Będzie także wykorzystywany jako nazwa przestrzeni projektu i przedrostek odnośników z innych wiki.',
	'farmer-createwiki-form-text4' => '; Opis – opis wiki.
Jest to tekst opisujący wiki.
Opis będzie wyświetlany w spisie wiki.',
	'farmer-createwiki-user' => 'Nazwa użytkownika',
	'farmer-createwiki-name' => 'Nazwa wiki',
	'farmer-createwiki-title' => 'Tytuł wiki',
	'farmer-createwiki-description' => 'Opis',
	'farmer-updatedlist' => 'Zaktualizowany spis',
	'farmer-notaccessible' => 'Niedostępna',
	'farmer-notaccessible-test' => 'Funkcjonalność jest dostępna tylko w macierzystej wiki na farmie',
	'farmer-permissiondenied' => 'Dostęp zabroniony',
	'farmer-permissiondenied-text' => 'Nie masz uprawnień do usunięcia wiki z farmy',
	'farmer-permissiondenied-text1' => 'Nie masz uprawnień do dostępu do tej strony',
	'farmer-deleting' => 'Wiki „$1” została usunięta',
	'farmer-delete-title' => 'Usuwanie Wiki',
	'farmer-delete-text' => 'Wybierz z poniższego spisu wiki, którą chcesz usunąć',
	'farmer-delete-form' => 'Wybierz wiki',
	'farmer-delete-form-submit' => 'Usuń',
	'farmer-listofwikis' => 'Spis wiki',
	'farmer-mainpage' => 'Strona główna',
	'farmer-basic-title' => 'Podstawowe parametry',
	'farmer-basic-title1' => 'Tytuł',
	'farmer-basic-title1-text' => 'Twoja wiki nie posiada tytułu. Ustaw go TERAZ',
	'farmer-basic-description' => 'Opis',
	'farmer-basic-description-text' => 'Ustaw poniżej opis dla swojej wiki',
	'farmer-basic-permission' => 'Uprawnienia',
	'farmer-basic-permission-text' => 'Używając poniższego formularza, można zmienić uprawnienia dla użytkowników tej wiki.',
	'farmer-basic-permission-visitor' => 'Uprawnienia dla wszystkich gości',
	'farmer-basic-permission-visitor-text' => 'Poniższe uprawnienia zostaną użyte dla każdej osoby, która odwiedzi tę wiki',
	'farmer-yes' => 'Tak',
	'farmer-no' => 'Nie',
	'farmer-basic-permission-user' => 'Dostęp dla zalogowanych użytkowników',
	'farmer-basic-permission-user-text' => 'Następujące uprawnienia zostaną użyte dla każdej osoby, która zaloguje się na tej wiki',
	'farmer-setpermission' => 'Ustaw uprawnienia',
	'farmer-defaultskin' => 'Domyślna skórka',
	'farmer-defaultskin-button' => 'Ustaw domyślną skórkę',
	'farmer-extensions' => 'Aktywne rozszerzenia',
	'farmer-extensions-button' => 'Ustaw aktywne rozszerzenia',
	'farmer-extensions-extension-denied' => 'Nie masz uprawnień by użyć tej funkcjonalności.
Musisz być członkiem grupy farmeradmin',
	'farmer-extensions-invalid' => 'Niesprawne rozszerzenie',
	'farmer-extensions-invalid-text' => 'Nie można dodać rozszerzenia ponieważ wskazany do włączenia plik nie został odnaleziony',
	'farmer-extensions-available' => 'Dostępne rozszerzenia',
	'farmer-extensions-noavailable' => 'Brak zarejestrowanych rozszerzeń',
	'farmer-extensions-register' => 'Zarejestruj rozszerzenie',
	'farmer-extensions-register-text1' => 'Użyj poniższego formularza aby zarejestrować nowe rozszerzenie dla farmy.
Po zarejestrowaniu wszystkie wiki będą mogły korzystać z tego rozszerzenia.',
	'farmer-extensions-register-text2' => "Ustaw parametr ''Załącz plik'' na nazwę pliku PHP, podobnie jak w LocalSettings.php.",
	'farmer-extensions-register-text3' => "Jeżeli nazwa pliku zawiera '''\$root''', w miejsce tej zmiennej zostanie wstawione odwołanie do katalogu głównego MediaWiki.",
	'farmer-extensions-register-text4' => 'Bieżąca ścieżka dla dołączanych plików to',
	'farmer-extensions-register-name' => 'Nazwa',
	'farmer-extensions-register-includefile' => 'Załącz plik',
	'farmer-error-exists' => 'Nie można utworzyć wiki. Już istnieje: $1',
	'farmer-error-noextwrite' => 'Nie można zapisać pliku rozszerzenia:',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'farmercreatesitename' => 'د ويبځي نوم',
	'farmer-about' => 'په اړه',
	'farmer-list-wiki' => 'د ويکي ګانو لړليک',
	'farmer-createwiki' => 'يو ويکي جوړول',
	'farmer-administration-delete' => 'يو ويکي ړنګول',
	'farmer-wikicreated' => 'ويکي مو جوړ شو',
	'farmer-wikicreated-text' => 'ستاسو ويکي جوړ شو.
دا په $1 کې د لاسرسۍ وړ ده',
	'farmer-wikiexists' => 'ويکي مو شته',
	'farmer-confirmsetting-name' => 'نوم',
	'farmer-confirmsetting-title' => 'سرليک',
	'farmer-description' => 'څرګندونه',
	'farmer-createwiki-form-title' => 'يو ويکي جوړول',
	'farmer-createwiki-user' => 'کارن-نوم',
	'farmer-createwiki-description' => 'څرګندونه',
	'farmer-permissiondenied' => 'د اجازې غوښتنه مو رد شوه',
	'farmer-permissiondenied-text1' => 'تاسو همدې مخ ته د لاسرسۍ اجازه نه لرۍ',
	'farmer-deleting' => '$1 د ړنګولو په حال کې',
	'farmer-delete-title' => 'ويکي ړنګول',
	'farmer-delete-form' => 'يو ويکي وټاکۍ',
	'farmer-delete-form-submit' => 'ړنګول',
	'farmer-listofwikis' => 'د ويکي ګانو لړليک',
	'farmer-mainpage' => 'لومړی مخ',
	'farmer-basic-title1' => 'سرليک',
	'farmer-basic-title1-text' => 'ستاسو ويکي هېڅ يو سرليک هم نه لري. يو ورته وټاکۍ',
	'farmer-basic-description' => 'څرګندونه',
	'farmer-basic-permission-view' => 'ټول مخونه ښکاره کول',
	'farmer-basic-permission-upload' => 'دوتنې پورته کول',
	'farmer-yes' => 'هو',
	'farmer-no' => 'نه',
	'farmer-extensions-register-name' => 'نوم',
);

/** Portuguese (Português)
 * @author Malafaya
 * @author Waldir
 */
$messages['pt'] = array(
	'farmer' => 'Farmer',
	'farmer-desc' => 'Gira uma "farm" MediaWiki',
	'farmercantcreatewikis' => 'Você não pode criar wikis porque não possui o privilégio "createwikis"',
	'farmercreatesitename' => 'Nome do sítio',
	'farmercreatenextstep' => 'Próximo passo',
	'farmernewwikimainpage' => '== Bem-vindo ao seu Wiki ==
Se está a ler isto, o seu wiki foi correctamente instalado.
Pode agora [[Special:Farmer|personalizar o seu wiki]].',
	'farmer-about' => 'Sobre',
	'farmer-about-text' => 'MediaWiki Farmer permite-lhe gerir uma "farm" de wikis MediaWiki.',
	'farmer-list-wiki' => 'Lista de Wikis',
	'farmer-list-wiki-text' => '[[$1|Listar]] todos os wikis em {{SITENAME}}',
	'farmer-createwiki' => 'Criar um Wiki',
	'farmer-createwiki-text' => '[[$1|Criar]] um novo wiki já!',
	'farmer-administration' => 'Administração da "Farm"',
	'farmer-administration-extension' => 'Gerir Extensões',
	'farmer-administration-extension-text' => '[[$1|Gerir]] extensões instaladas.',
	'farmer-admimistration-listupdate' => 'Actualização da Lista da "Farm"',
	'farmer-admimistration-listupdate-text' => '[[$1|Actualize]] a lista de wikis em {{SITENAME}}',
	'farmer-administration-delete' => 'Apagar um Wiki',
	'farmer-administration-delete-text' => '[[$1|Apagar]] um wiki da "farm"',
	'farmer-administer-thiswiki' => 'Gerir este Wiki',
	'farmer-administer-thiswiki-text' => '[[$1|Administrar]] alterações a este wiki',
	'farmer-notavailable' => 'Não disponível',
	'farmer-notavailable-text' => 'Esta funcionalidade só está disponível no wiki principal',
	'farmer-wikicreated' => 'Wiki criado',
	'farmer-wikicreated-text' => 'O seu wiki foi criado. Este está acessível em $1',
	'farmer-default' => 'Por defeito, ninguém tem permissões neste wiki à excepção de você. Pode alterar os privilégios dos utilizadores em $1',
	'farmer-wikiexists' => 'O wiki existe',
	'farmer-wikiexists-text' => "O wiki que está a tentar criar, '''$1''', já existe. Por favor, volte atrás e introduza um outro nome.",
	'farmer-confirmsetting' => 'Confirmar Configuração do Wiki',
	'farmer-confirmsetting-name' => 'Nome',
	'farmer-confirmsetting-title' => 'Título',
	'farmer-confirmsetting-description' => 'Descrição',
	'farmer-confirmsetting-reason' => 'Motivo',
	'farmer-description' => 'Descrição',
	'farmer-confirmsetting-text' => "O seu wiki, '''$1''', estará acessível através de $3.
O espaço nominal do projecto será '''$2'''.
Ligações para este espaço nominal terão o formato '''<nowiki>[[$2:Nome da página]]</nowiki>'''.
Se é isto que pretende, pressione o botão '''confirmar''' abaixo.",
	'farmer-button-confirm' => 'Confirmar',
	'farmer-button-submit' => 'Submeter',
	'farmer-createwiki-form-title' => 'Criar um Wiki',
	'farmer-createwiki-form-text1' => 'Utilize o formulário abaixo para criar um novo wiki.',
	'farmer-createwiki-form-help' => 'Ajuda',
	'farmer-createwiki-form-text2' => "; Nome do wiki: Contém apenas letras e números. O nome do wiki será usado como parte da URL para identificar o seu wiki. Por exemplo, se introduzir '''titulo''', então o seu wiki será acedido através de <nowiki>http://</nowiki>'''titulo'''.meudominio.",
	'farmer-createwiki-form-text3' => '; Título do wiki: Será usado no título de cada página no seu wiki. Será também o espaço nominal de projecto e o prefixo interwiki.',
	'farmer-createwiki-form-text4' => '; Descrição: Descrição do wiki. Este é a descrição textual sobre o wiki. Será mostrada na lista de wikis.',
	'farmer-createwiki-user' => 'Nome de utilizador',
	'farmer-createwiki-name' => 'Nome do Wiki',
	'farmer-createwiki-title' => 'Título do Wiki',
	'farmer-createwiki-description' => 'Descrição',
	'farmer-createwiki-reason' => 'Motivo',
	'farmer-updatedlist' => 'Lista actualizada',
	'farmer-notaccessible' => 'Não acessível',
	'farmer-notaccessible-test' => 'Esta funcionalidade só está disponível no wiki pai da "farm"',
	'farmer-permissiondenied' => 'Permissão negada',
	'farmer-permissiondenied-text' => 'Não tem permissão para apagar um wiki da "farm"',
	'farmer-permissiondenied-text1' => 'Não tem permissão para aceder a esta página',
	'farmer-deleting' => 'O wiki "$1" foi eliminado',
	'farmer-delete-confirm' => 'Confirmo que pretendo eliminar este wiki',
	'farmer-delete-confirm-wiki' => "Wiki a apagar: '''$1'''.",
	'farmer-delete-reason' => 'Motivo da eliminação:',
	'farmer-delete-title' => 'Apagar Wiki',
	'farmer-delete-text' => 'Por favor, seleccione o wiki que deseja apagar na lista abaixo',
	'farmer-delete-form' => 'Seleccione um wiki',
	'farmer-delete-form-submit' => 'Apagar',
	'farmer-listofwikis' => 'Lista de Wikis',
	'farmer-mainpage' => 'Página Principal',
	'farmer-basic-title' => 'Parâmetros Básicos',
	'farmer-basic-title1' => 'Título',
	'farmer-basic-title1-text' => 'O seu wiki não tem um título. Escolha um AGORA',
	'farmer-basic-description' => 'Descrição',
	'farmer-basic-description-text' => 'Introduza a descrição do seu wiki abaixo',
	'farmer-basic-permission' => 'Permissões',
	'farmer-basic-permission-text' => 'Usando o seguinte formulário, é possível alterar as permissões dos utilizadores deste wiki.',
	'farmer-basic-permission-visitor' => 'Permissões para Cada Visitante',
	'farmer-basic-permission-visitor-text' => 'As seguinte permissões serão aplicadas a todas as pessoas que visitem este wiki',
	'farmer-yes' => 'Sim',
	'farmer-no' => 'Não',
	'farmer-basic-permission-user' => 'Permissões para Utilizadores Autenticados',
	'farmer-basic-permission-user-text' => 'As seguintes permissões serão aplicadas a todas as pessoas que se autentiquem neste wiki',
	'farmer-setpermission' => 'Aplicar Permissões',
	'farmer-defaultskin' => 'Aparência (skin) Padrão',
	'farmer-defaultskin-button' => 'Escolher Aparência (skin) Padrão',
	'farmer-extensions' => 'Extensões Activas',
	'farmer-extensions-button' => 'Aplicar Extensões Activas',
	'farmer-extensions-extension-denied' => 'Você não tem permissão para usar esta funcionalidade.  Deverá ser membro do grupo "farmeradmin"',
	'farmer-extensions-invalid' => 'Extensão Inválida',
	'farmer-extensions-invalid-text' => 'Não foi possível adicionar a extensão porque o ficheiro selecciondo para inclusão não foi encontrado',
	'farmer-extensions-available' => 'Extensões Disponíveis',
	'farmer-extensions-noavailable' => 'Nenhuma extensão está registada',
	'farmer-extensions-register' => 'Registar Extensão',
	'farmer-extensions-register-text1' => 'Use o seguinte formulário para registar uma nova extensão na "farm".  Uma vez registada a extensão, todos os wikis poderão usá-la.',
	'farmer-extensions-register-text2' => "Para o parâmetro ''Ficheiro de Inclusão'', introduza o nome do ficheiro PHP tal como ficaria em LocalSettings.php.",
	'farmer-extensions-register-text3' => "Se o nome do ficheiro contiver '''\$root''', essa variável será substituída pela directoria base do MediaWiki.",
	'farmer-extensions-register-text4' => 'Os caminhos de inclusão actuais são:',
	'farmer-extensions-register-name' => 'Nome',
	'farmer-extensions-register-includefile' => 'Ficheiro de Inclusão',
	'farmer-error-exists' => 'Não é possível criar wiki. Este já existe: $1',
	'farmer-error-noextwrite' => 'Não foi possível escrever para ficheiro de extensão:',
	'farmer-log-name' => 'Registo do aglomerado de wikis',
	'farmer-log-header' => 'Este é um registo de alterações feitas no aglomerado de wikis.',
	'farmer-log-create' => 'criou o wiki "$2"',
	'farmer-log-delete' => 'eliminou o wiki "$2"',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Crazymadlover
 * @author Eduardo.mps
 */
$messages['pt-br'] = array(
	'farmer' => 'Farmer',
	'farmer-desc' => 'Gerencie uma "farm" MediaWiki',
	'farmercantcreatewikis' => 'Você não pode criar wikis porque não possui o privilégio "createwikis"',
	'farmercreatesitename' => 'Nome do sítio',
	'farmercreatenextstep' => 'Próximo passo',
	'farmernewwikimainpage' => '== Bem-vindo ao seu Wiki ==
Se está a ler isto, o seu wiki foi corretamente instalado.
Pode agora [[Special:Farmer|personalizar o seu wiki]].',
	'farmer-about' => 'Sobre',
	'farmer-about-text' => 'MediaWiki Farmer permite-lhe gerenciar uma "farm" de wikis MediaWiki.',
	'farmer-list-wiki' => 'Lista de Wikis',
	'farmer-list-wiki-text' => '[[$1|Listar]] todos os wikis em {{SITENAME}}',
	'farmer-createwiki' => 'Criar um Wiki',
	'farmer-createwiki-text' => '[[$1|Criar]] um novo wiki já!',
	'farmer-administration' => 'Administração da "Farm"',
	'farmer-administration-extension' => 'Gerenciar Extensões',
	'farmer-administration-extension-text' => '[[$1|Gerenciar]] extensões instaladas.',
	'farmer-admimistration-listupdate' => 'Atualização da Lista da "Farm"',
	'farmer-admimistration-listupdate-text' => '[[$1|Atualize]] a lista de wikis em {{SITENAME}}',
	'farmer-administration-delete' => 'Apagar um Wiki',
	'farmer-administration-delete-text' => '[[$1|Apagar]] um wiki da "farm"',
	'farmer-administer-thiswiki' => 'Gerenciar este Wiki',
	'farmer-administer-thiswiki-text' => '[[$1|Administrar]] alterações a este wiki',
	'farmer-notavailable' => 'Não disponível',
	'farmer-notavailable-text' => 'Esta funcionalidade só está disponível no wiki principal',
	'farmer-wikicreated' => 'Wiki criado',
	'farmer-wikicreated-text' => 'O seu wiki foi criado. Ele está acessível em $1',
	'farmer-default' => 'Por padrão, ninguém tem permissões neste wiki à exceção de você. Pode alterar os privilégios dos utilizadores em $1',
	'farmer-wikiexists' => 'O wiki existe',
	'farmer-wikiexists-text' => "O wiki que está tentando criar, '''$1''', já existe. Por favor, volte e introduza um outro nome.",
	'farmer-confirmsetting' => 'Confirmar Configuração do Wiki',
	'farmer-confirmsetting-name' => 'Nome',
	'farmer-confirmsetting-title' => 'Título',
	'farmer-confirmsetting-description' => 'Descrição',
	'farmer-confirmsetting-reason' => 'Motivo',
	'farmer-description' => 'Descrição',
	'farmer-confirmsetting-text' => "O seu wiki, '''$1''', estará acessível através de $3.
O espaço nominal do projeto será '''$2'''.
Ligações para este espaço nominal terão o formato '''<nowiki>[[$2:Nome da página]]</nowiki>'''.
Se é isto que pretende, pressione o botão '''confirmar''' abaixo.",
	'farmer-button-confirm' => 'Confirmar',
	'farmer-button-submit' => 'Enviar',
	'farmer-createwiki-form-title' => 'Criar um Wiki',
	'farmer-createwiki-form-text1' => 'Utilize o formulário abaixo para criar um novo wiki.',
	'farmer-createwiki-form-help' => 'Ajuda',
	'farmer-createwiki-form-text2' => "; Nome do wiki: Contém apenas letras e números. O nome do wiki será usado como parte da URL para identificar o seu wiki. Por exemplo, se introduzir '''titulo''', então o seu wiki será acessado através de <nowiki>http://</nowiki>'''titulo'''.meudominio.",
	'farmer-createwiki-form-text3' => '; Título do wiki: Será usado no título de cada página no seu wiki. Será também o espaço nominal de projeto e o prefixo interwiki.',
	'farmer-createwiki-form-text4' => '; Descrição: Descrição do wiki. Este é a descrição textual sobre o wiki. Será mostrada na lista de wikis.',
	'farmer-createwiki-user' => 'Nome de utilizador',
	'farmer-createwiki-name' => 'Nome do Wiki',
	'farmer-createwiki-title' => 'Título do Wiki',
	'farmer-createwiki-description' => 'Descrição',
	'farmer-createwiki-reason' => 'Motivo',
	'farmer-updatedlist' => 'Lista atualizada',
	'farmer-notaccessible' => 'Não acessível',
	'farmer-notaccessible-test' => 'Esta funcionalidade só está disponível no wiki pai da "farm"',
	'farmer-permissiondenied' => 'Permissão negada',
	'farmer-permissiondenied-text' => 'Não tem permissão para apagar um wiki da "farm"',
	'farmer-permissiondenied-text1' => 'Não tem permissão para acessar esta página',
	'farmer-deleting' => 'A wiki "$1" foi removida',
	'farmer-delete-confirm' => 'Eu confirmo que pretendo eliminar este wiki',
	'farmer-delete-confirm-wiki' => "Wiki a apagar: '''$1'''.",
	'farmer-delete-reason' => 'Motivo da eliminação:',
	'farmer-delete-title' => 'Apagar Wiki',
	'farmer-delete-text' => 'Por favor, seleccione o wiki que deseja apagar na lista abaixo',
	'farmer-delete-form' => 'Selecione um wiki',
	'farmer-delete-form-submit' => 'Apagar',
	'farmer-listofwikis' => 'Lista de Wikis',
	'farmer-mainpage' => 'Página Principal',
	'farmer-basic-title' => 'Parâmetros Básicos',
	'farmer-basic-title1' => 'Título',
	'farmer-basic-title1-text' => 'O seu wiki não tem um título. Escolha um <b>agora</b>',
	'farmer-basic-description' => 'Descrição',
	'farmer-basic-description-text' => 'Introduza a descrição do seu wiki abaixo',
	'farmer-basic-permission' => 'Permissões',
	'farmer-basic-permission-text' => 'Usando o seguinte formulário, é possível alterar as permissões dos utilizadores deste wiki.',
	'farmer-basic-permission-visitor' => 'Permissões para cada visitante',
	'farmer-basic-permission-visitor-text' => 'As seguinte permissões serão aplicadas a todas as pessoas que visitem este wiki',
	'farmer-yes' => 'Sim',
	'farmer-no' => 'Não',
	'farmer-basic-permission-user' => 'Permissões para Utilizadores Autenticados',
	'farmer-basic-permission-user-text' => 'As seguintes permissões serão aplicadas a todas as pessoas que se autentiquem neste wiki',
	'farmer-setpermission' => 'Aplicar Permissões',
	'farmer-defaultskin' => 'Aparência (skin) Padrão',
	'farmer-defaultskin-button' => 'Escolher Aparência (skin) Padrão',
	'farmer-extensions' => 'Extensões Ativas',
	'farmer-extensions-button' => 'Aplicar Extensões Ativas',
	'farmer-extensions-extension-denied' => 'Você não tem permissão para usar esta funcionalidade.
Você deve ser membro do grupo "farmeradmin"',
	'farmer-extensions-invalid' => 'Extensão Inválida',
	'farmer-extensions-invalid-text' => 'Não foi possível adicionar a extensão porque o arquivo seleciondo para inclusão não foi encontrado',
	'farmer-extensions-available' => 'Extensões Disponíveis',
	'farmer-extensions-noavailable' => 'Nenhuma extensão está registrada',
	'farmer-extensions-register' => 'Registrar Extensão',
	'farmer-extensions-register-text1' => 'Use o seguinte formulário para registrar uma nova extensão na "farm".  Uma vez registrada a extensão, todos os wikis poderão usá-la.',
	'farmer-extensions-register-text2' => "Para o parâmetro ''Arquivo de Inclusão'', introduza o nome do arquivo PHP tal como ficaria em LocalSettings.php.",
	'farmer-extensions-register-text3' => "Se o nome do arquivo contiver '''\$root''', essa variável será substituída pelo diretório raiz do MediaWiki.",
	'farmer-extensions-register-text4' => 'Os caminhos de inclusão atuais são:',
	'farmer-extensions-register-name' => 'Nome',
	'farmer-extensions-register-includefile' => 'Arquivo de Inclusão',
	'farmer-error-exists' => 'Não é possível criar wiki. Este já existe: $1',
	'farmer-error-noextwrite' => 'Não foi possível escrever o arquivo de extensão:',
	'farmer-log-name' => 'Registro da "farm" de wikis',
	'farmer-log-header' => 'Esse é um registro das mudanças feitas à "farm" de wikis',
	'farmer-log-create' => 'criou o wiki "$2"',
	'farmer-log-delete' => 'eliminou o wiki "$2"',
);

/** Tarifit (Tarifit)
 * @author Jose77
 */
$messages['rif'] = array(
	'farmer-createwiki-form-help' => 'AƐawn',
	'farmer-delete-form-submit' => 'Sfaḍ',
	'farmer-mainpage' => 'Tasbtirt Tamzwarut',
);

/** Romanian (Română)
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'farmercreatenextstep' => 'Pasul următor',
	'farmer-about' => 'Despre',
	'farmer-list-wiki' => 'Listă de wiki',
	'farmer-createwiki' => 'Creează wiki',
	'farmer-createwiki-text' => '[[$1|Creează]] wiki nou acum!',
	'farmer-administration-extension' => 'Administrează extensiile',
	'farmer-administration-extension-text' => '[[$1|Administrează]] extensiile instalate.',
	'farmer-administration-delete' => 'Şterge wiki',
	'farmer-wikicreated' => 'Wiki creat',
	'farmer-wikiexists' => 'Wiki există',
	'farmer-confirmsetting-name' => 'Nume',
	'farmer-confirmsetting-title' => 'Titlu',
	'farmer-confirmsetting-description' => 'Descriere',
	'farmer-description' => 'Descriere',
	'farmer-button-confirm' => 'Confirmă',
	'farmer-createwiki-form-title' => 'Creează wiki',
	'farmer-createwiki-form-help' => 'Ajutor',
	'farmer-createwiki-user' => 'Nume de utilizator',
	'farmer-createwiki-name' => 'Nume wiki',
	'farmer-createwiki-title' => 'Titlu wiki',
	'farmer-createwiki-description' => 'Descriere',
	'farmer-permissiondenied' => 'Permisiune refuzată',
	'farmer-delete-title' => 'Şterge wiki',
	'farmer-delete-form-submit' => 'Şterge',
	'farmer-listofwikis' => 'Listă de wiki',
	'farmer-mainpage' => 'Pagina principală',
	'farmer-basic-title' => 'Parametri de bază',
	'farmer-basic-title1' => 'Titlu',
	'farmer-basic-description' => 'Descriere',
	'farmer-basic-permission' => 'Permisiuni',
	'farmer-basic-permission-visitor' => 'Permisiuni pentru fiecare utilizator',
	'farmer-basic-permission-visitor-text' => 'Următoarele permisiuni vor fi aplicate fiecărui utilizator care vizitează acest wiki',
	'farmer-basic-permission-view' => 'Vizualizează toate paginile',
	'farmer-basic-permission-edit' => 'Modifică toate paginile',
	'farmer-basic-permission-createpage' => 'Creează pagini noi',
	'farmer-basic-permission-createtalk' => 'Creează pagini de discuţie',
	'farmer-basic-permission-move' => 'Mută pagini',
	'farmer-basic-permission-upload' => 'Încarcă fişiere',
	'farmer-basic-permission-reupload' => 'Reîncarcă fişiere (suprascrie fişierele existente)',
	'farmer-basic-permission-minoredit' => 'Permite modificări minore',
	'farmer-yes' => 'Da',
	'farmer-no' => 'Nu',
	'farmer-basic-permission-user' => 'Permisiuni pentru utilizatori autentificaţi',
	'farmer-basic-permission-user-text' => 'Următoarele permisiuni vor fi aplicate fiecărei persoane care se autentifică în acest wiki',
	'farmer-extensions' => 'Extensii active',
	'farmer-extensions-button' => 'Setează exteniile active',
	'farmer-extensions-invalid' => 'Extensie incorectă',
	'farmer-extensions-available' => 'Extensii disponibile',
	'farmer-extensions-noavailable' => 'Nici o extensie înregistrată',
	'farmer-extensions-register' => 'Înregistrează extensie',
	'farmer-extensions-register-name' => 'Nume',
	'farmer-extensions-register-includefile' => 'Include fişier',
);

/** Tarandíne (Tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'farmercreatesitename' => "Nome d'u site",
	'farmer-list-wiki' => 'Elenghe de le Uicchi',
	'farmer-notavailable' => 'Non disponibbile',
	'farmer-wikicreated' => 'Uicchi ccrejate',
	'farmer-confirmsetting-name' => 'Nome',
	'farmer-confirmsetting-title' => 'Titele',
	'farmer-confirmsetting-description' => 'Descrizione',
	'farmer-description' => 'Descrizione',
	'farmer-createwiki-form-help' => 'Ajiute',
	'farmer-createwiki-description' => 'Descrizione',
	'farmer-createwiki-reason' => 'Mutive',
	'farmer-delete-form-submit' => 'Scangille',
	'farmer-basic-title1' => 'Titele',
	'farmer-basic-description' => 'Descrizione',
);

/** Russian (Русский)
 * @author Ferrer
 * @author Innv
 * @author Kaganer
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'farmer' => 'Фермер',
	'farmer-desc' => 'Управление фермой MediaWiki',
	'farmercantcreatewikis' => 'Вы не можете создать вики, так как не имеете соответствующих прав.',
	'farmercreatesitename' => 'Имя сайта',
	'farmercreatenextstep' => 'Следующий шаг',
	'farmernewwikimainpage' => '== Добро пожаловать в свой вики-проект ==
Если вы читаете это сообщение, значит ваш новый вики-проект успешно и правильно установлен.
Теперь можно заняться [[Special:Farmer|дальнейшей настройкой]].',
	'farmer-about' => 'О расширении',
	'farmer-about-text' => 'Расширение «Фермер» (MediaWiki Farmer) позволяет вам управлять фермой (группой серверов) вики.',
	'farmer-list-wiki' => 'Список вики',
	'farmer-list-wiki-text' => '[[$1|Список]] всех вики на сайте {{SITENAME}}',
	'farmer-createwiki' => 'Создать вики',
	'farmer-createwiki-text' => '[[$1|Создать]] новую вики!',
	'farmer-administration' => 'Администрирование фермы',
	'farmer-administration-extension' => 'Управление расширениями',
	'farmer-administration-extension-text' => '[[$1|Управление]] установленными расширениями.',
	'farmer-admimistration-listupdate' => 'Обновление списка ферм',
	'farmer-admimistration-listupdate-text' => '[[$1|Обновление]] списка вики на сайте {{SITENAME}}',
	'farmer-administration-delete' => 'Удаление вики',
	'farmer-administration-delete-text' => '[[$1|Удалить]] вики с фермы',
	'farmer-administer-thiswiki' => 'Администрировать эту вики',
	'farmer-administer-thiswiki-text' => '[[$1|Административные]] изменения в этой вики',
	'farmer-notavailable' => 'недоступна',
	'farmer-notavailable-text' => 'Эта возможность доступна только на главной вики',
	'farmer-wikicreated' => 'Вики создана',
	'farmer-wikicreated-text' => 'Ваша вики была создана. Она доступна по $1',
	'farmer-default' => 'По умолчанию, никто кроме вас на этой вики не имеет прав. Вы можете поменять права участников с помощью $1',
	'farmer-wikiexists' => 'Вики существует',
	'farmer-wikiexists-text' => "Вики '''$1''', которую вы попытались создать, уже существует. Пожалуйста, вернитесь и попробуйте другое имя.",
	'farmer-confirmsetting' => 'Подтвердить настройки вики',
	'farmer-confirmsetting-name' => 'Имя',
	'farmer-confirmsetting-title' => 'Заголовок',
	'farmer-confirmsetting-description' => 'Описание',
	'farmer-confirmsetting-reason' => 'Причина',
	'farmer-description' => 'Описание',
	'farmer-confirmsetting-text' => "Ваша вики '''$1''' будет доступна по $3.
Пространство имён проекта будет '''$2'''.
Ссылки на это пространство имён будут вида '''<nowiki>[[$2:Название страницы]]</nowiki>'''.
Если это то, чего вы хотите, нажмите кнопку «подтвердить» ниже.",
	'farmer-button-confirm' => 'Подтвердить',
	'farmer-button-submit' => 'Отправить',
	'farmer-createwiki-form-title' => 'Создание вики',
	'farmer-createwiki-form-text1' => 'Используйте данную форму, чтобы создать новую вики.',
	'farmer-createwiki-form-help' => 'Справка',
	'farmer-createwiki-form-text2' => "; Имя вики: Это название вашей вики. Может содержать только латинские буквы и цифры. Имя вики будет использоваться как часть URL-адреса. Например, если вы введёте '''title''', то ваша вики будет доступна по  <nowiki>http://</nowiki>'''title'''.mydomain.",
	'farmer-createwiki-form-text3' => '; Заголовок вики: Заголовок вики будет использовать в названии каждой страницы вашей вики, кроме того, такое значение будут иметь пространство имён проекта и интервики-приставка.',
	'farmer-createwiki-form-text4' => '; Описание: Описание вики — это текстовое описание, которое будет показываться в списке вики.',
	'farmer-createwiki-user' => 'Умя участника',
	'farmer-createwiki-name' => 'Имя вики',
	'farmer-createwiki-title' => 'Заголовок вики',
	'farmer-createwiki-description' => 'Описание',
	'farmer-createwiki-reason' => 'Причина',
	'farmer-updatedlist' => 'Обновлённый список',
	'farmer-notaccessible' => 'не доступна',
	'farmer-notaccessible-test' => 'Эта функция доступна только на родительской вике фермы',
	'farmer-permissiondenied' => 'В разрешении отказано',
	'farmer-permissiondenied-text' => 'У вас нет разрешения удалять вики с фермы',
	'farmer-permissiondenied-text1' => 'У вас нет разрешения на доступ к этой странице',
	'farmer-deleting' => 'Вики «$1» была удалена',
	'farmer-delete-confirm-wiki' => "Вики для удаления: '''$1'''.",
	'farmer-delete-reason' => 'Причина удаления:',
	'farmer-delete-title' => 'Удаление вики',
	'farmer-delete-text' => 'Пожалуйста, выберите из списка вики, которую вы хотите удалить',
	'farmer-delete-form' => 'Выбор вики',
	'farmer-delete-form-submit' => 'Удалить',
	'farmer-listofwikis' => 'Список вики',
	'farmer-mainpage' => 'Главная страница',
	'farmer-basic-title' => 'Основные параметры',
	'farmer-basic-title1' => 'Заголовок',
	'farmer-basic-title1-text' => 'Ваша вики не имеет заголовка. Установите его СЕЙЧАС',
	'farmer-basic-description' => 'Описание',
	'farmer-basic-description-text' => 'Ниже можно дать описание вашей вики',
	'farmer-basic-permission' => 'Права',
	'farmer-basic-permission-text' => 'Используя данную форму, можно управлять правами участников этой вики',
	'farmer-basic-permission-visitor' => 'Права любого посетителя',
	'farmer-basic-permission-visitor-text' => 'Следующими правами будет обладать любой посетитель этой вики',
	'farmer-yes' => 'Да',
	'farmer-no' => 'Нет',
	'farmer-basic-permission-user' => 'Права зарегистрированных участников',
	'farmer-basic-permission-user-text' => 'Следующими правами обладает каждый зарегистрированный участник этой вики',
	'farmer-setpermission' => 'Установить права',
	'farmer-defaultskin' => 'Тема оформления по умолчанию',
	'farmer-defaultskin-button' => 'Установить тему оформления по умолчанию',
	'farmer-extensions' => 'Действующие расширения',
	'farmer-extensions-button' => 'Установить действующие расширения',
	'farmer-extensions-extension-denied' => 'У вас нет прав использовать эту функцию. Вы должны быть членом группы администраторов фермы (farmeradmin)',
	'farmer-extensions-invalid' => 'Ошибочное расширение',
	'farmer-extensions-invalid-text' => 'Вы не можете добавить расширение, так как выбранный для добавления файл не существует',
	'farmer-extensions-available' => 'Доступные расширения',
	'farmer-extensions-noavailable' => 'Расширений не зарегистрировано',
	'farmer-extensions-register' => 'Зарегистрировать расширение',
	'farmer-extensions-register-text1' => 'Эту форму можно использовать для регистрации нового расширения на ферме. После того, как расширение зарегистрировано, все вики смогут его использовать.',
	'farmer-extensions-register-text2' => "Параметр ''Include-файле'' должен содержать имя PHP-файла, в том виде, как оно должно быть указано в LocalSettings.php.",
	'farmer-extensions-register-text3' => "Если имя файла содержит '''\$root''', то эта переменная будет заменена на корневую директорию MediaWiki.",
	'farmer-extensions-register-text4' => 'Текущие пути include:',
	'farmer-extensions-register-name' => 'Имя',
	'farmer-extensions-register-includefile' => 'Include-файл',
	'farmer-error-exists' => 'Невозможно создать вики. Она уже существует: $1',
	'farmer-error-noextwrite' => 'Невозможно выписать файл расширения:',
	'farmer-log-name' => 'Журнал вики-фермы',
	'farmer-log-header' => 'Это журнал изменений, сделанных на вики-ферме.',
	'farmer-log-create' => 'создана вики «$2»',
	'farmer-log-delete' => 'удалена вики «$2»',
	'right-farmeradmin' => 'управление вики-фермой',
	'right-createwiki' => 'создание вики на вики-ферме',
);

/** Sassaresu (Sassaresu)
 * @author Felis
 */
$messages['sdc'] = array(
	'farmer-basic-permission-upload' => 'Carrigga file mùrthimediari',
);

/** Serbo-Croatian (Srpskohrvatski / Српскохрватски)
 * @author OC Ripper
 */
$messages['sh'] = array(
	'farmer-button-submit' => 'Unesi',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'farmer' => 'Farmár',
	'farmer-desc' => 'Správa farmy MediaWiki',
	'farmercantcreatewikis' => 'Nemôžete vytvárať wiki, pretože nemáte oprávnenie createwikis',
	'farmercreatesitename' => 'Názov lokality',
	'farmercreatenextstep' => 'Ďalší krok',
	'farmernewwikimainpage' => '== Vitajte vo svojej wiki ==
Ak čítate tento text, vaša nová wiki bola správne nainštalovaná.
Svoju wiki môžete [[Special:Farmer|prispôsobiť]].',
	'farmer-about' => 'O stránke',
	'farmer-about-text' => 'MediaWiki Farmár vám umožňuje spravovať farmu wiki systému MediaWiki.',
	'farmer-list-wiki' => 'Zoznam wiki',
	'farmer-list-wiki-text' => '[[$1|Zoznam]] všetkých wiki na {{GRAMMAR:lokál|{{SITENAME}}}}',
	'farmer-createwiki' => 'Vytvoriť wiki',
	'farmer-createwiki-text' => '[[$1|Vytvorte]] teraz novú wiki!',
	'farmer-administration' => 'Správa farmy',
	'farmer-administration-extension' => 'Spravovať rozšírenia',
	'farmer-administration-extension-text' => '[[$1|Spravovať]] nainštalované rozšírenia.',
	'farmer-admimistration-listupdate' => 'Aktualizácia zoznamu fariem',
	'farmer-admimistration-listupdate-text' => '[[$1|Aktualizovať]] zoznam wiki na {{GRAMMAR:lokál|{{SITENAME}}}}',
	'farmer-administration-delete' => 'Zmazať wiki',
	'farmer-administration-delete-text' => '[[$1|Zmazať]] wiki z farmy',
	'farmer-administer-thiswiki' => 'Spravovať túto wiki',
	'farmer-administer-thiswiki-text' => '[[$1|Spravovať]] zmeny tejto wiki',
	'farmer-notavailable' => 'Nedostupné',
	'farmer-notavailable-text' => 'Táto vlastnosť je dostupná iba na hlavnej wiki',
	'farmer-wikicreated' => 'Wiki bola vytvorená',
	'farmer-wikicreated-text' => 'Vaša wiki bola vytvorená. Je prístupná na $1',
	'farmer-default' => 'Štandardne nemá nikto privilégiá na tejto wiki okrem vás. Privilégiá používateľov môžete zmeniť prostredníctvom $1',
	'farmer-wikiexists' => 'Wiki existuje',
	'farmer-wikiexists-text' => "Wiki, ktorú ste sa pokúsili vytvoriť, '''$1''', už existuje. Prosím, choďte späť a skúste iný názov.",
	'farmer-confirmsetting' => 'Potvrdiť nastavenia wiki',
	'farmer-confirmsetting-name' => 'Názov',
	'farmer-confirmsetting-title' => 'Nadpis',
	'farmer-confirmsetting-description' => 'Popis',
	'farmer-confirmsetting-reason' => 'Dôvod',
	'farmer-description' => 'Popis',
	'farmer-confirmsetting-text' => "Vaša wiki, '''$1''', bude prístupná na $3.
Menný priestor projekt bude '''$2'''.
Odkazy na tento menný priestor budú v tvare '''<nowiki>[[$2:Názov stránky]]</nowiki>'''.
Ak je toto čo chcete, stlačte tlačidlo '''Potvrdiť''' dolu.",
	'farmer-button-confirm' => 'Potvrdiť',
	'farmer-button-submit' => 'Odoslať',
	'farmer-createwiki-form-title' => 'Vytvoriť wiki',
	'farmer-createwiki-form-text1' => 'Na vytvorenie novej wiki použite dolu uvedený formulár.',
	'farmer-createwiki-form-help' => 'Pomoc',
	'farmer-createwiki-form-text2' => "; Názov wiki: Názov vašej wiki. Obsahuje iba písmená a číslice.  Názov wiki sa použije ako súčasť URL, ktorý identifikuje vašu wiki. Napríklad ak zadáte '''názov''', k vašej wiki sa bude pristupovať pomocou <nowiki>http://</nowiki>'''názov'''.mojadoména.",
	'farmer-createwiki-form-text3' => '; Titul wiki: Titul vašej wiki. Použije sa v titule každej stránky vašej wiki. Bude tiež menným priestorom projektu a predponou interwiki odkazov.',
	'farmer-createwiki-form-text4' => '; Popis: Popis vašej wiki. Toto je textový popis wiki. Zobrazí sa v zozname wiki lokalít.',
	'farmer-createwiki-user' => 'Používateľské meno',
	'farmer-createwiki-name' => 'Názov wiki',
	'farmer-createwiki-title' => 'Titul wiki',
	'farmer-createwiki-description' => 'Popis',
	'farmer-createwiki-reason' => 'Dôvod',
	'farmer-updatedlist' => 'Aktualizovaný zoznam',
	'farmer-notaccessible' => 'Neprístupná',
	'farmer-notaccessible-test' => 'Táto možnosť je dostupná iba na rodičovskej wiki farmy',
	'farmer-permissiondenied' => 'Nedostatočné oprávnenie',
	'farmer-permissiondenied-text' => 'Nemáte oprávnenie zmazať wiki z farmy',
	'farmer-permissiondenied-text1' => 'Nemáte oprávnenie na prístup k tejto stránke',
	'farmer-deleting' => 'Wiki „$1“ bola zmazaná',
	'farmer-delete-confirm' => 'Potvrdzujem, že chcem zmazať túto wiki',
	'farmer-delete-confirm-wiki' => "Zmazať wiki: '''$1'''.",
	'farmer-delete-reason' => 'Dôvod zmazania:',
	'farmer-delete-title' => 'Zmazať wiki',
	'farmer-delete-text' => 'Prosím, zvoľte wiki, ktorú chcete zmazať, zo zoznamu dolu',
	'farmer-delete-form' => 'Vyberte wiki',
	'farmer-delete-form-submit' => 'Zmazať',
	'farmer-listofwikis' => 'Zoznam wiki',
	'farmer-mainpage' => 'Hlavná stránka',
	'farmer-basic-title' => 'Základné parametre',
	'farmer-basic-title1' => 'Titulok',
	'farmer-basic-title1-text' => 'Vaša wiki nemá titulok. Nastavte ho TERAZ',
	'farmer-basic-description' => 'Popis',
	'farmer-basic-description-text' => 'Dolu nastavte titulok vašej wiki',
	'farmer-basic-permission' => 'Oprávnenia',
	'farmer-basic-permission-text' => 'Pomocou tohto formulára je možné meniť oprávnenia používateľov tejto wiki.',
	'farmer-basic-permission-visitor' => 'Oprávnenia každého návštevníka',
	'farmer-basic-permission-visitor-text' => 'Nasledujúce oprávnenia sa použijú na každú osobu, ktorá navštívi túto wiki',
	'farmer-yes' => 'Áno',
	'farmer-no' => 'Nie',
	'farmer-basic-permission-user' => 'Oprávnenia prihlásených používateľov',
	'farmer-basic-permission-user-text' => 'Nasledujúce oprávnenia sa použijú na každú osobu, ktorá je na tejto wiki prihlásená',
	'farmer-setpermission' => 'Nastaviť oprávnenia',
	'farmer-defaultskin' => 'Štandardný vzhľad',
	'farmer-defaultskin-button' => 'Nastaviť štandardný vzhľad',
	'farmer-extensions' => 'Aktívne rozšírenia',
	'farmer-extensions-button' => 'Nastaviť aktívne rozšírenia',
	'farmer-extensions-extension-denied' => 'Nemáte oprávnenie používať túto vlastnosť. Musíte byť členom skupiny farmeradmin.',
	'farmer-extensions-invalid' => 'Neplatné rozšírenie',
	'farmer-extensions-invalid-text' => 'Nemohli sme pridať rozšírenie, pretože súbor zvolený na vloženie nebol nájdený',
	'farmer-extensions-available' => 'Dostupné rozšírenia',
	'farmer-extensions-noavailable' => 'Žiadne rozšírenia neboli zaregistrované',
	'farmer-extensions-register' => 'Registrovať rozšírenie',
	'farmer-extensions-register-text1' => 'Použite tento formulár na registráciu nového rozšírenia na farme. Keď raz rozšírenie zaregistrujete, všetky wiki na farme ho budú môcť používať.',
	'farmer-extensions-register-text2' => "Ako parameter ''Include súbor'' zadajte názov PHP súboru ako by ste napísali do LocalSettings.php.",
	'farmer-extensions-register-text3' => "Ak názov súboru obsahuje '''\$root''', táto premenná bude nahradená koreňovým adresárom MediaWiki.",
	'farmer-extensions-register-text4' => 'Aktuálne cesty include súborov sú:',
	'farmer-extensions-register-name' => 'Názov',
	'farmer-extensions-register-includefile' => 'Include súbor',
	'farmer-error-exists' => 'Nie je možné vytvoriť wiki. Už existuje: $1',
	'farmer-error-noextwrite' => 'Nebolo možné zapísať súbor rozšírenia:',
	'farmer-log-name' => 'Záznam wiki farmy',
	'farmer-log-header' => 'Toto je záznam zmien vykonaných vo farme wiki.',
	'farmer-log-create' => 'vytvoril wiki „$2“',
	'farmer-log-delete' => 'zmazal wiki „$2“',
	'right-farmeradmin' => 'Spravovať farmu wiki',
	'right-createwiki' => 'Vytvára wiki vo wiki farme',
);

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Sasa Stefanovic
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'farmer' => 'Фармер',
	'farmer-desc' => 'Управљајте МедијаВики фармом',
	'farmercantcreatewikis' => 'Не можете да направите Вики зато што немате createwikis права приступа',
	'farmercreatesitename' => 'Име сајта',
	'farmercreatenextstep' => 'Следећи корак',
	'farmernewwikimainpage' => '== Добро дошли на Ваш Вики ==
Ако ово читате, Ваш Вики је исправно инсталиран.
Можете да [[Special:Farmer|подесите Ваш вики]].',
	'farmer-about' => 'О...',
	'farmer-about-text' => 'МедијаВики Фармер Вам омогућава да управљате фармом МедијаВики Викија.',
	'farmer-list-wiki' => 'Списак Викија',
	'farmer-list-wiki-text' => '[[$1|Списак]] свих Викија на {{SITENAME}}',
	'farmer-createwiki' => 'Направите Вики',
	'farmer-createwiki-text' => '[[$1|Направите]] нови Вики сада!',
	'farmer-administration' => 'Администрација фарме',
	'farmer-administration-extension' => 'Подешавајте екстензије',
	'farmer-administration-extension-text' => '[[$1|Подешавајте]] инсталиране екстензије.',
	'farmer-admimistration-listupdate' => 'Ажурирање списка фарме',
	'farmer-admimistration-listupdate-text' => '[[$1|Ажурирајте]] списак Викија на {{SITENAME}}',
	'farmer-administration-delete' => 'Обришите Вики',
	'farmer-administration-delete-text' => '[[$1|Обришите]] Вики из фарме',
	'farmer-administer-thiswiki' => 'Администрирајте овај Вики',
	'farmer-administer-thiswiki-text' => '[[$1|Администрирајте]] промене над овим Викијем',
	'farmer-notavailable' => 'Недоступно',
	'farmer-notavailable-text' => 'Ова погодност је доступна само на главном Викију',
	'farmer-wikicreated' => 'Вики је направљен',
	'farmer-wikicreated-text' => 'Ваш Вики је направљен.
Доступан је на $1',
	'farmer-default' => 'По подразумеваним подешавањим, нико осим вас нема права приступа на овом Викију.
Можете да промените права приступа преко $1',
	'farmer-wikiexists' => 'Вики постоји',
	'farmer-wikiexists-text' => "Вики кога покушавате да направите, '''$1''', већ постоји.
Молимо Вас да се вратите и покушате са другим именом.",
	'farmer-confirmsetting' => 'Потврди подешавања Викија',
	'farmer-confirmsetting-name' => 'Име',
	'farmer-confirmsetting-title' => 'Наслов',
	'farmer-confirmsetting-description' => 'Опис',
	'farmer-confirmsetting-reason' => 'Разлог',
	'farmer-description' => 'Опис',
	'farmer-button-confirm' => 'Потрвди',
	'farmer-button-submit' => 'Прихвати',
	'farmer-createwiki-form-title' => 'Направите Вики',
	'farmer-createwiki-form-text1' => 'Користите форму испод да бисте направили нови Вики',
	'farmer-createwiki-form-help' => 'Помоћ',
	'farmer-createwiki-form-text4' => '; Опис: Опис Викија.
Овде треба да буде опис Викија.
Ово ће бити приказано у списку Викија.',
	'farmer-createwiki-user' => 'Корисничко име',
	'farmer-createwiki-name' => 'Вики име',
	'farmer-createwiki-title' => 'Вики наслов',
	'farmer-createwiki-description' => 'Опис',
	'farmer-createwiki-reason' => 'Разлог',
	'farmer-updatedlist' => 'Осевжен списак',
	'farmer-notaccessible' => 'Недоступно',
	'farmer-notaccessible-test' => 'Ова погодност је доступна само на главном Викију фарме',
	'farmer-permissiondenied' => 'Права приступа одбијена',
	'farmer-permissiondenied-text' => 'Немате потребна права да бисте из фарме избрисали овај Вики',
	'farmer-permissiondenied-text1' => 'Немате права приступа овој страни',
	'farmer-deleting' => 'Брисање $1',
	'farmer-delete-confirm' => 'Потврђујем да желим да обришем овај Вики',
	'farmer-delete-confirm-wiki' => "Вики који ће бити обрисан: '''$1'''.",
	'farmer-delete-reason' => 'Разлог брисања:',
	'farmer-delete-title' => 'Брисање Викија',
	'farmer-delete-text' => 'Молимо вас да са списка испод изаберете Вики кога желите да обришете',
	'farmer-delete-form' => 'Изабери Вики',
	'farmer-delete-form-submit' => 'Обриши',
	'farmer-listofwikis' => 'Списак Викија',
	'farmer-mainpage' => 'Главна страна',
	'farmer-basic-title' => 'Основни параметри',
	'farmer-basic-title1' => 'Наслов',
	'farmer-basic-title1-text' => 'Ваш Вики нема наслов. Поставите један <b>сада</b>',
	'farmer-basic-description' => 'Опис',
	'farmer-basic-description-text' => 'Поставља опис Вашег Викија испод',
	'farmer-basic-permission' => 'Права приступа',
	'farmer-basic-permission-text' => 'Користећи форму испод, могуће је изменити права приступа корисника овог Викија',
	'farmer-basic-permission-visitor' => 'Права приступа за сваког посетиоца',
	'farmer-basic-permission-visitor-text' => 'Следећа права приступа ће имати свака особа која посети ову Вики',
	'farmer-basic-permission-view' => 'Види све стране',
	'farmer-basic-permission-edit' => 'Измени све стране',
	'farmer-basic-permission-createpage' => 'Направи нове стране',
	'farmer-basic-permission-createtalk' => 'Направи стране за разговор',
	'farmer-basic-permission-move' => 'Премести стране',
	'farmer-basic-permission-upload' => 'Пошаљи фајлове',
	'farmer-basic-permission-reupload' => 'Пошањи фајлове поново (препиши садржај старих)',
	'farmer-basic-permission-minoredit' => 'Омогући мале измене',
	'farmer-yes' => 'Да',
	'farmer-no' => 'Не',
	'farmer-basic-permission-user' => 'Права приступа за улоговане кориснике',
	'farmer-basic-permission-user-text' => 'Следећа права приступа ће имати сваки улоговани корисник на овај Вики',
	'farmer-setpermission' => 'Подеси права приступа',
	'farmer-defaultskin' => 'Подразумевана кожа',
	'farmer-defaultskin-button' => 'Подеси подразумевану кожу',
	'farmer-extensions' => 'Активне екстензије',
	'farmer-extensions-button' => 'Подеси активне екстензије',
	'farmer-extensions-extension-denied' => 'Немате дозволу потребну да бисте користили ову погодност.
Морате бити чланк farmeradmin групе.',
	'farmer-extensions-invalid' => 'Неисправна екстензија',
	'farmer-extensions-invalid-text' => 'Нисмо могли да додамо екстензију зато што фајл означен за укључивање није пронађен',
	'farmer-extensions-available' => 'Расположиве екстензије',
	'farmer-extensions-noavailable' => 'Ни једна екстензија није регистрована',
	'farmer-extensions-register' => 'Региструј екстензију',
	'farmer-extensions-register-text1' => 'Користите форму испод да бисте регистровали нову екстензију са фармом.
Кад екстензију једанпут региструјете, сви Викији ће моћи да је користе.',
	'farmer-extensions-register-text2' => "За параметар ''Укључивања фајла'', додајте име, као што бисте то урадили у LocalSettings.php.",
	'farmer-extensions-register-text3' => "Ако име фајл садржи '''\$root''', та променљива ће бити замењена са главним директоријумом МедијаВикија",
	'farmer-extensions-register-text4' => 'Тренутне путање за укључивање су:',
	'farmer-extensions-register-name' => 'Име',
	'farmer-extensions-register-includefile' => 'Укључи фајл',
);

/** Swati (SiSwati)
 * @author Jatrobat
 */
$messages['ss'] = array(
	'farmer-mainpage' => 'Likhasi Lelikhulu',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'farmer-createwiki-form-help' => 'Hälpe',
);

/** Sundanese (Basa Sunda)
 * @author Irwangatot
 */
$messages['su'] = array(
	'farmer-about' => 'Ngeunaan',
	'farmer-createwiki' => 'Jieun hiji Wiki',
	'farmer-confirmsetting-name' => 'Ngaran',
	'farmer-confirmsetting-title' => 'Judul',
	'farmer-createwiki-user' => 'Landihan',
	'farmer-basic-title1' => 'Judul',
	'farmer-basic-description' => 'Pedaran',
);

/** Swedish (Svenska)
 * @author Jon Harald Søby
 * @author Lejonel
 * @author M.M.S.
 */
$messages['sv'] = array(
	'farmer' => 'Farmer',
	'farmer-desc' => 'Sköt en MediaWiki farm',
	'farmercantcreatewikis' => 'Du är oförmögen till att skapa wikier för att du inte har skapa wikier privilegierna',
	'farmercreatesitename' => 'Sajtnamn',
	'farmercreatenextstep' => 'Nästa steg',
	'farmernewwikimainpage' => '== Välkommen till din wiki ==
Om du läser det här, har din nya wiki blivit korrekt installerad. Du kan [[Special:Farmer|skräddarsy din wiki]].',
	'farmer-about' => 'Om',
	'farmer-about-text' => 'MediaWiki Farmer tillåter dig att sköta en farm av MediaWiki wikier.',
	'farmer-list-wiki' => 'Lista över wikier',
	'farmer-list-wiki-text' => '[[$1|Lista]] alla wikier på {{SITENAME}}',
	'farmer-createwiki' => 'Skapa en wiki',
	'farmer-createwiki-text' => '[[$1|Skapa]] en ny wiki nu!',
	'farmer-administration' => 'Farm Administration',
	'farmer-administration-extension' => 'Sköt tilläggsprogram',
	'farmer-administration-extension-text' => '[[$1|Sköt]] installerade tilläggsprogram.',
	'farmer-admimistration-listupdate' => 'Uppdatera farm lista',
	'farmer-admimistration-listupdate-text' => '[[$1|Uppdatera]] lista över wikier på {{SITENAME}}',
	'farmer-administration-delete' => 'Ta bort en wiki',
	'farmer-administration-delete-text' => '[[$1|Radera]] en wiki från farmen',
	'farmer-administer-thiswiki' => 'Administratera denna wiki',
	'farmer-administer-thiswiki-text' => '[[$1|Administerar]] ändringar till denna wiki',
	'farmer-notavailable' => 'Inte tillgänglig',
	'farmer-notavailable-text' => 'Denna egenskap är endast tillgänglig på huvudwikin',
	'farmer-wikicreated' => 'Wiki skapad',
	'farmer-wikicreated-text' => 'Din wiki har skapats.  Den är tillgänglig på $1',
	'farmer-default' => 'Som utgångspunkt är det ingen annan en dig som har rättigheter på denna wiki. Du kan ändra användarrättigheter via $1',
	'farmer-wikiexists' => 'Wiki existerar',
	'farmer-wikiexists-text' => "Wikin du vill upprätta, '''$1''', finns redan. Gå tillbaka och pröva med ett annat namn.",
	'farmer-confirmsetting' => 'Bekräfta wiki-inställningar',
	'farmer-confirmsetting-name' => 'Namn',
	'farmer-confirmsetting-title' => 'Titel',
	'farmer-confirmsetting-description' => 'Beskrivnin',
	'farmer-description' => 'Beskrivning',
	'farmer-confirmsetting-text' => "Din wiki, '''$1''', vill bli tillgänglig via $3.
Projektnamnrymden ska vara '''$2'''.
Länkar till denna namnrymd ska vara på sättet '''<nowiki>[[$2:Sidenavn]]</nowiki>'''.
Om detta är det du vill, tryck på knappen ''{{int:Farmer-button-confirm}}'' nedan.",
	'farmer-button-confirm' => 'Bekräfta',
	'farmer-button-submit' => 'Lagra',
	'farmer-createwiki-form-title' => 'Skapa en wiki',
	'farmer-createwiki-form-text1' => 'Använd formuläret nedan för att skapa en ny wiki.',
	'farmer-createwiki-form-help' => 'Hjälp',
	'farmer-createwiki-form-text2' => "; Wikins namn: Namnet på wikin.
Innehåller endast bokstäver och siffror. Wikins namn kommer användas i URL-en för att identifiera wikin. Om du för exempel skriver in ''titel'', kommer din wiki vara tillgänglig via <nowiki>http://</nowiki>''tittel''.mydomain.",
	'farmer-createwiki-form-text3' => '; Wikins titel: Titeln på wikin.
Kommer bli använd i titeln på varje sida på din wiki. Kommer också användas som namn på projektnamnrymden och som interwikiprefix.',
	'farmer-createwiki-form-text4' => '; Beskrivning: Beskrivning av wikin. Den kommer att visas in wiki listan.',
	'farmer-createwiki-user' => 'Användarnamn',
	'farmer-createwiki-name' => 'Wikins namn',
	'farmer-createwiki-title' => 'Wikins titel',
	'farmer-createwiki-description' => 'Beskrivning',
	'farmer-updatedlist' => 'Uppdaterad lista',
	'farmer-notaccessible' => 'Otillgänglig',
	'farmer-notaccessible-test' => 'Detta är endast tillgängligt på farmens upphovswiki',
	'farmer-permissiondenied' => 'Tillgång nekad',
	'farmer-permissiondenied-text' => 'Du har inte tillåtelse att ta bort wikier',
	'farmer-permissiondenied-text1' => 'Du har inte tillåtelse att gå in på denna sida',
	'farmer-deleting' => 'Tar bort $1',
	'farmer-delete-title' => 'Ta bort Wiki',
	'farmer-delete-text' => 'Var god välj vilken wiki du vill ta bort från listan nedan',
	'farmer-delete-form' => 'Välj en wiki',
	'farmer-delete-form-submit' => 'Radera',
	'farmer-listofwikis' => 'Lista över wikier',
	'farmer-mainpage' => 'Huvudsida',
	'farmer-basic-title' => 'Grundparametrar',
	'farmer-basic-title1' => 'Titel',
	'farmer-basic-title1-text' => 'Din wiki har inte en titel.  Välj en NU',
	'farmer-basic-description' => 'Beskrivning',
	'farmer-basic-description-text' => 'Ange en beskrivning för din wiki nedan',
	'farmer-basic-permission' => 'Tillåtelser',
	'farmer-basic-permission-text' => 'Vid användning av formuläret nedan kan du ändra användares rättigheter på denna wiki.',
	'farmer-basic-permission-visitor' => 'Rättigheter för alla besökare',
	'farmer-basic-permission-visitor-text' => 'Följande rättigheter kommer bli givna till alla som besöker wikin',
	'farmer-yes' => 'Ja',
	'farmer-no' => 'Nej',
	'farmer-basic-permission-user' => 'Rättigheter för inloggade användare',
	'farmer-basic-permission-user-text' => 'Följande rättigheter kommer ges till alla inloggade användare',
	'farmer-setpermission' => 'Ange rättigheter',
	'farmer-defaultskin' => 'Standardutseende',
	'farmer-defaultskin-button' => 'Ange standardutseende',
	'farmer-extensions' => 'Aktiva programtillägg',
	'farmer-extensions-button' => 'Ange aktiva programtillägg',
	'farmer-extensions-extension-denied' => 'Du har inte tillåtelse att använda denna funktion.
Du måste vara medlem av användargruppen farmeradmin',
	'farmer-extensions-invalid' => 'Ogiltigt programtillägg',
	'farmer-extensions-invalid-text' => 'Vi kunde inte lägga till programtillägget för filen som valdes för inkludering inte hittades',
	'farmer-extensions-available' => 'Tillgängliga programtillägg',
	'farmer-extensions-noavailable' => 'Inga programtillägg är registrerade',
	'farmer-extensions-register' => 'Registrera programtillägg',
	'farmer-extensions-register-text1' => 'Använd formuläret nedan för och registrera ett nytt programtillägg hos farmen. När ett programtillägg är registrerat kommer alla wikier kunna använda den.',
	'farmer-extensions-register-text2' => "För ''Inkludera fil''-parametern, skriv in namnet på PHP-filen som du ville gjort det i LocalSettings.php.",
	'farmer-extensions-register-text3' => "Om filnamnet innehåller '''\$root''', kommer den variabeln ersättas med rotmappen till MediaWiki.",
	'farmer-extensions-register-text4' => 'Dom nuvarande inkluderade vägarna är:',
	'farmer-extensions-register-name' => 'Namn',
	'farmer-extensions-register-includefile' => 'Inkludera fil',
	'farmer-error-exists' => 'Kan inte skapa wikin.  Den existerar redan: $1',
	'farmer-error-noextwrite' => 'Kunde inte skriva ut programtilläggsfil:',
);

/** Silesian (Ślůnski)
 * @author Herr Kriss
 */
$messages['szl'] = array(
	'farmer-mainpage' => 'Přodńo zajta',
	'farmer-extensions-register-name' => 'Mjano',
);

/** Tamil (தமிழ்)
 * @author Trengarasu
 */
$messages['ta'] = array(
	'farmer-createwiki-user' => 'பயனர் பெயர்',
);

/** Telugu (తెలుగు)
 * @author Veeven
 * @author వైజాసత్య
 */
$messages['te'] = array(
	'farmer' => 'రైతు',
	'farmercantcreatewikis' => 'మీరు వికీలను సృష్టించలేకున్నారు ఎందుకంటే మీరు వికీలను సృష్టించే అధికారం లేదు.',
	'farmercreatesitename' => 'సైటు పేరు',
	'farmercreatenextstep' => 'తర్వాతి మెట్టు',
	'farmernewwikimainpage' => '== మీ వికీకి స్వాగతం ==
మీరిది చదువుతున్నారంటే, మీ కొత్త వికీ సరిగ్గానే స్థాపనమయ్యింది.  వికీని మీకు నచ్చినట్టు మలచుకోడానికి, [[Special:Farmer]]ని సందర్శించండి.',
	'farmer-about' => 'గురించి',
	'farmer-list-wiki' => 'వికీల యొక్క జాబితా',
	'farmer-list-wiki-text' => '{{SITENAME}}లోని అన్ని వికీల [[$1|జాబితా]]',
	'farmer-createwiki' => 'ఓ వికీని సృష్టించండి',
	'farmer-createwiki-text' => 'ఇప్పుడే ఓ కొత్త వికీని [[$1|సృష్టించండి]]!',
	'farmer-admimistration-listupdate-text' => '{{SITENAME}}లో నికీల జాబితాని [[$1|తాజాకరించండి]]',
	'farmer-administration-delete' => 'ఓ వికీని తొలగించండి',
	'farmer-administer-thiswiki' => 'ఈ వికీని నిర్వహించండి',
	'farmer-administer-thiswiki-text' => 'ఈ వికీలో జరిగిన మార్పులను [[$1|పర్యవేక్షించండి]]',
	'farmer-notavailable' => 'అందుబాటులో లేదు',
	'farmer-notavailable-text' => 'ఈ సౌలభ్యం ప్రధాన వికీలో మాత్రమే అందుబాటులో ఉంటుంది.',
	'farmer-wikicreated' => 'వికీ తయారయ్యింది',
	'farmer-wikicreated-text' => 'మీ వికీ తయారయ్యింది.  ఇది $1 వద్ద అందుబాటులో ఉంటుంది',
	'farmer-default' => 'మామూలుగా, మీకు తప్ప ఈ వికీలో ఇంకెవరికీ అనుమతులు ఉండవు. $1 ద్వారా మీరు వాడుకరి హక్కులని మార్చవచ్చు',
	'farmer-wikiexists' => 'వికీ ఉంది',
	'farmer-wikiexists-text' => "మీరు సృష్టించడానికి ప్రయత్నిస్తున్న '''$1''' అనే వికీ ఇప్పటికే ఉంది. వెనక్కి వెళ్ళి మరో పేరుతో ప్రయత్నించండి.",
	'farmer-confirmsetting' => 'వికీ అమరికలను నిర్ధారించండి',
	'farmer-confirmsetting-name' => 'పేరు',
	'farmer-confirmsetting-title' => 'శీర్షిక',
	'farmer-confirmsetting-description' => 'వివరణ',
	'farmer-confirmsetting-reason' => 'కారణం',
	'farmer-description' => 'వివరణ',
	'farmer-button-confirm' => 'నిర్ధారించు',
	'farmer-button-submit' => 'దాఖలుచెయ్యి',
	'farmer-createwiki-form-title' => 'ఓ వికీని సృష్టించండి',
	'farmer-createwiki-form-text1' => 'కొత్త వికీని సృష్టించడానికి క్రింది ఫారాన్ని ఉపయోగించండి.',
	'farmer-createwiki-form-help' => 'సహాయం',
	'farmer-createwiki-form-text3' => '; వికీ శీర్షిక: వికీ యొక్క శీర్షిక.  మీ వికీలోని ప్రతీ పేజీ యొక్క శీర్షికలోనూ కనబడుతుంది.  ఇది ప్రాజెక్టు యొక్క పేరుబరి మరియు అంతర్వికీ ఉపసర్గ కూడా.',
	'farmer-createwiki-form-text4' => '; వివరణ: వికీ యొక్క వివరణ.  ఇది వికీ గురించిన పాఠ్య వివరణ.  దీన్ని వికీల జాబితాలో చూపిస్తాం.',
	'farmer-createwiki-user' => 'వాడుకరిపేరు',
	'farmer-createwiki-name' => 'వికీ పేరు',
	'farmer-createwiki-title' => 'వికీ శీర్షిక',
	'farmer-createwiki-description' => 'వివరణ',
	'farmer-createwiki-reason' => 'కారణం',
	'farmer-updatedlist' => 'తాజాకరించిన జాబితా',
	'farmer-notaccessible' => 'అందుబాటులో లేదు',
	'farmer-permissiondenied' => 'అనుమతి నిరాకరించారు',
	'farmer-permissiondenied-text1' => 'ఈ పేజీని చూడడానికి మీకు అనుమతి లేదు',
	'farmer-deleting' => '$1ని తొలగిస్తున్నాం',
	'farmer-delete-title' => 'వికీ తొలగింపు',
	'farmer-delete-text' => 'మీరు తొలగించాలనుకుంటున్న వికీని ఈ క్రింది జాబితానుండి ఎంచుకోండి',
	'farmer-delete-form' => 'ఓ వికీని ఎంచుకోండి',
	'farmer-delete-form-submit' => 'తొలగించు',
	'farmer-listofwikis' => 'వికీల యొక్క జాబితా',
	'farmer-mainpage' => 'మొదటి పేజీ',
	'farmer-basic-title1' => 'శీర్షిక',
	'farmer-basic-title1-text' => 'మీ వికీకి శీర్షిక లేదు. ఇప్పుడే పెట్టండి.',
	'farmer-basic-description' => 'వివరణ',
	'farmer-basic-description-text' => 'మీ వికీ యొక్క వివరణని క్రింద ఇవ్వండి',
	'farmer-basic-permission' => 'అనుమతులు',
	'farmer-basic-permission-text' => 'ఈ వికీలోని వాడుకర్ల అనుమతులను ఈ క్రింది ఫారం ఉపయోగించి మార్చవచ్చు.',
	'farmer-basic-permission-visitor' => 'ప్రతీ సందర్శకునికి అనుమతులు',
	'farmer-basic-permission-visitor-text' => 'ఈ వికీని సందర్శించే ప్రతీ వ్యక్తికీ ఈ క్రింది అనుమతులు వర్తిస్తాయి',
	'farmer-basic-permission-view' => 'అన్ని పేజీలను చూడండి',
	'farmer-basic-permission-edit' => 'అన్ని పేజీలు మార్చడం',
	'farmer-basic-permission-createpage' => 'కొత్త పేజీలు సృష్టించడం',
	'farmer-basic-permission-createtalk' => 'చర్చాపేజీలు సృష్టించడం',
	'farmer-basic-permission-move' => 'పేజీలు తరలించడం',
	'farmer-basic-permission-upload' => 'ఫైళ్ళు ఎగుమతి చేయడం',
	'farmer-basic-permission-minoredit' => 'చిన్న మార్పులు అనుమతించడం',
	'farmer-yes' => 'అవును',
	'farmer-no' => 'కాదు',
	'farmer-basic-permission-user' => 'ప్రవేశించిన వాడుకరులకు అనుమతులు',
	'farmer-basic-permission-user-text' => 'ఈ వికీలో ప్రవేశించిన ప్రతీ ఒక్కరికీ ఈ క్రింది అనుమతులు ఆపాదిస్తాం',
	'farmer-extensions-available' => 'అందుబాటులో ఉన్న పొడగింతలు',
	'farmer-extensions-noavailable' => 'పొడగింతలు ఏవీ నమోదుకాలేదు',
	'farmer-extensions-register' => 'పొడగింతను నమోదుచెయ్యండి',
	'farmer-extensions-register-text3' => "పైలుపేరులో '''\$root''' అనే చరరాశి ఉంటే, దాన్ని మీడియావికీ యొక్క రూట్ డైరెక్టరీతో ప్రతిక్షేపిస్తాం.",
	'farmer-extensions-register-name' => 'పేరు',
	'farmer-error-exists' => 'వికీని సృష్టించలేము. అది ఈపాటికే ఉంది: $1',
	'farmer-error-noextwrite' => 'పొడగింత ఫైలుని వ్రాయలేకున్నాం:',
);

/** Tetum (Tetun)
 * @author MF-Warburg
 */
$messages['tet'] = array(
	'farmer-about' => 'Kona-ba',
	'farmer-confirmsetting-title' => 'Títulu',
	'farmer-createwiki-form-help' => 'Ajuda',
	'farmer-deleting' => 'Halakon $1',
	'farmer-delete-form-submit' => 'Halakon',
	'farmer-mainpage' => 'Pájina Mahuluk',
	'farmer-basic-title1' => 'Títulu',
	'farmer-yes' => 'Sin',
	'farmer-no' => 'Lae',
	'farmer-extensions-register-name' => 'Naran',
);

/** Tajik (Cyrillic) (Тоҷикӣ (Cyrillic))
 * @author Ibrahim
 */
$messages['tg-cyrl'] = array(
	'farmer' => 'Деҳқон',
	'farmer-desc' => 'Идора кардани киштзори МедиаВики',
	'farmercantcreatewikis' => 'Шумо наметавонед викиҳо эҷод кунед, чун шумо дорои имтиёзи эҷодивикиҳо нестед',
	'farmercreatesitename' => 'Номи сомона',
	'farmercreatenextstep' => 'Қадами баъдӣ',
	'farmernewwikimainpage' => '== Хуш омадед ба Викии Шумо ==
Агар шумо инро хонда истодаед, викии нави шумо дуруст насб шудааст.
Барои мӯътод кардан, лутфан аз [[Special:Farmer]] боздид кунед.',
	'farmer-about' => 'Дар бораи',
	'farmer-about-text' => 'Деҳқони МедиаВики ба шумо имкони идора кардани викиҳои МедиаВикиро медиҳад.',
	'farmer-list-wiki' => 'Феҳристи Викиҳо',
	'farmer-list-wiki-text' => 'Ҳамаи викиҳои дар {{SITENAME}} бударо [[$1|феҳрист]] кун',
	'farmer-createwiki' => 'Эҷод кардани Вики',
	'farmer-createwiki-text' => 'Ҳамакнун як викии ҷадид [[$1|эҷод]] кунед!',
	'farmer-administration' => 'Мудирияти Киштзор',
	'farmer-administration-extension' => 'Идора кардани Афзунаҳо',
	'farmer-administration-extension-text' => '[[$1|Идора кардани]] афзунаҳои насбшуда.',
	'farmer-admimistration-listupdate' => 'Барӯзшавии Феҳристи Киштзор',
	'farmer-admimistration-listupdate-text' => '[[$1|Барӯз]] кардани викиҳо дар {{SITENAME}}',
	'farmer-administration-delete' => 'Ҳазфи Вики',
	'farmer-administration-delete-text' => '[[$1|Ҳазф]] кардани вики аз киштзор',
	'farmer-administer-thiswiki' => 'Мудири кардани ин Вики',
	'farmer-administer-thiswiki-text' => '[[$1|Мудири кардани]] тағйироти ин Вики',
	'farmer-notavailable' => 'Дастрас нест',
	'farmer-notavailable-text' => 'Ин хусусият танҳо дар викии асосӣ дастрас аст',
	'farmer-wikicreated' => 'Вики эҷод шуд',
	'farmer-wikicreated-text' => 'Викии шумо эҷод шуд.
Он дар $1 дастрас аст',
	'farmer-default' => 'Аз рӯи пешфарз, ҳеҷ кас ба ғайр аз шумо ба ин вики иҷозат ндорад.
Шумо метавонед имтиёзоти корбариро тариқи $1 тағйир бидиҳед',
	'farmer-wikiexists' => 'Вики вуҷуд дорад',
	'farmer-wikiexists-text' => "Викие ки шумо кӯшиш эҷод кардан ҳасте, '''$1''', аллакай вуҷуд дорад.
Лутфан баргардед ва номи дигареро бисанҷед.",
	'farmer-confirmsetting' => 'Тасдиқи Танзимоти Вики',
	'farmer-confirmsetting-name' => 'Ном',
	'farmer-confirmsetting-title' => 'Унвон',
	'farmer-confirmsetting-description' => 'Тавсиф',
	'farmer-description' => 'Тавсифот',
	'farmer-button-confirm' => 'Таъйид',
	'farmer-button-submit' => 'Ирсол',
	'farmer-createwiki-form-title' => 'Эҷод кардани Вики',
	'farmer-createwiki-form-text1' => 'Барои эҷоди викии ҷадид аз форми зерин истифода баред.',
	'farmer-createwiki-form-help' => 'Роҳнамо',
	'farmer-createwiki-user' => 'Номи корбарӣ',
	'farmer-createwiki-name' => 'Номи Вики',
	'farmer-createwiki-title' => 'Унвони Вики',
	'farmer-createwiki-description' => 'Тавсифот',
	'farmer-updatedlist' => 'Феҳристи барӯзшуда',
	'farmer-notaccessible' => 'Дастрас нест',
	'farmer-permissiondenied' => 'Иҷоза рад шуд',
	'farmer-permissiondenied-text' => 'Шумо иҷозаи ҳазф кардани вики аз киштзорро надоред',
	'farmer-permissiondenied-text1' => 'Шумо иҷозати дастраси карданро ба ин саҳифа надоред',
	'farmer-deleting' => 'Дар ҳоли ҳазфи "$1"',
	'farmer-delete-title' => 'Ҳазф кардани Вики',
	'farmer-delete-text' => 'Лутфан викиеро, ки шумо майли ҳазф кардан доред, аз феҳристи зерин интихоб кунед',
	'farmer-delete-form' => 'Интихоб кардани вики',
	'farmer-delete-form-submit' => 'Ҳафз',
	'farmer-listofwikis' => 'Феҳристи Викиҳо',
	'farmer-mainpage' => 'Саҳифаи Аслӣ',
	'farmer-basic-title' => 'Параметерҳои асосӣ',
	'farmer-basic-title1' => 'Унвон',
	'farmer-basic-title1-text' => 'Викии шумо унвон надорад. ҲОЗИР як унвон гузоред',
	'farmer-basic-description' => 'Тавсифот',
	'farmer-basic-description-text' => 'Тавсифи викии худро дар зер зеҳоти қарор бидиҳед',
	'farmer-basic-permission' => 'Иҷозаҳо',
	'farmer-basic-permission-text' => 'Бо истифодаи форми зер, тағйир додани иҷозаҳои корбарон дар ин вики мумкин аст.',
	'farmer-basic-permission-visitor' => 'Иҷозаҳо барои Ҳар Ташрифовар',
	'farmer-basic-permission-visitor-text' => 'Иҷозаҳои зер ба ҳар шахсе, ки ба ин вики ташриф меоварад шомил хоҳад шуд',
	'farmer-basic-permission-view' => 'Нигаристани ҳамаи саҳифаҳо',
	'farmer-basic-permission-edit' => 'Вироиши ҳамаи саҳифаҳо',
	'farmer-basic-permission-createpage' => 'Эҷоди саҳифаҳои ҷадид',
	'farmer-basic-permission-createtalk' => 'Эҷоди саҳифаҳои баҳс',
	'farmer-basic-permission-move' => 'Кӯчонидани саҳифаҳо',
	'farmer-basic-permission-upload' => 'Фиристодани парвандаҳо',
	'farmer-basic-permission-reupload' => 'Дубора боргузорӣ кардани парвандаҳо (аз рӯи боргузории вуҷуддошта навиштан)',
	'farmer-basic-permission-minoredit' => 'Ба вироишоти хурд иҷоза шавад',
	'farmer-yes' => 'Бале',
	'farmer-no' => 'Не',
	'farmer-basic-permission-user' => 'Иҷозаҳо барои Корбарони Вурудшуда',
	'farmer-setpermission' => 'Гузоштани Иҷозаҳо',
	'farmer-defaultskin' => 'Пӯстаи Пешфарз',
	'farmer-defaultskin-button' => 'Гузоштани Пӯстаи Пешфарз',
	'farmer-extensions' => 'Афзунаҳои Фаъол',
	'farmer-extensions-button' => 'Гузоштани Афзунаҳои Фаъол',
	'farmer-extensions-extension-denied' => 'Барои истифодаи ин хусусият шумо дорои иҷоза нестед.
Шумо бояд аъзои гурӯҳи деҳқонмудир бошед.',
	'farmer-extensions-invalid' => 'Афзунаи Номӯътабар',
	'farmer-extensions-available' => 'Афзунаҳои Дастрас',
	'farmer-extensions-noavailable' => 'Ҳеҷ афзунаҳое сабт нашудаанд',
	'farmer-extensions-register' => 'Сабт кардани Афзуна',
	'farmer-extensions-register-text1' => 'Барои сабти афзунаи ҷадид дар киштзор аз форми зер истифода баред.
Дар ҳолати сабт шудани афзуна, ҳамаи викиҳо қобили истифода аз он хоҳанд шуд.',
	'farmer-extensions-register-name' => 'Ном',
	'farmer-error-exists' => 'Наметавон вики эҷод кард.  Он аллакай вуҷуд дорад: $1',
	'farmer-error-noextwrite' => 'Қобили навиштани парвандаи афзуна нест:',
);

/** Thai (ไทย)
 * @author Octahedron80
 * @author Passawuth
 */
$messages['th'] = array(
	'farmer-button-confirm' => 'ยืนยัน',
	'farmer-delete-form-submit' => 'ลบ',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'farmer' => 'Magsasaka (tagapaglinang)',
	'farmer-desc' => 'Pamahalaan ang isang linangan o "bukid" ng MediaWiki',
	'farmercantcreatewikis' => 'Hindi mo nakayanang lumikha ng mga wiki kasi wala kang pribilehiyong lumikha ng mga wiki',
	'farmercreatesitename' => 'Pangalan ng sityo',
	'farmercreatenextstep' => 'Susunod na hakbang',
	'farmernewwikimainpage' => '== Maligayang pagdating sa iyong wiki ==
Kapag nababasa mo ito, nailuklok ng tama ang iyong bagong wiki.
Maaari mong [[Special:Farmer|iayon sa nais mong disenyo ang iyong wiki]].',
	'farmer-about' => 'Patungkol',
	'farmer-about-text' => "Nagpapahintulot ang Magsasaka ng Mediawiki (''MediaWiki Farmer'') na mapamahalaan mo ang isang linangan ng mga wiki ng MediaWiki.",
	'farmer-list-wiki' => 'Talaan ng mga wiki',
	'farmer-list-wiki-text' => '[[$1|Itala]] ang lahat ng mga wiking nasa {{SITENAME}}',
	'farmer-createwiki' => 'Lumikha ng isang wiki',
	'farmer-createwiki-text' => '[[$1|Lumikha]] na ngayon ng isang bagong wiki!',
	'farmer-administration' => 'Pangangasiwa ng linangan',
	'farmer-administration-extension' => 'Pamahalaan ang mga karugtong',
	'farmer-administration-extension-text' => '[[$1|Pamahalaan]] ang nakaluklok na mga karugtong.',
	'farmer-admimistration-listupdate' => 'Pagsasapanahon ng talaan ng linangan',
	'farmer-admimistration-listupdate-text' => '[[$1|Isapanahon]] ang talaan ng mga wiking nasa {{SITENAME}}',
	'farmer-administration-delete' => 'Burahin ang isang wiki',
	'farmer-administration-delete-text' => '[[$1|Burahin]] ang isang wiki mula sa linangan',
	'farmer-administer-thiswiki' => 'Pangasiwaan ang wiking ito',
	'farmer-administer-thiswiki-text' => '[[$1|Pangasiwaan]] ang mga pagbabago sa wiking ito',
	'farmer-notavailable' => 'Hindi makukuha',
	'farmer-notavailable-text' => 'Makukuha lamang ang kasangkapang-katangiang ito mula sa pangunahing wiki',
	'farmer-wikicreated' => 'Nalikha na ang wiki',
	'farmer-wikicreated-text' => 'Nalikha na ang iyong wiki.
Mapupuntahan ito sa $1',
	'farmer-default' => 'Bilang likas na katakdaan, walang ibang may mga kapahintulutan sa wiking ito maliban sa iyo.
Mababago mo ang mga pribilehiyo ng tagagamit sa pamamagitan ng $1',
	'farmer-wikiexists' => 'Umiiral na ang wiki',
	'farmer-wikiexists-text' => "Umiiral na ang wiking '''$1''' na sinusubok mong likhain.
Bumalik po lamang at sumubok ng iba pang pangalan.",
	'farmer-confirmsetting' => 'Tiyakin ang mga katakdaan ng wiki',
	'farmer-confirmsetting-name' => 'Pangalan',
	'farmer-confirmsetting-title' => 'Pamagat',
	'farmer-confirmsetting-description' => 'Paglalarawan',
	'farmer-description' => 'Paglalarawan',
	'farmer-confirmsetting-text' => "Ang wiki mong '''$1''' ay mapupuntahan sa pamamagitan ng $3.
Ang espasyo ng pangalan ng proyekto ay magiging '''$2'''.
Ang mga kawing papunta sa espasyo ng pangalang ito ay magiging nasa anyong '''<nowiki>[[$2:Page name]]</nowiki>'''.
Kung ito ang nais mo, pindutin ang pindutang '''tiyakin''' na nasa ibaba.",
	'farmer-button-confirm' => 'Tiyakin',
	'farmer-button-submit' => 'Ipasa',
	'farmer-createwiki-form-title' => 'Lumikha ng isang wiki',
	'farmer-createwiki-form-text1' => 'Gamitin ang pormularyong nasa ibaba upang makalikha ng isang bagong wiki.',
	'farmer-createwiki-form-help' => 'Tulong',
	'farmer-createwiki-form-text2' => "; Pangalan ng wiki: Ang pangalan ng wiki.
Naglalaman lamang ng mga titik at mga bilang.
Gagamitin ang pangalan ng wiki bilang bahagi ng URL upang makilala ang iyong wiki.
Halimbawa na, kapag pinasok mo ang '''pamagat''', mapupuntahan pagdaka ang wiki mo sa pamamagitan ng <nowiki>http://</nowiki>'''pamagat'''.mydomain.",
	'farmer-createwiki-form-text3' => '; Pamagat ng wiki: Ang pamagat ng wiki.
Gagamitin sa loob ng pamagat ng bawat isang pahinang nasa ibabaw ng iyong wiki.
Magiging espasyo ng pangalan rin ng proyekto at unlapi ng ugnayang-wiki.',
	'farmer-createwiki-form-text4' => '; Paglalarawan: Paglalarawan ng wiki.
Isa itong teksto ng paglalarawan hinggil sa wiki.
Ipapakita ito sa loob ng talaan ng wiki.',
	'farmer-createwiki-user' => 'Pangalan ng tagagamit',
	'farmer-createwiki-name' => 'Pangalan ng wiki',
	'farmer-createwiki-title' => 'Pamagat ng wiki',
	'farmer-createwiki-description' => 'Paglalarawan',
	'farmer-updatedlist' => 'Naisapanahong talaan',
	'farmer-notaccessible' => 'Hindi mapupuntahan',
	'farmer-notaccessible-test' => 'Makukuha lamang ang kasangkapang-katangiang ito mula sa magulang na wiki na nasa loob ng linangan',
	'farmer-permissiondenied' => 'Ipinagkait ang pahintulot',
	'farmer-permissiondenied-text' => 'Walang kang pahintulot na burahin ang isang wiki mula sa linangan',
	'farmer-permissiondenied-text1' => 'Wala kang pahintulot na mapuntahan ang pahinang ito',
	'farmer-deleting' => 'Binubura ang $1',
	'farmer-delete-title' => 'Burahin ang wiki',
	'farmer-delete-text' => 'Pakipili ang wiking nais mong burahin mula sa talaang nasa ibaba',
	'farmer-delete-form' => 'Pumili ng isang wiki',
	'farmer-delete-form-submit' => 'Burahin',
	'farmer-listofwikis' => 'Talaan ng mga wiki',
	'farmer-mainpage' => 'Unang Pahina',
	'farmer-basic-title' => 'Payak na mga parametro',
	'farmer-basic-title1' => 'Pamagat',
	'farmer-basic-title1-text' => 'Wala pang pamagat ang wiki mo. Magtakda ng isa <b>ngayon</b>',
	'farmer-basic-description' => 'Paglalarawan',
	'farmer-basic-description-text' => 'Itakda sa ibaba ang paglalarawan ng iyong wiki',
	'farmer-basic-permission' => 'Mga kapahintulutan',
	'farmer-basic-permission-text' => 'Sa pamamagitan ng pormularyong nasa ibaba, maaaring mangyaring baguhin ang mga pahintulot para sa mga tagagamit ng wiking ito.',
	'farmer-basic-permission-visitor' => 'Mga kapahintulutan para sa bawat isang panauhin',
	'farmer-basic-permission-visitor-text' => 'Ang sumusunod na mga kapahintulutan ay ihahain sa bawat isang taong dadalaw sa wiking ito',
	'farmer-yes' => 'Oo',
	'farmer-no' => 'Hindi',
	'farmer-basic-permission-user' => 'Mga kapahintulutan para sa nakalagdang mga tagagamit',
	'farmer-basic-permission-user-text' => 'Ang sumusunod na mga kapahintulutan ay ihahain sa bawat isang taong lumagdang papasok sa wiking ito',
	'farmer-setpermission' => 'Itakda ang mga pahintulot',
	'farmer-defaultskin' => 'Likas na nakatakdang pabalat',
	'farmer-defaultskin-button' => 'Itakda ang likas na nakatakdang pabalat',
	'farmer-extensions' => 'Masisiglang mga karugtong',
	'farmer-extensions-button' => 'Itakda ang masisiglang mga karugtong',
	'farmer-extensions-extension-denied' => 'Wala kang pahintulot na gamitin ang kasangkapang-katangiang ito.
Dapat na isa kang kasapi ng pangkat ng tagapangasiwa ng linangan.',
	'farmer-extensions-invalid' => 'Hindi tanggap na karugtong',
	'farmer-extensions-invalid-text' => 'Hindi namin maidagdag ang karugtong dahil hindi matagpuan ang talaksang napili para isama',
	'farmer-extensions-available' => 'Mga makukuhang karugtong',
	'farmer-extensions-noavailable' => 'Walang nakatalang mga karugtong',
	'farmer-extensions-register' => 'Ipatala ang karugtong',
	'farmer-extensions-register-text1' => 'Gamitin ang pormularyong nasa ibaba upang maipatala sa linangan ang bagong karugtong.
Kapag naipatala na ang isang karugtong, magagamit na ito ng lahat ng mga wiki.',
	'farmer-extensions-register-text2' => "Para sa parametrong ''Isama ang talaksan'', ipasok ang pangalan ng talaksang PHP na katulad ng sa ginagawa mo sa loob ng LocalSettings.php.",
	'farmer-extensions-register-text3' => "Kapag naglalaman ang pangalan ng talaksan ng '''\$root''', ang pabagu-bagong halagang iyan ay mapapalitan ng ugat na direktoryo ng MediaWiki.",
	'farmer-extensions-register-text4' => 'Ang pangkasalukuyang pansamang mga daanan ay:',
	'farmer-extensions-register-name' => 'Pangalan',
	'farmer-extensions-register-includefile' => 'Isama ang talaksan',
	'farmer-error-exists' => 'Hindi malikha ang wiki. Umiiral na ito: $1',
	'farmer-error-noextwrite' => 'Hindi nagawang maisulat palabas ang talaksan ng karugtong:',
);

/** Turkish (Türkçe)
 * @author Karduelis
 * @author Mach
 * @author Suelnur
 */
$messages['tr'] = array(
	'farmercreatesitename' => 'Site adı',
	'farmercreatenextstep' => 'Sonraki adım',
	'farmer-about' => 'Hakkında',
	'farmer-list-wiki' => 'Wikilerin listesi',
	'farmer-confirmsetting-name' => 'İsim',
	'farmer-confirmsetting-title' => 'Başlık',
	'farmer-createwiki-form-help' => 'Yardım',
	'farmer-createwiki-user' => 'Kullanıcı adı',
	'farmer-createwiki-name' => 'Wiki adı',
	'farmer-delete-form-submit' => 'Sil',
	'farmer-listofwikis' => 'Wikilerin listesi',
	'farmer-mainpage' => 'Ana sayfa',
	'farmer-basic-title1' => 'Başlık',
	'farmer-basic-permission-view' => 'Bütün sayfaları izle',
	'farmer-basic-permission-edit' => 'Bütün sayfaları değiştir',
	'farmer-basic-permission-upload' => 'Dosya yükle',
	'farmer-yes' => 'Evet',
	'farmer-no' => 'Hayır',
	'farmer-extensions-register-name' => 'İsim',
);

/** ئۇيغۇرچە (ئۇيغۇرچە)
 * @author Alfredie
 */
$messages['ug-arab'] = array(
	'farmer-createwiki-user' => 'ئىشلەتكۇچى ئىسمى',
);

/** Uighur (Latin) (Uyghurche‎ / ئۇيغۇرچە (Latin))
 * @author Jose77
 */
$messages['ug-latn'] = array(
	'farmer-createwiki-user' => 'Ishletkuchi ismi',
);

/** Ukrainian (Українська)
 * @author AS
 */
$messages['uk'] = array(
	'farmer-basic-title1' => 'Заголовок',
);

/** Veps (Vepsan kel')
 * @author Игорь Бродский
 */
$messages['vep'] = array(
	'farmercreatesitename' => 'Saitan nimi',
	'farmercreatenextstep' => "Jäl'ghine haškuz",
	'farmer-confirmsetting-name' => 'Nimi',
	'farmer-confirmsetting-title' => 'Pälkirjutez',
	'farmer-button-submit' => 'Oigeta',
	'farmer-createwiki-form-title' => 'Säta wiki',
	'farmer-createwiki-form-text1' => "Kävutagat form alahan, miše säta uz' wiki.",
	'farmer-createwiki-form-help' => 'Abu',
	'farmer-createwiki-user' => 'Kävutajan nimi',
	'farmer-createwiki-name' => 'Wikin nimi',
	'farmer-createwiki-title' => 'Wikin pälkirjutez',
	'farmer-createwiki-description' => 'Ümbrikirjutand',
	'farmer-updatedlist' => 'Udištadud nimikirjutez',
	'farmer-notaccessible' => 'Ei voi nähta',
	'farmer-deleting' => 'Čudam $1',
	'farmer-delete-title' => 'Čuta wiki poiš',
	'farmer-delete-form' => 'Valita wiki',
	'farmer-delete-form-submit' => 'Čuta poiš',
	'farmer-listofwikis' => 'Wikiden nimikirjutez',
	'farmer-mainpage' => "Pälehtpol'",
	'farmer-basic-title' => 'Päparametrad',
	'farmer-basic-title1' => 'Pälkirjutez',
	'farmer-basic-title1-text' => "Teiden wikil ei ole pälkirjutest. Tehkat se <b>nügüd'</b>",
	'farmer-basic-description' => 'Ümbrikirjutand',
	'farmer-basic-permission' => 'Oiktused',
	'farmer-basic-permission-view' => 'Nähta kaik lehtpoled',
	'farmer-basic-permission-edit' => 'Redaktiruida kaik lehtpoled',
	'farmer-basic-permission-createpage' => 'Säta uzid lehtpolid',
	'farmer-basic-permission-upload' => 'Jügutoitta failad',
	'farmer-yes' => 'Ka',
	'farmer-no' => 'Ei',
	'farmer-basic-permission-user' => 'Registriruidud kävutajiden oiktused',
	'farmer-extensions-invalid' => 'Vär liža',
	'farmer-extensions-register-name' => 'Nimi',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'farmer' => 'Nông trại',
	'farmer-desc' => 'Quản lý một nông trại MediaWiki',
	'farmercantcreatewikis' => 'Bạn không thể tạo wiki vì bạn không có quyền createwikis',
	'farmercreatesitename' => 'Tên trang',
	'farmercreatenextstep' => 'Bước tiếp theo',
	'farmernewwikimainpage' => '== Hoan nghênh đã đến với Wiki của bạn ==
Nếu bạn đang đọc câu này, wiki mới của bạn đã được cài đặt đúng đắn.
Bạn có thể [[Special:Farmer|điều chỉnh wiki của mình]].',
	'farmer-about' => 'Giới thiệu',
	'farmer-about-text' => 'Nông trại MediaWiki cho phép bạn quản lý một nông trại gồm các wiki MediaWiki.',
	'farmer-list-wiki' => 'Danh sách các Wiki',
	'farmer-list-wiki-text' => '[[$1|Liệt kê]] tất cả các wiki trên {{SITENAME}}',
	'farmer-createwiki' => 'Tạo một Wiki',
	'farmer-createwiki-text' => '[[$1|Tạo]] một wiki mới ngay bây giờ!',
	'farmer-administration' => 'Quản trị Nông trại',
	'farmer-administration-extension' => 'Quản lý Gói mở rộng',
	'farmer-administration-extension-text' => '[[$1|Quản lý]] đã gói mở rộng đã cài đặt.',
	'farmer-admimistration-listupdate' => 'Cập nhật danh sách nông trại',
	'farmer-admimistration-listupdate-text' => '[[$1|Cập nhật]] danh sách các wiki trên {{SITENAME}}',
	'farmer-administration-delete' => 'Xóa một Wiki',
	'farmer-administration-delete-text' => '[[$1|Xóa]] một wiki ra khỏi nông trại',
	'farmer-administer-thiswiki' => 'Quản trị Wiki này',
	'farmer-administer-thiswiki-text' => '[[$1|Quản trị]] các thay đổi tại wiki này',
	'farmer-notavailable' => 'Không có',
	'farmer-notavailable-text' => 'Tính năng này chỉ có tại wiki chính',
	'farmer-wikicreated' => 'Đã tạo Wiki',
	'farmer-wikicreated-text' => 'Wiki của bạn đã được tạo.
Nó có thể vào được tại $1',
	'farmer-default' => 'Theo mặc định, không ai có quyền tại wiki này trừ bạn.
Bạn có thể thay đổi quyền thành viên thông qua $1',
	'farmer-wikiexists' => 'Wiki đã tồn tại',
	'farmer-wikiexists-text' => "Wiki mà bạn đang cố tạo, '''$1''', đã tồn tại.
Xin hãy quay lại và thử một tên khác.",
	'farmer-confirmsetting' => 'Xác nhận các thiết lập Wiki',
	'farmer-confirmsetting-name' => 'Tên',
	'farmer-confirmsetting-title' => 'Tựa',
	'farmer-confirmsetting-description' => 'Miêu tả',
	'farmer-confirmsetting-reason' => 'Lý do',
	'farmer-description' => 'Miêu tả',
	'farmer-confirmsetting-text' => "Wiki của bạn, '''$1''', sẽ vào được thông qua $3.
Không gian tên dự án sẽ là '''$2'''.
Liên kết đến không gian tên này sẽ có dạng '''<nowiki>[[$2:Page name]]</nowiki>'''.
Nếu đây là điều bạn muốn, hãy nhấn nút '''xác nhận''' ở dưới.",
	'farmer-button-confirm' => 'Xác nhận',
	'farmer-button-submit' => 'Chấp nhận',
	'farmer-createwiki-form-title' => 'Tạo một Wiki',
	'farmer-createwiki-form-text1' => 'Sử dụng mẫu dưới đây để tạo một wiki mới.',
	'farmer-createwiki-form-help' => 'Trợ giúp',
	'farmer-createwiki-form-text2' => "Ví dụ, nếu bạn gõ vào '''tựa đề''', wiki của bạn sẽ truy cập được thông qua <nowiki>http://</nowiki>'''title'''.tênmiền.",
	'farmer-createwiki-form-text3' => '; Tựa đề Wiki: Tựa đề của wiki.
Sẽ được dùng tại tựa đề của mỗi trang trong wiki của bạn.
Cũng sẽ là không gian tên dự án và tiền tốc liên wiki.',
	'farmer-createwiki-form-text4' => '; Miêu tả: Miêu tả wiki.
Đây là dòng miêu tả bằng chữ về wiki.
Nó sẽ được hiển thị tại danh sách wiki.',
	'farmer-createwiki-user' => 'Tên người dùng',
	'farmer-createwiki-name' => 'Tên wiki',
	'farmer-createwiki-title' => 'Tựa đề wiki',
	'farmer-createwiki-description' => 'Miêu tả',
	'farmer-createwiki-reason' => 'Lý do',
	'farmer-updatedlist' => 'Đã cập nhật danh sách',
	'farmer-notaccessible' => 'Không truy cập được',
	'farmer-notaccessible-test' => 'Tính năng này chỉ có tại wiki mẹ trong nông trại',
	'farmer-permissiondenied' => 'Không cho phép',
	'farmer-permissiondenied-text' => 'Bạn không có quyền xóa một wiki khỏi nông trại',
	'farmer-permissiondenied-text1' => 'Bạn không có quyền truy cập trang này',
	'farmer-deleting' => 'Đã xóa wiki “$1”',
	'farmer-delete-confirm' => 'Tôi muốn xóa wiki này',
	'farmer-delete-confirm-wiki' => "Wiki để xóa: '''$1'''.",
	'farmer-delete-reason' => 'Lý do xóa:',
	'farmer-delete-title' => 'Xóa Wiki',
	'farmer-delete-text' => 'Xin hãy chọn wiki mà bạn muốn xóa từ danh sách dưới đây',
	'farmer-delete-form' => 'Chọn một wiki',
	'farmer-delete-form-submit' => 'Xóa',
	'farmer-listofwikis' => 'Danh sách các Wiki',
	'farmer-mainpage' => 'Trang Chính',
	'farmer-basic-title' => 'Tham số cơ bản',
	'farmer-basic-title1' => 'Tựa đề',
	'farmer-basic-title1-text' => 'Wiki của bạn không có tựa đề.  Hãy thiết lập một cái NGAY BÂY GIỜ',
	'farmer-basic-description' => 'Mô tả',
	'farmer-basic-description-text' => 'Ghi mô tả cho wiki của bạn ở phía dưới',
	'farmer-basic-permission' => 'Quyền hạn',
	'farmer-basic-permission-text' => 'Bằng cách sử dụng mẫu ở dưới, bạn có thể thay đổi quyền hạn cho thành viên của wiki này.',
	'farmer-basic-permission-visitor' => 'Quyền cho Mỗi Khách Viếng Thăm',
	'farmer-basic-permission-visitor-text' => 'Những quyền sau sẽ áp dụng cho mỗi người dùng đến thăm wiki này',
	'farmer-yes' => 'Có',
	'farmer-no' => 'Không',
	'farmer-basic-permission-user' => 'Quyền hạn cho Thành viên đăng nhập',
	'farmer-basic-permission-user-text' => 'Những quyền sau đây sẽ áp dụng cho những người đã đăng nhập vào wiki này',
	'farmer-setpermission' => 'Thiết lập quyền hạn',
	'farmer-defaultskin' => 'Hình dạng mặc định',
	'farmer-defaultskin-button' => 'Thiết lập hình dạng mặc định',
	'farmer-extensions' => 'Các gói mở rộng sẽ dùng',
	'farmer-extensions-button' => 'Thiết lập các gói mở rộng sẽ dùng',
	'farmer-extensions-extension-denied' => 'Bạn không có quyền sử dụng tính năng này.
Bạn phải thành viên của nhóm quản trị nông trại',
	'farmer-extensions-invalid' => 'Gói mở rộng không hợp lệ',
	'farmer-extensions-invalid-text' => 'Chúng tôi không thể thêm gói mở rộng vì không thể tìm thấy tập tin bạn chọn để nhúng vào',
	'farmer-extensions-available' => 'Những gói mở rộng có sẵn',
	'farmer-extensions-noavailable' => 'Không có gói mở rộng nào được đăng ký',
	'farmer-extensions-register' => 'Đăng ký gói mở rộng',
	'farmer-extensions-register-text1' => 'Sử dụng mẫu dưới đây để đăng ký một gói mở rộng mới cho nông trại.
Sau khi đã đăng ký một gói mở rộng, tất cả các wiki sẽ có thể sử dụng nó.',
	'farmer-extensions-register-text2' => "Đối với tham số ''Tập tin được nhúng'', gõ vào tên của tập tin PHP mà bạn đã ghi trong LocalSettings.php.",
	'farmer-extensions-register-text3' => "Nếu tập tin có chứa '''\$root''', biến đó sẽ được thay bằng thư mục gốc của MediaWiki.",
	'farmer-extensions-register-text4' => 'Đường dẫn để nhúng hiện tại là:',
	'farmer-extensions-register-name' => 'Tên',
	'farmer-extensions-register-includefile' => 'Nhúng tập tin',
	'farmer-error-exists' => 'Không thể khởi tạo wiki.  Nó đã tồn tại: $1',
	'farmer-error-noextwrite' => 'Không thể ghi ra tập tin mở rộng:',
	'farmer-log-name' => 'Nhật trình mạng wiki',
	'farmer-log-header' => 'Đây là nhật trình các thay đổi trên mạng wiki.',
	'farmer-log-create' => 'tạo wiki “$2”',
	'farmer-log-delete' => 'xóa wiki “$2”',
	'right-farmeradmin' => 'Quản lý nông trại wiki',
	'right-createwiki' => 'Tạo wiki trong nông trại wiki',
);

/** Volapük (Volapük)
 * @author Malafaya
 * @author Smeira
 */
$messages['vo'] = array(
	'farmer' => 'Farman',
	'farmercantcreatewikis' => 'No kanol jafön vüki bi no labol privilegi tefik („createwikis“)',
	'farmercreatesitename' => 'Sitanem',
	'farmer-about' => 'Tefü',
	'farmer-list-wiki' => 'Lised vükas',
	'farmer-createwiki' => 'Jafön vüki',
	'farmer-notavailable' => 'No gebidon',
	'farmer-wikicreated-text' => 'Vük olik pejafon.
Binon lügolovik as $1',
	'farmer-wikiexists' => 'Vük dabinon',
	'farmer-wikiexists-text' => "Vük, keli steifülol ad jafön, '''$1''', ya dabinon.
Geikolös e gebolös nemi votik.",
	'farmer-confirmsetting' => 'Fümedön parametemi vüka',
	'farmer-confirmsetting-name' => 'Nem',
	'farmer-confirmsetting-title' => 'Tiäd',
	'farmer-confirmsetting-description' => 'Bepenam',
	'farmer-description' => 'Bepenam',
	'farmer-button-confirm' => 'Fümedön',
	'farmer-button-submit' => 'Sedön',
	'farmer-createwiki-form-title' => 'Jafön vüki',
	'farmer-createwiki-form-text1' => 'Gebolös fometi dono ad jafön vüki nulik.',
	'farmer-createwiki-form-help' => 'Yuf',
	'farmer-createwiki-form-text2' => "; Vükanem: Nem vüka.
Ninädon te tonatis e numatis.
Vükanem pogebon as dil ela URL ad dientifükön vüki olik.
Samo, if penol '''tiäd''', tän vük olik potuvon medü <nowiki>http://</nowiki>'''tiäd'''.mydomain.",
	'farmer-createwiki-form-text3' => '; Vükatiäd: Tiäd vüka.
Pogebon pö tiäd pada alik su vük olik.
Obinon i foyümot proyeganemaspada e yümas vüvükik.',
	'farmer-createwiki-form-text4' => '; Bepenam: Bepenam vüka.
Atos binon bepenam vödemik tefü vük.
Atos pajonon su vükalised.',
	'farmer-createwiki-user' => 'Gebananem',
	'farmer-createwiki-name' => 'Vükanem',
	'farmer-createwiki-title' => 'Vükatiäd',
	'farmer-createwiki-description' => 'Bepenam',
	'farmer-permissiondenied' => 'Däl no pegevon',
	'farmer-permissiondenied-text' => 'No labol däli ad moükön vüki se farm',
	'farmer-deleting' => 'Moükam pada: $1',
	'farmer-delete-title' => 'Moükön vüki',
	'farmer-delete-text' => 'Välolös vüki se lised dono ad pamoükön',
	'farmer-delete-form' => 'Välön vüki',
	'farmer-delete-form-submit' => 'Moükön',
	'farmer-listofwikis' => 'Lised vükas',
	'farmer-mainpage' => 'Cifapad',
	'farmer-basic-title' => 'Cifaparamets',
	'farmer-basic-title1' => 'Tiäd:',
	'farmer-basic-title1-text' => 'Vük olik no labon tiädi. Välolöd bali <b>anu</b>',
	'farmer-basic-description' => 'Bepenam',
	'farmer-basic-description-text' => 'Penolös bepenami vüka olik dono',
	'farmer-basic-permission' => 'Däls',
	'farmer-basic-permission-view' => 'Logön padis valik',
	'farmer-basic-permission-edit' => 'Redakön padis valik',
	'farmer-basic-permission-createpage' => 'Jafön padis nulik',
	'farmer-basic-permission-createtalk' => 'Jafön bespikapadis',
	'farmer-basic-permission-move' => 'Topätükön padis',
	'farmer-basic-permission-upload' => 'Löpükön ragivis',
	'farmer-basic-permission-reupload' => 'Dönulöpükön ragivis (sui ragiv ya dabinöl)',
	'farmer-basic-permission-minoredit' => 'Dälön redakamis pülik',
	'farmer-yes' => 'Si',
	'farmer-no' => 'Nö',
	'farmer-extensions-register-name' => 'Nem',
	'farmer-error-exists' => 'Vük no kanon pajafön bi ya dabinon: $1',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Gzdavidwong
 * @author Wmr89502270
 */
$messages['zh-hans'] = array(
	'farmercreatesitename' => '网站名称',
	'farmercreatenextstep' => '下一步',
	'farmer-about' => '关于',
	'farmer-list-wiki' => 'Wiki列表',
	'farmer-createwiki' => '建立一个Wiki',
	'farmer-wikicreated' => 'Wiki已被建立',
	'farmer-wikiexists' => 'Wiki存在',
	'farmer-confirmsetting-title' => '标题',
	'farmer-button-confirm' => '确认',
	'farmer-button-submit' => '提交',
	'farmer-createwiki-form-help' => '帮助',
	'farmer-createwiki-user' => '用户名',
	'farmer-createwiki-name' => 'Wiki名称',
	'farmer-createwiki-title' => 'Wiki标题',
	'farmer-updatedlist' => '已更新的列表',
	'farmer-delete-title' => '删除Wiki',
	'farmer-delete-form' => '选择一个Wiki',
	'farmer-delete-form-submit' => '删除',
	'farmer-mainpage' => '首页',
	'farmer-basic-title1' => '标题',
	'farmer-basic-permission-view' => '查看所有页面',
	'farmer-basic-permission-edit' => '编辑所有页面',
	'farmer-basic-permission-createpage' => '建立新页面',
	'farmer-basic-permission-createtalk' => '建立讨论页',
	'farmer-basic-permission-upload' => '上传文件',
	'farmer-yes' => '是',
	'farmer-no' => '否',
	'farmer-defaultskin' => '默认皮肤',
	'farmer-defaultskin-button' => '设为默认皮肤',
	'farmer-extensions-register-name' => '名称',
	'farmer-extensions-register-includefile' => '包括文件',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Alexsh
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'farmercreatesitename' => '網站名稱',
	'farmercreatenextstep' => '下一步',
	'farmer-about' => '關於',
	'farmer-list-wiki' => 'Wiki清單',
	'farmer-createwiki' => '建立一個wiki',
	'farmer-wikicreated' => '已建立wiki',
	'farmer-wikiexists' => 'Wiki存在',
	'farmer-confirmsetting-description' => '描述：$1',
	'farmer-description' => '描述',
	'farmer-button-confirm' => '確認',
	'farmer-button-submit' => '提交',
	'farmer-createwiki-form-help' => '說明',
	'farmer-createwiki-user' => '使用者名稱',
	'farmer-createwiki-name' => 'Wiki名稱',
	'farmer-createwiki-title' => 'Wiki標題',
	'farmer-createwiki-description' => '描述',
	'farmer-updatedlist' => '已更新的清單',
	'farmer-deleting' => '正在刪除"$1"',
	'farmer-delete-title' => '刪除wiki',
	'farmer-delete-form' => '選擇一個wiki',
	'farmer-delete-form-submit' => '刪除',
	'farmer-mainpage' => '首頁',
	'farmer-basic-title1' => '標題',
	'farmer-basic-description' => '描述',
	'farmer-basic-permission-view' => '檢視所有頁面',
	'farmer-basic-permission-edit' => '編輯所有頁面',
	'farmer-basic-permission-createpage' => '建立新頁面',
	'farmer-basic-permission-createtalk' => '建立討論頁面',
	'farmer-basic-permission-upload' => '上載檔案',
	'farmer-yes' => '是',
	'farmer-no' => '否',
	'farmer-defaultskin' => '預設外觀',
	'farmer-defaultskin-button' => '設為預設外觀',
	'farmer-extensions-register-name' => '名稱',
	'farmer-extensions-register-includefile' => '包含檔案',
);
