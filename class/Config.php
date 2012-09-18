<?php

/**
 * 設定
 *
 * @author dozen
 */
class Config {
    /**
     * kumofsのホスト
     */

    const KUMOFS_HOST = 'localhost';

    /**
     * kumofsのポート
     */
    const KUMOFS_PORT = 11211;

    /**
     * 複数設置する場合、データベースが重複しないようにするために一意な値を入れるように。
     * @example const NAME_SPACE = 'second';
     */
    const NAME_SPACE = '';


    /* 以下はいじる必要なし */
    const SERVICE_NAME = 'kumobbs';

}