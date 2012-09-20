<?php
require 'class/Autoload.php';

//screen_nameを取得
try {
    $screenName = ScreenName::get();
    $showThreads = new ShowThreads();
    $threadList = $showThreads->getThreadList();
} catch (Exception $error) {
    echo $error->getMessage() . PHP_EOL;
    echo 'code: ' . $error->getCode();
    exit();
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <form action="newthread.php" method="POST">
            タイトル: <input name="title"><br>
            <textarea name="text"></textarea> <button type="submit">送信</button>
        </form>
        <?php $showThreads->show($threadList); ?>
    </body>
</html>
