<?php

require '../class/Autoload.php';
//screen_nameを取得
try {
    $screenName = '_dozen_';
    //$screenName = new GetScreenName();
    $makeNewthread = new MakeNewThread();
    //$makeNewthread->setData($screenName); //値をセット
    $makeNewthread->threadData->title = '賢者(^q^)';
    $makeNewthread->threadData->description = 'オナ禁辛いお';
    $makeNewthread->threadData->time = Functions::timestamp();
    $makeNewthread->threadData->screenName = $screenName;
    $makeNewthread->insertToThreadList(); //スレッド一覧を更新
    $makeNewthread->setNewThread(); //スレッドの中身をストア
} catch (Exception $error) {
    echo $error->getMessage() . PHP_EOL;
    echo 'code: ' . $error->getCode();
    exit();
}