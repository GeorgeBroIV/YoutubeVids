<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\Library;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('video.show');
        #	    $videos = DB::table('v')->get();
#	    if ($request->query('id') !== null) {
#		    $rooms = $rooms->where('room_type_id', $request->query('id'));
#	    }
#	    return response()->json($rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        if ($request = 'video')
        {
            $playlists = [JSON::getPlaylistItemsList(['playlists.json', 'playlists'])];
            $playlistsItems = [JSON::getPlaylistItemsList(['playlistsItems.json', 'playlistsItems'])];
            $fileArray = $playlistsItems[0];
            dd($playlistsItems);
            return view('test.index', ['playlistsItems' => $playlistsItems]);
            return view('video.app',['playlistsItems' => $playlistsItems]);
        }
        elseif ($request = 'playlist')
        {
            $playlists = [JSON::getPlaylistItemsList(['playlists.json', 'playlists'])];
            $playlistsItems = [JSON::getPlaylistItemsList(['playlistsItems.json', 'playlistsItems'])];
            $fileArray = $playlistsItems[0];
            dd($playlistsItems);
            return view('test.index', ['playlistsItems' => $playlistsItems]);
            return view('video.app',['playlistsItems' => $playlistsItems]);
        }
        else
        {
            return view('video.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(video $video)
    {
        //
    }
	public function getChannels () {
    	$result = '<p>Test</p>';
		return $result;
	}
	public function getPlaylist () {
		$result = '<p>Test</p>';
		return $result;
	}
}
