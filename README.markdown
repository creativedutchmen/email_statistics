Email Statistics
================

Version: 0.1  

Author:	Huib Keemink (creativedutchmen)

What's this?
------------

This extension will add simple statistics to the Email Newsletter Manager extension. It could be used without the ENM, but not every feature will work (ENM support is kindof hardcoded at this moment).

Installation
------------

1.	Either use git to clone the extension into the extensions/email\_statistics directory, or download the zip and unzip in the same folder.
2.	To get clean URL's for your tracking code, add a rewrite to your htaccess file:

    ### EMAIL TRACKING RULES
 	RewriteRule	^track/transparent.gif$ extensions/email_statistics/assets/transparent.gif [L,NC]
	RewriteRule	^track\/(.+).gif$ extensions/email_statistics/page/track.php?key=$1 [L,NC]
	
3.	Include the provided `tracking\_code` datasource into your email template. It will automatically fetch the newsletter_id using the $enm-newsletter-id parameter, which is why it is hard to use this extension outside of the ENM. This datasource will provide you with the tracking code unique to that recipient and newsletter id. The tracking key will not be directly linked to the email for privacy reasons. At this moment, tracking codes are **not** cleared after a certain amount of time, so your database might become rather large if you send a lot of email.