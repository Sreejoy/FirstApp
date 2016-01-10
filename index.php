<?php
error_reporting(E_ERROR);
?>
<!DOCTYPE html>
<html dir="ltr">
<head>
	<title>
			Twitter Observation
	</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0">
	
		<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="CSS3 Menu_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
	<!-- End css3menu.com HEAD section -->
	<style>
					select {
				padding:3px;
				margin: 0;
				-webkit-border-radius:4px;
				-moz-border-radius:4px;
				border-radius:4px;
				-webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
				-moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
				box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
				background: #f8f8f8;
				color:#888;
				border:none;
				outline:none;
				display: inline-block;
				-webkit-appearance:none;
				-moz-appearance:none;
				appearance:none;
				cursor:pointer;
			}

			/* Targetting Webkit browsers only. FF will show the dropdown arrow with so much padding. */
			@media screen and (-webkit-min-device-pixel-ratio:0) {
				select {padding-right:18px}
			}

			label {position:relative}
			label:after {
				content:'<>';
				font:11px "Consolas", monospace;
				color:#aaa;
				-webkit-transform:rotate(90deg);
				-moz-transform:rotate(90deg);
				-ms-transform:rotate(90deg);
				transform:rotate(90deg);
				right:8px; top:2px;
				padding:0 0 2px;
				border-bottom:1px solid #ddd;
				position:absolute;
				pointer-events:none;
			}
			label:before {
				content:'';
				right:6px; top:0px;
				width:20px; height:20px;
				background:#f8f8f8;
				position:absolute;
				pointer-events:none;
				display:block;
			}

			.submit-container {
					   margin:8px 0;
					   text-align:center;
					   }
					.submit-button {
					   border: 1px solid #447314;
					   background: #6aa436;
					   background: -webkit-gradient(linear, left top, left bottom, from(#8dc059), to(#6aa436));
					   background: -webkit-linear-gradient(top, #8dc059, #6aa436);
					   background: -moz-linear-gradient(top, #8dc059, #6aa436);
					   background: -ms-linear-gradient(top, #8dc059, #6aa436);
					   background: -o-linear-gradient(top, #8dc059, #6aa436);
					   background-image: -ms-linear-gradient(top, #8dc059 0%, #6aa436 100%);
					   -webkit-border-radius: 4px;
					   -moz-border-radius: 4px;
					   border-radius: 4px;
					   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
					   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
					   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
					   text-shadow: #addc7e 0 1px 0;
					   color: #31540c;
					   font-family: helvetica, serif;
					   padding: 8.5px 18px;
					   font-size: 14px;
					   text-decoration: none;
					   vertical-align: middle;
					   }
					.submit-button:hover {
					   border: 1px solid #447314;
					   text-shadow: #31540c 0 1px 0;
					   background: #6aa436;
					   background: -webkit-gradient(linear, left top, left bottom, from(#8dc059), to(#6aa436));
					   background: -webkit-linear-gradient(top, #8dc059, #6aa436);
					   background: -moz-linear-gradient(top, #8dc059, #6aa436);
					   background: -ms-linear-gradient(top, #8dc059, #6aa436);
					   background: -o-linear-gradient(top, #8dc059, #6aa436);
					   background-image: -ms-linear-gradient(top, #8dc059 0%, #6aa436 100%);
					   color: #fff;
					   }
					.submit-button:active {
					   text-shadow: #31540c 0 1px 0;
					   border: 1px solid #447314;
					   background: #8dc059;
					   background: -webkit-gradient(linear, left top, left bottom, from(#6aa436), to(#6aa436));
					   background: -webkit-linear-gradient(top, #6aa436, #8dc059);
					   background: -moz-linear-gradient(top, #6aa436, #8dc059);
					   background: -ms-linear-gradient(top, #6aa436, #8dc059);
					   background: -o-linear-gradient(top, #6aa436, #8dc059);
					   background-image: -ms-linear-gradient(top, #6aa436 0%, #8dc059 100%);
					   color: #fff;
					   }
	</style>
	
</head>
<body ontouchstart="" bgcolor="#87CEEB">
<!-- Start css3menu.com BODY section -->
<font color="#696969" size="5"><h1 align="center">Twitter Monitoring App</h1>
<h2 align="center">In the Planet of Jakku</h2></font>
<input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">


<center>
<ul id="css3menu1" class="topmenu">
	<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
	<li class="topfirst"><a  href="active.php" style="height:15px;line-height:15px;">Active Period</a></li>
	<li class="topmenu"><a href="hashtag.php" style="height:15px;line-height:15px;">Frequent Hashtags</a></li>
	<li class="toplast"><a href="authority.php" style="height:15px;line-height:15px;">Authorship Detection</a></li>
</ul><p class="_css3m"><a href="http://css3menu.com/">css3 menu</a> by Css3Menu.com</p>
</center>
<font color="#696969" size="4">
<p>With this application, you can monitor the most active period and most frequent hash tags of 
twitter users in your planet. Besides given a tweet,you can count the probability of the tweet being 
tweeted by a certain user of your planet. Happy Stalking!!!</p>
</font>
<center>

</center>
<br/>
<br/>
<br/>
<br/>