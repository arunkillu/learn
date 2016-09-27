<?php

/* 
 *Cindy's puzzle
 * R can only move right one unit if its clear or one unit right to adjacent G if the space is clear.
 * And vice versa for G 
 * expected solution array('G','G',' ','R','R');
 */
error_reporting('E_ALL ~E_NOTICE');
$tray    = array('R','R','_','G','G');
tryCindy($tray);
/*
 * print board values
 */
function PrintBoard($tray) {
    
    foreach ($tray as $marble) {
        
        echo "[$marble]";
    }
}

/**
 * checks if the arrangement of marble is done
 */
function isSolution($tray) {
    $c  = 'G';
    $test   = true;
    foreach($tray as $marble) {
        if ($c  != $marble && $marble != '_') {
            $test = false;
        }
        if ($marble == '_') {
            $c  = 'R';
        }
        
    }
    return $test;
    
}


/*
 * 
 */
function isMovable($tray,$i) {
    
    if ($tray[$i] == '_') {
        return false;
    }
    if (
            ($tray[$i]   == 'G' && $tray[$i-1] == '_') 
                                || 
            ($tray[$i]   == 'G' && $tray[$i-1] == 'R' && $tray[$i-2] == '_')
                                ||
            ($tray[$i]   == 'R' && $tray[$i+1] == '_') 
                                || 
            ($tray[$i]   == 'R' && $tray[$i+1] == 'G' && $tray[$i+2] == '_')
            
            ) {
        
        return true;
        
    }
    
    return FALSE;
            
    
    
}
/**
 * moves the marble
 */
//$tray    = array('R','R','_','G','G');
function nextMove($tray,$i) {
    
    if ($tray[$i]   == 'G' && $tray[$i-1] == '_') {
        
        $tmp        = $tray[$i];
        $tray[$i]   = $tray[$i-1];
        $tray[$i-1] = $tmp;
    }
    if ($tray[$i]   == 'G' && $tray[$i-1] == 'R' && $tray[$i-2] == '_') {
        
        $tmp        = $tray[$i];
        $tray[$i]   = $tray[$i-2];
        $tray[$i-2] = $tmp;
    }
    if ($tray[$i]   == 'R' && $tray[$i+1] == '_') {
        
        $tmp        = $tray[$i];
        $tray[$i]   = $tray[$i+1];
        $tray[$i+1] = $tmp;
    }
    if ($tray[$i]   == 'R' && $tray[$i+1] == 'G' && $tray[$i+2] == '_') {
        
        $tmp        = $tray[$i];
        $tray[$i]   = $tray[$i+2];
        $tray[$i+2] = $tmp;
    }
    
    return $tray;
    
    
    
    
}

/**
 * 
 * @param type $tray
 */
function tryCindy($tray) {
    if (isSolution($tray)) {
        return true;
    }
    
    for ($i = 0; $i< count($tray); $i++) {
        
        if (isMovable($tray, $i)) {
            
            $newTray    = nextMove($tray, $i);
            //print_r($newTray);
            if (tryCindy($newTray)) {
                
                PrintBoard($newTray);
                echo "\n";
                return true;
            } else {
                
                echo "deadlock moves";
                PrintBoard($newTray);
                echo "\n";
            }
            
            
        }
    }
    
    return false;
    
}

//$bool = isSolution($traySol);
//var_dump($bool);






