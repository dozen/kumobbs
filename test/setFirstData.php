<?php

require '../class/Autoload.php';
require 'sampleData.php';
header('content-type:text/plain');
$thread = new Thread();
$thread->setThread(0, $sampleThreadData);
$thread->setThreadList($sampleThreadList);
echo 'ThreadList' . PHP_EOL;
var_dump($thread->getThreadList());
echo 'Thread' . PHP_EOL;
var_dump($thread->getThread(0));
?>