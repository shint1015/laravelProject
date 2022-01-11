<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Vendor\CallYoutubeApi;

class YoutubeController extends Controller
{
    public function index()
    {

//        return 'aaaaa';
        $youtube_api = new CallYoutubeApi();
//        return 'aaaaa';
        $searchList = $youtube_api->searchList("ひろゆき");
        $array = array();
        foreach($searchList as $rs){
            $videosList = $youtube_api->videosList($rs->id->videoId);
            $embed = "https://www.youtube.com/embed/" . $videosList[0]['id'];
            $array[] = array($embed, $videosList[0]['snippet'],$videosList[0]['statistics']);
        }

        print("<pre>");
        var_dump($array);
        print("</pre>");
        return 'aaaaaaa';

    }

    // public function
}
