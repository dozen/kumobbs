<?php

/**
 * Description of ShowThreads
 *
 * @author dozen
 * @version 0.2
 */
class ShowThreads extends ShowThread {

    /**
     * スレッドの中身を全部表示
     */
    function show($threadList) {
        foreach ($threadList as $thread) {
            parent::show($thread);
        }
    }

}
