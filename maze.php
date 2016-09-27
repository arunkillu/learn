<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* 
 * 
 */

$a = array (
        array(3, 2,1),
        array(8,7,4),
        array(9,6,5),
);

$DIR = ['rt','dn','lt','up'];

function print_maze($a,$i,$j) {
    
    
    echo $a[$i][$j];
    print_maze($a[$i][$j];);
    
    
}
