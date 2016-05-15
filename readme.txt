=== WPSSO Place / Location and Local Business + SEO Meta for Pinterest, Facebook and Google ===
Plugin Name: WPSSO Place / Location and Local Business Meta (WPSSO PLM)
Plugin Slug: wpsso-plm
Text Domain: wpsso-plm
Domain Path: /languages
Contributors: jsmoriss
Donate Link: https://wpsso.com/
Tags: wpsso, place, location, venue, longitude, latitude, address, local, business, hours, seo
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.txt
Requires At Least: 3.1
Tested Up To: 4.5.2
Stable Tag: 2.0.1-1

WPSSO extension to provide Pinterest Place, Facebook / Open Graph Location, Schema Local Business + Local SEO meta tags.

== Description ==

<p><img src="https://surniaulula.github.io/wpsso-plm/assets/icon-256x256.png" width="256" height="256" style="width:33%;min-width:128px;max-width:256px;float:left;margin:0 40px 20px 0;" /><strong>Could your website or business use location information, like geo coordinates, store location / street address, business hours (daily and seasonal), and/or restaurant menu URL?</strong> Let Pinterest, Facebook, Google and other search engines know by using this plugin.</p>

WPSSO Place / Location and Local Business Meta (WPSSO PLM) works in conjunction with the [WordPress Social Sharing Optimization (WPSSO)](https://wordpress.org/plugins/wpsso/) plugin, extending its features with additional settings pages, tabs, and options, to include Facebook / Open Graph *Location* and Pinterest Rich Pin / Schema *Place* meta tags in your webpages.

= Available in Multiple Languages =

* English (US)
* French (France)
* More to come...

= Quick List of Features =

**WPSSO PLM Free / Basic Features**

* Select an Address for a Non-static Homepage
* Manage Multiple Addresses / Contact Information
	* Pinterest Rich Pin / Schema Place
		* Street Address
		* P.O. Box Number
		* City
		* State / Province
		* Zip / Postal Code
		* Country
	* Facebook / Open Graph Location
		* Latitude
		* Longitude
		* Altitude in Meters
	* Schema Local Business
		* Local Business Type
		* Business Days and Hours
		* Seasonal Business Dates
		* Food Establishment Menu URL
		* Accepts Reservations
* Combine WPSSO PLM with the [WPSSO Schema JSON-LD (WPSSO JSON) Pro](http://wpsso.com/extend/plugins/wpsso-json/) extension to include complete Place and Local Business using Schema JSON-LD markup.

**WPSSO PLM Pro / Power-User Features**

* Add a custom "Place / Location" settings tab to Posts, Pages, and Custom Post Types. Allows the selection of an existing Address, or entering custom Address information.

= Extends the WPSSO Social Plugin =

The WordPress Social Sharing Optimization (WPSSO) plugin is required to use the WPSSO PLM extension.

You can use the Free version of WPSSO PLM with *both* the Free and Pro versions of WPSSO, but the [WPSSO PLM Pro](http://wpsso.com/extend/plugins/wpsso-plm/) version requires the use of the [WPSSO Pro](http://wpsso.com/extend/plugins/wpsso/) version as well.

Purchase the [WPSSO Place / Location and Local Business Meta (WPSSO PLM) Pro](http://wpsso.com/extend/plugins/wpsso-plm/) extension (includes a *No Risk 30 Day Refund Policy*).

= Example Meta Tags and Markup =

* Example WPSSO PLM meta tags for a Restaurant (Local Business). The image and video ("application/x-shockwave-flash" and "text/html" embed) meta tags have been excluded for brevety. ;-)

`
<head itemscope itemtype="http://schema.org/Restaurant">
    <meta property="og:type" content="place"/>
    <meta property="og:latitude" content="10"/>
    <meta property="og:longitude" content="-10"/>

    <meta property="place:street_address" content="123 A Road"/>
    <meta property="place:locality" content="Cityname"/>
    <meta property="place:region" content="Somestate"/>
    <meta property="place:postal_code" content="123456"/>
    <meta property="place:country_name" content="US"/>
    <meta property="place:location:latitude" content="10"/>
    <meta property="place:location:longitude" content="-10"/>

    <noscript itemprop="openingHoursSpecification" itemscope itemtype="https://schema.org/OpeningHoursSpecification">
    	<meta itemprop="dayofweek" content="saturday"/>
    	<meta itemprop="opens" content="12:00"/>
    	<meta itemprop="closes" content="22:00"/>
    	<meta itemprop="validfrom" content="2016-05-01"/>
    	<meta itemprop="validthrough" content="2016-09-01"/>
    </noscript>

    <meta itemprop="menu" content="http://restaurant.example.com/restaurant-menu.html"/>
    <meta itemprop="acceptsreservations" content="true"/>
</head>
`

== Installation ==

= Install and Uninstall =

* [Install the Plugin](http://wpsso.com/codex/plugins/wpsso-plm/installation/install-the-plugin/)
* [Uninstall the Plugin](http://wpsso.com/codex/plugins/wpsso-plm/installation/uninstall-the-plugin/)

== Frequently Asked Questions ==

= Frequently Asked Questions =

* None

== Other Notes ==

= Additional Documentation =

* None

== Screenshots ==

01. The WPSSO PLM settings page &mdash; manage a selection of addresses, geo location, business hours, the food establishment menu URL, and if reservation are accepted.
02. The Place / Location tab in the Social Settings metabox on individual posts, pages, and custom post types &mdash; manage custom addresses, geo location, business hours, the food establishment menu URL, and if reservation are accepted.
03. Google's Structured Data Testing Tool &mdash; Results for an example Restaurant webpage showing the WPSSO PLM meta tags.

== Changelog ==

= Free / Basic Version Repository =

* [GitHub](https://github.com/SurniaUlula/wpsso-plm)
* [WordPress.org](https://wordpress.org/plugins/wpsso-plm/developers/)

= Changelog / Release Notes =

**Version 2.0.1-1 (2016/05/14)**

Official announcement: N/A

* *New Features*
	* None
* *Improvements*
	* Categorized the display of Free / Pro features in the sidebar metabox.
* *Bugfixes*
	* None
* *Developer Notes*
	* None

== Upgrade Notice ==

= 2.0.1-1 =

(2016/05/14) Categorized the display of Free / Pro features in the sidebar metabox.

