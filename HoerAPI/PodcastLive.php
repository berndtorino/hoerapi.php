<?php
namespace HoerAPI;

class PodcastLive extends Iterator
{
    public function __construct(array $data = array())
    {
        foreach ($data as $pod) {
            $this->list[] = new PodcastLiveItem($pod);
        }
    }
}