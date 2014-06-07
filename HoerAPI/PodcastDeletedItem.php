<?php
namespace HoerAPI;

class PodcastDeletedItem {
    public $event_id,
    $deldate;

    public function __construct(array $data){
        $this->event_id = (int) $data['event_ID'];
        $this->deldate = strtotime($data['deldate']);
    }
}