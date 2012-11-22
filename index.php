<?php
require 'class/Autoload.php';

try {
    //screen_nameを取得
    $screenName = ScreenName::get();
    if (Functions::isAdmin($screenName)) {
        $ThreadList = new AdminShowThreadList;
    } else {
        $ThreadList = new ShowThreadList;
    }
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

$page = Functions::getGET('page');
?>
<html>
    <head>
        <link rel="stylesheet" href="/kumobbs/css/style.css" type="text/css">
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
        <?php echo $ThreadList->show($page); ?>
        <?php echo Pagenation::show() ?>
    </body>
</html>