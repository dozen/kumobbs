<?php


/**
 * クラスのオートリロード。
 */
function __autoload($className) {
    require __DIR__ . '/' .  $className . '.php';
}