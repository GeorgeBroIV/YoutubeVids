@extends('layouts.app')

@section('content')

    <p>The current Youtube Playlist has {{ $listSize = array_shift($PlaylistsItemsList)[1] }} videos.</p>
    <table align="center" bgcolor="#fff8dc" style="border-width: medium; border-style: outset; padding: 5px">
        <tr>
            @for ($i = 0; $i <= $listSize - 1; $i++)
                <th style="border-style: outset; padding: 5px" align="middle" >
                    Column Headings
                </th>
            @endfor
        </tr>
        @for ($i = 0; $i <= 15; $i++)
            <tr>
                @for ($j = 0; $j <= $listSize - 1; $j++)
                    <td style="border-style: outset; padding: 5px" align="middle">
                        Field data will go here
                    </td>
                @endfor
            </tr>
        @endfor
    </table>
@endsection
