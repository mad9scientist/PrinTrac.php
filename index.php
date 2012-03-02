<!DOCTYPE HTML>
<html>
<head>
	<title>PrinTrac.php - Track Website Visitors Printing Your Pages</title>
	<link rel="stylesheet" href="styles.css" />
	<!--[if lt IE 9]>
		<script src='//html5shiv.googlecode.com/svn/trunk/html5.js'></script>
	<![endif]-->
</head>
<body>
	<a href="http://github.com/mad9scientist/PrinTrac.php/"><img style="position: fixed; top: 0; right: 0; border: 0; z-index: 10;" src="https://a248.e.akamai.net/assets.github.com/img/e6bef7a091f5f3138b8cd40bc3e114258dd68ddf/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub"></a>

	<header>
		<h1>PrinTrac.php</h1>
		<span>How Often Are Your Webpages Being Printed?</span>
	</header>

	<article>
		
	<h2>What is PrinTrac.php?</h2>
	<p>PrinTrac.php is a simple script that tracks how often users print your web pages by using a invisible tracking image that is included in your print stylesheet.</p>

	<h2>Concept and Origin</h2>
	<p>This idea is from ShopTalkShow Host Chris Coyier and a user submitted question (Sorry I don't remember the listener's name) from <a href="http://shoptalkshow.com/episodes/006-with-zoe-gillenwater/" title="ShopTalk Show">ShopTalk Show - Episode 006 with Zoe Gillenwater</a>.</p>

	<h2>Why Should I Use It?</h2>
	<p>There isn't really a great reason to use it. It's just some simple statistics about your website visitor's printing habits.</p>

	<h3>Installation</h3>
	<ol>
		<li>Place printrac.php into your site's image directory or anywhere you want.</li>
		<li>Create a directory in the same folder named 'logs'</li>
		<li>In your Print Stylesheet, include the following code:
			<pre><code>body:after, .printracphp-ie{
    background: url(/path/to/printrac.php?track);
    content: url(/path/to/printrac.php?track);
    height: 1px;
    width: 1px;
    display:block;
}</code></pre></li>
		<li>Insert the below script tag before the closing body tag of your pages
	<pre><code>&lt;script src="/path/to/printrac.php?js"&gt;&lt;script&gt;</code></pre></li>
		<li>That's it!</li>
	</ol>

	<h3>View Logs</h3>
	<p>To view the logs that are created by PrinTracs visits the following link:</p>
	<code>http://www.your-domain-name.example.com/path/to/printrac.php?view</code>

	<p><i>The default log is just the raw data outputted</i></p>

	<p>If you want a nicer interface go to</p>
	<code>http://www.your-domain-name.example.com/path/to/printrac.php?gui<br>http://www.your-domain-name.example.com/path/to/printrac.php?view=gui</code>

	<h2>Try it out!</h2>
	<p>Open the the below page and do a print preview of that page. Then click the link label View Logs. If you view the newest records at the bottom of the page you should see your IP and the date/time you "Printed" the page.</p>
	<p><a href="http://mad9scientist.com/projects/printracphp/">PrinTrac.php Demo</a></p>
	<p><a href="http://github.com/mad9scientist/PrinTrac.php/">Follow PrinTrac.php on GitHub</a></p>

	</article>

	<footer>
		
		<p>PrinTrac.php is Maintained by <a href="http://mad9scientist.com">Chris Holbrook</a>
		<?php echo ' &mdash; ' . date('M Y'); ?></p>
	</footer>
	<script src="printrac.php?js"></script>
</body>
</html>