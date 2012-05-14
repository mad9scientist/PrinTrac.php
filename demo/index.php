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
	<a href="http://github.com/mad9scientist/PrinTrac.php/"><img alt="Fork me on GitHub" src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png" style="position: fixed; top: 0; right: 0; border: 0;"></a>
	<header>
		<h1><a href="http://mad9scientist.com/projects/printracphp/" id="logo">PrinTrac.php</a></h1>
		<span>Website Printing Stats, for the Curious</span>
		<a href="http://mad9scientist.com/" id="creator">M</a>
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
			<p>Step 0: Download PrinTrac.php from <a href="https://github.com/mad9scientist/PrinTrac.php/zipball/master">GitHub</a></p>
		</li>	
		<li>
			<p>The first thing you need to do is upload <code>printrac.php</code> to your website, for example to its own directory. Next you need to create a new directory in the same folder that <code>printrac.php</code> is in, so it can have a location to store the logs. You need to create a directory named <code>logs</code>.</p>			
		</li>

		<li>
			<p>Now that <code>PrinTrac.php</code> is on your website you need to add the following code to your webpages. Place the below code right before the closing body tag on your webpages</p>
			<pre><code>&lt;!-- PrinTrac.php Tracking Code - http://madscitech.com/m/10 --&gt;
&lt;script src="/path/to/printrac.php?js"&gt;&lt;/script&gt;</code></pre>
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
			<p>Then add the above code either above or below your the current CSS that is now wrapped with the <code>@media print</code>.</p>
		</li>

		<li>
			<p>That's it! PrinTrac.php is now installed!<br />To test it out, print preview a page with the tracking code and the new CSS on it - then navigate to: <code>http://your-domain-name.example.com/path/to/printrac.php?gui</code> and you should see a print recorded!</p>
		</li>

		</ol>

		<a class="button" href="https://github.com/mad9scientist/PrinTrac.php/zipball/master">Download & Install</a>

		<h4>Viewing the Logs</h4>
		<p>To view the pretty logs that PrinTrac.php create, point your web browser to</p>
		<pre>http://your-domain-name-here.example.com/full/path/to/printrac.php?gui</pre>
	</section>

	<section>
		<h2>FAQs</h2>
		<dl>
			<dt>How secure is the print records?</dt>
			<dd>The logs are unsecure by default. The only way to access the logs, is if someone has the link to the script and URL query string.</dd>
			<dt>How do I access the logs?</dt>
			<dd>Visit the following URL, substituting as needed: <code>http://www.your-domain-name.com/the/full/path/to/the/file/printrac.php?gui</code>.</dd>
			<dt>What technologies are required for this to work?</dt>
			<dd>PHP and Javascript</dd>

			<dt>I found a bug! How do I report it?</dt>
			<dd>Thank You for a Start! You can report the bug in the <a href="https://github.com/mad9scientist/PrinTrac.php/issues">issue tracker</a> on GitHub or Submit it via my <a href="http://mad9scientist.com/contact/">contact form</a>.</dd>
			<dt>What is this project licensed under?</dt>
			<dd>BSD License, please see the bottom of PrinTrac.php file for full license.</dd>
			<dt>I want to help the project?</dt>
			<dd>If you want to help, you can either make a pull request on GitHub or Contact me directly via my <a href="http://mad9scientist.com/contact/">contact form</a></dd>
			<dt>What Browsers are Supported?</dt>
			<dd>Any browser that support CSS and Javascript. PrinTrac.php has been fully tested in:
				<ul>
					<li>Firefox 10</li>
					<li>Chrome 17</li>
					<li>Opera 11.61</li>
					<li>Safari 5.1</li>
					<li>Internet Explorer 8</li>
				</ul>
			</dd>
		</dl>
	</section>

	<footer>
		<p>Created &amp; Maintained by <a href="http://mad9scientist.com/">Chris Holbrook/Mad9Scientist</a></p>
	</footer>
	<!-- PrinTrac.php Tracking Code - http://madscitech.com/m/10 -->
  	<script src="printrac.php?js"></script>
</body>
</html>