<?php
$x =10;
for($i=2; $i<=10; $i++){

    echo "<p> Table of ".$i." is :";
    echo "<hr/>";
    for($j=1; $j<=$x; $j++){
        $multiply = $i*$j;
        echo $i."*".$j. "=" .$multiply."<br>"; 
    }
    echo "<hr/>";    
}
?>