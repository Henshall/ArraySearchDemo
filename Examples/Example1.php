<?php 
require("../ArraySearchDemo.php");
require("../UniqueArray.php");

// HERE WE WILL DOUBLE THE SIZE OF THE ARRAY, AND CHECK THE AMOUNT OF TIME IT TAKES TO SEARCH THROUGH IT USING DIFFERENT METHODS

// CREATE AN ARRAY WITH 5000 ELEMENTS AND SET NUMBER OF LOOPS TO 50000
$array = UniqueArray::createElements(5000);
$ArraySearchDemo = new ArraySearchDemo($array);
$ArraySearchDemo->setLoopTimes(50000);
$hashFunctionSeconds = $ArraySearchDemo->hashFunctionTime(); 
$linearSearchSeconds = $ArraySearchDemo->linearSearchTime();
$associativeArraySeconds = $ArraySearchDemo->associativeArrayTime();
$binarySearchTime = $ArraySearchDemo->binarySearchTreeTime();
echo "500 elements with 50000 loops: --- linearSearchSeconds = $linearSearchSeconds, and hashFunctionSeconds = $hashFunctionSeconds, and associativeArraySeconds = $associativeArraySeconds,  binarySearchTime = $binarySearchTime \n";

// CREATE AN ARRAY WITH 10000 ELEMENTS AND SET NUMBER OF LOOPS TO 50000
$array2 = UniqueArray::createElements(10000);
$ArraySearchDemo2 = new ArraySearchDemo($array2);
$ArraySearchDemo2->setLoopTimes(50000);
$hashFunctionSeconds2 = $ArraySearchDemo2->hashFunctionTime(); 
$linearSearchSeconds2 = $ArraySearchDemo2->linearSearchTime();
$associativeArraySeconds2 = $ArraySearchDemo2->associativeArrayTime();
$binarySearchTime2 = $ArraySearchDemo2->binarySearchTreeTime();
echo "10000 elements with 50000 loops: --- linearSearchSeconds = $linearSearchSeconds2, and hashFunctionSeconds = $hashFunctionSeconds2, and associativeArraySeconds = $associativeArraySeconds2,  binarySearchTime = $binarySearchTime2 \n";

?>