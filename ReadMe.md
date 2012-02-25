# PrinTrac.php
## See How Often Users Print Your Webpages
Created By: [Chris Holbrook](http://mad9scientist.com/ "Author's Website")

**Goal:** This php file tracks how often users print your web pages by using a invisible tracking image that is included in your print stylesheet.

**Concept and Origin:** This idea is from ShopTalkShow Host Chris Coyier and a user submitted questions (Sorry I don't remember the users name) from Episode 006 with Zoe Gillenwater (http://shoptalkshow.com/episodes/006-with-zoe-gillenwater/ "ShopTalk Show")

**Installation:** 
1. Place printrac.php into your site's image directory or anywhere you want.
2. Create a directory in the same folder named 'logs'
3. In your Print CSS file Include the following code:
	body:after{
		content:"";
		height: 1px;
		width: 1px;
		background: url(/path/to/printrac.php?track);
		display:block;
	}
4. If you want to track what pages are being printed paste the below code into the header of your pages, before anything else.
	`<?php
	$printracPage = $_SERVER['REQUEST_URI'];
	setcookie('currentpage-printrac-php', $printracPage, 0, "/");
?>`
5. That it!

**View Logs**
To view the logs that are created by PrinTracs visits the following link:
	http://www.your-domain-name.example.com/path/to/printrac.php?view

The default log is just the raw data outputted

If you want a nicer interface go to
	http://www.your-domain-name.example.com/path/to/printrac.php?view=gui

**Dev Build:** If you would rather see the data in your Google Analytics, open the `PrinTrac.php` file and enter your API Key and Site ID into the fields on Line #??

Check out the Demo: [PrinTrac.php Demo](http://mad9scientist.github.com/PrinTrac.php/)