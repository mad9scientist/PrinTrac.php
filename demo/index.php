<?php
  # PrinTrac.php Tracking Code | http://mad9scientist.github.com/PrinTrac.php/
  $printracPage = $_SERVER['REQUEST_URI'];
  setcookie('currentpage-printrac-php', $printracPage, 0, "/");
  echo '<div class="printracphp-ie" style="display:none;"></div>';
?>
<!DOCTYPE html>
<html>
<head>
	<title>PrinTrac.php - Demo Site</title>
	<link rel="stylesheet" href="css/style.css" />
	<!--[if lt IE 9]>
		<script src='//html5shiv.googlecode.com/svn/trunk/html5.js'></script>
	<![endif]-->
</head>
<body>
	<a href="http://github.com/mad9scientist/PrinTrac.php/"><img alt="Fork me on GitHub" src="https://a248.e.akamai.net/assets.github.com/img/e6bef7a091f5f3138b8cd40bc3e114258dd68ddf/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" style="position: fixed; top: 0; right: 0; border: 0; z-index: 10"></a>
	<header>
		<h1><a href="http://mad9scientist.com/projects/printracphp/" id="logo">PrinTrac.php</a></h1>
		<span>Website Printing Stats, for the Curious</span>
	</header>

	<section>
		<h2>Welcome to PrinTrac.php Demo Page</h2>
		<p>This is just a quick demo page. If you print or print preview this page and then click the button labeled "View Print Stats" you will see the date/time and your IP address in the detailed logs section of the stats page.</p>
		<p><strong>Your IP Address is: <?php echo $_SERVER['REMOTE_ADDR']; ?></strong></p>
		<a href="printrac.php?gui" class="button">View Print Stats</a>
	</section>

	<section>
		<h3>How to Uses/Installation</h3>
		<p>To use PrinTrac.php you simple upload a PHP file, Add a some section of code to your webpages, and add a bit of code to your print stylesheet.</p>

		<h4>Installation</h4>
		<ol>
			
		<li>
			<p>The first thing you need to do is upload <code>printrac.php</code> to your website, for example to own directory. Next you need to create a directory in the same folder that <code>printrac.php</code> is, so it can have a location to store the logs. You need to create a directory named <code>logs</code>.</p>			
		</li>

		<li>
			<p>Now that <code>PrinTrac.php</code> is on your website you need to add the following code to the very top of your webpages, it is <b>Very Important</b> to place it before anything is outputted to the page, so place even above your doctype declaration or your opening HTML tag.</p>
			<pre><code>&lt;?php
  # PrinTrac.php Tracking Code | http://mad9scientist.github.com/PrinTrac.php/
  $printracPage = $_SERVER['REQUEST_URI'];
  setcookie('currentpage-printrac-php', $printracPage, 0, "/");
  echo '&lt;div class="printracphp-ie" style="display:none;"&gt;&lt;/div&gt;';
?&gt;</code></pre>
		</li>

		<li>
			<p>The last thing you need to do is add the following code to your print stylesheet:</p>
			<pre><code>body:after, .printracphp-ie{
  background:url(/projects/printracphp/printrac.php?track) no-repeat;
  content: url(/projects/printracphp/printrac.php?track);
  width: 1px;
  height: 1px;
  display: block;
}</code></pre>
			<p>If you don't have a print stylesheet, you can create one very easy. The easiest way is to put your current CSS into a media declaration by surround all of your css with: </p>
			<pre><code>@media screen{
  # Your Current CSS is here
}</code></pre>
			<p>Then add the above code either above or below your the current CSS that is now wrapped with the <code>@media screen</code>.</p>
		</li>

		<li>
			<p>That's it! PrinTrac.php is now installed!<br />To test it out, print preview a page with the tracking code and the new CSS on it - then navigate to: <code>http://your-domain-name.example.com/path/to/printrac.php?gui</code> and you should see a print recorded!</p>
		</li>

		</ol>
	</section>

	<section>
		<h2>FAQs</h2>
		<dl>
			<dt>How secure is the print records?</dt>
			<dd>The logs are unsecure by default. The only way to access the logs, is if someone has the link to the script and URL query string.</dd>
			<dt>How do I access the logs?</dt>
			<dd>Visit the following URL, substituting as needed: <code>http://www.your-domain-name.com/the/full/path/to/the/file/printrac.php?gui</code>.</dd>
			<dt>I found a bug! How do I report it?</dt>
			<dd>Thank You for Starters! You can report the bug in the <a href="https://github.com/mad9scientist/PrinTrac.php/issues">issue tracker</a> on GitHub</dd>
			<dt>What is this project licensed under?</dt>
			<dd>BSD License, please see the bottom of PrinTrac.php file for full license.</dd>
			<dt>I want to help the project?</dt>
			<dd>If you want to help, you can either make a pull request on GitHub or Contact me directly via my <a href="http://mad9scientist.com/contact/">contact form</a></dd>
		</dl>
	</section>

	<footer>
		<p>Created &amp; Maintained by <a href="http://mad9scientist.com/">Chris Holbrook/Mad9Scientist</a></p>
	</footer>

</body>
</html>