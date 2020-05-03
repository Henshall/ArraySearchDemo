<?php 
require("../ArraySearchDemo.php");
require("../UniqueArray.php");

// HERE WE WILL KEEP THE SIZE OF THE ARRAY CONSTANT AND DOUBLE THE NUMBER OF ITERATIONS

// CREATE AN ARRAY WITH 100 ELEMENTS AND SET NUMBER OF LOOPS TO 500000
$array = UniqueArray::createElements(100);
$ArraySearchDemo = new ArraySearchDemo($array);
$ArraySearchDemo->setLoopTimes(500000);
$hashFunctionSeconds = $ArraySearchDemo->hashFunctionTime(); 
$linearSearchSeconds = $ArraySearchDemo->linearSearchTime();
$associativeArraySeconds = $ArraySearchDemo->associativeArrayTime();
$binarySearchTime = $ArraySearchDemo->binarySearchTreeTime();
echo "100 elements with 500000 loops: --- linearSearchSeconds = $linearSearchSeconds, and hashFunctionSeconds = $hashFunctionSeconds, and associativeArraySeconds = $associativeArraySeconds,  binarySearchTime = $binarySearchTime \n";

// CREATE AN ARRAY WITH 100 ELEMENTS AND SET NUMBER OF LOOPS TO 1000000
$array2 = UniqueArray::createElements(100);
$ArraySearchDemo2 = new ArraySearchDemo($array2);
$ArraySearchDemo2->setLoopTimes(1000000);
$hashFunctionSeconds2 = $ArraySearchDemo2->hashFunctionTime(); 
$linearSearchSeconds2 = $ArraySearchDemo2->linearSearchTime();
$associativeArraySeconds2 = $ArraySearchDemo2->associativeArrayTime();
$binarySearchTime2 = $ArraySearchDemo2->binarySearchTreeTime();
echo "100 elements with 1000000 loops: --- linearSearchSeconds = $linearSearchSeconds2, and hashFunctionSeconds = $hashFunctionSeconds2, and associativeArraySeconds = $associativeArraySeconds2,  binarySearchTime = $binarySearchTime2 \n";

?>