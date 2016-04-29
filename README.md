<h1>WPSSO Place / Location and Local Business Meta for Pinterest, Facebook, and Google</h1>

<table>
<tr><th align="right" valign="top" nowrap>Plugin Name</th><td>WPSSO Place / Location and Local Business Meta (WPSSO PLM)</td></tr>
<tr><th align="right" valign="top" nowrap>Summary</th><td>WPSSO extension to provide Pinterest Place, Facebook / Open Graph Location, and Google / Schema Local Business meta tags.</td></tr>
<tr><th align="right" valign="top" nowrap>Stable Version</th><td>2.0.0-1</td></tr>
<tr><th align="right" valign="top" nowrap>Requires At Least</th><td>WordPress 3.1</td></tr>
<tr><th align="right" valign="top" nowrap>Tested Up To</th><td>WordPress 4.5</td></tr>
<tr><th align="right" valign="top" nowrap>Contributors</th><td>jsmoriss</td></tr>
<tr><th align="right" valign="top" nowrap>Website URL</th><td><a href="https://wpsso.com/">https://wpsso.com/</a></td></tr>
<tr><th align="right" valign="top" nowrap>License</th><td><a href="http://www.gnu.org/licenses/gpl.txt">GPLv3</a></td></tr>
<tr><th align="right" valign="top" nowrap>Tags / Keywords</th><td>wpsso, place, location, venue, longitude, latitude, address, local, business, hours</td></tr>
</table>

<h2>Description</h2>

<p align="center"><img src="https://surniaulula.github.io/wpsso-plm/assets/icon-256x256.png" width="256" height="256" /></p><p><strong>Do you have location specific webpages on your website</strong>, like contact information, store locations, e-commerce products, etc?</p>

<p>WPSSO Place / Location and Local Business Meta (WPSSO PLM) works in conjunction with the <a href="https://wordpress.org/plugins/wpsso/">WordPress Social Sharing Optimization (WPSSO)</a> plugin, extending its features with additional settings pages, tabs, and options, to include Facebook / Open Graph <em>Location</em> and Pinterest Rich Pin / Schema <em>Place</em> meta tags in your webpages.</p>

<h4>Available in Multiple Languages</h4>

<ul>
<li>English (US)</li>
<li>French (France)</li>
<li>More to come...</li>
</ul>

<h4>Quick List of Features</h4>

<p><strong>WPSSO PLM Free / Basic Features</strong></p>

<ul>
<li>Select an Address for a Non-static Homepage</li>
<li>Manage Multiple Addresses / Contact Information

<ul>
<li>Pinterest Rich Pin / Schema Place

<ul>
<li>Street Address</li>
<li>P.O. Box Number</li>
<li>City</li>
<li>State / Province</li>
<li>Zip / Postal Code</li>
<li>Country</li>
</ul></li>
<li>Facebook / Open Graph Location

<ul>
<li>Latitude</li>
<li>Longitude</li>
<li>Altitude in Meters</li>
</ul></li>
<li>Schema Local Business

<ul>
<li>Local Business Type</li>
<li>Business Days and Hours</li>
<li>Seasonal Business Dates</li>
<li>Food Establishment Menu URL</li>
<li>Accepts Reservations</li>
</ul></li>
</ul></li>
<li>Combine WPSSO PLM with the <a href="http://wpsso.com/extend/plugins/wpsso-json/">WPSSO Schema JSON-LD (WPSSO JSON) Pro</a> extension to include complete Place and Local Business using Schema JSON-LD markup.</li>
</ul>

<p><strong>WPSSO PLM Pro / Power-User Features</strong></p>

<ul>
<li>Add a custom "Place / Location" settings tab to Posts, Pages, and Custom Post Types. Allows the selection of an existing Address, or entering custom Address information.</li>
</ul>

<p><strong>Example WPSSO PLM Meta Tags</strong></p>

<pre><code>&lt;meta property="og:type" content="place"/&gt;
&lt;meta property="og:latitude" content="10"/&gt;
&lt;meta property="og:longitude" content="-10"/&gt;

&lt;meta property="place:street_address" content="123 A Road"/&gt;
&lt;meta property="place:locality" content="Cityname"/&gt;
&lt;meta property="place:region" content="Somestate"/&gt;
&lt;meta property="place:postal_code" content="123456"/&gt;
&lt;meta property="place:country_name" content="US"/&gt;
&lt;meta property="place:location:latitude" content="10"/&gt;
&lt;meta property="place:location:longitude" content="-10"/&gt;

&lt;noscript itemprop="openingHoursSpecification" itemscope itemtype="https://schema.org/OpeningHoursSpecification"&gt;
    &lt;meta itemprop="dayofweek" content="saturday"/&gt;
    &lt;meta itemprop="opens" content="12:00"/&gt;
    &lt;meta itemprop="closes" content="22:00"/&gt;
    &lt;meta itemprop="validfrom" content="2016-05-01"/&gt;
    &lt;meta itemprop="validthrough" content="2016-09-01"/&gt;
&lt;/noscript&gt;

&lt;meta itemprop="menu" content="http://surniaulula.com/example-restaurant-menu.html"/&gt;
&lt;meta itemprop="acceptsreservations" content="true"/&gt;
</code></pre>

<p><strong>Example WPSSO PLM Meta Tags and WPSSO Schema JSON-LD Pro Markup</strong></p>

<pre><code>&lt;meta property="og:type" content="place"/&gt;
&lt;meta property="og:latitude" content="10"/&gt;
&lt;meta property="og:longitude" content="-10"/&gt;

&lt;meta property="place:street_address" content="123 A Road"/&gt;
&lt;meta property="place:locality" content="Cityname"/&gt;
&lt;meta property="place:region" content="Somestate"/&gt;
&lt;meta property="place:postal_code" content="123456"/&gt;
&lt;meta property="place:country_name" content="US"/&gt;
&lt;meta property="place:location:latitude" content="10"/&gt;
&lt;meta property="place:location:longitude" content="-10"/&gt;

&lt;script type="application/ld+json"&gt;{
    "@context": "http://schema.org",
    "@type": "Restaurant",
    "url": "http://adm.surniaulula.vbox/",
    "name": "Surnia Ulula (Admin) - Administration Website",
    "description": "Administration Website",
    "mainEntityOfPage": {
        "@context": "http://schema.org",
        "@type": "WebPage",
        "@id": "http://adm.surniaulula.vbox/"
    },
    "image": [
        {
            "@context": "http://schema.org",
            "@type": "ImageObject",
            "url": "http://adm.surniaulula.vbox/wp-content/uploads/2016/02/JSM-e1454504960490-800x663.jpg",
            "width": 800,
            "height": 663
        }
    ],
    "address": {
        "@context": "http://schema.org",
        "@type": "PostalAddress",
        "streetAddress": "123 A Road",
        "postOfficeBoxNumber": 7,
        "addressLocality": "Cityname",
        "addressRegion": "Somestate",
        "postalCode": "123456",
        "addressCountry": "US"
    },
    "geo": {
        "@context": "http://schema.org",
        "@type": "GeoCoordinates",
        "latitude": 10,
        "longitude": -10
    },
    "openingHoursSpecification": [
        {
            "@context": "http://schema.org",
            "@type": "openingHoursSpecification",
            "dayOfWeek": "Saturday",
            "opens": "12:00",
            "closes": "22:00",
            "validFrom": "2016-05-01",
            "validThrough": "2016-09-01"
        }
    ],
    "menu": "http://surniaulula.com/example-restaurant-menu.html",
    "acceptsReservations": "true"
}&lt;/script&gt;
</code></pre>

<h4>Extends the WPSSO Social Plugin</h4>

<p>The WordPress Social Sharing Optimization (WPSSO) plugin is required to use the WPSSO PLM extension.</p>

<p>You can use the Free version of WPSSO PLM with <em>both</em> the Free and Pro versions of WPSSO, but the <a href="http://wpsso.com/extend/plugins/wpsso-plm/">WPSSO PLM Pro</a> version requires the use of the <a href="http://wpsso.com/extend/plugins/wpsso/">WPSSO Pro</a> version as well.</p>

<p>Purchase the <a href="http://wpsso.com/extend/plugins/wpsso-plm/">WPSSO Place / Location and Local Business Meta (WPSSO PLM) Pro</a> extension (includes a <em>No Risk 30 Day Refund Policy</em>).</p>


<h2>Installation</h2>

<h4>Install and Uninstall</h4>

<ul>
<li><a href="http://wpsso.com/codex/plugins/wpsso-plm/installation/install-the-plugin/">Install the Plugin</a></li>
<li><a href="http://wpsso.com/codex/plugins/wpsso-plm/installation/uninstall-the-plugin/">Uninstall the Plugin</a></li>
</ul>


<h2>Frequently Asked Questions</h2>

<h4>Frequently Asked Questions</h4>

<ul>
<li>None</li>
</ul>


<h2>Other Notes</h2>

<h3>Other Notes</h3>
<h4>Additional Documentation</h4>

<ul>
<li>None</li>
</ul>

