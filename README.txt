=== CC-Link-Shortcode ===
Contributors: ClearcodeHQ, PiotrPress
Tags: a, href, url, permalink, link, link shortcode, shortcode, clearcode, piotrpress
Requires PHP: 7.0
Requires at least: 4.9.2
Tested up to: 5.9.2
Stable tag: trunk
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.txt

This plugin adds the link shortcode to replace standard html tag. Its primary function is to simplify internal linking.

== Description ==

This plugin adds the shortcode `[a]` to replace `<a>` html tag. Its primary function is to simplify internal linking. Now you don't need to worry about changing the permalinks and correcting the appearance of the permalink in your posts/pages. You can only paste ID of post/page into the shortcode and the plugin will handle everything for you. When opening a post/page the shortcode renders the permalinks and titles of linked posts/pages based on the pasted IDs.

= Usage =

Basic: `[a {post_ID}]` Example: `[a 123]` Returns: `<a href="{post_permalink}">{post_title}</a>`

Custom link text: `[a {post_ID}]{link}[/a]` Example: `[a 123]Example Post[/a]` Returns: `<a href="{post_permalink}">Example Post</a>`

External link: `[a {url}]{link}[/a]` Example: `[a http://example.com]Example Link[/a]` Returns: `<a href="http://example.com">Example Link</a>`

Additional parameters: `[a {post_ID} {param_name}="{param_value}"]` Example: `[a 123 target="_blank"]` Returns: `<a href="{post_permalink}" target="_blank">{post_title}</a>`

== Installation ==

= From your WordPress Dashboard =

1. Go to 'Plugins > Add New'
2. Search for 'CC-Link-Shortcode'
3. Activate the plugin from the Plugin section in your WordPress Dashboard.

= From WordPress.org =

1. Download 'CC-Link-Shortcode'.
2. Upload the 'cc-link-shortcode' directory to your `/wp-content/plugins/` directory using your favorite method (ftp, sftp, scp, etc...)
3. Activate the plugin from the Plugin section in your WordPress Dashboard.

== Changelog ==

= 1.1.1 =
*Release date: 16.03.2022*

* Added PHP 8.0 support.

= 1.1.0 =
*Release date: 29.01.2021*

* Added `url_to_postid` support.

= 1.0.0 =
*Release date: 01.02.2018*

* First stable version of the plugin.