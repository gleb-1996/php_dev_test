<?php

define('ROOT', dirname(__FILE__));

function binarySearch($file, $key_value){

    $open_file = fopen($file, 'r');

    while (!feof($open_file)){
        $str = fgets($open_file, 4000);
        mb_convert_encoding($str, 'cp1251');
        $explodeStr = explode('\x0A', $str);
        array_pop($explodeStr);
        foreach ($explodeStr as $key => $value){
            $arr[] = explode('\t', $value);
        }

        $initial_value = 0;
        $end_value = count($arr) - 1;

        while ($initial_value <= $end_value){
            $division_by_two = floor(($initial_value + $end_value) / 2);
            $comparison = strnatcmp($arr[$division_by_two][0], $key_value);

            if ($comparison > 0){
                $end_value = $division_by_two - 1;
            } elseif ($comparison < 0){
                $initial_value = $division_by_two + 1;
            } else{
                return $arr[$division_by_two][1];
            }
        }
    }

    return 'Undef';

    $key_value = 'ключ10';
    $file = ROOT.'/file.txt';
    binarySearch($file, $key_value);
}

?>