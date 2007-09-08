<?php
/** \file
* \brief Internationalization file for the Password Reset Extension.
*/

$allMessages = array(
        'en' => array( 
                'passwordreset' => 'Password Reset',
		'passwordreset-invalidusername' => 'Invalid Username',
		'passwordreset-emptyusername' => 'Empty Username',
		'passwordreset-nopassmatch' => 'Passwords do not match',
		'passwordreset-badtoken' => 'Invalid Edit Token',
		'passwordreset-username' => 'Username',
		'passwordreset-newpass' => 'New Password',
		'passwordreset-confirmpass' => 'Confirm Password',
		'passwordreset-submit' => 'Reset Password',
		'passwordreset-success' => 'Password has been reset for user_id: $1'
        ),
        'de' => array( 
                'passwordreset' => 'Passwort zurücksetzen',
        ),

        'nl' => array( 
                'passwordreset' => 'Wachtwoord opnieuw instellen',
        ),
        'yue' => array( 
                'passwordreset' => '密碼重設',
		'passwordreset-invalidusername' => '無效嘅用戶名',
		'passwordreset-emptyusername' => '空白嘅用戶名',
		'passwordreset-nopassmatch' => '密碼唔對',
		'passwordreset-badtoken' => '無效嘅編輯幣',
		'passwordreset-username' => '用戶名',
		'passwordreset-newpass' => '新密碼',
		'passwordreset-confirmpass' => '確認新密碼',
		'passwordreset-submit' => '重設密碼',
		'passwordreset-success' => 'User_id: $1 嘅密碼已經重設咗'
	),
        'zh-hans' => array( 
                'passwordreset' => '密码重设',
		'passwordreset-invalidusername' => '无效的用户名',
		'passwordreset-emptyusername' => '空白的用户名',
		'passwordreset-nopassmatch' => '密码不匹配',
		'passwordreset-badtoken' => '无效的编辑币',
		'passwordreset-username' => '用户名',
		'passwordreset-newpass' => '新密码',
		'passwordreset-confirmpass' => '确认新密码',
		'passwordreset-submit' => '重设密码',
		'passwordreset-success' => 'User_id: $1 的密码已经重设'
        ),
        'zh-hant' => array( 
                'passwordreset' => '密碼重設',
		'passwordreset-invalidusername' => '無效的用戶名',
		'passwordreset-emptyusername' => '空白的用戶名',
		'passwordreset-nopassmatch' => '密碼不匹配',
		'passwordreset-badtoken' => '無效的編輯幣',
		'passwordreset-username' => '用戶名',
		'passwordreset-newpass' => '新密碼',
		'passwordreset-confirmpass' => '確認新密碼',
		'passwordreset-submit' => '重設密碼',
		'passwordreset-success' => 'User_id: $1 的密碼已經重設'
        ),
);

$allMessages['zh'] = $allMessages['zh-hans'];
$allMessages['zh-cn'] = $allMessages['zh-hans'];
$allMessages['zh-hk'] = $allMessages['zh-hant'];
$allMessages['zh-sg'] = $allMessages['zh-hans'];
$allMessages['zh-tw'] = $allMessages['zh-hant'];
$allMessages['zh-yue'] = $allMessages['yue'];
