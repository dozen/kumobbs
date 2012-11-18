<?php

/**
 * Description of NewThread
 *
 * @author dozen
 */
class NewThread extends Kumo {

    private $data;

    function setData($screenName) {
        $this->data->title = Functions::getPOST('title');
        $this->data->text = Functions::getPOST('text');
        $this->data->name = $screenName;
        $this->data->time = Functions::timestamp();
        $this->data->tag = Functions::randomString();
        if (empty($this->data->title) || empty($this->data->text) || empty($this->data->name)) {
            throw new Exception('不正な値です', 301);
        }
    }

    function insertToThreadList() {
        $insertThread = array(
            $this->data->tag => array(
                'tag' => $this->data->tag,
                'title' => $this->data->title,
                'uptime' => $this->data->time
            )
        );
        $threadList = $this->getThreadList();
        $result = $insertThread + $threadList;
        $this->setThreadList($result);
    }

    function insertContent() {
        $this->setContent($this->data->tag, array(
            $this->data->tag => array(
                'tag' => $this->data->tag,
                'name' => $this->data->name,
                'text' => $this->data->text,
                'time' => $this->data->time
            )
        ));
    }

}
