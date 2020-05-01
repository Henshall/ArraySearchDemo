# HashTables Demo With PHP

This project is a demonstration of how the time complexity of various method of array searching differ based on the search algorithm and size of the array used. In this project we will search through an array to simply find if a name exists or not, and determine the time it took to make that query. We can see/test the pros/cons of different types of searches.

### Functionality

In the example there is a list of 128 names, and we will search through this list by default 500,000 times. Each search simply takes a name from the list (in order) and searches the array using a specific method, and returns the time it took to do it:

1) bruteForceTime - returns the amount (in seconds) of time it search through a list 'n' number of times. Time complexity of O(n)

2) hashFunctionTime - returns the amount of time (in seconds) it took to use a hash table - or in this case an array - to lookup a hashed index of a name and see if it exists 'n' number of times.  Time complexity closer to O(1)

2) associativeArrayTime - returns the amount of time (in seconds) it took to use php's built in associative array find a name on a list 'n' number of times. Time complexity closer to O(1)

### Application: 
This is for demonstration purposes only. We can pretend that we have a database of users and their names and want to see how we can speed up the time it takes to find a certain name or get a list of names. We can see how the speed different in using a hash table vs just a regular select query.

### Setup:
1) Clone the project 
2) run 'php Example.php' 

### Example Usage

Compare the methods of retreiving data
```php
$searchableArray = ["name1", "name2"]; //etc
$hashTablesDemo = new HashTablesDemo($searchableArray);
$hashFunctionSeconds = $hashTablesDemo->hashFunctionTime(); 
$bruteForceSeconds = $hashTablesDemo->bruteForceTime();
$associativeArraySeconds = $hashTablesDemo->associativeArrayTime();
echo "bruteForceSeconds = $bruteForceSeconds, and hashFunctionSeconds = $hashFunctionSeconds, and associativeArraySeconds = $associativeArraySeconds";
```


We normally loop through an array 700000 times, however we can GET/SET this value:
```php
$searchableArray = ["name1", "name2"]; //etc
$hashTablesDemo = new HashTablesDemo($searchableArray);
$hashTablesDemo->setLoopTimes(1000000);
$loop_times = $hashTablesDemo->getLoopTimes();
```

### Concluding Notes:
While playing around with the different settings you will see how based on array and number of times we loop, that different methods are faster/slower then others. Note: with the associative array, you will not be able to count the number of occurance of the names since instances of the same index will overwrite eachother.