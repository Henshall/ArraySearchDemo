<?php 
require("searchableArray.php");
require("HashTablesDemo.php");

$hashTablesDemo = new HashTablesDemo($searchableArray);
$hashFunctionSeconds = $hashTablesDemo->hashFunctionTime(); 
$bruteForceSeconds = $hashTablesDemo->bruteForceTime();
$associativeArraySeconds = $hashTablesDemo->associativeArrayTime();
echo "bruteForceSeconds = $bruteForceSeconds, and hashFunctionSeconds = $hashFunctionSeconds, and associativeArraySeconds = $associativeArraySeconds";


// We normally loop through an array 500000 times, however we can GET/SET this value:
// $hashTablesDemo = new HashTablesDemo($searchableArray);
// $hashTablesDemo->setLoopTimes(1000000);
// $loop_times = $hashTablesDemo->getLoopTimes();
// echo "$loop_times \n";
// $hashFunctionSeconds = $hashTablesDemo->hashFunctionTime(); 
// $bruteForceSeconds = $hashTablesDemo->bruteForceTime();
// $associativeArraySeconds = $hashTablesDemo->associativeArrayTime();
// echo "bruteForceSeconds = $bruteForceSeconds, and hashFunctionSeconds = $hashFunctionSeconds, and associativeArraySeconds = $associativeArraySeconds";


?>