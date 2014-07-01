<?php
namespace HoerAPI;

class PodcastEpisodeItem {
    public $id,
    $date,
    $date_gmt,
    $title,
    $name,
    $modified,
    $modified_gmt,
    $link,
    $commentlink,
    $mediaurl,
    $duration;

    public function __construct(array $data) {
        $this->id = (int) $data['ID'];
        $this->date = strtotime($data['post_date']);
        $this->date_gmt = strtotime($data['post_date_gmt']);
        $this->title = $data['post_title'];
        $this->name = $data['post_name'];
        $this->modified = strtotime($data['post_modified']);
        $this->modified_gmt = strtotime($data['post_modified_gmt']);
        $this->link = $data['post_link'];
        $this->mediaurl = $data['post_mediaurl'];
        $this->commentlink = $data['post_commentlink'];
        $this->duration = (int) $data['post_duration'];
    }
}