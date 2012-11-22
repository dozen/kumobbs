<?php
require 'class/Autoload.php';

try {
    $screenName = ScreenName::get();
    $db = new Kumo();
    if (Functions::isAdmin($screenName)) {
        
    } else {
        throw new Exception('管理者ではありません', 205);
    }
} catch (Exception $error) {
    echo $error->getMessage();
}

$type = Functions::getGET('type');
$tag = Functions::getGET('tag');

if($type && $tag) {
    if ($type === 'thread') {
        $db->deleteThread($tag);
    } else if ($type === 'response') {
        $threadTag = Functions::getGET('thread_tag');
        $db->deleteResponse($tag, $threadTag);
    }
}