=== WPSSO Place / Location and Local Business + SEO Meta for Pinterest, Facebook and Google ===
Plugin Name: WPSSO Place / Location and Local Business Meta (WPSSO PLM)
Plugin Slug: wpsso-plm
Text Domain: wpsso-plm
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Donate Link: https://wpsso.com/extend/plugins/wpsso-plm/?utm_source=wpssoplm-readme-donate
Assets URI: https://surniaulula.github.io/wpsso-plm/assets/
Tags: local, seo, place, location, address, venue, restaurant, longitude, latitude, business, local business, seasonal, hours, coordinates
Contributors: jsmoriss
Requires At Least: 3.8
Tested Up To: 4.7.2
Stable Tag: 2.2.7-1

WPSSO extension to provide Pinterest Place, Facebook / Open Graph Location, Schema Local Business + Local SEO meta tags.

== Description ==

<p><img src="https://surniaulula.github.io/wpsso-plm/assets/icon-256x256.png" width="256" height="256" style="width:33%;min-width:128px;max-width:256px;float:left;margin:0 40px 20px 0;" /><strong>Provides location / local business information for your website, business, and/or content.</strong></p>

<p><strong>Let Pinterest, Facebook and Google know about your locations</strong> &mdash; WPSSO PLM includes Pinterest Rich Pin / Schema <em>Place</em>, Facebook / Open Graph <em>Location</em>, and Google / Schema <em>Local Business</em> meta tags in your webpages.</p>

= How Do I Use It? =

The WPSSO PLM extension can be used in two different ways:

* To provide location information for the content of the current webpage.
* To provide location information for an Organization, which in turn is related to the content (for example, the content publisher). To assign location information to an Organization, you will also need to use the WPSSO ORG extension.

The Free version of WPSSO PLM can add location information to the main entity (aka the primary Schema type) of a *blog front page*. If you're using a *static front page*, or would like to include location information for the content of other posts / pages, you'll need the Pro version.

<blockquote>
<p><strong>Prerequisite</strong> &mdash; WPSSO Place / Location and Local Business Meta (WPSSO PLM) is an extension for the <a href="https://wordpress.org/plugins/wpsso/">WordPress Social Sharing Optimization (WPSSO)</a> plugin, which <em>automatically</em> creates complete and accurate meta tags and Schema markup for Social Sharing Optimization (SSO) and SEO.</p>
</blockquote>

= Quick List of Features =

**WPSSO PLM Free / Basic Features**

* Extends the features of either the Free or Pro versions of WPSSO.
* Select an Address for a Blog Front Page (added to the main entity of the blog front page).
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
* Combine WPSSO PLM with the [WPSSO Schema JSON-LD Markup (WPSSO JSON) Pro](https://wpsso.com/extend/plugins/wpsso-json/) extension to include complete Place and Local Business using Schema JSON-LD markup.

= Quick List of Features (Continued) =

**WPSSO PLM Pro / Power-User Features**

* Extends the features of WPSSO Pro (requires a licensed WPSSO Pro plugin).
* Add a custom "Place / Location" settings tab to Posts, Pages, and Custom Post Types.
* Allows the selection of an existing Address, or custom Address information, to include location information for the webpage content.

= Markup Examples =

* [Markup Example for a Restaurant](http://wpsso.com/codex/plugins/wpsso-schema-json-ld/notes/markup-examples/markup-example-for-a-restaurant/) using the WPSSO PLM extension to manage the Place / Location information (address, geo coordinates, business hours – daily and seasonal, restaurant menu URL, and accepts reservation values).

= Extends the WPSSO Plugin =

The WordPress Social Sharing Optimization (WPSSO) plugin is required to use the WPSSO PLM extension.

Use the Free version of WPSSO PLM with *both* the Free and Pro versions of WPSSO. The [WPSSO PLM Pro extension](https://wpsso.com/extend/plugins/wpsso-plm/?utm_source=wpssoplm-readme-extends) (along with all WPSSO Pro extensions) requires the [WPSSO Pro plugin](https://wpsso.com/extend/plugins/wpsso/?utm_source=wpssoplm-readme-extends) as well.

[Purchase the WPSSO Place / Location and Local Business Meta (WPSSO PLM) Pro extension](https://wpsso.com/extend/plugins/wpsso-plm/?utm_source=wpssoplm-readme-purchase) (includes a *No Risk 30 Day Refund Policy*).

== Installation ==

= Install and Uninstall =

* [Install the Plugin](https://wpsso.com/codex/plugins/wpsso-plm/installation/install-the-plugin/)
* [Uninstall the Plugin](https://wpsso.com/codex/plugins/wpsso-plm/installation/uninstall-the-plugin/)

== Frequently Asked Questions ==

= Frequently Asked Questions =

* None

== Other Notes ==

= Additional Documentation =

* None

== Screenshots ==

01. Place / Location settings page &mdash; manage a selection of addresses, geo location, business hours, the food establishment menu URL, and if reservation are accepted.
02. Place / Location tab in the Social Settings metabox on individual posts, pages, and custom post types &mdash; manage custom addresses, geo location, business hours, the food establishment menu URL, and if reservation are accepted.
03. Google's Structured Data Testing Tool &mdash; Results for an example Restaurant webpage showing the WPSSO PLM meta tags.

== Changelog ==

= Free / Basic Version Repository =

* [GitHub](https://surniaulula.github.io/wpsso-plm/)
* [WordPress.org](https://wordpress.org/plugins/wpsso-plm/developers/)

= Version Numbering Scheme =

Version components: `{major}.{minor}.{bugfix}-{stage}{level}`

* {major} = Major code changes / re-writes or significant feature changes.
* {minor} = New features / options were added or improved.
* {bugfix} = Bugfixes or minor improvements.
* {stage}{level} = dev &lt; a (alpha) &lt; b (beta) &lt; rc (release candidate) &lt; # (production).

Note that the production stage level can be incremented on occasion for simple text revisions and/or translation updates. See [PHP's version_compare()](http://php.net/manual/en/function.version-compare.php) documentation for additional information on "PHP-standardized" version numbering.

= Changelog / Release Notes =

**Version 2.2.8-rc1 (2017/02/22)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Minor update for WPSSO v3.40.0-1 compatibility:
		* Removed the $use_post argument from the 'wpsso_og_seed' filter.

**Version 2.2.7-1 (2017/02/19)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Minor update for WPSSO v3.39.9-1 compatibility:
		* Added a hook for the new 'wpsso_rename_md_options_keys' filter.

**Version 2.2.6-1 (2017/01/08)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Added a 'plugins_loaded' action hook to load the plugin text domain.

**Version 2.2.5-1 (2016/12/12)**

* *New Features*
	* None
* *Improvements*
	* Added a new "Order Action URL(s)" option.
* *Bugfixes*
	* None
* *Developer Notes*
	* Added a filter hook to include "Order Action URL(s)" in the main entity Schema markup.

**Version 2.2.4-1 (2016/11/25)**

* *New Features*
	* None
* *Improvements*
	* Added Schema itemprop meta tags for business telephone, currenciesAccepted, paymentAccepted, and priceRange.
	* Added Local Business options:
		* Business Telephone
* *Bugfixes*
	* None
* *Developer Notes*
	* Refactored the min_version_notice() method and moved variables to config class.
	* Refactored the show_metabox_banner() method for the Place / Location settings page.

**Version 2.2.3-1 (2016/11/12)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Minor code changes required for WPSSO v3.37.1-1.
		* Renamed the 'wpsso_schema_head_type' filter to 'wpsso_schema_type_id' for WPSSO v3.37.1-1.
		* Renamed the WpssoSchema get_schema_types() method to get_schema_types_array().

**Version 2.2.2-1 (2016/11/03)**

* *New Features*
	* None
* *Improvements*
	* Added an "Address Name" option to the custom settings metabox.
* *Bugfixes*
	* Fixed drop-down values allowing the adding of a "[New Address]".
* *Developer Notes*
	* Minor code changes required for WPSSO v3.37.0-1:
		* Renamed the SucomUtil after_key() method to get_after_key().
		* Renamed the 'wpsso_json_array_type_ids' filter to 'wpsso_json_array_schema_type_ids'.

**Version 2.2.1-1 (2016/10/22)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Minimum requirements updated to WP v3.5 and PHP v5.4.
	* Minor code changes required for WPSSO v3.36.3-1:
		* Renamed the Social Settings 'header' index name to 'text'.

**Version 2.2.0-1 (2016/10/15)**

* *New Features*
	* Added Local Business options:
		* Currencies Accepted
		* Payment Accepted
		* Price Range
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* None

== Upgrade Notice ==

= 2.2.8-rc1 =

(2017/02/22) Minor update for WPSSO v3.40.0-1 compatibility.

= 2.2.7-1 =

(2017/02/19) Minor update for WPSSO v3.39.9-1 compatibility.

= 2.2.6-1 =

(2017/01/08) Added a 'plugins_loaded' action hook to load the plugin text domain.

= 2.2.5-1 =

(2016/12/12) Added a new "Order Action URL(s)" option. Added a filter hook to include "Order Action URL(s)" in the main entity Schema markup.

= 2.2.4-1 =

(2016/11/25) Added Schema itemprop meta tags for business telephone, currenciesAccepted, paymentAccepted, and priceRange. Refactored the min_version_notice() and show_metabox_banner() methods.

