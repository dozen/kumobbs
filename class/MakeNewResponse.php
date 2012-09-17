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
        if (empty($_POST['description']) || empty($_POST['id'])) {
            throw new Exception('不正な値です', 300);
        }
        $this->threadData->description = $_POST['description'];
        $this->threadData->time = Functions::timestamp();
        $this->threadData->screenName = $screenName;
        $this->threadData->id = $_POST['id'];
    }
    
    function insertResponse() {
        
    }

}

?>
