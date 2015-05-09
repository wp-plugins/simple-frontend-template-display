=== Simple Frontend Template Display ===
Contributors: mikeselander
Donate link: http://mikeselander.com
Tags: template name, admin bar, front end display, page template, development, view, page, toolbar
Requires at least: 3.4
Tested up to: 4.2.2
Stable tag: 0.3.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds an admin toolbar menu item that displays the current page template.

== Description ==

Simple Frontend Template Display will show the name of the template that you’re using in the toolbar when you’re in the frontend of your website. You can use this to keep track of the various templates you’re using without having to hop into the edit screen every time you want to check a template.

All you have to do to get this working is to install the plugin. It will then automatically show up in the toolbar on all pages on your site. 

== Installation ==

1. Upload `Simple Frontend Template Display` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Magic! On your pages, the name of the template will show on the toolbar on the fronted

== Frequently Asked Questions ==

= What do I have to do to get this working? =

Install the plugin!

It’s super easy and requires almost no work on your part. It will simply start showing up once you have it all installed.

== Upgrade Notice ==

= 0.3.1 =
Fixed Strict PHP standards error concerning line 184
Tested up to 4.0

= 0.3.0 =
Adds drop down items to show pages with the same page template (up to 15) and a banner to the landing page

= 0.2.0 =
Adds a drop down item to show the page template filename & improves several methods

= 0.1.0 =
Initial Release

== Changelog ==

= 0.3.0 =
* Added get_similar_pages function to retrieve pages with the same template

= 0.2.0 =
* Added a drop down with the filename so you can see all of the template data
* Changed add_menu method to the preferred add_node
* Split up the filename and template name functions to allow for the separate dropdown
* Fixed several typographical & commenting errors

= 0.1.0 =
* Initial release