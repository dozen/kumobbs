<?php
require 'class/Autoload.php';

try {
    $screenName = ScreenName::get();
    $tag = Functions::getGET('tag');
    if ($tag === false) {
        throw new Exception('値が不正です', 300);
    }
    $auth = new Auth();
    $auth->issueAuthCode($screenName);
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
        <form action="response.php" method="POST">
            <input type="hidden" name="auth" value="<?php echo $auth->getAuthCode() ?>">
            <input type="hidden" name="tag" value="<?php echo $tag ?>">
            <textarea name="text"></textarea> <button type="submit">送信</button>
        </form>
    </body>
</html>