# ItemFeed - A Comprehensive Item Set Builder
Entry for Riot Games 2015 API Challenge 2.0

You can find a running version of this application at - **http://lol-api.tfreeb.com/**

We've been working really hard to make sure that our application is fun and engaging for players. If you
are viewing the site for the first time i'd highly reccommend having your sound turned on, as we worked hard
adding sound to make the site fun to use.

We didn't want to make a database driven site as that would require users to have to set up other pieces of software beforehand if 
they wanted to copy it across. The site is designed to be able to be downloaded and dropped right into a LAMP server and just 
start working right away! Because of this.

# Site Features
Here are some of the features of the site we'd like to draw your attention to:
- Whole website runs on one page, no page refresh is needed at any point, it's all asynchronous.
- Designed to be lightweight, no database. Data is read and only updated when needed. Most work offloaded client-side.
- We're massive League of Legends fans, so naturally we wanted to make the site as lol-themed as possible!
- If you've got sound enabled, you'll be able to listen to DJ Sona on the decks!

# Technical Details
**We definitely reccommend heading over to http://lol-api.tfreeb.com/ and reading the page on how it works.** We spent quite a while 
writing up how the site works and even go into detail on what happens in the process.

There are lots of javascript files that we use in the project, some of these are third party libraries and plugins and without them 
the site wouldn't be possible.
###Custom Javascript files
- page-load.js (Handles initial site loading)
- champion-select.js (All functions relating to the champion selection process)
- champion-build.js (All functions relating to the item set building part of the process)
- ajax.js (provides content-swapping functionality)

###Third party plugins
Some of these plugins aren't actively being used on the site, but we'll be working on new features that contain them in the near future
- Bootstrap
- Slick
- Packery
- mCustomScrollbar
- list.js
- jQuery
- jQuery UI
- jQuery Cookie (plugin)
- download.js (js file downloads)
- chart.js (html5 charts)
- buzz.js (audio)
