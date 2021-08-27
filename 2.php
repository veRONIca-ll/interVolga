<?php
/* === условие === */

/*  
    На диске лежит файл image.png, размер 20000 на 20000. 
    Вывести картинку как баннер размером 200 на 100 пикселей.
    Обратите внимание на размер и пропорции, и подумайте о времени загрузки. 
*/


/* === решение === */

// Чтение картинки
$initImage = imagecreatefromjpeg('image.png');

if (!$initImage){
    die('Could not open the file!');
}

list($initW, $initH) = getimagesize('image.png');
$newW = 200;
$newH = 100;

// Создание пустого черного прямоугольника для будущего баннера
$newImage = imagecreatetruecolor($newW, $newH);
if (!$newImage){
    die('Could not create an image!');
}

header('Content-type: image/png');

// Копирование и изменение размера картинки 
imagecopyresampled($newImage, $initImage, 0, 0, 0, 0, $newW, $newH, $initW, $initH);
imagejpeg($newImage);

// Очитска памяти
imagedestroy($initImage);
imagedestroy($newImage);