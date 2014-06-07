<?php
namespace HoerAPI;

class PodcastLiveItem {
    public $id,
    $podcast,
    $state,
    $type,
    $synced,
    $title,
    $url,
    $streamurl,
    $livedate,
    $duration,
    $twittered;

    public function __construct(array $data) {
        $this->id = (int) $data['id'];
        $this->podcast = $data['podcast'];
        $this->state = (int) $data['state'];
        $this->type = (int) $data['type'];
        $this->synced = !!$data['synced'];
        $this->title = $data['title'];
        $this->url = $data['url'];
        $this->streamurl = $data['streamurl'];
        $this->livedate = strtotime($data['livedate']);
        $this->duration = (int) $data['duration'];
        $this->twittered = !!$data['twittered'];
    }


    /**
     * Get more information on this podcast
     *
     * @return bool|Podcast false if this podcast does not exist or none is specified
     */
    public function getPodcast()
    {
        if ($this->podcast !== null) return HoerAPI::getPodcastData($this->podcast);
        return false;
    }
}