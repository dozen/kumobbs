<?php

require 'class/Autoload.php';

//screen_nameを取得
try {
    $screenName = new GetScreenName();
    $response = new NewResponse();
    $response->setData($screenName);
    $response->insertContent();
    $response->updateThreadList();
} catch (Exception $error) {
    echo $error->getMessage() . PHP_EOL;
    echo 'code: ' . $error->getCode();
    exit();
}

header('location: /kumobbs');