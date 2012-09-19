<?php

require 'Autoload.php';

/**
 * Kumofsからスレッドの一覧やスレッドの中身を取り出すクラス
 * @author dozen
 * @version 0.1
 * 
 */
class Kumo {

    private static $prefix; //接頭辞
    private $kumo;

    /**
     * Kumofsからスレッドの一覧やスレッドの中身を取り出すクラス
     */
    function __construct() {

        $this->kumo = new Memcached();
        $this->kumo->addServer(Config::KUMOFS_HOST, Config::KUMOFS_PORT);

        /*
         * 接頭辞を定義します。
         * Config::NAME_SPACEの中身が空かどうかで処理を変える。
         */
        if (Config::NAME_SPACE !== '') {
            self::$prefix = Config::NAME_SPACE . ':' . Config::SERVICE_NAME . ':';
        } else {
            self::$prefix = Config::SERVICE_NAME . ':';
        }
    }

    /**
     * スレッドの一覧を取得。
     * @return array スレッドの一覧。失敗したらfalse。
     */
    function getThreadList() {
        return $this->kumo->get($this->prefix . 'ThreadList');
    }

    /**
     * スレッドの一覧を挿入。
     * @param array $data
     * @return boolean 成否を返す
     */
    function setThreadList($data) {
        return $this->kumo->set($this->prefix . 'ThreadList', $data, false);
    }

    /**
     * スレッドの中身を取得。
     * @param string $tag
     * @return array スレッドの中身を返す。失敗したらfalse。
     */
    function getThread($tag) {
        return $this->kumo->get($this->prefix . 'Thread:' . $tag);
    }

    /**
     * スレッドの中身を更新。
     * @param string $tag
     * @param array $data
     * @return boolean
     */
    function setContent($tag, $data) {
        return $this->kumo->set($this->prefix . 'Thread:' . $tag, $data);
    }

}