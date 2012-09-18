<?php

require '../class/Autoload.php';
header('content-type:text/plain');
$io = new IO();

$thread = new Thread();
var_dump($list = $thread->getThreadList());

foreach($list as $line) {
    var_dump($thread->getThread($line['id']));
}