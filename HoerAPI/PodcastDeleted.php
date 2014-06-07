<?php
namespace HoerAPI;

class PodcastDeleted extends Iterator {
    public function __construct(array $data = array()) {
        foreach ($data as $del) {
            $this->list[] = new PodcastDeletedItem($del);
        }
    }
}