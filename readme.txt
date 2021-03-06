=== Briefinglab Quick Finder CMS ===
Contributors: Briefinglab, Luca Maroni, Davide Zorzan
Donate link: http://briefinglab.com
Tags: Quick finder CMS
Requires at least: 3.9.1
Tested up to: 4.1
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin give you a CMS section to manage the quick finder content with the usual and very well known WordPress paradigm. Then it will provide you the possibility to implement
your own HTML and JS in a very structured way. It tries to make order between content and views.

== Description ==
This plugin give you a CMS section to manage the quick finder content with the usual and very well known WordPress paradigm. Then it will provide you the possibility to implement
your own HTML and JS in a very structured way. It tries to make order between content and views.

You can create quick finder elements to combine and create complex page and layouts.

Then you can print out your quick finder elements using the default HTML provided (bootrstrap ) or make your own HTML overwriting two simple templates:
start-quick-finder
end-quick-finder
item-quick-finder

You can then integrate quick finder elements in your theme or into your post content using a simple shortcode
[bl-quick-finder categories="homepage" limit="10"]

You can override the HTML output by category using
start-quick-finder-category-slug
end-quick-finder-category-slug
item-quick-finder-category-slug

You can also override the HTML output for a single page
start-quick-finder-page-slug
end-quick-finder-page-slug
item-quick-finder-page-slug

You can also override the HTML output for different quick finder elements in the same page (you have to add template-slug also in the short code [bl-quick-finder categories="homepage" template="template-slug"])
start-quick-finder-template-slug
end-quick-finder-template-slug
item-quick-finder-template-slug

Overwrite template priority
template-slug
page-slug
category-slug
default