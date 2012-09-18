<?php

/**
 * Description of ShowThreads
 *
 * @author dozen
 * @version 0.1
 */
class ShowThreads extends Kumo {

    /**
     * スレッドの中身を全部表示
     */
    function showThreads($threadList) {
        foreach ($threadList as $thread) {
            echo '<div class="thread">' .
            '<div clasas="command">' .
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
        $contents = $this->getThread($tag);
        foreach ($contents as $response) {
            echo
            '<dev>' .
            '<div class="text">' . nl2br(htmlspecialchars($response), false) . '</div>' .
            '<div class="time">' . $response['time'] . '</div>' .
            '<div class="name">' . $response['name'] . '</div>' .
            '<div class="clr hr"><img src="img/hr.png"></div>' .
            '</div>';
        }
    }

}