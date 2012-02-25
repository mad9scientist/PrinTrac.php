<?php 

/*
	PrinTrac.php (v. 0.0.1)
		Get Stats on Users Printing Your Web Pages
		Created by: Chris Holbrook (http://mad9scientist.com/)
		GitHub: http://mad9scientist.github.com/printrac.php
*/

/* Settings */
$location = getcwd()."\logs\\";		#File Location
$filename = "printrac_logs.txt"; 	#Log Filename

#Google Analytics
	# In Development


/***********************************************************************
							Stop Editing
***********************************************************************/

/* Global Var */
$logfile = $location.$filename;

/* Function Selector */
if(isset($_GET['track'])){track();}
if(isset($_GET['view']) && $_GET['view'] <> 'gui'){view();}
if(isset($_GET['view']) && $_GET['view'] === 'gui'){gui();}
if(isset($_GET['css'])){css();}

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
	$host = $_SERVER['REMOTE_HOST'];
	$uagent = $_SERVER['HTTP_USER_AGENT'];
	$page = $_COOKIE['currentpage-printrac-php'];
	

	#Write Data to logs
	$log = fopen($GLOBALS['logfile'], "a+");
	fwrite($log, "$date \t $ip \t $host \t $uagent \t $page\n");
	fclose($log);

	return trackImg();
}

	function trackImg(){
		# creates tracking images (only can be called for track function)

		header("Content-type: image/png");
		$handle = ImageCreate (50, 50) or die ("Cannot Create image"); 
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
	# Parent to View
	#echo "view gui function";

	# Read and Count Records

	$table = "";
	$count = 0;
	$row = 1;
	
	if (($handle = fopen($GLOBALS['logfile'], "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 0, "\t")) !== FALSE) {
	        $num = count($data);
	        #echo "\t<tr>\n";
	        $table .= "\t<tr>\n";
	        $row++;
	        for ($c=0; $c < $num; $c++) {
	            #echo "\t\t<td>".$data[$c] . "</td>\n";
	            $table .= "\t\t<td>".$data[$c] . "</td>\n";
	        }
	        #echo "\t</tr>\n";
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
\t\t<p>$count</p>
\t<div>
</div>\n";

	# Table Prep
	print "<table><thead>
\t<tr>
\t\t<th>Date/Time</th>
\t\t<th>IP Address</th>
\t\t<th>Host Name</th>
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


function ga(){
	/* Google Analytics Code
	
		Submit data to GA
		
	*/
}


/*
	Utility Functions
*/

function htmlHeader(){

	print "<!DOCTYPE html>
<html>
<head>
	<title>PrinTrac.php - Website Printing Statistics</title>
	<link rel='stylesheet' src='printrac.php?css' />
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

	print "
<footer>
	<a href='http://mad9scientist.github.com/PrinTrac.php/' title='Project Site'>PrinTrac.php</a> &mdash; v. $version
</footer>
</body>
</html>";
	
}

function css(){
	header("Content-type: text/css");
	print "";
}
