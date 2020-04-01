<?php

	namespace App\Helpers;

	use Illuminate\Support\Arr;

	class JSON
	{
        public static function getPlaylistItemsList($arr)
        {
            /**
            * Obtain a well-formed array from the Youtube API call
            *
            * @param  $arr      / The results of the Youtube API call
            * @return $return   / The conditioned results
            */

            // create an array from the Google JSon file
            // once ready, the array will come from an API call
            $file = public_path() . "/storage/" . $arr[0];

            // convert the array from JSON into an associative array (since 'assoc' param = true
            $fileContents = json_decode(file_get_contents($file),true);

            // pull the first element out of the array
            Arr::pull($fileContents, 'kind');

            // pull the first element out of the shortened array, while obtaining this element's value
            $pageInfos = Arr::pull($fileContents, 'pageInfo');

            // obtain the value for the array element whose key is 'totalResults'
            $listSize = $pageInfos['totalResults'];

            // pull the first element (in this case a subarray) from the shortened array
            Arr::pull($fileContents, 'etag');

            // obtain the subarray with key 'items' from the shortened array
            $fileContents = $fileContents['items'];

            Arr::pull($fileContents, 'kind');
            Arr::pull($fileContents, 'etag');
            Arr::pull($fileContents, 'id');

            ddd($fileContents);

$return = [$fileContents, $listSize];
return $return;
        }
        public static function getPlaylistList($arr)
        {
            // The videos
        }
	}

//  playlistsItems
    //  Prepare the $fileContents array for insertion into the database
    //  {FOREACH $arrays as $array}
    //  1.  Within the 2nd level element (array, $key is autonumber) unset the first three elements ($key = ['kind', 'etag', 'id']).
    //  2.  Within the 3rd level element (array, $key = 'snippet'),
    //      a.  Within the 4th level element (array, $key = 'resourceId'),
    //          i   pull the elements ($key = 'kind') into a temp array (name = '$tmpKinds')
    //          ii  pull the element ($key = 'videoId') into a temp array (name = '$tmpVideoIds')
    //      b.  Within the 3rd  level element (array, $key = 'snippet'), unset the 4th level element (array, $key = 'resourceId')
    //      c.  Within the 2nd level element (array, $key = autonumber),
    //          i   set the $key with the $value of array (name = '$tmpVideoIds')
    //          ii  push the array (name = '$tmpKinds') into the 3nd level array ($key = 'snippet')
    //      d.  Within the 3rd level element ($key = 'snippet')
    //          i   unset the 4th level element ($key = 'channelId')
    //          ii  unset the 4th level element ($key = 'playlistId')
    //      e.  Within the 2nd level element ($key = autonumber)
    //          i   pull the 3rd level element ($key = 'publishedAt') into a temp array (name = '$tmpPublishedAts')
    //          ii  set the value of variable (name = $tmpDate) equal to the $value the temp array (name = '$tmpPublishedAts')
    //          iii push variable (name = '$tmpDate') to { ConvertDateTime::ConvertDateTime($arr) }
    //          iv  set the value of temp array (name = '$tmpPublishedAts') with the formatted variable (name = '$tmpDate')
    //          v   push the temp array (name = $tmpPublishedAts) the 3rd level array ($key = 'snippet')
    //  3.  Within the 3rd level element (array, $key = 'status')
    //      a.  pull the 4th level element ($key = 'privacyStatus') into a temp array (name = '$tmpPrivacyStatuses')
    //  4.  Within the 2nd level element (array, key is autonumber)
    //      a.  push the temp array (name = '$tmpPrivacyStatuses') into the 3rd level element (array, $key = 'snippet')
    //      b.  unset the 3rd level element (array, $key = 'status')
    //  5.  Within the 3rd level element ($key = 'snippet')
    //      a.  push temp array (name = '$tmpvideoIds') into the element (4th level array, $key = 'thumbnails')
    //      b.  pull the 4th level element (4th level array, $key = 'thumbnails') into a new array (name = 'TN-[videoID]')
    //  {END FOREACH}
    //  We now have 2 arrays (1 has arrays with video information, the other has arrays with thumbnails) that we will insert into associated tables in the database

    //  Since we're pushing the data to the database, the outdented below are no longer relevant.  Until then,
    //  this creates a new array with the desired elements for the function return
    //
    //  next steps
    //  1.  Identify same process for Playlists (Playlists.list)
    //  2.  Identity DB tabe and field information for each
    //  3.
