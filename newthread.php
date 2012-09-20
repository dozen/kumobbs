<?php

require 'class/Autoload.php';
header('content-type:text/plain');
//screen_nameを取得
try {
    $screenName = ScreenName::get();
    $thread = new NewThread();
    $thread->setData($screenName);
    $thread->insertToThreadList();
    $thread->insertContent();
} catch (Exception $error) {
    echo $error->getMessage() . PHP_EOL;
    echo 'code: ' . $error->getCode();
    exit();
}

header('location: /kumobbs');