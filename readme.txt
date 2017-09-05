=== WPSSO Place / Location and Local Business Meta for Pinterest, Facebook, Google, and SEO ===
Plugin Name: WPSSO Place / Location and Local Business Meta
Plugin Slug: wpsso-plm
Text Domain: wpsso-plm
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://surniaulula.github.io/wpsso-plm/assets/
Tags: local seo, local business, knowledge graph, location, place, address, venue, restaurant, business hours, telephone, coordinates, meta tags
Contributors: jsmoriss
Requires At Least: 3.7
Tested Up To: 4.8.1
Requires PHP: 5.3
Stable Tag: 2.3.2

WPSSO extension to provide Pinterest Place, Facebook / Open Graph Location, Schema Local Business, and Local SEO meta tags.

== Description ==

<img class="readme-icon" src="https://surniaulula.github.io/wpsso-plm/assets/icon-256x256.png">

<p><strong>Provides location / local business information for your website, business, and/or content.</strong></p>

<p><strong>Let Pinterest, Facebook and Google know about your locations</strong> &mdash; WPSSO PLM includes Pinterest Rich Pin / Schema <em>Place</em>, Facebook / Open Graph <em>Location</em>, and Google / Schema <em>Local Business</em> meta tags in your webpages.</p>

= How Do I Use It? =

The WPSSO PLM extension can be used in two different ways:

* To provide location information for the content of the current webpage.
* To provide location information for an Organization, which in turn is related to the content (for example, the content publisher). To assign location information to an Organization, you will also need to use the WPSSO ORG extension.

The Free version of WPSSO PLM can add location information to the main entity (aka the primary Schema type) of a *blog front page*. If you're using a *static front page*, or would like to include location information for the content of other posts / pages, you'll need the Pro version.

<blockquote>
<p><strong>Prerequisite</strong> &mdash; WPSSO Place / Location and Local Business Meta is an extension for the <a href="https://wordpress.org/plugins/wpsso/">WPSSO core plugin</a>, which <em>automatically</em> generates complete and accurate meta tags and Schema markup from your content for social media optimization (SMO) and SEO.</p>

<ul>
<li>The WPSSO PLM Free extension works with either the WPSSO Free or Pro core plugin.</li>
<li>The <a href="https://wpsso.com/extend/plugins/wpsso-plm/?utm_source=wpssoplm-readme-prereq">WPSSO PLM Pro extension</a> uses many WPSSO Pro core plugin features and requires the <a href="https://wpsso.com/extend/plugins/wpsso/?utm_source=wpssoplm-readme-prereq">WPSSO Pro core plugin</a>.</li>
<ul>
</blockquote>

= Quick List of Features =

**WPSSO PLM Free / Standard Features**

* Extends the features of WPSSO Free or Pro.
* Select a Address for a Blog Front Page.
* Manage Multiple Addresses / Contact Information:
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
		* Altitude
	* Schema Local Business
		* Local Business Type
		* Business Location Image ID
		* or Business Location Image URL
		* Business Telephone
		* Business Days + Hours
		* Business Dates (Season)
		* Service Radius
		* Currencies Accepted
		* Payment Accepted
		* Price Range
		* Accepts Reservations
		* Food Menu URL
		* Order Action URL(s)
* Combine WPSSO PLM with the [WPSSO Schema JSON-LD Markup Pro](https://wpsso.com/extend/plugins/wpsso-json/) extension to include complete Place and Local Business using Schema JSON-LD markup.

= Quick List of Features (Continued) =

**WPSSO PLM Pro / Additional Features**

* Extends the features of WPSSO Pro (requires a licensed WPSSO Pro plugin).
* Add a custom "Place / Location" settings tab to Posts, Pages, and Custom Post Types.
* Allows the selection of an existing Address, or custom Address information, to include location information for the webpage content.

= Markup Examples =

* [Markup Example for a Restaurant](http://wpsso.com/docs/plugins/wpsso-schema-json-ld/notes/markup-examples/markup-example-for-a-restaurant/) using the WPSSO PLM extension to manage the Place / Location information (address, geo coordinates, business hours – daily and seasonal, restaurant menu URL, and accepts reservation values).

= Extends the WPSSO Plugin =

<ul>
<li>The WPSSO PLM Free extension works with either the WPSSO Free or Pro core plugin.</li>
<li>The <a href="https://wpsso.com/extend/plugins/wpsso-plm/?utm_source=wpssoplm-readme-extends">WPSSO PLM Pro extension</a> uses many WPSSO Pro core plugin features and requires the <a href="https://wpsso.com/extend/plugins/wpsso/?utm_source=wpssoplm-readme-extends">WPSSO Pro core plugin</a>.</li>
</ul>

[Purchase the WPSSO Place / Location and Local Business Meta Pro extension here](https://wpsso.com/extend/plugins/wpsso-plm/?utm_source=wpssoplm-readme-purchase) (all purchases include a *No Risk 30 Day Refund Policy*).

== Installation ==

= Install and Uninstall =

* [Install the WPSSO PLM Plugin (Free and Pro version)](https://wpsso.com/docs/plugins/wpsso-plm/installation/install-the-plugin/)
* [Uninstall the WPSSO PLM Plugin](https://wpsso.com/docs/plugins/wpsso-plm/installation/uninstall-the-plugin/)

== Frequently Asked Questions ==

= Frequently Asked Questions =

* None

== Other Notes ==

= Additional Documentation =

* None

== Screenshots ==

01. WPSSO PLM settings page includes options to manage addresses, geo location, business hours, service radius, price range, menu URL, and many more.
02. WPSSO PLM tab in the Social Settings metabox provides options to manage custom addresses, geo location, business hours, service radius, price range, menu URL, and many more (Pro version).
03. WPSSO PLM meta tag example for the Schema type https://schema.org/Restaurant in Google's Structured Data Testing Tool.

== Changelog ==

= Free / Basic Version Repository =

* [GitHub](https://surniaulula.github.io/wpsso-plm/)
* [WordPress.org](https://wordpress.org/plugins/wpsso-plm/developers/)

= Version Numbering =

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes / re-writes or incompatible API changes.
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

= Changelog / Release Notes =

**Version 2.3.3-dev.1 (2017/09/05)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Renamed the following filters for WPSSO v3.45.10 and added a 3rd argument for the metabox id:
		* 'wpsso_post_social_settings_tabs' to 'wpsso_post_custom_meta_tabs'.

**Version 2.3.2 (2017/09/03)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Renamed the SucomForm get_image_upload_input() method to get_input_image_upload().
	* Renamed the SucomForm get_image_url_input() method to get_input_image_url().

**Version 2.3.1 (2017/06/21)**

* *New Features*
	* None
* *Improvements*
	* Added a check for the "Business Location Image ID" image size.
* *Bugfixes*
	* None
* *Developer Notes*
	* None

**Version 2.3.0 (2017/05/14)**

* *New Features*
	* Added two new options in the Place / Location settings page:
		* Business Location Image ID
		* or Business Location Image URL
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* None

**Version 2.2.14 (2017/04/30)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Code refactoring to rename the $is_avail array to $avail for WPSSO v3.42.0.

**Version 2.2.13 (2017/04/16)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Refactored the plugin init filters and moved/renamed the registration boolean from `is_avail[$name]` to `is_avail['p_ext'][$name]`.

**Version 2.2.12 (2017/04/08)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Minor revision to move URLs in the extension config to the main WPSSO core plugin config.
	* Dropped the package number from the production version string.

**Version 2.2.11-1 (2017/04/05)**

* *New Features*
	* None
* *Improvements*
	* Updated the plugin icon images and the documentation URLs.
* *Bugfixes*
	* None
* *Developer Notes*
	* None

**Version 2.2.10-1 (2017/03/25)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Updated the latitude and longitude values tests to allow for 0.
	* Renamed the 'plm_addr_business_phone' option key to 'plm_addr_phone'.

== Upgrade Notice ==

= 2.3.3-dev.1 =

(2017/09/05) Code refactoring to renamed filters for WPSSO v3.45.10.

= 2.3.2 =

(2017/09/03) Renamed some SucomForm methods for WPSSO v3.45.8.

= 2.3.1 =

(2017/06/21) Added a check for the "Business Location Image ID" image size.

= 2.3.0 =

(2017/05/14) Added two new options in the Place / Location settings page.

= 2.2.14 =

(2017/04/30) Code refactoring to rename the $is_avail array to $avail for WPSSO v3.42.0.

= 2.2.13 =

(2017/04/16) Refactored the plugin init filters and moved/renamed the registration boolean.

= 2.2.12 =

(2017/04/08) Minor revision to move URLs in the extension config to the main WPSSO core plugin config.

= 2.2.11-1 =

(2017/04/05) Updated the plugin icon images and the documentation URLs.

= 2.2.10-1 =

(2017/03/25) Updated the latitude and longitude values tests to allow for 0.

