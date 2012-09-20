<?php

/**
 * レス（返信）機能
 *
 * @author dozen
 */
class NewResponse extends Kumo {

    private $data;

    function setData($screenName) {
        $this->data->threadTag = Functions::getPOST('tag');
        $this->data->contentTag = Functions::randomString();
        $this->data->name = $screenName;
        $this->data->text = Functions::getPOST('text');
        $this->data->time = Functions::timestamp();
        if (empty($this->data->threadTag) || empty($this->data->name) || empty($this->data->text)) {
            throw new Exception('不正な値です', 301);
        }
    }

    function insertContent() {
        $content = $this->getContent($this->data->threadTag);
        $content[$this->data->contentTag] = array(
            'tag' => $this->data->contentTag,
            'name' => $this->data->name,
            'text' => $this->data->text,
            'time' => $this->data->time
        );
        $this->setContent($this->data->threadTag, $content);
    }

    function updateThreadList() {
        $threadList = $this->getThreadList();
        $threadList[$this->data->threadTag]['uptime'] = $this->data->time;
        if (Config::LIFT_THREAD === true) {
            $updateThread = array(
                $this->data->threadTag => $threadList[$this->data->threadTag]
            );
            unset($threadList[$this->data->threadTag]);
            $result = $updateThread + $threadList;
            $this->setThreadList($result);
        } else {
            $this->setThreadList($threadList);
        }
    }

}