<?php
include 'conn.php';
    $im = @imagecreate (40, 15) or die ("Cannot initialize new GD image stream!");
    $bg = imagecolorallocate ($im, 232, 238, 247);
  

    //создаём шум на фоне
    for ($i=0; $i<=128; $i++) {
    $color = imagecolorallocate ($im, rand(0,255), rand(0,255), rand(0,255)); //задаём цвет
    imagesetpixel($im, rand(2,80), rand(2,10), $color); //рисуем пиксель
    }
    /* $color = imagecolorallocate($img, 0, 0, 0);*/

    $_SESSION['code']=rand(1000,9999);

    // write the string at the top left
    imagestring($im, 5, 0, 0, $_SESSION['code'], $color);

    //создание рисунка в зависимости от доступного формата

    if (function_exists("imagepng")) {
    header("Content-type: image/png");
    imagepng($im);
    } elseif (function_exists("imagegif")) {
    header("Content-type: image/gif");
    imagegif($im);
    } elseif (function_exists("imagejpeg")) {
    header("Content-type: image/jpeg");
    imagejpeg($im);
    } else {
    die("No image support in this PHP server!");
    }




?>