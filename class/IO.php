<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Kumo
 *
 * @author dozen
 */
class IO {

    function __construct() {
        static $kumo;

        if (!isset($kumo)) {
            try {
                $kumo = new Memcached();
                $kumo->addServer('localhost', 11211);
            } catch (MemcachedException $error) {
                throw new Exception($error->getMessage(), 200);
            }
        }
        $this->kumo = $kumo;
    }

}