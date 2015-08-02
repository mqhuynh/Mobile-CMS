<!DOCTYPE html>
<html>
    <head>
	    <title>CDCS App</title>
        <meta charset="UTF-8">
        <!-- set the content fill the entire device screen, in our case mobile devices-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- link to the CSS library files -->
		<link rel="stylesheet" href="lib/css/customCdcs.css" />
		<link rel="stylesheet" href="lib/css/jquery.mobile.icons.min.css" />
		<link rel="stylesheet" href="lib/css/jquery.mobile.structure-1.4.5.min.css" />
		<link href="lib/css/custom.css" rel="stylesheet" type="text/css"/>

		<!-- link to the JavaScript library files -->
		<script src="lib/js/jquery-1.11.1.min.js" type="text/javascript"></script>
		<script src="lib/js/jquery.mobile-1.4.5.min.js"></script>
		<script src="lib/js/custom.js" type="text/javascript"></script>
    </head>
	<body>
	<?php
		// get the index value for search category, if no paramater is passed, set it to index of field with data-type "name"
		$search_category = isset($_GET['s'])? $_GET['s']:$name_index; 
	?>
