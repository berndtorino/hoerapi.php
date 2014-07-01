<?php
namespace HoerAPI;

class HoerAPI
{
    const URL = "http://hoersuppe.de/api/";

    protected static function get(array $params = array())
    {
        $query = http_build_query($params);
        $data = @file_get_contents(self::URL . "?" . $query);
        if ($data === false) return false;
        $data = json_decode($data, true);
        if ($data === null) return false;
        return $data;
    }


    /**
     * Check if the API is available
     *
     * @return bool
     */
    public static function status()
    {
        $data = self::get();
        return !!$data;
    }

    /**
     * Get information on a given podcast
     *
     * @param string $slug slug of the podcast
     * @return bool|Podcast
     */
    public static function getPodcastData($slug)
    {
        $data = self::get(array("action" => "getPodcastData", "podcast" => $slug));
        if ($data === false || $data['status'] === 0) return false;

        return new Podcast($data['data']);
    }

    /**
     * Get a list of all podcasts
     *
     * @return bool|PodcastList
     */
    public static function getPodcasts()
    {
        $data = self::get(array("action" => "getPodcasts"));
        if ($data === false || $data['status'] === 0) return false;

        return new PodcastList($data['data']);
    }

    /**
     * Get a list of live dates for a given podcast
     *
     * @param string $podcast slug of the podcast
     * @param bool|int $count maximum number of live dates or false if all
     * @return bool|PodcastLive
     */
    public static function getPodcastLive($podcast, $count = false)
    {
        if ($count !== false) $data = self::get(array("action" => "getPodcastLive", "podcast" => $podcast, "count" => $count));
        else $data = self::get(array("action" => "getPodcastLive", "podcast" => $podcast));
        if ($data === false || $data['status'] === 0) return false;

        return new PodcastLive($data['data']);
    }

    /**
     * Get a live date by ID
     *
     * @param $id
     * @return bool|PodcastLiveItem
     */
    public static function getLiveById($id) {
        $data = self::get(array("action" => "getLiveById", "ID" => $id));
        if ($data === false || $data['status'] === 0 || count($data['data']) <= 1) return false;

        return new PodcastLiveItem($data['data'][0]);
    }

    /**
     * Get episodes of a given podcast
     *
     * @param string $podcast slug of the podcast
     * @param int $count number of episodes, default: 10
     * @return bool|PodcastEpisodes
     */
    public static function getPodcastEpisodes($podcast, $count=10) {
        $data = self::get(array("action" => "getPodcastEpisodes", "podcast" => $podcast, "count" => $count));
        if ($data === false || $data['status'] === 0) return false;

        return new PodcastEpisodes($data['data']);
    }

    /**
     * Get a list of deleted live dates
     *
     * @return bool|PodcastDeleted
     */
    public static function getDeleted() {
        $data = self::get(array("action" => "getDeleted"));
        if ($data === false || $data['status'] === 0) return false;

        return new PodcastDeleted($data['data']);
    }

    public static function getLastEpisodes($count=10) {
        $data = self::get(array("action" => "getLastEpisodes", "count" => $count));
        if ($data === false || $data['status'] === 0) return false;

        return new PodcastEpisodes($data['data']);
    }

}