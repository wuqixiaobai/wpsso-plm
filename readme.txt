=== WPSSO Place and Location Meta - for Facebook "Location" and Pinterest "Place" ===
Plugin Name: WPSSO Place and Location Meta (WPSSO PLM)
Plugin Slug: wpsso-plm
Text Domain: wpsso-plm
Domain Path: /languages
Contributors: jsmoriss
Donate Link: https://wpsso.com/
Tags: wpsso, place, location, venue, longitude, latitude, address, local
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.txt
Requires At Least: 3.1
Tested Up To: 4.4.0
Stable Tag: 1.3.9

WPSSO extension to provide Facebook / Open Graph "Location" and Pinterest "Place" Rich Pin meta tags.

== Description ==

<p><img src="https://surniaulula.github.io/wpsso-plm/assets/icon-256x256.png" width="256" height="256" style="width:33%;min-width:128px;max-width:256px;float:left;margin:0 40px 20px 0;" /><strong>Do you have location specific webpages on your website</strong>, like contact information, store locations, e-commerce products, etc?</p>

WPSSO Place and Location Meta (WPSSO PLM) works in conjunction with the [WordPress Social Sharing Optimization (WPSSO)](https://wordpress.org/plugins/wpsso/) plugin, extending its features with additional settings pages, tabs, and options, to include Facebook / Open Graph *Location* and Pinterest *Place* Rich Pin meta tags in your webpages.

= Available in Multiple Languages =

* English (US)
* French (France)
* More to come...

= Quick List of Features =

**WPSSO PLM Free / Basic Features**

* Show the *Place / Location* tab on Posts, Pages, and custom post types (e-commerce Product pages, for example).
* Enter the latitude, longitude, and altitude of a location.
* Provides location meta tags for Facebook and other social websites.

**WPSSO PLM Pro / Power-User Features**

* Enter the street address, city, state / province, zip / postal code, and country of a Place / Location.
* Optionally share the webpage as a Pinterest *Place* Rich Pin (instead of an *Article*, *Product*, etc.).

= Place and Location Meta Tags =

* **Facebook / Open Graph *Location* Meta Tags**
	* place:location:latitude
	* place:location:longitude
	* place:location:altitude
* **Pinterest *Place* Rich Pin Meta Tags** (Pro version)
	* place:street_address
	* place:locality
	* place:region
	* place:postal_code
	* place:country_name
* **Schema Meta Tags** (Pro version)
	* address

= Uses the WPSSO Framework =

The WordPress Social Sharing Optimization (WPSSO) plugin is required to use the WPSSO PLM extension. You can use the Free version of WPSSO PLM with *both* the Free and Pro versions of WPSSO, but [WPSSO PLM Pro](http://wpsso.com/extend/plugins/wpsso-plm/) requires the use of the [WPSSO Pro](http://wpsso.com/extend/plugins/wpsso/) plugin as well. [Purchase the WPSSO PLM Pro extension](http://wpsso.com/extend/plugins/wpsso-plm/) (includes a *No Risk 30 Day Refund Policy*).

== Installation ==

= Install and Uninstall =

* [Install the Plugin](http://wpsso.com/codex/plugins/wpsso-plm/installation/install-the-plugin/)
* [Uninstall the Plugin](http://wpsso.com/codex/plugins/wpsso-plm/installation/uninstall-the-plugin/)

== Frequently Asked Questions ==

= Frequently Asked Questions =

== Other Notes ==

= Additional Documentation =

== Screenshots ==

01. The WPSSO PLM Settings Page
02. The Place and Location Tab

== Changelog ==

= Free / Basic Version Repository =

* [GitHub](https://github.com/SurniaUlula/wpsso-plm)
* [WordPress.org](https://wordpress.org/plugins/wpsso-plm/developers/)

= Version 1.3.9 (2015/12/06) =

Official announcement: N/A

* **New Features**
	* *None*
* **Improvements**
	* *None*
* **Bugfixes**
	* *None*
* **Developer Notes**
	* Moved the default enable/disable meta tag option keys into the main WPSSO config.

= Version 1.3.8 (2015/10/12) =

Official announcement: N/A

* **New Features**
	* Added a French language (fr_FR) translation.
* **Improvements**
	* Minor improvements to title / option text strings and contextual help messages.
	* Added the og:latitude, og:longitude, and og:altitude meta tags (same as the corresponding place:location meta tags).
* **Bugfixes**
	* Renamed the 'doctype_prefix_ns' filter hook to 'og_prefix_ns'.
	* Renamed the 'doctype_schema_type' filter hook to 'schema_item_type'.
* **Developer Notes**
	* *None*

== Upgrade Notice ==

= 1.3.9 =

2015/12/06 Moved the default enable/disable meta tag option keys into the main WPSSO config.

