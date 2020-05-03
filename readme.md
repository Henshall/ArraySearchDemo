# Array Search Demo With PHP

This project is a demonstration of how the time complexity of various method of array searching differ based on the search algorithm and size of the array used. In this project we will search through an array to simply find if an element exists or not, and determine the time it took to make that query. We can see/test the pros/cons of different types of searches.

### Functionality

We can construct an array using the UniqueArray class which creates an unique array of 'n' elements based upon the number you set. eg. UniqueArray::create(100) creates a unique array of 100 elements. 

We can use different algorithms to search through the array and find the time it took to find an element. Since the time will be very small and not meaningful/understandable to us as humans, I have also created a $LoopTimes variable which determines how many times we will perform each algorithm. 

We have the following Algorithms:

1) linearSearchTime - returns the amount (in seconds) of time it search through a list 'n' number of times by checking each item in the list. Time complexity is on average 0(n).

2) hashFunctionTime - returns the amount of time (in seconds) it took to use a hash table - or in this case an array - to lookup a hashed index of a name and see if it exists 'n' number of times.  Time complexity close to O(1) assuming all keys are unique, but will tend toward 0(n) when there are many collisions. 

3) associativeArrayTime - returns the amount of time (in seconds) it took to use php's built in associative array find a name on a list 'n' number of times. Time complexity closer to O(1) with all unique keys.

4) binarySearchTreeTime - returns the amount of time (in seconds) it took search through a balanced binary search tree to find the element in the array. Its performed n number of times and the time complexity is O(h) where h is the height of the tree.

to use php's built in associative array find a name on a list 'n' number of times. Time complexity closer to O(1)

### Application: 
This is for demonstration purposes only. We can pretend that we have a database of users and their names and want to see how we can speed up the time it takes to find a certain name or get a list of names. We can see how the speed different in using a hash table vs just a regular select query.

### Setup:
Run the following commands to set up. You just need to update your composer to get the binary search tree package and then test out some of the example files.

1) Clone the project 
2) composer update
3) cd Examples
4) php Example1.php


### Example Usage

Compare the methods of retrieving data. Here we create our own array and loop through 500k times.
```php
$array = ["name1", "name2"]; //etc
$ArraySearchDemo = new ArraySearchDemo($array);
$ArraySearchDemo->setLoopTimes(500000);
$hashFunctionSeconds = $ArraySearchDemo->hashFunctionTime(); 
$linearSearchSeconds = $ArraySearchDemo->linearSearchTime();
$associativeArraySeconds = $ArraySearchDemo->associativeArrayTime();
$binarySearchTime = $ArraySearchDemo->binarySearchTreeTime();
echo "500 elements with 50000 loops: --- linearSearchSeconds = $linearSearchSeconds, and hashFunctionSeconds = $hashFunctionSeconds, and associativeArraySeconds = $associativeArraySeconds,  binarySearchTime = $binarySearchTime \n";
```

We can also use the UniqueArray class to generate an array for us of any size. Here we choose an array with 100 unique elements:
```php
$array = UniqueArray::createElements(100);
$ArraySearchDemo = new ArraySearchDemo($array);
$ArraySearchDemo->setLoopTimes(500000);
$hashFunctionSeconds = $ArraySearchDemo->hashFunctionTime(); 
$linearSearchSeconds = $ArraySearchDemo->linearSearchTime();
$associativeArraySeconds = $ArraySearchDemo->associativeArrayTime();
$binarySearchTime = $ArraySearchDemo->binarySearchTreeTime();
echo "100 elements with 500000 loops: --- linearSearchSeconds = $linearSearchSeconds, and hashFunctionSeconds = $hashFunctionSeconds, and associativeArraySeconds = $associativeArraySeconds,  binarySearchTime = $binarySearchTime \n";
```

### Concluding Notes:
While playing around with the different settings you will see how based on array and number of times we loop, that different methods are faster/slower then others. Note: with the associative array, you will not be able to count the number of occurance of the names since instances of the same index will overwrite eachother.