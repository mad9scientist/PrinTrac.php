<?php
	$printracPage = $_SERVER['REQUEST_URI'];
	setcookie('currentpage-printrac-php', $printracPage, 0, "/");
?>

<DOCTYPE HTML>
<html>
<head>
	<title>PrinTrac.php - Track Website Visitors Printing Your Pages</title>
	<link rel="stylesheet" href="styles.css" />
</head>
<body>

	<header>
		<h1>PrinTrac.php</h1>
		<span>How Often Are Your Webpages Being Printed?</span>
	</header>

	<article>
		
	<h2>What is PrinTrac.php?</h2>
	<p>PrinTrac.php is a simple script to record when a website visitor prints a page. It uses a small image that is included when the visitor actually prints a page using CSS</p>

	<h2>Why Should I Use It?</h2>
	<p>There isn't really a great reason to use it. It just some simple statistics about your visitor printing habits.</p>

	<h3>How To Use?</h3>
	<p>To use PrinTrac.php</p>

	</article>

	<footer>
		
		PrinTrac.php was Created by Chris Holbrook

	</footer>

</body>
</html>