<?php
error_reporting(E_ERROR);
require 'tmhOAuth.php' ;

$connection = new tmhOAuth(array(
	'consumer_key' => 'EUMbSd6TJuYcvIJaOASh5bJzX',
	'consumer_secret' => 'AptTWlhsi86TNRibWQR7ogYPYth3AZvZnhiSKfGK7rxOa4m8oT',
	'user_token' => '792479156-fsM2rOZR1OjGtbyD1Nda0pksQHCx9lkDMX96ExCP',
	'user_secret' => '38Tntvh0o1eZjgrHrol41S7sA6NidpCzRxKnbD5Xt657I'
));


$parameters = array();

//new
//$parameters['screen_name'] = "SreejoyHalder";
$twitter_path = '1.1/statuses/user_timeline.json';
//endNew

/*if ($_GET['count']) {
	$parameters['count'] = strip_tags($_GET['count']);
}*/

//if (isset($_POST['submit'])){

if ($_GET['twitter_id']) {
	$parameters['screen_name'] = strip_tags($_GET['twitter_id']);
}
if ($_GET['n']) {
	$no_of_hashtags=strip_tags($_GET['n']);
}

$parameters['count']=200;

//echo $parameters['screen_name'];
//echo $time;



$http_code = $connection->request('GET', $connection->url($twitter_path), $parameters );
/*if ($http_code === 200) { // if everything's good
	$response = strip_tags($connection->response['response']);
	if ($_GET['callback']) { // if we ask for a jsonp callback function
		echo $_GET['callback'],'(', $response,');';
	} else {
		echo $response;	
	}
} else {
	echo "Error ID: ",$http_code, "<br>\n";
	echo "Error: ",$connection->response['error'], "<br>\n";
}*/
if ($http_code === 200){  // if everything's good
$response = strip_tags($connection->response['response']);
//echo $response;	
//create array for json data
$data = json_decode($response, true);
$hash_array= array();
//parse each tweet and update
$i=0;
//entry the hashtags into the array
foreach($data as $row){
		
	foreach($row['entities']['hashtags'] as $hashTags){
		$found=0;
		foreach ($hash_array as $key => $val) {
			if(!strcmp($key,$hashTags['text'])){  //if key exists
				$hash_array[$key]++;
				$found++;
			}         
				
		}
		if($found == 0)   //if key not found
			$hash_array[$hashTags['text']]=1;
	}
	
} //for loop end

//sort the array in descending order

arsort($hash_array);

//get the highest(based on counts) n hashtags
$i=0;
$fp = fopen('results.json', 'w');  //open the file
$results=array();
foreach ($hash_array as $key => $val) {
    if($i< $no_of_hashtags){
		//echo nl2br("$key = $val\n");
		$i++;
		$results[$key]=$val;
	}
	else{
		break;
	}
}
fwrite($fp,json_encode($results));
fclose($fp);
//echo nl2br("\nThe whole Array\n");


//foreach ($hash_array as $key => $val) {
 //   echo nl2br("$key = $val\n");
	
//}

	if($parameters['screen_name']!=null && $no_of_hashtags!=null){
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=results.json">'; 
	exit;
}



}  //not empty if condition end

else {
	echo "Error ID: ",$http_code, "<br>\n";
	echo "Invalid Username <br>\n";
	echo "Error: ",$connection->response['error'], "<br>\n";
}

//}



//echo $data[0]['entities']['hashtags'][0]['text'];
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
					.form-container {
		   border: 1px solid #f2e3d2;
		   background: #c9b7a2;
		   background: -webkit-gradient(linear, left top, left bottom, from(#f2e3d2), to(#c9b7a2));
		   background: -webkit-linear-gradient(top, #f2e3d2, #c9b7a2);
		   background: -moz-linear-gradient(top, #f2e3d2, #c9b7a2);
		   background: -ms-linear-gradient(top, #f2e3d2, #c9b7a2);
		   background: -o-linear-gradient(top, #f2e3d2, #c9b7a2);
		   background-image: -ms-linear-gradient(top, #f2e3d2 0%, #c9b7a2 100%);
		   -webkit-border-radius: 8px;
		   -moz-border-radius: 8px;
		   border-radius: 8px;
		   -webkit-box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
		   -moz-box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
		   box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
		   font-family: 'Helvetica Neue',Helvetica,sans-serif;
		   text-decoration: none;
		   vertical-align: middle;
		   min-width:300px;
		   padding:20px;
		   width:300px;
		   }
		.form-field {
		   border: 1px solid #c9b7a2;
		   background: #e4d5c3;
		   -webkit-border-radius: 4px;
		   -moz-border-radius: 4px;
		   border-radius: 4px;
		   color: #c9b7a2;
		   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
		   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
		   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
		   padding:8px;
		   margin-bottom:20px;
		   width:280px;
		   }
		.form-field:focus {
		   background: #fff;
		   color: #725129;
		   }
		.form-container h2 {
		   text-shadow: #fdf2e4 0 1px 0;
		   font-size:18px;
		   margin: 0 0 10px 0;
		   font-weight:bold;
		   text-align:center;
			}
		.form-title {
		   margin-bottom:10px;
		   color: #725129;
		   text-shadow: #fdf2e4 0 1px 0;
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
<font color="#696969" size="5"><h1 align="center">Twitter Monitoring App</h1></font>
<font color="#696969" size="5"><h2 align="center">Search Frequent Hashtags</h1></font>
<input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">


<center>
<ul id="css3menu1" class="topmenu">
	<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
	<li class="topfirst"><a  href="active.php" style="height:15px;line-height:15px;">Active Period</a></li>
	<li class="topmenu"><a class="pressed" href="hashtag.php" style="height:15px;line-height:15px;">Frequent Hashtags</a></li>
	<li class="toplast"><a href="authority.php" style="height:15px;line-height:15px;">Authorship Detection</a></li>
</ul><p class="_css3m"><a href="http://css3menu.com/">css3 menu</a> by Css3Menu.com</p>
</center>
<br/>
<br/>
<br/>
<br/>
<body>
	<center>
	<form action=""  class="form-container">
		<div class="form-title">Twitter Id</div>
		<input class="form-field" type="text" name="twitter_id"> </br>
		<div class="form-title">No Of Hashtags</div>
		<input class="form-field" type="text" name="n"> </br>
		<div class="submit-container">
		<button class="submit-button" type="submit" name="submit">submit</button>
		</br></br>
		
	</form>
	</center>
</body>
</html>

