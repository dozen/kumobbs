<?php
require 'class/Autoload.php';

//screen_nameを取得
try {
    $screenName = ScreenName::get();
    $showThreads = new ShowThreads();
    $threadList = $showThreads->getThreadList();
    $auth = new Auth();
    $auth->issueAuthCode($screenName);
} catch (Exception $error) {
    if ($error->getCode() < 300) {
        header('location: /');
    } else {
        header('location: /kumobbs');
    }
    echo $error->getMessage() . PHP_EOL;
    echo 'code: ' . $error->getCode();
    exit();
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <title><?php echo Config::TITLE ?></title>
    </head>
    <body>
        <h1><?php echo Config::TITLE ?></h1>
        <div>意見・要望などはこちらへどうぞ。簡易的なものであることをご承知願います。</div>
        <form action="newthread.php" method="POST">
            <input type="hidden" name="auth" value="<?php echo $auth->getAuthCode() ?>">
            タイトル: <input name="title"><br>
            <textarea name="text"></textarea> <button type="submit">送信</button>
        </form>
        <?php $showThreads->show($threadList); ?>
    </body>
</html>
