<?php
	$printracPage = $_SERVER['REQUEST_URI'];
	setcookie('currentpage-printrac-php', $printracPage, 0, "/");
	echo "<div class='printracphp-ie' style='display:none;'></div>";
?>

<DOCTYPE HTML>
<html>
<head>
	<title>PrinTrac.php - Track Website Visitors Printing Your Pages</title>
	<link rel="stylesheet" href="styles.css" />
	<!--[if lt IE 9]>
		<script src='//html5shiv.googlecode.com/svn/trunk/html5.js'></script>
	<![endif]-->
</head>
<body>

	<header>
		<h1>PrinTrac.php</h1>
		<span>How Often Are Your Webpages Being Printed?</span>
	</header>

	<article>
		
	<h2>What is PrinTrac.php?</h2>
	<p>PrinTrac.php is a simple script that tracks how often users print your web pages by using a invisible tracking image that is included in your print stylesheet.</p>

	<h2>Concept and Origin</h2>
	<p>This idea is from ShopTalkShow Host Chris Coyier and a user submitted questions (Sorry I don't remember the users name) from <a href="http://shoptalkshow.com/episodes/006-with-zoe-gillenwater/" title="ShopTalk Show">Episode 006 with Zoe Gillenwater</a>.</p>

	<h2>Why Should I Use It?</h2>
	<p>There isn't really a great reason to use it. It just some simple statistics about your website visitor's printing habits.</p>

	<h3>Installation</h3>
	<ol>
		<li>Place printrac.php into your site's image directory or anywhere you want.</li>
		<li>Create a directory in the same folder named 'logs'</li>
		<li>In your Print CSS file Include the following code:
			<pre><code>body:after{
    content:"";
    height: 1px;
    width: 1px;
    background: url(/path/to/printrac.php?track);
    display:block;
}</code></pre></li>
		<li>If you want to track what pages are being printed paste the below code into the header of your pages, before anything else.
	<pre><code>&lt;?php
	$printracPage = $_SERVER['REQUEST_URI'];
	setcookie('currentpage-printrac-php', $printracPage, 0, "/");
?&gt;</code></pre></li>
		<li>That's it!</li>
	</ol>

	<h3>View Logs</h3>
	<p>To view the logs that are created by PrinTracs visits the following link:</p>
	<code>http://www.your-domain-name.example.com/path/to/printrac.php?view</code>

	<p>The default log is just the raw data outputted</p>

	<p>If you want a nicer interface go to</p>
	<code>http://www.your-domain-name.example.com/path/to/printrac.php?view=gui</code>

	<h2>Try it out!</h2>
	<p>Open the the below page and do a print preview of that page. Then click the link label View Logs. If you view the newest records at the bottom of the page you should see your IP and the date/time you "Printed" the page.</p>
	<p><a href="http://mad9scientist.com/projects/printracphp/">PrinTrac.php Demo</a></p>

	</article>

	<footer>
		
		<p>PrinTrac.php is Maintained by <a href="http://mad9scientist.com">Chris Holbrook</a></p>

	</footer>

</body>
</html>