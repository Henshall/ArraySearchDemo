<?php 
require("../ArraySearchDemo.php");
require("../UniqueArray.php");

// HERE WE WILL DOUBLE THE ARRAY SIZE AND DIVIDE THE THE NUMBER OF LOOP TIMES BY TWO
// THIS SHOULD KEEP THE TIME IT TAKES TO USE linearSearchTime() ROUGHLY THE SAME

// CREATE AN ARRAY WITH 500 ELEMENTS AND SET NUMBER OF LOOPS TO 500000
$array = UniqueArray::createElements(500);
$ArraySearchDemo = new ArraySearchDemo($array);
$ArraySearchDemo->setLoopTimes(100000);
$hashFunctionSeconds = $ArraySearchDemo->hashFunctionTime(); 
$linearSearchSeconds = $ArraySearchDemo->linearSearchTime();
$associativeArraySeconds = $ArraySearchDemo->associativeArrayTime();
$binarySearchTime = $ArraySearchDemo->binarySearchTreeTime();
echo "500 elements with 100000 loops: --- linearSearchSeconds = $linearSearchSeconds, and hashFunctionSeconds = $hashFunctionSeconds, and associativeArraySeconds = $associativeArraySeconds,  binarySearchTime = $binarySearchTime \n";

// CREATE AN ARRAY WITH 100 ELEMENTS AND SET NUMBER OF LOOPS TO 1000000
$array2 = UniqueArray::createElements(1000);
$ArraySearchDemo2 = new ArraySearchDemo($array2);
$ArraySearchDemo2->setLoopTimes(50000);
$hashFunctionSeconds2 = $ArraySearchDemo2->hashFunctionTime(); 
$linearSearchSeconds2 = $ArraySearchDemo2->linearSearchTime();
$associativeArraySeconds2 = $ArraySearchDemo2->associativeArrayTime();
$binarySearchTime2 = $ArraySearchDemo2->binarySearchTreeTime();
echo "1000 elements with 50000 loops: --- linearSearchSeconds = $linearSearchSeconds2, and hashFunctionSeconds = $hashFunctionSeconds2, and associativeArraySeconds = $associativeArraySeconds2,  binarySearchTime = $binarySearchTime2 \n";

?>