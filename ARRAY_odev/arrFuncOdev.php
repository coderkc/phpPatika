<?php

$planets = [
    "Mercury",
    "Venus",
    "Earth",
    "Mars",
    "Jupiter",
    "Saturn",
    "Uranus",
    "Neptune",
    "",
    "",
    NULL
];

function showRandom($arr, $n)
{

    if ($n < count($arr)) {

        $filteredArr = array_filter($arr, function ($el) {
            return $el == "" || $el == null ? false : $el;
        });

        $randomArr = array_rand($filteredArr, $n);

        $result = array_map(function ($key) use ($filteredArr) {
            return $filteredArr[$key];
        }, $randomArr);

        return $result;
    }
    // else{
    //     echo "n değeri dizinin uzunluğunu geçmemeli...";
    // }


}


echo "<pre>";

print_r(showRandom($planets, 2));
print_r(showRandom($planets, 3));
print_r(showRandom($planets, 2));
print_r(showRandom($planets, 4));
print_r(showRandom($planets, 5));
print_r(showRandom($planets, 27));
