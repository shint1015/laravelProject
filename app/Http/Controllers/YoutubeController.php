<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Vendor\CallYoutubeApi;

class YoutubeController extends Controller
{
    public function index()
    {
        $search_word = $_GET["search_word"] ?? '';

        if($search_word != ""){
            $search_word .= ' ';
        }

        $search_word .= '切り抜き';


        $youtube_api = new CallYoutubeApi();
        $searchList = $youtube_api->searchList($search_word);
        $array = array();
        foreach($searchList as $rs){
            $videosList = $youtube_api->videosList($rs->id->videoId);
            $embed = "https://www.youtube.com/embed/" . $videosList[0]['id'];
            $array[] = array($embed, $videosList[0]['snippet'],$videosList[0]['statistics']);
        }

        $view_arr = array();

        $view_arr["youtube_data"] = $array;
//        var_dump($view_arr);

        return view("youtube.index", $view_arr);



    }

    // public function save_
}
