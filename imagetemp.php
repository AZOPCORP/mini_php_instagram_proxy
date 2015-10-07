<?php

session_start();

if($_SESSION['session_number']==$_GET["id"]){

function LoadJpeg($imgname)
{
    /* Attempt to open */
    $im = @imagecreatefromjpeg($imgname);

    /* See if it failed */
    if(!$im)
    {
        /* Create a black image */
        $im  = imagecreatetruecolor(150, 30);
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);

        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

        /* Output an error message */
        imagestring($im, 10, 50, 50, 'Error loading ' . $imgname, $tc);
    }

    return $im;
}

header('Content-Type: image/jpeg');

$img = LoadJpeg($_SESSION['link']);

imagejpeg($img);
imagedestroy($img);
//session_destroy();

}else{

echo "error!";
//session_destroy();
}

?>
