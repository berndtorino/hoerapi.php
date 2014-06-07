<?php
namespace HoerAPI;

class PodcastEpisodes extends Iterator {
    public function __construct(array $data = array()) {
        foreach ($data as $epi) {
            $this->list[] = new PodcastEpisodeItem($epi);
        }
    }
}