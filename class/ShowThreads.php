<?php

/**
 * Description of ShowThreads
 *
 * @author dozen
 * @version 0.2
 */
class ShowThreads extends Kumo {

    /**
     * スレッドの中身を全部表示
     */
    function show($threadList) {
        foreach ($threadList as $thread) {
            echo '<div class="thread">' .
            '<div class="command">' .
            '<a href="responseForm.php?tag=' . $thread['tag'] . '">返信</a>' .
            '</div>' .
            '<div class="title">' . htmlspecialchars($thread['title']) . '</div>' .
            '<div class="content">';
            $this->showThreadContent($thread['tag']); //レスを表示する
            echo '</div>' .
            '</div>';
        }
    }

    function showThreadContent($tag) {
        $contents = $this->getContent($tag);
        foreach ($contents as $response) {
            echo
            '<div>' .
            '<div class="text">' . nl2br(htmlspecialchars($response['text']), false) . '</div>' .
            '<div class="time">' . $response['time'] . '</div>' .
            '<div class="name"><a href="/' . $response['name'] . '/" target="_blank">@' . $response['name'] . '</a></div>' .
            '<div class="clr hr"><img src="img/hr.png"></div>' .
            '</div>';
        }
    }

}