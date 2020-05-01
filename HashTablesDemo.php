<?php 

class HashTablesDemo
{
    private $searchableArray;
    private $loopTimes = 700000;
    private $hashArray;
    private $associativeArray;
    private $numItemsInSearchableArray;
    
    function __construct($searchableArray)
    {
        $this->searchableArray = $searchableArray;    
        $this->numItemsInSearchableArray = count($this->searchableArray);
        $this->hashArray = $this->createHashArray();
        $this->createAssociativeArray();        
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
    
    
    
    public function bruteForceTime(){
        $startTime = microtime(true);
        $this->bruteForceFindNames();
        $endTime = microtime(true);
        $diffTime = $endTime - $startTime;
        return $diffTime;
    }
    
    private function bruteForceFindNames(){
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