<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class node {
    
    public $data;
    
    public $next;
    
    public static $first;


    public function __construct($data) {
        
        if ($first  == NULL)
        {
            $node       = new node();
            $node->data = $data;
            $node->next = null;
            $first      = &$node;
        } else {
            
        }
            
        
    }

    
    
}


class operation {
    
    
    public function createNode($data) {
        
        
    }
} 
