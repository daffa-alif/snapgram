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

<style>
    .snapgram-title {
    text-align: center;
    font-size: 24px;
}

.photos-table {
    width: 80%; /* Adjust the table width as needed */
    margin: 0 auto; /* Centers the table horizontally */
    border-collapse: collapse;
}

.photos-table th, 
.photos-table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

.photo-thumbnail {
    width: 200px;
    aspect-ratio: 1/1;
    object-fit: cover;
}

.like-form {
    display: inline;
}

.comment-button {
    margin-left: 10px;
    text-decoration: none;
    color: #007BFF;
}

.comment-button:hover {
    text-decoration: underline;
}

</style>