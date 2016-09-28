<?php
/**
 * Maximum Value Contiguous Subsequence. Given a sequence of n real numbers A(1) ... A(n), 
 * determine a contiguous subsequence A(i) ... A(j) 
 * for which the sum of elements in the subsequence is maximized.
 */

$s  = [10,11,-3];
echo maxSeq($s);//22

/*
 * 
 */
function maxSeq($s) {
   $max_sum = 0; 
   $cur_sum = 0;
   for($i=0; $i<count($s); $i++) {
      $cur_sum += $s[$i];
      if ($cur_sum > $max_sum) {
          $max_sum = $cur_sum;
      } else {
          $cur_sum = 0;
         
      }
   } 
   
   return $max_sum;
}