Alku
====

Hello! Thank for trying out Alku. Alku supports all the available WordPress post formats. The responsive layout supports up to two columns. 

Alku was developed by [Danny Ramirez](http://dronix.me) using [Hybrid Core](http://themehybrid.com/hybrid-core) which is a WordPress theme framework developed by [Justin Tadlock](justintadlock.com).

Basic Cutomization
-----------------

![Figure01](images/figure01.png "WordPress Cutomizer")

Alku comes with some standard customization options. These options are limited and should be used for simple things such as selecting the default layout, the primary navigation, choosing a custom homepage, etc. If you would like to customize Alku any further than please do so by creating a child theme.
                                                                                                                                                                                                                   

Action Hooks
----------------------

![Figure02](images/figure02.png "Action Hooks")

Thanks to Hybrid Core, Alku is able to provide contextual action hooks. These hooks are distribute throught the theme and can mostly be found in different page templates. They contextual hooks are prefixed with the name of the theme and the page currently being viewed. An example of a normal hook would be `body_open`. Depending on what page the user is on, additional **action** hooks are created. Sticking to our example `body_open`, the following hooks are created:

* `alku_open_body`
* `alku_singular_open_body`
* `alku_singular_post_open_body`
* `alku_singular_post_{ID}_open_body`

Here's a list of all the **action** hooks created by the Alku theme. Note that Hybrid Core, the framework in which this theme is built upon, provides with additional hooks of it own.

All of these will be listed in it's simplest form.

* `open_body` - takes place right after the opening `<body>` tag and before `#page-container`.
* `page_header_before` - takes place after the opening `#page-container` div and before `#page-header`.
* `page_header_after` - takes place right after the closing tag of `#page-header`.
* `content_before` - takes place before the opening `#content` div.
* `main_before` - takes places after the opening `#content` div and before the section `#main`.
* `entry_before` - takes place before the opening article tag `.hentry`.
* `entry_after` - takes place after the article tag `.hentry`.

Filter Hooks
------------

![Figure03](images/figure03.png "Filter Hooks")

Alku also creates a few filter hooks that you can use to modify the theme. Most of these do not provide any paramaters and can be simply overwritten in your child theme.

* `entry_title` - outputs the `h1.entry-title`
* `entry_header_meta` - outputs the `div.entry-header-meta` which contains post's author, the category, comments link, and the edit link.
* `aside_meta` - outputs the meta information for the `aside` post-format which only includes an edit link.
* `entry_more_link` - outputs a `Continue Reading` link only used by the standard formats and archive pages.
* `entry_footer_meta` - outputs the entry's or post's footer meta which only contains the tags.
* `author_info` - outputs information regarding the current post author.
* `gallery_slider` - outputs the gallery slider.

Shortcodes
----------

![Figure04](images/figure04.png "Shortcodes")

There are a few custom shortcodes that you can use. Most of these are only to be used within the Loop.

* `comment-publised` - overwrites Hybrid Core's `comment-published` to output when a comment was created, wrapped in a `<time` tag.
* `hc-link` - displays a link back to Hybrid Core. This is using the footer of the Alku theme.
* `author-info` - displays a `div` containing information regarding the author of a post. Alku creates three exta fields in the Profile page, in the back end of WordPress, Github, Twitter and Dribbble. If any of this fields are empty  the front end will display a link to the homepage of each respective networking service.
* `gallery-slider` - displays slider using a post's attached gallery.

404
---

![Figure05](images/figure05.png "404")

Alku's 404 page will look for a `404.png` image file inside of your child theme's `images` folder. The path should look as follows: `wp-content/child-theme/images/404.png`. If it doesn't find the `404.png` file then it will display its default 404 error image.

License
-------

The Alku WordPress theme is released under the terms of the [WTFPL](wtfpl.net) license. A copy of the license can be found inside of the `docs/license.txt` file.

Credits
-------

Alku made use of the following tools and code.

* **Open Sans** - This is the main font used in the theme. This font is licensed under the [Apache License](http://www.apache.org/licenses/LICENSE-2.0.html) and can be accessed via [Google Web Fonts](http://www.google.com/webfonts/specimen/Open+Sans). The desktop version can be downloaded from [Font Squirrel](http://www.fontsquirrel.com/fonts/open-sans).
* **Elusive Icons** - The [Elusive Icons](http://aristeides.com/elusive-iconfont/) is an Open Source icon font. This font is licensed under the [SIL - Open Font Licence](http://www.tldrlegal.com/license/open-font-license-(ofl).
* **HTML5Shiv** - Alku uses [HTML5Shiv](http://code.google.com/p/html5shiv/) to enable the use of HTML5 tags in legacy Internet Explorer. This script is dual licensed under [MIT](http://www.opensource.org/licenses/mit-license.php) or [GPL Version 2](http://www.gnu.org/licenses/gpl-2.0.html) licenses.
* **FitVids** - [FitVids](http://fitvidsjs.com) is a lightweight jQuery script enabling fluid width video embeds. This script is released under the same license as Alku, the [WTFPL](http://www.wtfpl.net/) license.
* **FlexSlider** - This is a slider plugin used for enhancing the gallery post format in Alku. The [FlexSlider](https://github.com/woothemes/flexslider) jQuery script uses the [GPLv2](http://www.gnu.org/licenses/gpl-2.0.html) license.
* **Mobile Menu** - The mobile menu used in Alku was created from a video tutorial by [Adi Purdila](http://www.adipurdila.com/) over on [webdesign tuts+](http://webdesign.tutsplus.com/sessions/adaptive-blog-theme-from-photoshop-to-wordpress/).
* **Drop-down Menu** - The drop-down menu found in the Alku theme was created from a turorial by [Tiberiu Butnaru](https://twitter.com/tiberiualex) over at [designmodo](http://designmodo.com/retro-navigation-menu-css3/).

