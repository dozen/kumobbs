<?php
require '../class/Autoload.php';
header('content-type:text/plain');
$io = new IO();

$thread = new Thread();
var_dump($thread->getThreadList());