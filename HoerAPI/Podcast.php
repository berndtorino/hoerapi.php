<?php
namespace HoerAPI;

class Podcast
{
    public $id,
        $title,
        $description,
        $url,
        $feedurl,
        $imageurl,
        $slug,
        $recension,
        $cluster,
        $rec_pos,
        $rec_neg,
        $chat_server,
        $chat_channel,
        $chat_url,
        $obsolete,
        $freeze,
        $otitle,
        $feature,
        $contact;

    public function __construct($data = array())
    {
        $this->id = (int) $data['ID'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->url = $data['url'];
        $this->feedurl = $data['feedurl'];
        $this->imageurl = $data['imageurl'];
        $this->slug = $data['slug'];
        $this->recension = $data['recension'];
        $this->cluster = $data['cluster'];
        $this->rec_pos = $data['rec_pos'];
        $this->rec_neg = $data['rec_neg'];
        $this->chat_server = $data['chat_server'];
        $this->chat_channel = $data['chat_channel'];
        $this->chat_url = $data['chat_url'];
        $this->obsolete = !!$data['obsolete'];
        $this->freeze = !!$data['freeze'];
        $this->otitle = $data['otitle'];
        $this->feature = !!$data['feature'];
        $this->contact = $data['contact'];
    }

    /**
     * Get live dates for this podcast
     *
     * @param bool|int $count number of live dates or false: all live dates
     * @return bool|PodcastLive false if this podcast does not exist
     */
    public function getLive($count=false) {
        return HoerAPI::getPodcastLive($this->slug, $count);
    }
}