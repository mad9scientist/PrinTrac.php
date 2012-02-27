<!DOCTYPE html>
<html>
<head>
	<title>PrinTrac.php - Demo Site</title>
	<link rel="stylesheet" href="/css/style.css" />
</head>
<body>

	<header>
		<h1><a href="http://mad9scientist.com/projects/printracphp/">PrinTrac.php</a></h1>
		<span>Website Printing Stats, for the Curious</span>
	</header>

	<section>
		<h2>Welcome to PrinTrac.php Demo Page</h2>
		<p>This is just a quick demo page. If you print or print preview this page and then click the button labeled "View Print Stats" you will see the date/time and your IP address in the detailed logs section of the stats page.</p>
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
			<p>Now that <code>PrinTrac.php</code> file is on your website you need to add the following code to the very top of your webpages, it is <b>Very Important</b> to place it before anything is outputted to the page, so place even above your doctype declaration or your opening HTML tag.</p>
			<pre>
				<code>
						<?php
	$printracPage = $_SERVER['REQUEST_URI'];
	setcookie('currentpage-printrac-php', $printracPage, 0, "/");
	echo '<div class='printracphp-ie' style='display:none;'></div>';
?>
				</code>
			</pre>
		</li>

		</ol>
	</section>


</body>
</html>