Wordpress Password Reset Plugin
==============

This plugin is designed to overcome the issue with Wordpress password reset emails where the included activation link always includes a ">" at the end. This extra character will often confuse URL parsers and users who will copy and paste the URL, even though it is not intended to be part of the URL.

Therefore, an email such as this:

 > Someone requested that the password be reset for the following account: http://`wordpress-site`/ Username: `username` If this was a mistake, just ignore this email and nothing will happen. To reset your password, visit the following address: /`wordpress-site`/wp-login.php?action=rp&key=`key`&login=`url-encoded-username`>
 
Will be rewritten to this:

 > It appears as though you have requested that your password be reset for the following account: http://`wordpress-site`/
 > Your username is: `username`
 > If you did not request this email, you may safely disregard it.
 > To reset your password, visit the following address:
 > 
 > http://`wordpress-site`/wp-login.php?action=rp&key=`key`&login=`url-encoded-username`
