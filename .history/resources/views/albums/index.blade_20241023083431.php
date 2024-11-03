@extends('layouts.app')

@section('content')

<div class="album-container">
    <h2>Daftar Album</h2>

    <table class="album-table">
        <thead>
            <tr>
                <th>Nama Album</th>
                <th>Deskripsi</th>
                <th><a href="{{ route('albums.create') }}">Tambah Album</a></th>
            </tr>
        </thead>

        <tbody>
            @foreach($albums as $album)
            <tr>
                <td><a href="{{ route('albums.photos', $album->albumID) }}">
                    {{$album->namaAlbum}}
                </a></td>
                <td>{{ $album->deskripsi }}</td>
                <td class="action-column">
                    <a href="{{ route('albums.edit', $album->albumID) }}">Edit</a>
                    <form action="{{ route('albums.destroy', $album->albumID) }}" method="POST" class="delete-form" onsubmit="return confirm('Tindakan ini tidak bisa dibatalkan');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<style>
    
</style>
@endsection
