@extends('layouts.app')

@section("title", 'Youtube切り抜き検索')

@section('content')
<h1>
    検索フォーム
</h1>
<form action="/get_youtube_data" method="get">
    <input type="text" name="search_word">
    <select name="sort">
        <option value="evaluate">評価順</option>
        <option value="views">再生回数順</option>
        <optgroup label="更新順">
            <option value="update_desc">新しい順</option>
            <option value="update_asc">古い順</option>
        </optgroup>
    </select>
    <input class="btn btn-info" type="submit" value="検索">
</form>
<div class="flex video_content">
    @foreach($youtube_data as $value)
        <div class="video_box">
            <iframe width="100%" height="275px"
            src="{{ $value[0] }}"
            >
            </iframe>
        </div>
    @endforeach
</div>


<style>
    .flex{
        display: flex;
    }
    .video_content {
        flex-wrap: wrap;
    }
    .video_box{
        width:30%;
        padding:0.5rem;
    }
</style>
@endsection


