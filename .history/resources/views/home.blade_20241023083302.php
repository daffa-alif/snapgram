@extends('layouts.app')

@section('content')
<h2 class="snapgram-title">Snapgram</h2>
<table class="photos-table">
    <thead>
        <tr>
            <th>Pengguna</th>
            <th>Judul</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($photos as $photo)
        <tr>
            <td>{{ $photo->user->username }}</td>
            <td>{{ $photo->judulFoto }}</td>
            <td>
                <img class="photo-thumbnail" 
                     src="{{ asset('storage/' . $photo->lokasiFile) }}" 
                     alt="{{ $photo->judulFoto }}">
            </td>
            <td>
                <!-- Like/Unlike button -->
                <form action="{{ route('photos.like', $photo->fotoID) }}" method="POST" class="like-form">
                    @csrf
                    <button type="submit">
                        @if($photo->isLikedByAuthUser())
                            Unlike
                        @else
                            Like
                        @endif
                    </button>
                </form>
                <!-- Comment button -->
                <a href="{{ route('photos.comments', $photo->fotoID) }}" class="comment-button">Komentar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
