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
    .album-container {
    margin: 20px;
}

.album-table {
    width: 100%;
    border-collapse: collapse;
}

.album-table th,
.album-table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.album-table th {
    text-align: left;
}

.album-table td a {
    text-decoration: none;
    color: #007BFF;
}

.album-table td a:hover {
    text-decoration: underline;
}

.action-column {
    text-align: center;
}

.delete-form {
    display: inline;
}

.delete-button {
    background: none;
    border: none;
    color: #FF0000;
    cursor: pointer;
}

.delete-button:hover {
    text-decoration: underline;
}

</style>
@endsection
