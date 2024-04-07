<?php
$arr= [7,8,1,2,3];
$rev = [];
$len = count($arr);
for($i=($len-1); $i>=0; $i--)
{
    $rev[]=$arr[$i];
}
print_r($rev);
?>