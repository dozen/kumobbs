<?php
/**
 * 前途の方針
 * 
 * まずscreen_nameを取得。出来なかったらトップに飛ばす！
 * 
 * kumofsからスレ一覧を取得
 * 
 * スレッドn件を取得
 * 
 * 取得したスレッドn件を出力
 * 
 */
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

//kumofsからスレ一覧を取得
$thread = new Thread();
$threadList = $thread->getThreadList();
?>

<?php $thread->showThreads($threadList); ?>