<?php

$kumo = new Memcached();
$kumo->addServer('localhost', 11211);
$kumo->set('hoge', msgpack_pack(array('hoge', 8)));
var_dump(msgpack_unpack($kumo->get('hoge')));
?>
