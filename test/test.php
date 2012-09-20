<?php
require '../class/Autoload.php';

header('content-type:text/plain');

$n = new Kumo();
var_dump($n->getThreadList());