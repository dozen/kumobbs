<?php
require 'class/Autoload.php';

try {
    $screenName = ScreenName::get();
    $tag = Functions::getGET('tag');
    if (empty($tag)) {
        throw Exception('値が不正です', 300);
    }
    $auth = new Auth();
    $auth->issueAuthCode($screenName);

    if (Functions::isAdmin($screenName)) {
        $showThread = new AdminShowThread;
    } else {
        $showThread = new ShowThread;
    }
    $threadList = $showThread->getThreadList();
    $thread = $threadList[$_GET['tag']];
} catch (Exception $error) {
    echo $error->getMessage() . PHP_EOL;
    echo 'code: ' . $error->getCode();
    exit;
}
?>
<html>
    <head>
        <link rel="stylesheet" href="/kumobbs/css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <a href="/kumobbs/">戻る</a>
        </div>
        <form action="response.php" method="POST">
            <input type="hidden" name="auth" value="<?php echo $auth->getAuthCode() ?>">
            <input type="hidden" name="tag" value="<?php echo $tag ?>">
            <textarea name="text"></textarea> <button type="submit">送信</button>
        </form>
        <?php echo $showThread->show($thread); ?>
    </body>
</html>