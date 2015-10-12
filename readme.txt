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
Tested Up To: 4.3.1
Stable Tag: 1.3.8

WPSSO extension to provide Facebook / Open Graph "Location" and Pinterest "Place" Rich Pin meta tags.

== Description ==

<p><img src="https://surniaulula.github.io/wpsso-plm/assets/icon-256x256.png" width="256" height="256" style="width:33%;min-width:128px;max-width:256px;float:left;margin:0 40px 20px 0;" /><strong>Do you have <em>location specific</em> webpages on your website</strong>, like contact information, store locations, e-commerce products, etc?</p>

WPSSO Place and Location Meta (WPSSO PLM) works in conjunction with the [WordPress Social Sharing Optimization (WPSSO)](https://wordpress.org/plugins/wpsso/) plugin, extending its features with additional settings pages, tabs, and options, to include Facebook / Open Graph *Location* and Pinterest *Place* Rich Pin meta tags in your webpages.

= Quick List of Features =

**Free / Basic Features**

* Show the *Place / Location* tab on Posts, Pages, and custom post types (e-commerce Product pages, for example).
* Enter the latitude, longitude, and altitude of a location.
* Provides location meta tags for Facebook and other social websites.

**Pro / Power-User Features**

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

= WPSSO Plugin Required =

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

= Version 1.3.8 2015/10/12 =

* **New Features**
	* Added a French language (fr_FR) translation.
* **Improvements**
	* Minor improvements to title / option text strings and contextual help messages.
	* Added the og:latitude, og:longitude, and og:altitude meta tags (same as the corresponding place:location meta tags).
* **Bugfixes**
	* *None*
* **Developer Notes**
	* *None*

= Version 1.3.7 2015/10/06 =

* **New Features**
	* *None*
* **Improvements**
	* Added translation function calls to all option labels and popup help messages.
	* Updated the text domain in preparation for plugin import to translate.wordpress.org.
* **Bugfixes**
	* *None*
* **Developer Notes**
	* Added a POT (Portable Object Template) file with translation strings in languages/wpsso-plm.pot.

= Version 1.3.6 2015/09/19 =

* **New Features**
	* *None*
* **Improvements**
	* *None*
* **Bugfixes**
	* *None*
* **Developer Notes**
	* Added a self-deactivation feature when WPSSO PLM is activated and WPSSO is missing. 

= Version 1.3.5 2015/09/09 =

* **New Features**
	* *None*
* **Improvements**
	* *None*
* **Bugfixes**
	* *None*
* **Developer Notes**
	* Added a WpssoPlmRegister class with `WpssoUtil::save_time()` calls during activation to save install / activation / update timestamps.

= Version 1.3.4 2015/09/03 =

* **New Features**
	* *None*
* **Improvements**
	* *None*
* **Bugfixes**
	* *None*
* **Developer Notes**
	* Updated the tooltip message filter names for WPSSO v3.8.
	* Removed the WPSSO PLM specific 'installed_version' filter.

= Version 1.3.3 2015/08/04 =

* **New Features**
	* *None*
* **Improvements**
	* Confirmed WordPress v4.2.4 compatibility.
	* Renamed the deprecated SucomUtil `th()` method to `get_th()`.
* **Bugfixes**
	* *None*
* **Developer Notes**
	* *None*

= Version 1.3.2 =

* **New Features**
	* *None*
* **Improvements**
	* Renamed the 'postmeta' filter hooks to 'post' for compatibility with WPSSO v3.3.
* **Bugfixes**
	* *None*
* **Developer Notes**
	* *None*

= Version 1.3.1 2015/04/21 =

* **New Features**
	* *None*
* **Improvements**
	* Replaced self-deactivation by a warning notice if the WPSSO plugin is not found.
* **Bugfixes**
	* *None*

= Version 1.3 2015/04/12 =

* **New Features**
	* *None*
* **Improvements**
	* Moved the minimum version checks to a new `WpssoAm::min_version_warning()` method.
	* Refactored code for the new "WPSSO Pro Update Manager (WPSSO UM)" *Free* extension plugin.
* **Bugfixes**
	* *None*

== Upgrade Notice ==

= 1.3.8 =

2015/10/12 Added a French language (fr_FR) translation. Minor improvements to title / option text strings and contextual help messages.

= 1.3.7 =

2015/10/06 Added translation function calls to all option labels and popup help messages. Added POT (Portable Object Template) file with translation strings in languages/wpsso-plm.pot.

