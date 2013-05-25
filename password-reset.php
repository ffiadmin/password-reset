<?php
/*
Plugin Name: Password Reset
Plugin URI: https://github.com/ffiadmin/password-reset
Description: This plugin is designed to overcome the issue with Wordpress password reset emails where the included activation link always includes a ">" at the end. It will also disable sending password change notification emails which are sent to the administrator.
Version: 1.0
Author: Oliver Spryn
Author URI: http://forwardfour.com/
License: MIT
*/
	
//Add the function which will be called to replace the default content of the password reset email
	function emailContent($old_message, $key) {
    	$login = trim($_POST['user_login']);
		$user_data = get_user_by('login', $login);
		
		$message =  "It appears as though you have requested your password to be reset for the following account: " . network_home_url("/") . " ";
		$message .= "Your username is: " . $user_data->user_login . " ";
		$message .= "If you did not request this email, you may safely disregard it. ";
		$message .= "To reset your password, visit the following address: \n\r\n\r";
		$message .= network_home_url("wp-login.php?action=rp&key=" . $key . "&login=" . rawurlencode($user_data->user_login));
		
		return $message;
	}
 
//Remove the default Wordpress hook to send a user an email
	add_filter("retrieve_password_message", "emailContent", 10, 2);
 
//Disable sending password change notification emails to the administrator
	if (!function_exists("wp_password_change_notification")) {
		function wp_password_change_notification($user) { }
	}
	
	if (!function_exists("wp_new_user_notification")) {
		function wp_new_user_notification($user_id, $plaintext_pass) { }
	}
?>