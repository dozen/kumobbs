<?php

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

        $this->kumo = Singleton::Kumo();

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
        $result = $this->kumo->get(self::$prefix . 'ThreadList');
        if ($result === false) {
            throw new Exception('スレッド一覧がありません', 101);
        }
        return $result;
    }

    /**
     * スレッドの一覧を挿入。
     * @param array $data
     * @return boolean 成否を返す
     */
    function setThreadList($data) {
        $result = $this->kumo->set(self::$prefix . 'ThreadList', $data, false);
        return $result;
    }

    /**
     * スレッドの中身を取得。
     * @param string $tag
     * @return array スレッドの中身を返す。失敗したらfalse。
     */
    function getContent($tag) {
        $result = $this->kumo->get(self::$prefix . 'Thread:' . $tag);
        if ($result === false) {
            throw new Exception('スレッドデータがありません', 102);
        }
        return $result;
    }

    /**
     * スレッドの中身を更新。
     * @param string $tag
     * @param array $data
     * @return boolean
     */
    function setContent($tag, $data) {
        return $this->kumo->set(self::$prefix . 'Thread:' . $tag, $data);
    }

    /**
     * スレッドを削除
     */
    function deleteThread($tag) {
        $threadList = $this->getThreadList();
        unset($threadList[$tag]); //該当するスレッドの情報をスレッドの一覧から削除
        $this->setThreadList($threadList);
        $this->kumo->delete(self::$prefix . 'Thread:' . $tag); //スレッドの中身を削除
    }

    /**
     * レスだけを削除
     */
    function deleteResponse($responseTag, $threadTag = null) {
        if ($threadTag === null) {
            $threadTag = $this->searchParent($responseTag);
        }
        $threadData = $this->getContent($threadTag);
        unset($threadData[$responseTag]);
        $this->setContent($threadTag, $threadData);
        return true;
    }

    /**
     * レスがどのスレッドのものか検索する。
     */
    function searchParent($responseTag) {
        $threadList = $this->getThreadList();
        foreach ($threadList as $key => $value) {
            $responses = $this->getContent($value['tag']);
            $isInArray = array_key_exists($responseTag, $responses);
            if ($isInArray === true) {
                return $key;
            }
        }
        //return false;
        throw new Exception('スレッドが見つかりませんでした', 201);
    }

}
