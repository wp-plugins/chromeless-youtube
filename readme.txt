=== Chromeless YouTube ===
Contributors: Adam J Nowak
Donate link: http://hyperspatial.com/donate
Tags: youtube,video,video player,chromeless,youtube player,flash player
Requires at least: 2.8
Tested up to: 3.0
Stable tag: 1.01

This chromeless YouTube player enables you to easily display videos on your site. Each player instance displays a different video and can be resized.

== Description ==

This plugin is a custom YouTube video player.  The default player settings are to remove the original YouTube buttons.  The buttons are replaced by "custom video" controls that are hidden while the video is playing. Don't worry, there is an option to use the default YouTube controls if you want. The player is meant to play only one single video, by simply entering it's YouTube ID number.  You can then size the player to any width and height, enabling you to display videos anywhere on your site.  Every chromeless widget you create is unique, you can have multiple videos on one page, each with a different source and size.

To make a long description short, this plugin is a must have for any Wordpress user.  Adding videos to your site has never been easier.  Considering that YouTube hosts over 35% of the video media on the internet, is would be silly to not capitalize on their simple yet powerful website, and to use it to upload and store all of your videos.

Now to display these videos on your site, you need to embed a whole bunch of HTML embed snippets and code for each YouTube video on your site is tedious and not necessary!

The Chromeless YouTube Player is super easy, just drag a widget into your sidebar, type in the YouTube ID number of the video, give it a width and height and that is it.

== Installation ==

1. Upload the entire 'chromeless-youtube' folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Create a new player widget from the wordpress dashboard: Appearance -> Widgets
4. Post Shortcode: [chromeless id=hnwccozR_oI width=280 height=180 autoplay=no ytcontrols=no]
5. Template PHP: `<?php chromeless_youtube ('hnwccozR_oI','280','180','no','no'); ?>`

== Frequently Asked Questions ==

= Why should I use this player? =

This player allows you to easily place specific YouTube videos wherever you want on your Blog or Website.  Your videos can be sized and scattered among your pages or posts, and without the default controls cluttering the experience.

= What is a YouTube ID number? =

The ID number is YouTube's unique identifier for each video.  You can find the ID number in the address bar at the end of the URL after the "v=" part.  It can also be found in the embed code. 

= How many players can I create? =

Theoretically there is no limit, but for practical reasons you may want to limit yourself to a couple of players for each page.  Use your judgment, the more players that are buffering data at the same time, the more likely there is to be loading issues.

= Can I have more than one video per player? =

No, for now you are limited to one. Future releases are planned with support for playlists, so stay tuned.

= My player won't respond? =

Try refreshing the page using F5, sometimes the video requests to YouTube will get stuck, due to traffic.

= My player is stuck loading? =

Try refreshing the page using F5.  If you have another player with the same video (same video ID) open in another tab the two players may interfere with each other depending on which browser you are using.

= How do I control playback? =

If you are using the chromeless controls, just click on the video to display the basic control buttons.

== Screenshots ==

1. Widget Options
2. Three players in action

== Changelog ==

= 1.0 =
* Hello Wordpress World!

= 1.01 =
* Fixed file path issue.  Last minute directory change from chromeless to chromeless-youtube, needed to change the path to the player .swf