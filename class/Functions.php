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

}