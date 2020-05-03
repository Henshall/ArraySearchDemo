<?php 

require __DIR__ . '/vendor/autoload.php';

use Jihel\Library\RBTree\Tree as Tree;
use Jihel\Library\RBTree\Node;

class ArraySearchDemo
{
    private $searchableArray;
    private $loopTimes = 700000;
    private $hashArray;
    private $associativeArray;
    private $numItemsInSearchableArray;
    private $binarySearchTree;
    private $node;
    
    function __construct($searchableArray)
    {
        $this->searchableArray = $searchableArray;    
        $this->numItemsInSearchableArray = count($this->searchableArray);
        $this->hashArray = $this->createHashArray();
        $this->createAssociativeArray();     
        $this->binarySearchTree = $this->createBinaryArray();  
    }
    
    private function createAssociativeArray(){
        foreach ($this->searchableArray as $nameInSearchableArray) {
            $this->associativeArray[$nameInSearchableArray] = true;
        }
    }
    
    private function createHashArray(){
        // HERE WE USE THE crc32 METHOD TO CREATE A NUMBERICAL INDEX WHERE WE CAN STORE THE VALUES INTO OUR ARRAY
        $hashArray = [];
        foreach ($this->searchableArray as $nameInSearchableArray) {
            $index  = crc32($nameInSearchableArray);
            if (isset($hashArray[$index])) {
                array_push($hashArray[$index], $nameInSearchableArray);
            } else {
                $hashArray[$index] = [$nameInSearchableArray] ;
            }
        }
        return $hashArray;
    }
    
    private function createBinaryArray(){
        $sortArray = $this->searchableArray;
        sort($sortArray);
        $tree = new Tree();
        foreach ($sortArray as $key => $name) {
            $node = new Node($key, $name);
            $tree->insert($node);
        }
        return $tree;
    }
    
    public function binarySearchTreeTime(){
        $startTime = microtime(true);
        $this->binaryTreeFindNames();
        $endTime = microtime(true);
        $diffTime = $endTime - $startTime;
        return $diffTime;
    }
    
    private function binaryTreeFindNames(){
        for ($i=1; $i < $this->loopTimes; $i++) {
            //SELECT A DIFFERENT NAME FOR EACH LOOP
            $selectedName = $this->selectName($i);
            // RESET NODE
            $this->node = $this->binarySearchTree->getRoot();
            while (true) {        
                $direction = strcasecmp( $this->node->getValue(), $selectedName);
                if ($direction == 0 ) {
                    break;
                } elseif( $direction < 0  ) {
                    // left
                    $this->node = $this->node->getChild(1);
                } else {
                    $this->node = $this->node->getChild(-1);
                }
            }
        }
    }
    
    
    public function getLoopTimes(){
        return $this->loopTimes;
    }
    
    public function setLoopTimes($num){
        if ( gettype($num) == "integer" && $num > 0 && $num < 100000000) {
            $this->loopTimes = $num;
        } else {
            echo "cannot set looptime to that - try again \n";
        }
    }
    
    public function linearSearchTime(){
        $startTime = microtime(true);
        $this->linearSearchFindNames();
        $endTime = microtime(true);
        $diffTime = $endTime - $startTime;
        return $diffTime;
    }
    
    private function linearSearchFindNames(){
        for ($i=1; $i < $this->loopTimes; $i++) {
            //SELECT A DIFFERENT NAME FOR EACH LOOP
            $selectedName = $this->selectName($i);
            // LOOP THROGUH THE LIST UNTIL WE FIND THE NAME
            foreach ($this->searchableArray as $nameInSearchableArray) {
                if ($nameInSearchableArray == $selectedName) {
                    break;
                } 
            }
        }
    }
    
    public function hashFunctionTime(){
        $startTime = microtime(true);
        $this->hashFunctionFindNames();
        $endTime = microtime(true);
        $diffTime = $endTime - $startTime;
        return $diffTime;
    }
    
    private function hashFunctionFindNames(){
        for ($i=1; $i < $this->loopTimes; $i++) {
            //SELECT A DIFFERENT NAME FOR EACH LOOP
            $selectedName = $this->selectName($i);
            // Lookup Index In hashArray
            $index  = crc32($selectedName);
            // LOOP THROUGH ALL NAMES UNDER THIS INDEX UNTIL WE FIND THE ONE WE ARE SEARCHING FOR
            foreach ($this->hashArray[$index] as $hashName) {
                if ($hashName == $selectedName) {
                    break;
                } 
            }        
        }
    }
    
    public function associativeArrayTime(){
        $startTime = microtime(true);
        $this->associativeArrayFindNames();
        $endTime = microtime(true);
        $diffTime = $endTime - $startTime;
        return $diffTime;
    }
    
    private function associativeArrayFindNames(){
        for ($i=1; $i < $this->loopTimes; $i++) {
            //SELECT A DIFFERENT NAME FOR EACH LOOP
            $selectedName = $this->selectName($i);
            // LOOKUP NAME IN THE ASSOCIATE ARRAY
            $nameValue = $this->associativeArray[$selectedName];
        }
    }
    
    private function selectName($i){
        return $this->searchableArray[$i % $this->numItemsInSearchableArray];
    }
    
}

?>