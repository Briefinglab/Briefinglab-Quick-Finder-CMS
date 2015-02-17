BriefingLab News CMS
===============

This plugin give you a CMS section to manage the news, events and fair content with the usual and very well known WordPress paradigm. Then it will provide you the possibility to implement
your own HTML and JS in a very structured way. It tries to make order between content and views.

You can create a news, event or fair like a post.

Then you can print out your news list using the default HTML provided (bootrstrap carousel) or make your own HTML overwriting two simple templates:
start-news
end-news
item-news

Uou can then integrate a news list in your theme or into your post content using a simple shortcode
[bl-news category="homepage" limit="10"]

You can override the HTML output by category using
start-news-category-slug
end-news-category-slug
item-news-category-slug

You can also override the HTML output for a single page
start-news-page-slug
end-news-page-slug
item-news-page-slug

You can also override the HTML output for different news list in the same page (you have to add template-slug also in the short code [bl-news category="homepage" template="template-slug"])
start-news-template-slug
end-news-template-slug
item-news-template-slug

Overwrite template priority
template-slug
page-slug
category-slug
default