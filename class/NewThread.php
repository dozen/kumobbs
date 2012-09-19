<?php

/**
 * Description of NewThread
 *
 * @author dozen
 */
class NewThread extends Kumo {

    private $data, $tag;

    function setData($screenName) {
        $this->data = Functions::getPOST('title');
        $this->data->text = Functions::getPOST('text');
        $this->data->name = $screenName;
        $this->data->time = Functions::timestamp();
        $this->data->tag = Functions::randomString();
        if (empty($this->data->title) || empty($this->data->text)) {
            throw new Exception('値が空です', 302);
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