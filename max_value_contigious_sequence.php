<?php
/**
 * Maximum Value Contiguous Subsequence. Given a sequence of n real numbers A(1) ... A(n), 
 * determine a contiguous subsequence A(i) ... A(j) 
 * for which the sum of elements in the subsequence is maximized.
 */

$s  = [10,-9,16,14,-5,-6,-7];
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
      }
      
      if ($cur_sum < 0) {
          $cur_sum = 0;
      }
   } 
   
   return $max_sum;
}