<?php
namespace HoerAPI;

class PodcastList extends Iterator {
    public function __construct(array $data = array()) {
        foreach ($data as $pod) {
            $this->list[] = new PodcastListItem($pod['slug'], $pod['title']);
        }
    }
}