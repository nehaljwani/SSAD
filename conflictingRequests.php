<?php

function arrayToCSV($array)
{
  $out="";
  foreach($array as $element){
    if($out == "")
      $out = $element;
    else
      $out=$out.",".$element;
  }
  return $out;
}
function CSVToArray($string){
  return explode(',', $string);
}

function checkConflicts(){

}
print_r(CSVToArray(arrayToCSV(array("1", "3", "5", "6"))));

?>
