<?php 

/*
	PrinTrac.php (v. 0.2.1)
		Get Stats on Users Printing Your Web Pages
		Created by: Chris Holbrook (http://mad9scientist.com/)
		Licensed Under BSD License
		GitHub: http://mad9scientist.github.com/printrac.php
*/

/* Settings */
define('DS', DIRECTORY_SEPARATOR);

$location = getcwd().DS."logs".DS;	#File Location
$filename = "printrac_logs.txt"; 	#Log Filename

#Google Analytics
	# In Development


/***********************************************************************
							Stop Editing
***********************************************************************/

/* Global Var */
$logfile = $location.$filename;
$ver = "0.2.1-prototype";

/* Function Selector */
if(isset($_GET['track'])){track();}
if(isset($_GET['view']) && $_GET['view'] <> 'gui'){view();}
if(isset($_GET['view']) && $_GET['view'] === 'gui' || isset($_GET['gui'])){gui();}
if(isset($_GET['hdrTrackCode'])){hdrTracker();}
if(isset($_GET['css'])){css();}
if(isset($_GET['about'])){pagesAbout();}
if(isset($_GET['js'])){jsTrack();}

function track(){
	# printrac.php?track

	# Gather Information to Record
		#Date/Time
		#IP Address
		#Host Name
		#User-Agent
		#Current URL
	$date = date(DATE_RFC822);
	$ip = $_SERVER['REMOTE_ADDR'];
	$uagent = $_SERVER['HTTP_USER_AGENT'];
	$page = $_COOKIE['currentpage-printrac-php'];
	

	#Write Data to logs
	$log = fopen($GLOBALS['logfile'], "a+");
	fwrite($log, "$date \t $ip \t $uagent \t $page\n");
	fclose($log);

	return trackImg(1,1);
}

	function trackImg($w,$h){
		# creates tracking images (only can be called for track function)
		
		header("Content-type: image/png");
		header("Expires: Sat, 1 Jan 2000 00:00:00 GMT");
		header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		$handle = ImageCreate ($w, $h) or die ("Cannot Create image"); 
	 	$bg_color = ImageColorAllocateAlpha ($handle, 0, 0, 0, 0); 
	 	ImagePng ($handle); 
		imagedestroy($handle);
	}

function view(){
	# Dumps log file to screen with limited formatting
	$viewRawLog = fopen($GLOBALS['logfile'], "r");
	#echo fread($viewRawLog, filesize($GLOBALS['logfile']));

	if($viewRawLog){
		while (($buffer = fgets($viewRawLog)) !== false){
			echo "<br>" . $buffer ;
		}
		if (!feof($viewRawLog)){
			echo "Error: unexpected end of file\n";
		}
		fclose($viewRawLog);
	}
}

function gui(){
	# Read log file and performs stats counts

	# Read and Count Records
	$table = "";
	$count = 0;
	$row = 1;
	
	if (($handle = fopen($GLOBALS['logfile'], "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 0, "\t")) !== FALSE) {
	        $num = count($data);
	        $table .= "\t<tr>\n";
	        $row++;
	        for ($c=0; $c < $num; $c++) {
	            $table .= "\t\t<td>".$data[$c] . "</td>\n";
	        }
	        $table .= "\t</tr>\n";
	        $count = $count + 1;
	    }
	    fclose($handle);
	}

	# Prepare Page
	htmlHeader();

	# Quick Stat Data
	print "<div class='quick-stat'>
\t<div class='totalprints'>
\t\t<p>Total Pages Printed</p>
\t\t<p class='ieCount'>$count</p>
\t</div>
</div>\n";

	# Table Prep
	print "<h2>Detailed Logs</h2>
<table cellspacing=0 cellpadding=0><thead>
\t<tr>
\t\t<th>Date/Time</th>
\t\t<th>IP Address</th>
\t\t<th>Browser User-Agent</th>
\t\t<th>Page Printed</th>
\t</tr>
</thead><tbody>\n";

	# Display Table 
	print $table;

	# Close Table
	print "</tbody></table>";

	# Close Page
	htmlFooter();
}

function hdrTracker(){
	# Print Header Code, Deprecated by Javascript Link
	# Code Removal for v 0.3.0
	$printracPage = $_SERVER['REQUEST_URI'];
	setcookie('currentpage-printrac-php', $printracPage, 0, "/");
	echo "<div class='printracphp-ie' style='display:none;'></div>";
}

function pagesAbout(){
	header("Location: http://mad9scientist.github.com/PrinTrac.php/");
}


function ga(){
	/* Google Analytics Code

		Future Version

		ToDo: Research Submitting Data to GA via PHP
		
	*/
}


/*
	Utility Functions
*/

function htmlHeader(){

	print "<!DOCTYPE html>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >
	<title>PrinTrac.php - Website Printing Statistics</title>
	<link rel='stylesheet' href='printrac.php?css' />
	<!--[if lt IE 9]>
		<script src='http://global.staticookie.com/js/html5shiv.js'></script>
	<![endif]-->
</head>
<body>
<header>
	<h1>PrinTrac.php</h1>
	<span>Website Printing Stats, for the Curious</span>
	<nav>
		<ul>
			<li><a href='printrac.php?view=gui'>Logs</a></li>
			<li><a href='printrac.php?view'>Raw Logs</a></li>
			<li><a href='printrac.php?about'>About</a></li>
		</ul>
	</nav>

</header>
";
	
}

function htmlFooter(){
	$version = $GLOBALS['ver'];
	print "
<footer>
	<a href='http://mad9scientist.github.com/PrinTrac.php/' title='Project Site'>PrinTrac.php</a> &mdash; v. $version
</footer>
</body>
</html>";
	
}

function css(){
	header("Content-type: text/css");
	print "article,aside,details,figcaption,figure,footer,header,hgroup,nav,section,summary{display:block;}
	body {
	background: #444;
	margin: 0 auto;
	padding: 0;
	width: 80%;
	font-family: sans-serif;
}
header {
	background: gray;
	background: -webkit-linear-gradient(bottom, gray, silver);
	background: -moz-linear-gradient(bottom, gray, silver);
	background: -o-linear-gradient(bottom, gray, silver);
	background: -ms-linear-gradient(bottom, gray, silver);
	background: linear-gradient(bottom, gray, silver);
	padding: 8px;
	height: 100px;
	-webkit-border-radius: 0 0 8px 8px;
	-moz-border-radius: 0 0 8px 8px;
	border-radius: 0 0 8px 8px;
	-webkit-box-shadow: 0 0 2px #000;
	-moz-box-shadow: 0 0 2px #000;
	box-shadow: 0 0 2px #000;
	position: relative;
}
header h1 {
	color: #fff;
	text-shadow: 0 -1px 0px #000;
}
header span {
	color: #ddd;
	position: absolute;
	bottom: 25px;
	left: 30px;
	font-style: italic;
	text-shadow: 0 1px 0 #000;
}
header nav {float: right;}
header nav ul {list-style:none; bottom: 30px; right: 10px; position: relative;}
header nav ul li {float:left; margin-left:8px;}
header nav ul li a {
	color: #eee;
	text-decoration: none;
	border: 1px solid #666;
	padding: 4px 8px;
	background: #aaa;
	background: -webkit-linear-gradient(bottom, #aaa, #888);
	background: -moz-linear-gradient(bottom, #aaa, #888);
	background: -o-linear-gradient(bottom, #aaa, #888);
	background: -ms-linear-gradient(bottom, #aaa, #888);
	background: linear-gradient(bottom, #aaa, #888);
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	
}
header nav ul li a:hover {
	-webkit-box-shadow: 0 1px 1px 0px #000 inset;
	-moz-box-shadow: 0 1px 1px 0px #000 inset;
	box-shadow: 0 1px 1px 0px #000 inset;
	color: #eee;
	border-bottom: none;
}
.quick-stat{
	height:100px;
	padding:8px 0;
}
.totalprints {
	background: #c4c4c4;
	-webkit-box-shadow: 0 0 3px #000 inset;
	-moz-box-shadow: 0 0 3px #000 inset;
	box-shadow: 0 0 3px #000 inset;
	width: 25%;
	margin: 2px;
	height: 100px;
}
.totalprints p:first-child{
	font-size:18px;
	font-weight:bold;
	text-align: center;
	border-bottom:2px solid #888;
	margin-top:0;
	padding:5px;
}
.totalprints p:last-child,.totalprints p.ieCount {
	text-align: center;
	font-size: 28px;
	font-weight: bold;
	color: #eee;
	text-shadow: 0 1px 0 #000;
	margin: 10px;
}
h2 {
	color: #c4c4c4;
	border-bottom: 2px solid;
	text-shadow: 0 1px 0 #000;
}
table{
	color:#ddd;
	font-size:12px;
	width:100%;
}
table thead{
	font-size:14px;
	font-weight:bold;
	background:#000;
	border:none;
}
table tbody tr:nth-child(even){
	background:#666;
}
footer{
	margin-top:30px;
	background: #333;
	height:30px;
	line-height: 30px;
	text-align:center;
	color:#C4C4C4;
}
a, a:link{
	color:#09f;
	text-decoration:none;
	border-bottom:1px dotted;
}
a:hover{
	color:#369;
	border-bottom:1px solid;
}
.clear{clear:both;}
";
}

function jsTrack(){
	header("Content-type: application/javascript"); 
	print "// PrinTrac.php - Website Print Stats, for the Curious
// http://mad9scientist.github.com/PrinTrac.php/
// IE Tracking Element

var element, body;

// Create a Cookie with current page
document.cookie = 'currentpage-printrac-php=' + document.URL + '; path=/';

// Inject an element into the DOM
element = document.createElement('div');
element.className = 'printracphp-ie';
element.style.display = 'none';

body = document.getElementsByTagName('body')[0];
body.appendChild(element);

";

}

/*

Copyright (c) 2012, Chris Holbrook (Mad9Scientist)
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:
    * Redistributions of source code must retain the above copyright
      notice, this list of conditions and the following disclaimer.
    * Redistributions in binary form must reproduce the above copyright
      notice, this list of conditions and the following disclaimer in the
      documentation and/or other materials provided with the distribution.
    * Neither the name of the PrinTrac.php nor the
      names of its contributors may be used to endorse or promote products
      derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL Chris Holbrook (Mad9Scientist) BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

*/
