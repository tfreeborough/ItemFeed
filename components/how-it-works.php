<div class="about-us">
    <h1>How it works</h1>
    <p>ItemFeed uses the <a href="https://developer.riotgames.com/" target="_blank">Riot Games API</a> to enable players to create fully customised Item Sets for individual champions in League of Legends</p>
    <h2>Why Item Sets</h2>
    <p>When we heard about the API challenge 2.0, we were very excited and immediately began coming up with ideas based off the 3 categories given, we though because of how new and the impact it
    could have on players, that we'd focus on building a tool that would help players create custom item sets.</p>
    <p>Although Riot have done a great job giving players recommended items to use for each
    champion, we felt that players might want complete control over their buy screen. ItemFeed aims to provide the complete solution to players.</p>
    <h2>The Technical Details</h2>
    <h3>Unique features of the website:</h3>
    <p>You may not have realised, but the entire ItemFeed site is just one page. We thought about trying something a little different with the site where we could swap out various parts at will. We
    had the option to use something more hefty (like <a href="http://facebook.github.io/react//" target="_blank">React.js</a>) but we also want the site to be light-weight. One of the main aims was
    to make the site easy to set up, so that others would be able to drag and drop, and the website would just work out of the box on any LAMP server (PHP 5.2+).</p>
    <p>Website Features:</p>
    <ul>
        <li>Whole website runs on one page, no page refresh is needed at any point, it's all asynchronous.</li>
        <li>Designed to be lightweight, no database. Data is read and only updated when needed. Most work offloaded client-side.</li>
        <li>We're massive League of Legends fans, so naturally we wanted to make the site as lol-themed as possible!</li>
        <li>If you've got sound enabled, you'll be able to listen to DJ Sona on the decks!</li>
    </ul>
    <h3>The ItemFeed Process</h3>
    <p>Although we've commented all our code, The files may be a little messy (Sorry!). This is because both of us have been really stretched for time and often have gone
    on into the early hours of the morning getting various things to work! To make it a little clearer, we've provided a simple step-by-step of the process, with a detailed
    explanation if you click into each step.</p>
    <ul class="itemfeed-process">
        <li>
            <p><span class="process-name">Load up the website:</span> All of the scripts needed to run the site are added when the page first loads, this is also when the audio-controller starts to work, the background
            video loads in and the front page appears.</p>
            <div class="detailed">
                <p>A lot of things are happening when the page first loads up, we check for an background-music cookie before any background music starts playing, we know as well as you
                do that background music you can't turn off can be really annoying, so if you decide to mute it, you can return to the site at a later date and it will stay muted.</p>
                <p>We also initialize all of the Javascript files. Caching on the server is also enabled through a .htaccess file so after the first load, re-visiting the site becomes a lot quicker.
                a custom file we wrote called ajax.js allows us to call different pages and access content on the site, this is actually the whole core of the website. You can specify a wide range
                of parameters such as presenting functions to run after a load animation, and even the speed at which the content loads in.</p>
                <p>We have also provided a fallback for any browsers that might not be able to play video files, so if you can't play video you'll get a nice picture of Bilgewater.</p>
            </div>
        </li>
        <li>
            <p><span class="process-name">Select a champion:</span> When you click "Create your build", its starts the champion select, from here you can select any champion you'd like from the list on the right, and see some
            basic information on them, such as their attack,defense etc.</p>
            <div class="detailed">
                <p>When selecting a champion, a function is run that does a few different things. Firstly, it looks for an audio file that relates to the champion selected. This is a simple
                file search which is passed to buzz, Buzz will then play the sound. At the same time when the page is being fetched, a PHP script will run, this connects to the api class
                that we have written and retrieves as .json file of all champion data. Rather than cause delay and network cost we decided to serve a saved json file that was taken from the
                lol api static call. We can manually update this as we please as another api function exists to fetch a new file and over-write the old one.</p>
                <p>After the api returns the json it decodes it into a php object which can then be accessed by the php script, this then delivers the html as part of the page load, a small
                animation then plays to make it look all fancy!</p>
            </div>
        </li>
        <li>
            <p><span class="process-name">Begin champion builder:</span> When you start the item builder, the right column will change to a large list of items, and the left into the main building panel.</p>
            <div class="detailed">
                <p>When you begin the champion builder, we make another call to the API class to bring back a full list of items. We wanted to use the data returned from the item static data
                call, however we noticed that there were a few issues with the data at the moment, one of the key parts that we needed, the information that tells you what items are on which maps,
                just wasn't there; we ended up using an alternative method.</p>
                <p>In the left panel we retrieve some cookie information on which champion you selected, and so can show you the portrait and name of the champion you are building for in this container.
                We also initialise one item group to get you started. There wasn't much point in showing nothing and expecting people to work out what to do, have you ever heard of an item set without
                any items!?</p>
            </div>
        </li>
        <li>
            <p><span class="process-name">Filtering items:</span> We though being able to filter items by name would be a cool idea, and so that's what we did. If we had more time we would love to add in filtering by item type
            e.g. Health, Attack Damage, Ability Power.</p>
            <div class="detailed">
                <p>We added a search filter on the items that updates on the fly. Not only does this look slick but it allows players to get to the items they want quickly.</p>
                <p>We also added some js to darken out an item after you have assigned it to your item crate, this was to help players easily see which items they have already added at a glance.</p>
                <p>Ideally we would have liked to add some additional filters to make it even easier, such as being able to only show item with health, or cooldown reduction for example. In the end
                we just haven't had enough time to added everything we wanted, but we are definitely keen on adding them in as the next phase.</p>
            </div>
        </li>
        <li>
            <p><span class="process-name">As simple as dragging:</span> I though the ability to drag items around with the mouse would make for a really fun interactive experience so that's what we tried to do. Dragging items
            from the item crate into their boxes took a ton of work to get it working right across all browsers, but it was so worth it!</p>
            <div class="detailed">
                <p>From pretty early on we thought that being able to interact with the site in some way would really enhance the experience and make user actually feel like they were building
                something. I think the idea of the item crate is really handy, as it lets players turn one item into many items in the builder, Dragging is just a fun little thing to do anyway
                and is more fun.</p>
                <p>Getting the drag to work was incredibly frustrating, we utalised Jquery's UI plugin, however we had to write quite a bit of custom code to actually get the process working on our page.
                Most of the issues seem to stem from the whole page being absolutely positioned. Another issue we had was when the user added so many groups they required a scroll in the left column...
                fun times :)</p>
                <p>After user released the mouse while dragging we check to see if the dragged icon is above any existing item slots, if it is we then run a function that attempts to slot this icon
                into the right one, which is worked out by looking at box collisions between the dragging items and all other item slot divs. If a match is found we add it to the item slot. Afterwards
                a function is run which checks for any excess item slots and removes then, which will ensure that items sets don't have blank item spaces in them when inside the game.</p>
                <p>After all of this has been done we then ask the user how many of that item they want, and they can specify this in a modal alert. If nothing is selected it will default to 1, if they
                do specify a value we update a data attribute on the item slot fo indicate the quantity, which is then reflected on the bottom right of the item image.</p>
            </div>
        </li>
        <li>
            <p><span class="process-name">Adding, deleting and re-naming groups:</span> After we added in item groups we realised that most players wouldn't want a fixed amount and would like to have many and little as possible,
            so we make sure you can name, and add/delete item groups really easily.</p>
            <div class="detailed">
                <p>Being able to re-name groups was something we realised was missing after we had started working on the system, We realised how useful group names were when in-game. And players
                might use them to indicate early, mid and late game items to buy. Some players might also opt for having groups of consumables and so re-naming would be needed for that too.</p>
                <p>Deleting was pretty straight forward to do, as we only build the item set when the user downloads; it becomes relatively simple to delete a group with items inside it.</p>
                <p>We wanted to let players have a choice on the amount of groups they wanted rather than set a fixed amount, we feel this has had a huge benefit on the item builder itself and make
                it feel much better to use.</p>
            </div>
        </li>
        <li>
            <p><span class="process-name">Downloading:</span> After you are happy with your item set, you just click download, you can name your Item Set and choose which map you'd like the item set to appear on.</p>
            <div class="detailed">
                <p>After the player clicks the download button we utalise a library called sweetalert to show some prompts for information. We want the user to be able to give their item set
                a name to use in-gam, as players may want multiple sets and need to easily be able to see which one is which.</p>
                <p>After the player gives us a name, we then move on to asking which map the player wants their item set to work on, although we expect most players will be using it for summoners rift, we wanted to
                always give players the option of which map they wanted the item set for (Such as custom builds for ARAM)</p>
                <p>After we receive this information we serialize the whole form and pass it to a php script, which is the core of making the item set. We send the information to the form as a get. The reason being
                because later on we want to make it so players can link to pre-made sets. In addition we are only passing information, not saving, so traditionally a GET would be used here...</p>
                <p>The script takes the serialised data, formats it all and then encodes it into json. At which point we set content headers and pass the file back to the browser as a download.</p>
                <p>We also display a popup after which gives the player instructions on how to use the .json file. such as where the file goes.</p>
            </div>
        </li>
    </ul>
</div>