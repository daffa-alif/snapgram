@extends('layouts.app')

@section('content')
<div style="padding: 20px; max-width: 800px; margin: 0 auto;">
    <h3 style="font-size: 24px; margin-bottom: 10px;">Nama Album: {{ $album->namaAlbum }}</h3>
    <p style="font-size: 16px; color: #555;">Deskripsi: {{ $album->deskripsi }}</p>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background-color: #f5f5f5;">
                <th style="padding: 10px; border-bottom: 1px solid #ddd;">Judul</th>
                <th style="padding: 10px; border-bottom: 1px solid #ddd;">Deskripsi</th>
                <th style="padding: 10px; border-bottom: 1px solid #ddd;">Foto</th>
                <th style="padding: 10px; border-bottom: 1px solid #ddd;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($album->photos->isNotEmpty())
                @foreach($album->photos as $photo)
                    <tr>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $photo->judulFoto }}</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $photo->deskripsiFoto }}</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;">
                            <img src="{{ asset('storage/'.$photo->lokasiFile) }}"
                                 loading="lazy" 
                                 alt="{{ $photo->judulFoto }}"
                                 style="width: 150px; height: auto; aspect-ratio: 1/1; object-fit: cover; border-radius: 5px;">
                        </td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;">
                            <a href="{{ route('photos.edit', $photo->fotoID) }}" 
                               style="text-decoration: none; color: #007bff; margin-right: 10px;">Edit</a>
                            <form action="{{ route('photos.destroy', $photo->fotoID) }}" method="POST" 
                                  onsubmit="return confirm('Yakin ingin menghapus foto ini?');" 
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        style="background-color: #ff4d4d; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" style="padding: 10px; text-align: center; color: #999;">Tidak ada foto dalam album ini.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
