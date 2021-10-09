<?php

$main = range(1,10);

$list2 = [];
$list3 = [];
do{
array_push($list2,array_shift($main));
}while(count($main)>0);

while(count($list2)>0){
    while(count($list2)>0){
        array_push($list3,array_shift($list2));
    }
    while(count($list3)>1){
            array_push($list2,array_shift($list3));
    }
    array_push($main,array_shift($list3));
}

