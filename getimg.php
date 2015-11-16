<?php
session_start();//start a session
$_SESSION['session_number'] = dechex(time());//name the session
if (preg_match('#^https?://(?:[^.]+\.)*instagram\.com/#i', $_POST['uri'])) {//a litthe Regex to validate the instagram url

$jsonURL ="http://api.instagram.com/publicapi/oembed/?url=".$_POST['uri'];//link to instagram public API

$json = file_get_contents($jsonURL); //connect to the API
$data = json_decode($json);//decode the JSON and assign to a variable
$tempfile = "imagetemp.php?id=".$_SESSION['session_number'];//create temporary link to our image reffers to imagetemp.php


$_SESSION['link'] = $data->{"thumbnail_url"}; //store the remote image url in a session variable so we can pass it to imagetemp.php



echo '<div id="link">'.$tempfile.'</div>'; // 

echo '<img id="source" src="'.$tempfile.'" />';//echo our proxy image


    
} else {
    echo "The given link must be from Instagram.com";
}




?>
