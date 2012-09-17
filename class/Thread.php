<?php

/**
 * 
 *
 * @author dozen
 */
class Thread {

    /**
     * kumofsのインスタンスを生成
     */
    function __construct() {
        $this->io = new IO();
    }

    /**
     * スレッドの一覧を表示
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

    /**
     * スレッドをまとめて表示する
     * @param array $threads
     */
    function showThreads($threads) {
        foreach ($threads as $thread) {
            echo
            '<div class="thread">' . 
            '<div class="command">' .
            '<a href="makeResponseForm.php?id=' . $thread['id'] . '">返信</a>' .
            '</div>' .
            '<div class="thread_title">' . htmlspecialchars($thread['title']) . '</div>' .
            '<div class="body">';
            $this->showBody($thread['id']);
            echo
            '</div>' .
            '</div>';
        }
    }

    /**
     * スレッドの中身を取得して表示する
     * @param int $id
     */
    function showBody($id) {
        $body = $this->getThread($id);
        foreach ($body as $line) {
            echo
            '<div>' .
            '<div class="description">' . nl2br(htmlspecialchars($line['description']), false) . '</div>' .
            '<div class="time">' . htmlspecialchars($line['time']) . '</div>' .
            '<div class="name">' . htmlspecialchars($line['name']) . '</div>' .
            '<div class="clr hr"><img src="img/hr.png"></div>' .
            '</div>';
        }
    }

}