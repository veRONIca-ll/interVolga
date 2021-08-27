<?php
/* === условие === */

/* Дан массив из 100 элементов. 
Требуется вывести количество последовательных пар одинаковых элементов */


/* === решение === */

//Создание массива из 100 элементов
$n = 100;
for ($i=0; $i<$n; $i++){
    $arr[$i] = rand(1, 10);
}

$amountOfCouples = 0;

// Подсчет количества повторяющихся элементов
for ($i = 1; $i <= $n; $i++){
    if ($arr[$i-1] == $arr[$i]){
        $amountOfCouples++;
    }
}

echo "/n";
echo $amountOfCouples;