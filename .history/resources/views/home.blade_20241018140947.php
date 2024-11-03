@extends('layouts.app')

@section('content')
<h2 style="text-align: center; ">Snapgram</h2>
<table>
<tr>
<th>Pengguna</th>
<th>Judul</th>
<th>Foto</th>
<th>Aksi</th>
</tr>
@foreach($photos as $photo)
<tr>
<td>{{ $photo->user->username }}</td>
<td>{{ $photo->judulFoto }}</td>
<td>
<img src="{{ asset('storage/' . $photo->lokasiFile) }}"
alt="{{ $photo->judulFoto }}"
style="width: 200px; aspect-ratio: 1/1; object-fit: cover;">
</td>
<td>
<!-- Tombol untuk like/unlike -->
<!-- Tombol untuk komentar -->
</td>
</tr>
@endforeach
</table>
@endsection