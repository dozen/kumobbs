<?php

/**
 * Description of ShowThreadList
 *
 * @author dozen
 */
class ShowThreadList extends Kumo {

    static $haveNext, $havePrev;

    function getThreadList($page = 0) {
        $result = parent::getThreadList();
        if ($page === false) {
            $page = 0;
        }
        if ($page !== 0) {
            $page--;
        }
        $offset = $page * Config::PER_PAGE;
        Pagenation::set($result, $offset, $page + 1);
        return array_slice($result, $offset, Config::PER_PAGE);
    }

    function showSingleThread($thread, $response) {
        return '<div class="thread">' .
                '<a href="/kumobbs/thread/' . $thread['tag'] . '">' . $thread['title'] . '</a><div style="float:right">レス数:' . count($response) . '　最終更新:' . $thread['uptime'] . '</div>' .
                '</div>';
    }

    function show($page = 0) {
        $result = '';
        $threadList = $this->getThreadList($page);
        foreach ($threadList as $thread) {
            $response = $this->getContent($thread['tag']);
            $result .= $this->showSingleThread($thread, $response);
        }
        return $result;
    }

}
