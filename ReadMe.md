# PrinTrac.php
## See How Often Users Print Your Webpages
Created By: [Chris Holbrook](http://mad9scientist.com/ "Author's Website")

**Goal:** This php file tracks how often users print your web pages by using a invisible tracking image that is included in your print stylesheet.

**Tested Browsers:** Firefox 10, Safari 5, Chrome 16, Opera 11.

**Concept and Origin:** This idea is from ShopTalkShow Host Chris Coyier and a user submitted questions (Sorry I don't remember the users name) from Episode 006 with Zoe Gillenwater (http://shoptalkshow.com/episodes/006-with-zoe-gillenwater/ "ShopTalk Show")

**Installation:** 
1. Place printrac.php into your site's image directory or anywhere you want.
2. Create a directory in the same folder named 'logs'
3. In your Print CSS file Include the following code:
	body:after, .printracphp-ie{
		background:url(path/to/printrac.php/printrac.php?track) no-repeat;
		content: url(path/to/printrac.php/printrac.php?track);
		width: 1px;
		height: 1px;
		display: block;
	}
4. Copy and Paste the below code into the header of your pages, before anything else.
	`<?php
	$printracPage = $_SERVER['REQUEST_URI'];
	setcookie('currentpage-printrac-php', $printracPage, 0, "/");
	echo "<div class='printracphp-ie' style='display:none;'></div>";
?>`
5. That's it!

**View Logs**
To view the logs that are created by PrinTracs visits the following link:
	http://www.your-domain-name.example.com/path/to/printrac.php?view

The default log is just the raw data outputted

If you want a nicer interface go to
	http://www.your-domain-name.example.com/path/to/printrac.php?view=gui
	http://www.your-domain-name.example.com/path/to/printrac.php?gui

**Dev Build:** If you would rather see the data in your Google Analytics, open the `PrinTrac.php` file and enter your API Key and Site ID into the fields on Line #??

Check out the Demo: [PrinTrac.php Demo](http://mad9scientist.com/projects/printracphp/)