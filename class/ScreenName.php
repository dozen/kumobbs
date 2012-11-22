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
class ScreenName {

    /**
     * screen nameを返す。
     * @return string screen nameが返される
     * @throws Exception
     */
    function get() {
        if (isset($_COOKIE['individual_value'])) {
            $id = $_COOKIE['individual_value'];
        } else {
            throw new Exception('Cookieがありません', 100);
        }
        $kumo = Singleton::Kumo();
        //$kumo = new Memcached();
        //$kumo->addServer('localhost', 11211);
        $data = unserialize($kumo->get(md5($id)));
        $screenName = $data['config']['current_account'];
        if (!$screenName) {
            throw new Exception('ユーザデータがありません', 101);
        }

        return $screenName;
    }

}
