<?php

class Functions {

    /**
     * タイムスタンプを返します
     * @return string
     */
    static function timestamp() {
        static $timestamp;
        if (!isset($timestamp)) {
            $timestamp = date('y/m/d H:i:s');
        }
        return $timestamp;
    }

    /**
     * ランダムな文字列を作成
     * @param int $length 文字列の長さ。指定がない場合、20文字
     * @return string ランダムな文字列を返す
     */
    static function randomString($length = 10) {
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $result .= substr('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_-', mt_rand(0, 63), 1);
        }
        return $result;
    }
    
    static function getPOST($key) {
        return isset($_POST[$key]) ? $_POST[$key] : false;
    }
    
    static function getGET($key) {
        return isset($_GET[$key]) ? $_GET[$key] : false;
    }

}