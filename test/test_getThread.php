<?php
require '../class/Autoload.php';

$io = new IO();

$thread = new Thread();
$str = $thread->getThread(0);
var_dump($str);
?>
