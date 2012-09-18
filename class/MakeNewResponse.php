<?php

/**
 * Description of MakeNewResponce
 *
 * @author dozen
 */
class MakeNewResponse extends Thread {

    function setData($screenName) {
        //値がセットされてなかったら弾く。
        if (!isset($_POST['description']) || !isset($_POST['id'])) {
            throw new Exception('不正な値です', 300);
        }
        //値が空だったら弾く
        if (empty($_POST['description'])) {
            throw new Exception('不正な値です', 300);
        }
        $this->threadData->description = $_POST['description'];
        $this->threadData->time = Functions::timestamp();
        $this->threadData->screenName = $screenName;
        $this->threadData->id = $_POST['id'];
    }

    /**
     * レスをスレッドに追加
     */
    function insertResponse() {
        $data = $this->getThread($this->threadData->id);
        $data[] = array(
            'name' => $this->threadData->screenName,
            'description' => $this->threadData->description,
            'time' => $this->threadData->time
        );
        $this->setThread($this->threadData->id, $data);
    }
    
    /**
     * レスがあったスレッドを一番上に
     */
    function liftUpThread() {
        $threadList = $this->getThreadList();
        $liftThread = $threadList[$this->threadData->id];
        unset($threadList[$this->threadData->id]);
        array_unshift($threadList, $liftThread);
        $this->setThreadList($threadList);
    }

}

?>
