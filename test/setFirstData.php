<?php

require '../class/Autoload.php';
require 'sampleData.php';
header('content-type:text/plain');

$sampleThreadData = array(
    array(
        'name' => '_dozen_',
        'description' => 'ここに要望や不具合を書き込んでください。',
        'time' => Functions::timestamp())
);
$id = Functions::randomString();
$sampleThreadList = array(
    array('id' => $id, 'title' => '最初の投稿', 'update' => Functions::timestamp()),
);

$thread = new Thread();
$thread->setThread($id, $sampleThreadData);
$thread->setThreadList($sampleThreadList);
echo 'ThreadList' . PHP_EOL;
var_dump($thread->getThreadList());
echo 'Thread' . PHP_EOL;
var_dump($thread->getThread($id));