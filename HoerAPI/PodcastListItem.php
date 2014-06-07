<?php
namespace HoerAPI;

class PodcastListItem
{
    public $slug,
        $title;

    public function __construct($slug, $title) {
        $this->slug = $slug;
        $this->title = $title;
    }

    /**
     * Get more information on this podcast
     *
     * @return bool|Podcast false if this podcast does not exist or none is specified
     */
    public function getPodcast()
    {
        if ($this->slug !== null) return HoerAPI::getPodcastData($this->slug);
        return false;
    }
}