<?php

function tri($n){
    for ($i=0; $i < $n; $i++) { 
        
        $k=0;
        while ($k <= $i) {
            echo  "i ";
            $k++;
        }
        echo   "<br>";
    }
}

tri(5);