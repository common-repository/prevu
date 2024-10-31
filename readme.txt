=== Plugin Name ===
Contributors: parterburn
Donate link: https://www.paypal.me/parterburn
Tags: daily deals, preVU, cURL, file_get_contents, 3rd party content
Requires at least: 3.0
Tested up to: 3.4.1
Stable tag: 3.4.1

Adds a shortcode for Pages/Posts to pull in content from other pages. Shortcode usage: [preVU url="url://goes.here" poweredby=TRUE]

== Description ==

Pretty basic plugin. Install the plugin & to use simply add the shortcode (example below) to any Page or Post. If your web host allows the functions cURL or file_get_contents it will pull in the raw HTML from the url given in the shortcode. No setup, no options.

EXAMPLE USE:

[preVU url="http://pre.vu/clients/mhotc/"]

or, if you're feeling nice and want to add the "Powered by preVU" at the bottom:

[preVU url="http://pre.vu/clients/mhotc/" poweredby=TRUE]


== Installation ==

This section describes how to install the plugin and get it working.

1. Upload 'prevu.php' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place '[preVU url="http://pre.vu/clients/mhotc/" poweredby=TRUE]' in your Page or Post


== Changelog ==

= 2.0.5 =
* Removed all traces of old domain name

= 2.0.4 =
* Made it easier to debug issues

= 2.0.3 =
* Added support for Wordpress 3.0 by including class-http.php file

= 2.0.2 =
* Added additional error check for 404 Not Found

= 2.0.1 =
* Was initiating jQuery wrong

= 2.0 =
* Now using built-in WP_Http

= 1.7.2 =
* fsockopen was throwing errors

= 1.7.1 =
* Compatibility tweaks

= 1.7 =
* Added compatibility up to 3.3.1
* Backup server changed

= 1.6.1 =
* Added compatibility up to 3.2.1

= 1.6 =
* Upgrading main server and dropping backup server capabilities

= 1.5.2 =
* Silly variable names, Trix are for kids!

= 1.5.1 =
* Missed removing debug code from production

= 1.5 =
* Added a redundancy server if main server is down

= 1.4.1 =
* Increased server down check to 30 seconds & removed email alert (was getting multiple alerts)

= 1.4 =
* Added check for server down (must take less than 5 seconds to get content); otherwise email is sent to me

= 1.3.1 =
* Didn't test 1.3 enough, apparently ;)

= 1.3 =
* Added fixed for open_basedir

= 1.2.1 =
* Added id tag to poweredby DIV

= 1.2 =
* Added support for fall-back methods: in order it will try 1) cURL 2) file_get_contents 3) iframe

= 1.0 =
* Initial Launch