@extends('layouts.app')

@section('content')
    <div align="center">
        <input type="text" id="txtUrl" style="width: 500px" value="https://www.youtube.com/watch?v=cWuvnc6u93A"/>
        <input type="button" id="btnPlay" value="Play" />
        <hr />
        <embed id="video" src="" wmode="transparent" type="application/x-shockwave-flash"
               width="800" height="600" allowfullscreen="true" title="Adobe Flash Player"></embed>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript">
            $("body").on("click", "#btnPlay", function () {
                var url = $("#txtUrl").val();
                url = url.split('v=')[1];
                $("#video")[0].src = "https://www.youtube.com/v/" + url;
            });
        </script>
    </div>
@endsection
