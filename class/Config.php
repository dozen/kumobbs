<?php

/**
 * 設定
 *
 * @author dozen
 */
class Config {

    /**
     * タイトル
     */
    const TITLE = '掲示板';

    /**
     * 管理者の名前
     */
    const ADMIN = '_dozen_';

    /**
     * レスがついた時にスレッドを一番上に持ってくるか。
     */
    const LIFT_THREAD = true;

    /**
     * kumofsのホスト
     * 
     * 不揮発性のKVSを推奨。
     */
    const DB_KVS_HOST = 'localhost';

    /**
     * kumofsのポート
     * 
     *  不揮発性のKVSを推奨。
     */
    const DB_KVS_PORT = 11211;

    /**
     * memcachedのホスト
     * 
     * CACHE_KVS_HOSTとCACHE_KVS_PORTは一時キーなど一定時間が経過した後消えてほしいデータなどに使用されます。
     * kumofsなど不揮発性のKVSを指定するとゴミデータが大量に残るかもしれないのでそれが気持ち悪いと思う方は
     * memcachedなど揮発性のKVSを使うといいです。
     */
    const CACHE_KVS_HOST = 'localhost';

    /**
     * memcachedのポート
     * 
     * CACHE_KVS_HOSTとCACHE_KVS_PORTは一時キーなど一定時間が経過した後消えてほしいデータなどに使用されます。
     * kumofsなど不揮発性のKVSを指定するとゴミデータが大量に残るかもしれないのでそれが気持ち悪いと思う方は
     * memcachedなど揮発性のKVSを使うといいです。
     */
    const CACHE_KVS_PORT = 11212;

    /**
     * 複数設置する場合、データベースが重複しないようにするために一意な値を入れるように。
     * @example const NAME_SPACE = 'second';
     */
    const NAME_SPACE = '';


    /* 以下はいじる必要なし */
    const SERVICE_NAME = 'kumobbs';

    /**
     * 
     */
    const PER_PAGE = 5000;
}
