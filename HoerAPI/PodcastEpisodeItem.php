<?php
namespace HoerAPI;

class PodcastEpisodeItem {
    public $id,
    $date,
    $date_gmt,
    $name,
    $modified,
    $modified_gmt,
    $link,
    $commentLink,
    $mediaurl,
    $duration;

    public function __construct(array $data) {
        $this->id = (int) $data['ID'];
        $this->date = strtotime($data['post_date']);
        $this->date_gmt = strtotime($data['post_date_gmt']);
        $this->name = $data['post_name'];
        $this->modified = strtotime($data['post_modified']);
        $this->modified_gmt = strtotime($data['post_modified_gmt']);
        $this->link = $data['post_link'];
        $this->mediaurl = $data['post_mediaurl'];
        $this->commentLink = $data['post_commentLink'];
        $this->duration = (int) $data['post_post_duration'];
    }
}