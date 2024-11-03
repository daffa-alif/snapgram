@extends('layouts.app')

@section('content')
    <h2 style="text-align: center;">Snapgram</h2>
    <table style="width: 100%; border-collapse: collapse;">
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
                        <img 
                            src="{{ asset('storage/' . $photo->lokasiFile) }}" 
                            alt="{{ $photo->judulFoto }}" 
                            style="width: 200px; aspect-ratio: 1/1; object-fit: cover;"
                        >
                    </td>
                    <td>
                        <!-- Tombol untuk like/unlike -->
                        <form action="{{ route('photos.like', $photo->fotoID) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit">
                                @if($photo->isLikedByAuthUser())
                                    Unlike
                                @else
                                    Like
                                @endif
                            </button>
                        </form>
                        <!-- Tombol untuk komentar (can be added later) -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
