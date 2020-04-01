<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\JSON;

class TestController extends Controller
{
    function __invoke()
    {
        $playlists = [JSON::getPlaylistItemsList(['playlists.json', 'playlists'])];
        $playlistsItems = [JSON::getPlaylistItemsList(['playlistsItems.json', 'playlistsItems'])];
        $fileArray= $playlistsItems[0];
        dd($playlistsItems);
        return view('test.index',['playlistsItems' => $playlistsItems]);
    }
}
