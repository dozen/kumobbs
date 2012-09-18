
<?php

class MakeNewThread extends Thread {

    /**
     * ユーザ名を渡すだけでOK
     * @param string $screenName
     * @throws Exception
     */
    function setData($screenName) {
        //値がセットされてなかったら弾く。
        if (!isset($_POST['title']) || !isset($_POST['description'])) {
            throw new Exception('不正な値です', 300);
        }
        //値が空だったら弾く
        if (empty($_POST['title']) || empty($_POST['description'])) {
            throw new Exception('不正な値です', 300);
        }
        $this->threadData->title = $_POST['title'];
        $this->threadData->description = $_POST['description'];
        $this->threadData->time = Functions::timestamp();
        $this->threadData->screenName = $screenName;
    }

    function insertToThreadList() {
        $threadList = $this->getThreadList();
        $this->threadCount = count($threadList);
        $this->id = Functions::randomString();
        $newThread = array('id' => $this->id, 'title' => $this->threadData->title);
        array_unshift($threadList, $newThread);
        $this->setThreadList($threadList);
    }

    /**
     * insertToThreadList()を先に実行すること
     */
    function setNewThread() {
        $this->setThread($this->id, array(
            array(
                'name' => $this->threadData->screenName,
                'description' => $this->threadData->description,
                'time' => $this->threadData->time
            )
        ));
    }

}

?>
