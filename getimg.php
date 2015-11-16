<?php
session_start();//start a session
$_SESSION['session_number'] = dechex(time());//name the session
if (preg_match('#^https?://(?:[^.]+\.)*instagram\.com/#i', $_POST['uri'])) {//a litthe Regex to validate the instagram url

$jsonURL ="http://api.instagram.com/publicapi/oembed/?url=".$_POST['uri'];//connect to instagram public API

$json = file_get_contents($jsonURL); 
$data = json_decode($json);
$tempfile = "imagetemp.php?id=".$_SESSION['session_number'];

//var_dump($data->{"thumbnail_url"});
$_SESSION['link'] = $data->{"thumbnail_url"};

//copy($data->{"thumbnail_url"}, $tempfile);

echo '<div id="link">'.$tempfile.'</div>';

echo '<img id="source" src="'.$tempfile.'" />';


    
} else {
    echo "The given link must be from Instagram.com";
}




?>
