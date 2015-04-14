=== WPSSO Place and Location Meta - for Facebook "Location" and Pinterest "Place" ===
Contributors: jsmoriss
Donate Link: https://surniaulula.com/extend/plugins/wpsso-plm/
Tags: wpsso, place, location, venue, longitude, latitude, address, local
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.txt
Requires At Least: 3.0
Tested Up To: 4.1.1
Stable Tag: 1.3

WPSSO extension to provide Facebook / Open Graph "Location" and Pinterest "Place" Rich Pin meta tags.

== Description ==

<p><img src="https://surniaulula.github.io/wpsso-plm/assets/icon-256x256.png" width="256" height="256" style="width:33%;min-width:128px;max-width:256px;float:left;margin:0 40px 20px 0;" /><strong>Do you have <em>location specific</em> webpages on your website</strong>, like contact information, store locations, e-commerce products, etc?</p>

<p>WPSSO Place and Location Meta (WPSSO PLM) works in conjunction with the <a href="https://wordpress.org/plugins/wpsso/">WordPress Social Sharing Optimization (WPSSO)</a> plugin, extending its features with additional settings pages, tabs, and options, to include Facebook / Open Graph <em>Location</em> and Pinterest <em>Place</em> Rich Pin meta tags in your webpages. WPSSO PLM is <em>fast</em>, <em>efficient</em>, and &mdash; using WPSSO as its framework &mdash; provides <em>accurate</em> information about your content to social websites.</p>

<p>You can download the <a href="https://wordpress.org/plugins/wpsso-plm/">Free version of WPSSO PLM on wordpress.org</a> and <a href="(http://surniaulula.com/extend/plugins/wpsso-plm/">purchase Pro license(s) on surniaulula.com</a> (includes a <strong>No Risk 30 Day Refund Policy</strong>). The Facebook / Open Graph <em>Location</em> meta tags are available in the Free version, and the Pinterest <em>Place</em> Rich Pin meta tags are provided with the Pro version.</p>

= Quick List of Features =

**Free / Basic Version**

* Show the *Place and Location* tab on Posts, Pages, and custom post types.
* Enter the latitude, longitude, and altitude of a location.
* Provides location meta tags for Facebook and other social websites.

**Pro / Power-User Version**

* **No Risk 30 Day Refund Policy**
* Enter the street address, city, state / province, zip / postal code, and country of a place / location.
* Optionally share a webpage as a Pinterest *Place* Rich Pin (instead of an *Article*, *Product*, etc.).

= App Meta Tags =

<ul>
<li><strong>Facebook / Open Graph <em>Location</em> Meta Tags</strong> (Free version)
	<ul>
	<li>place:location:latitude</li>
	<li>place:location:longitude</li>
	<li>place:location:altitude</li>
	</ul>
</li>
<li><strong>Pinterest <em>Place</em> Rich Pin Meta Tags</strong> (Pro version)
	<ul>
	<li>place:street_address</li>
	<li>place:locality</li>
	<li>place:region</li>
	<li>place:postal_code</li>
	<li>place:country_name</li>
	</ul>
</li>
<li><strong>Schema Meta Tags</strong> (Pro version)
	<ul>
        <li>address</li>
	</ul>
</li>
</ul>

<blockquote>
<p><a href="https://wordpress.org/plugins/wpsso/">WordPress Social Sharing Optimization</a> plugin is required to use the WPSSO PLM extension. You can use the <em>Free version</em> of WPSSO PLM with either WPSSO Free or Pro, but the <a href="http://surniaulula.com/extend/plugins/wpsso-plm/">WPSSO PLM Pro version</a> requires the use of <a href="http://surniaulula.com/extend/plugins/wpsso/">WPSSO Pro</a></strong> as well.</p>
</blockquote>

== Installation ==

= Install and Uninstall =

<ul>
	<li><a href="http://surniaulula.com/codex/plugins/wpsso-plm/installation/install-the-plugin/">Install the Plugin</a></li>
	<li><a href="http://surniaulula.com/codex/plugins/wpsso-plm/installation/uninstall-the-plugin/">Uninstall the Plugin</a></li>
</ul>

== Frequently Asked Questions ==

= Frequently Asked Questions =

== Other Notes ==

= Additional Documentation =

== Screenshots ==

01. The WPSSO PLM Settings Page
02. The Place and Location Tab

== Changelog ==

= Free / Basic Version Repository =

* GitHub: https://github.com/SurniaUlula/wpsso-plm
* WordPress.org: https://wordpress.org/plugins/wpsso-plm/developers/

= Version 1.3 (2015/04/12) =

* **New Features**
	* *None*
* **Improvements**
	* Moved the minimum version checks to a new `WpssoAm::min_version_warning()` method.
	* Refactored code for the new "WPSSO Pro Update Manager (WPSSO UM)" *Free* extension plugin.
* **Bugfixes**
	* *None*

= Version 1.2 (2015/04/02) =

* **Bugfixes**
	* *None*
* **Improvements**
	* Renamed the main library file from "place" to "filters".
	* Renamed the settings library files from "place" to "plm-general".
* **New Features**
	* *None*

== Upgrade Notice ==

= 1.3 =

Refactored code for the new "WPSSO Pro Update Manager (WPSSO UM)" Free extension plugin.

= 1.2 =

Renamed the settings and main library files.

