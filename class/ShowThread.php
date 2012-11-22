<?php

/**
 * Description of ShowThread
 *
 * @author dozen
 */
class ShowThread extends Kumo {

    /**
     * スレッドの中身を表示
     */
    function show($thread) {
        $result = '<div class="thread">' .
        '<div class="command">' .
        '<a href="responseForm.php?tag=' . $thread['tag'] . '">返信</a>' .
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
                '<div class="name"><a href="/' . $response['name'] . '/" target="_blank">@' . self::showScreenName($response['name']) . '</a></div>' .
                '<div class="clr hr"><img src="/kumobbs/img/hr.png"></div>' .
                '</div>';
    }

    function showThreadContent($tag) {
        $contents = $this->getContent($tag);
        $this->thread = $contents;
        $result = '';
        foreach ($contents as $response) {
            $result .= $this->showResponse($response);
        }
        return $result;
    }

    static function showScreenName($screenName) {
        if (Functions::isAdmin($screenName)) {
            return $screenName . ' (Admin)';
        }
        return $screenName;
    }

}
