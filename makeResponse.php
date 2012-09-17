<?php
require 'class/Autoload.php';

//screen_nameを取得
try {
    //$screenName = new GetScreenName();
    $screenName = '_dozen_';
    $thread = new MakeNewResponse();
} catch (Exception $error) {
    echo $error->getMessage() . PHP_EOL;
    echo 'code: ' . $error->getCode();
    exit();
}

header('location: /kumobbs');