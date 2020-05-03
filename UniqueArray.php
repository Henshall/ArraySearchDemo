<?php 
class UniqueArray
{
    public static function createElements($num){
        $array = [];
        for ($i=0; $i < $num; $i++) {
            array_push($array, "element$i" );
        }
        return $array;
    }
}

?>