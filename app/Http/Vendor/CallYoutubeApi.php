<?php

namespace App\Http\Vendor;

use Google_Client;
use Google_Service_YouTube;

class CallYoutubeApi
{
    private $key;
    private $client;
    private $youtube;

    public function __construct()
    {
        $this->key = env("YOUTUBE_DATA_API_KEY");
        $this->client = new Google_Client();
        try {

        }catch(\Throwable $th){

        }
        $this->client->setDeveloperKey($this->key);
        $this->youtube = new Google_Service_YouTube($this->client);
    }

    /**
     * /v3/searchを呼び出す
     *
     * @param string $serachWord
     * @return array
     */
    public function searchList(String $searchWord)
    {
        $array = array(
            'q' => $searchWord,
            'maxResults' => 10,
            'order' => 'viewCount',
        );

        try{
            $rs = $this->youtube->search->listSearch('id', $array);
        }catch (\Throwable $th){
            return false;
        }
        return $rs->items;
    }

    /**
     * /v3/videosを呼び出す
     * @param String $id
     * @return false
     */
    public function videosList(String $id)
    {
        $array = array(
            'id' => $id,
        );

        try {
            $rs = $this->youtube->videos->listVideos('statistics,snippet', $array);
        }catch (\Throwable $th){
            return false;
        }
        return $rs->items;
    }
}
