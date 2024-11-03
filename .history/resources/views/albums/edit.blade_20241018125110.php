@extends('layouts.app')

@section('content')
    <div style="margin: 20px;">
    <h2>Edit Album</h2>
    <form action="{{ route('albums.update',
    $album->albumID) }}" method="POST">
    @csrf
    @method('PUT')
        <table>
            <tr>
                <td>
                    <label for="namaAlbum">Nama Album</label>
                    </td>
                    <td>
                    <input type="text" name="namaAlbum"
                    value="{{ $album->namaAlbum }}" required>
                </td>
            </tr>
        </table>
    </div>
@endsection
