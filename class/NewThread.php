<?php

/**
 * Description of NewThread
 *
 * @author dozen
 */
class NewThread extends Kumo {

    private $data;

    function setData($screenName) {
        $this->data = new stdClass();
        $this->data->title = Functions::getPOST('title');
        $this->data->text = Functions::getPOST('text');
        $this->data->time = Functions::timestamp();
        if (empty($this->data->title) || empty($this->data->text)) {
            throw new Exception('値が空です', 302);
        }
    }

   function insertToThreadList() {
       
   }
}

?>
