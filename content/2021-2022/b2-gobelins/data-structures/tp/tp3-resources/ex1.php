<?php

$main = range(1,1000);

$list2 = [];
$list3 = [];

do{
    array_push($list3, array_pop($main));
}while(count($main)>0);

do{
    array_push($list2, array_pop($list3));
}while(count($list3)>0);

do{
    array_push($main, array_pop($list2));
}while(count($list2)>0);