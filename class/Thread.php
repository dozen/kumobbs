<?php

/**
 * 
 *
 * @author dozen
 */
class Thread {

    function __construct() {
        $this->io = new IO();
    }

    /**
     * 
     * @return array
     */
    function getThreadList() {
        return msgpack_unpack($this->io->kumo->get(Config::SERVICE_NAME . '_ThreadList'));
    }

    function setThreadList($data) {
        $this->io->kumo->set(Config::SERVICE_NAME . '_ThreadList', msgpack_pack($data));
    }

    /**
     * スレッドの内容を取得
     * @param int $id
     * @return array
     */
    function getThread($id) {
        $result = msgpack_unpack($this->io->kumo->get(Config::SERVICE_NAME . '_Thread_' . $id));
        if ($result === false) {
            throw new Exception('そんなスレッドありません', 200);
        }
        return $result;
    }

    /**
     * @param int $id
     * @param array $data
     */
    function setThread($id, $data) {
        $this->io->kumo->set(Config::SERVICE_NAME . '_Thread_' . $id, msgpack_pack($data));
    }

    function showThreads($threads) {
        foreach ($threads as $thread) {
            echo '<div>' . PHP_EOL .
            '<div class="thread_title">' . $thread['title'] . '</div>' . PHP_EOL .
            '<div class="res_container">';
            $this->showBody($thread['id']);
            echo '</div>' . PHP_EOL .
            '</div>' . PHP_EOL;
        }
    }

    function showBody($id) {
        $body = $this->getThread($id);
        foreach ($body as $line) {
            echo
            '<div>' . PHP_EOL .
            '<div>' . $line['name'] . '</div>' . PHP_EOL .
            '<div>' . $line['description'] . '</div>' . PHP_EOL .
            '<div>' . $line['time'] . '</div>' . PHP_EOL .
            '</div>' . PHP_EOL;
        }
    }

}
