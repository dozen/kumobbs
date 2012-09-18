<?php

header('content-type:text/plain');

class ForeachArray {
    
    private $array, $isfirst;

    function __construct($array) {
        $this->array = $array;
        reset($this->array);
        $this->isfirst = true;
    }

    function loop() {
        if ($this->isfirst === true) {
            $this->isfirst = false;
            return current($this->array);
        } else {
            return next($this->array);
        }
    }

}

$array = array(
    'hogehoge' => 'hogehog',
    'ahgoe' => 'hogawe',
    'ahgo' => 'hog'
);

$n = new ForeachArray($array);
var_dump($n->loop());
var_dump($n->loop());
var_dump($n->loop());
var_dump($n->loop());
?>