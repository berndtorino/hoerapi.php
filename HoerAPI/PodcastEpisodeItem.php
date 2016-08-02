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
        $this->date = parseDate($data['post_date']);
        $this->date_gmt = parseDate($data['post_date_gmt'], 'gmt');
        $this->title = $data['post_title'];
        $this->name = $data['post_name'];
        $this->modified = parseDate($data['post_modified']);
        $this->modified_gmt = parseDate($data['post_modified_gmt'], 'gmt');
        $this->link = $data['post_link'];
        $this->mediaurl = $data['post_mediaurl'];
        $this->commentlink = $data['post_commentlink'];
        $this->duration = (int) $data['post_duration'];
    }
}