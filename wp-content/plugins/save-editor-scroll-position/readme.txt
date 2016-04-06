=== Save Editor Scroll Position ===
Contributors: seventhpath, Daniel Scognamiglio
Tags: admin, javascript, scroll position, editor, keep scroll, save position
Requires at least: 3.1.2
Tested up to: 3.1.2
Stable tag: 1.1

== Description ==

Enable to preserve the vertical scroll position of the TinyMCE Wordpress editor window when saving or updating a post. 

== Installation ==

To do a new installation of the plugin, please follow these steps

1. Download the zipped plugin file to your local machine.
2. Unzip the file.
3. Upload the `save-editor-scroll-position` folder to the `/wp-content/plugins/` directory.
4. Activate the plugin through the 'Plugins' menu in WordPress.

If you have already installed the plugin

1. De-activate the plugin.
2. Download the latest files.
2. Follow the new installation steps.

Seventhpath
seventhpath@watchingnumbersgoup.com

== Frequently Asked Questions ==

Q: Why doesn't it work for me?

A: Either:
    
1. Not using TinyMCE editor in Wordpress backend?

2. Are you sure that you are using the same editor window/browser instance?  The scroll position is not global for your user account, it depends on the local client browser.

3. Are you using IE? (not currently supported)

4. Are you switching back and forth between Visual and HTML editor windows between every save?  Currently this plugin will not store both simultaneously for a single window (only one or the other).

== Changelog ==

= 1.1 =

* Implemented TinyMCE Visual and HTML editor position saving.
* Timing improvements/optimizations
* Additional conditional check for the editor 'content' textarea so that plugin only loads on the page/post editor Admin pages.
* Added detailed comments.

= 1.0 =

*Implemented basic HTML editor position saving.

== Upgrade Notice ==

= 1.1 =
This version adds the Visual editor position saving.  The previous version is HTML editor only!
