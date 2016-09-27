<?php

$h = new SplMinHeap();
$br = "";
echo "adding elements to heap\n";
for ($i = 0; $i<6; $i++) 
{
    echo $br;
    echo $d = mt_rand(2,1000);
    $br = ',';
    $h->insert($d);
}

echo "\nmin heap elepements are\n";
$br = "";
while ($h->valid()) {
    
    echo $br;
    echo $h->extract();
    $br = ',';
    
}

echo "\n";

