@extends('layouts.app')

@section('content')
<div style="padding: 15px;">
    <h3>Nama Album: {{ $album->namaAlbum }}</h3>
    <p>Deskripsi: {{ $album->deskripsi }}</p>

    <table style="width: 100%; border: 1px solid #000; margin-top: 10px; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #e0e0e0;">
                <th style="padding: 8px; border: 1px solid #000;">Judul</th>
                <th style="padding: 8px; border: 1px solid #000;">Deskripsi</th>
                <th style="padding: 8px; border: 1px solid #000;">Foto</th>
                <th style="padding: 8px; border: 1px solid #000;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($album->photos->isNotEmpty())
                @foreach($album->photos as $photo)
                    <tr>
                        <td style="padding: 8px; border: 1px solid #000;">{{ $photo->judulFoto }}</td>
                        <td style="padding: 8px; border: 1px solid #000;">{{ $photo->deskripsiFoto }}</td>
                        <td style="padding: 8px; border: 1px solid #000;">
                            <img src="{{ asset('storage/'.$photo->lokasiFile) }}" 
                                 alt="{{ $photo->judulFoto }}" 
                                 style="width: 100px; height: auto;">
                        </td>
                        <td style="padding: 8px; border: 1px solid #000;">
                            <a href="{{ route('photos.edit', $photo->fotoID) }}" style="margin-right: 10px;">Edit</a>
                            <form action="{{ route('photos.destroy', $photo->fotoID) }}" method="POST" 
                                  onsubmit="return confirm('Yakin ingin menghapus foto ini?');" 
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #d9534f; cursor: pointer;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" style="padding: 8px; text-align: center; border: 1px solid #000;">Tidak ada foto dalam album ini.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
