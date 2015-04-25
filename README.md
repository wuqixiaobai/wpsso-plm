<h1>WPSSO Place and Location Meta</h1><h3>for Facebook &quot;Location&quot; and Pinterest &quot;Place&quot;</h3>

<table>
<tr><th align="right" valign="top" nowrap>Contributors</th><td>jsmoriss</td></tr>
<tr><th align="right" valign="top" nowrap>Donate Link</th><td><a href="https://surniaulula.com/extend/plugins/wpsso-plm/">https://surniaulula.com/extend/plugins/wpsso-plm/</a></td></tr>
<tr><th align="right" valign="top" nowrap>Tags</th><td>wpsso, place, location, venue, longitude, latitude, address, local</td></tr>
<tr><th align="right" valign="top" nowrap>License</th><td>GPLv3</td></tr>
<tr><th align="right" valign="top" nowrap>License URI</th><td><a href="http://www.gnu.org/licenses/gpl.txt">http://www.gnu.org/licenses/gpl.txt</a></td></tr>
<tr><th align="right" valign="top" nowrap>Requires At Least</th><td>3.0</td></tr>
<tr><th align="right" valign="top" nowrap>Tested Up To</th><td>4.2</td></tr>
<tr><th align="right" valign="top" nowrap>Stable Tag</th><td>1.3.1</td></tr>
</table>

<p>WPSSO extension to provide Facebook / Open Graph &quot;Location&quot; and Pinterest &quot;Place&quot; Rich Pin meta tags.</p>

<h3>Description</p>

<p><img src="https://surniaulula.github.io/wpsso-plm/assets/icon-256x256.png" width="256" height="256" style="width:33%;min-width:128px;max-width:256px;float:left;margin:0 40px 20px 0;" /><strong>Do you have <em>location specific</em> webpages on your website</strong>, like contact information, store locations, e-commerce products, etc?</p>

<p>WPSSO Place and Location Meta (WPSSO PLM) works in conjunction with the <a href="https://wordpress.org/plugins/wpsso/">WordPress Social Sharing Optimization (WPSSO)</a> plugin, extending its features with additional settings pages, tabs, and options, to include Facebook / Open Graph <em>Location</em> and Pinterest <em>Place</em> Rich Pin meta tags in your webpages. WPSSO PLM is <em>fast</em>, <em>efficient</em>, and &mdash; using WPSSO as its framework &mdash; provides <em>accurate</em> information about your content to social websites.</p>

<p>You can download the <a href="https://wordpress.org/plugins/wpsso-plm/">Free version of WPSSO PLM on wordpress.org</a> and <a href="(http://surniaulula.com/extend/plugins/wpsso-plm/">purchase Pro license(s) on surniaulula.com</a> (includes a <strong>No Risk 30 Day Refund Policy</strong>). The Facebook / Open Graph <em>Location</em> meta tags are available in the Free version, and the Pinterest <em>Place</em> Rich Pin meta tags are provided with the Pro version.</p>

<h4>Quick List of Features</h4>

<p><strong>Free / Basic Version</strong></p>

<ul>
<li>Show the <em>Place and Location</em> tab on Posts, Pages, and custom post types.</li>
<li>Enter the latitude, longitude, and altitude of a location.</li>
<li>Provides location meta tags for Facebook and other social websites.</li>
</ul>

<p><strong>Pro / Power-User Version</strong></p>

<ul>
<li><strong>No Risk 30 Day Refund Policy</strong></li>
<li>Enter the street address, city, state / province, zip / postal code, and country of a place / location.</li>
<li>Optionally share a webpage as a Pinterest <em>Place</em> Rich Pin (instead of an <em>Article</em>, <em>Product</em>, etc.).</li>
</ul>

<h4>App Meta Tags</h4>

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
<h3>Installation</p>

<h4>Install and Uninstall</h4>

<ul>
    <li><a href="http://surniaulula.com/codex/plugins/wpsso-plm/installation/install-the-plugin/">Install the Plugin</a></li>
    <li><a href="http://surniaulula.com/codex/plugins/wpsso-plm/installation/uninstall-the-plugin/">Uninstall the Plugin</a></li>
</ul>
<h3>Frequently Asked Questions</h3>

<h4>Frequently Asked Questions</h4>
<h3>Other Notes</h3>

<h3>Other Notes</h3>
<h4>Additional Documentation</h4><h3>Changelog</h3>

<h4>Free / Basic Version Repository</h4>

<ul>
<li><a href="https://github.com/SurniaUlula/wpsso-plm">GitHub</a></li>
<li><a href="https://wordpress.org/plugins/wpsso-plm/developers/">WordPress.org</a></li>
</ul>

<h4>Version 1.3.1 (2015/04/21)</h4>

<ul>
<li><strong>New Features</strong>

<ul>
<li><em>None</em></li>
</ul></li>
<li><strong>Improvements</strong>

<ul>
<li>Replaced self-deactivation by a warning notice if the WPSSO plugin is not found.</li>
</ul></li>
<li><strong>Bugfixes</strong>

<ul>
<li><em>None</em></li>
</ul></li>
</ul>

<h4>Version 1.3 (2015/04/12)</h4>

<ul>
<li><strong>New Features</strong>

<ul>
<li><em>None</em></li>
</ul></li>
<li><strong>Improvements</strong>

<ul>
<li>Moved the minimum version checks to a new <code>WpssoAm::min_version_warning()</code> method.</li>
<li>Refactored code for the new "WPSSO Pro Update Manager (WPSSO UM)" <em>Free</em> extension plugin.</li>
</ul></li>
<li><strong>Bugfixes</strong>

<ul>
<li><em>None</em></li>
</ul></li>
</ul>

<h4>Version 1.2 (2015/04/02)</h4>

<ul>
<li><strong>Bugfixes</strong>

<ul>
<li><em>None</em></li>
</ul></li>
<li><strong>Improvements</strong>

<ul>
<li>Renamed the main library file from "place" to "filters".</li>
<li>Renamed the settings library files from "place" to "plm-general".</li>
</ul></li>
<li><strong>New Features</strong>

<ul>
<li><em>None</em></li>
</ul></li>
</ul>
<h3>Upgrade Notice</h3>

<h4>1.3.1</h4>
<p>Replaced self-deactivation by a warning notice if the WPSSO plugin is not found.</p>

<h4>1.3</h4>
<p>Refactored code for the new &quot;WPSSO Pro Update Manager (WPSSO UM)&quot; Free extension plugin.</p>

<h4>1.2</h4>
<p>Renamed the settings and main library files.</p>

