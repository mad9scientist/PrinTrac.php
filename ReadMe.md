# PrinTrac.php
## See How Often Users Print Your Webpages
**Created By:** [Chris Holbrook](http://mad9scientist.com/ "Author's Website")

**[GitHub Repo](https://github.com/mad9scientist/PrinTrac.php/ "GitHub")**

**Check out the Demo:** [PrinTrac.php Demo](http://mad9scientist.com/projects/printracphp/)

**Goal:** This php file tracks how often users print your web pages by using a invisible tracking image that is included in your print stylesheet.

**Tested Browsers:** Firefox 10, Safari 5.1, Chrome 17, Opera 11.61, Internet Explorer 8

**Concept and Origin:** This idea is from ShopTalkShow Host Chris Coyier and a user submitted questions (Sorry I don't remember the users name) from [ShopTalk Show - Episode 006 with Zoe Gillenwater](http://shoptalkshow.com/episodes/006-with-zoe-gillenwater/ "ShopTalk Show")

**Installation:**

*	Place printrac.php into your site's image directory or anywhere you want.
*	Create a directory in the same folder named 'logs'
*	In your Print CSS file Include the following code:

```
	body:after, .printracphp-ie{
		background:url(path/to/printrac.php/printrac.php?track) no-repeat;
		content: url(path/to/printrac.php/printrac.php?track);
		width: 1px;
		height: 1px;
		display: block;
	}
```
*	Insert the below script tag before the closing body tag of your pages.

```
<script src="/path/to/phptrac.php?js"></script>
```
* That's it!

**View Logs**

To view the logs that are created by PrinTracs visits the following link:
```
	http://www.your-domain-name.example.com/path/to/printrac.php?view
```

*The default log is just the raw data outputted*

If you want a nicer interface go to

	http://www.your-domain-name.example.com/path/to/printrac.php?view=gui
	http://www.your-domain-name.example.com/path/to/printrac.php?gui


Check out the Demo: [PrinTrac.php Demo](http://mad9scientist.com/projects/printracphp/)