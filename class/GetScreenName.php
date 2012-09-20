<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoadScreenName
 *
 * @author dozen
 */
class GetScreenName {

    /**
     * screen nameを返す。
     * @return string screen nameが返される
     * @throws Exception
     */
    function __construct() {
        if (isset($_COOKIE['individual_value'])) {
            $id = $_COOKIE['individual_value'];
        } else {
            throw new Exception('Cookieがありません', 100);
        }
        $this->kumo = Singleton::Kumo();
        $data = unserialize($this->kumo->get(md5($id)));
        if (!$data['config']['current_data']) {
            throw new Exception('ユーザデータがありません', 101);
        }

        return $data['config']['current_data'];
    }

}