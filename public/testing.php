<?php


$list = ["a", "b", "c", "b", "b"] ;

$count = count($list);

$check = array();

for($i = 0 ; $i < $count; ++$i) {
    $check[$i] = 0;
}


$result = array();

$c = 0 ;
for($i =0 ; $i < $count ; ++$i) {
    if(!$check[$i]) {
        $result[$c] = array();
        $check[$i] = 1;
        for($j = $i +1 ; $j < $count ; ++$j) {
            if( !$check[$j] && $list[$j] == $list[$i] ) {
                $check[$j] = 1;
                echo $check[$j]."".$list[$j]. "".$list[$i].$check[$j]." ";
                $result[$c][] =$list[$j];
            }
        }
        ++$c;
    }
}


