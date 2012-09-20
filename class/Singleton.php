<?php
/**
 * Description of Kumo
 *
 * @author dozen
 */
class Singleton {

    static function Kumo() {
        static $kumo;

        if (!isset($kumo)) {
            try {
                $kumo = new Memcached();
                $kumo->addServer(Config::KUMOFS_HOST, Config::KUMOFS_PORT);
            } catch (MemcachedException $error) {
                throw new Exception($error->getMessage(), 200);
            }
        }
        return $kumo;
    }

}