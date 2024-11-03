@extends('layouts.app')

@section('content')
<div style="padding: 20px;">
    <h3>Nama Album: {{ $album->namaAlbum }}</h3>
    <p>Deskripsi: {{ $album->deskripsi }}</p>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid #000; padding: 8px; text-align: left;">Judul</th>
                <th style="border: 1px solid #000; padding: 8px; text-align: left;">Deskripsi</th>
                <th style="border: 1px solid #000; padding: 8px; text-align: left;">Foto</th>
                <th style="border: 1px solid #000; padding: 8px; text-align: left;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($album->photos->isNotEmpty())
                @foreach($album->photos as $photo)
                    <tr>
                        <td style="border: 1px solid #000; padding: 8px;">{{ $photo->judulFoto }}</td>
                        <td style="border: 1px solid #000; padding: 8px;">{{ $photo->deskripsiFoto }}</td>
                        <td style="border: 1px solid #000; padding: 8px;">
                            <img src="{{ asset('storage/'.$photo->lokasiFile) }}" 
                                 alt="{{ $photo->judulFoto }}" 
                                 style="width: 100px; height: auto;">
                        </td>
                        <td style="border: 1px solid #000; padding: 8px;">
                            <a href="{{ route('photos.edit', $photo->fotoID) }}">Edit</a>
                            <form action="{{ route('photos.destroy', $photo->fotoID) }}" method="POST" 
                                  onsubmit="return confirm('Yakin ingin menghapus foto ini?');" 
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: red; cursor: pointer; padding: 0; text-decoration: underline;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" style="border: 1px solid #000; padding: 8px; text-align: center;">Tidak ada foto dalam album ini.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
