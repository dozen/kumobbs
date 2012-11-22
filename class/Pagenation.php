<?php

/**
 * Description of Pagenation
 *
 * @author dozen
 */
class Pagenation {

    static $haveNext, $currentPage;

    /**
     * 次のページ、前のページがあるかチェック
     * @param type $data    データ
     * @param type $offset  オフセット
     * @param type $page    現在のページ
     */
    static function set($data, $offset, $page) {
        $count = count($data);

        if ($page) {
            self::$currentPage = $page;
        } else {
            self::$currentPage = 1;
        }

        //次のページがあるかチェック
        if (($offset + Config::PER_PAGE + 1) < $count) {
            self::$haveNext = true;
        } else {
            self::$haveNext = false;
        }
    }

    /**
     * ページネーションを表示
     */
    static function show() {
        if (self::$currentPage > 1) {
            $prev = '<a href="/kumobbs/' . (self::$currentPage - 1) . '/">&#60;</a>';
        } else {
            $prev = '&#60;';
        }

        if (self::$haveNext === true) {
            $next = '<a href="/kumobbs/' . (self::$currentPage + 1) . '/">&#62;</a>';
        } else {
            $next = '&#62;';
        }

        return $prev . ' | ' . $next;
    }

}
