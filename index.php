<?php
require 'class/Autoload.php';

//screen_nameを取得
/**
  try {
  $screenName = new GetScreenName();
  } catch (Exception $error){
  echo $error->getMessage() . PHP_EOL;
  echo 'code: ' . $error->getCode();
  exit();
  }
 */

$showThreads = new ShowThreads();
$threadList = $showThreads->getThreadList();
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <form action="makeThread.php" method="POST">
            タイトル: <input name="title"><br>
            <textarea name="description"></textarea> <button type="submit">送信</button>
        </form>
        <?php $thread->showThreads($threadList); ?>
    </body>
</html>
