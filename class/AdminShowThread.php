<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminShowThread
 *
 * @author Kyosuke
 */
class AdminShowThread extends ShowThread {

    function show($thread) {
        $result = '<div class="thread">' .
                '<div class="command">' .
                '<a href="responseForm.php?tag=' . $thread['tag'] . '">返信</a> <a href="/kumobbs/delete/?type=thread&tag=' . $thread['tag'] . '">削除</a>' .
                '</div>' .
                '<div class="title">' . htmlspecialchars($thread['title']) . '</div>' .
                '<div class="content">';
        $result .= $this->showThreadContent($thread['tag']); //レスを表示する
        $result .= '</div>' .
                '</div>';
        return $result;
    }

    function showResponse($response) {
        return '<div>' .
                '<div class="text">' . nl2br(htmlspecialchars($response['text']), false) . '</div>' .
                '<div class="time">' . $response['time'] . '</div>' .
                '<div class="name"><a href="/' . $response['name'] . '/" target="_blank">@' . self::showScreenName($response['name']) . '</a> <a href="/kumobbs/delete/?type=response&tag=' . $response['tag'] . '&thread_tag=' . $this->thread['tag'] . '">削除</a></div>' .
                '<div class="clr hr"><img src="/kumobbs/img/hr.png"></div>' .
                '</div>';
    }

}
