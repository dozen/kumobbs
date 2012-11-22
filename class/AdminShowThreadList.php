<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AutherShowThreadList
 *
 * @author Kyosuke
 */
class AdminShowThreadList extends ShowThreadList {

    function showSingleThread($thread, $response) {
        return '<div class="thread">' .
                '<a href="/kumobbs/thread/' . $thread['tag'] . '">' . $thread['title'] . '</a><div style="float:right">レス数:' . count($response) . '　最終更新:' . $thread['uptime'] . ' <a href="/kumobbs/delete/?type=thread&tag=' . $thread['tag'] . '">削除</a></div>' .
                '</div>';
    }

}
