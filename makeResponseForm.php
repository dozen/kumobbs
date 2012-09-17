<?php
require 'class/Autoload.php';

try {
    //$screenName = new GetScreenName();
    $screenName = '_dozen_';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        throw Exception('値が不正です', 300);
    }
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
        <form action="makeResponse.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <textarea name="description"></textarea> <button type="submit">送信</button>
        </form>
    </body>
</html>