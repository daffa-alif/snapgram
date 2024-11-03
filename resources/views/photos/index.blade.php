@extends('layouts.app')

@section('content')
<div style="padding: 20px;">
    <h3>Nama Album: {{ $album->namaAlbum }}</h3>
    <p>Deskripsi: {{ $album->deskripsi }}</p>

    <div style="margin-top: 20px;">
        @if($album->photos->isNotEmpty())
            @foreach($album->photos as $photo)
                <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                    <h4>{{ $photo->judulFoto }}</h4>
                    <p>{{ $photo->deskripsiFoto }}</p>
                    <img src="{{ asset('storage/'.$photo->lokasiFile) }}" 
                         alt="{{ $photo->judulFoto }}" 
                         style="width: 100px; height: auto; display: block; margin-bottom: 10px;">
                    <div>
                        <a href="{{ route('photos.edit', $photo->fotoID) }}" style="margin-right: 10px;">Edit</a>
                        <form action="{{ route('photos.destroy', $photo->fotoID) }}" method="POST" 
                              onsubmit="return confirm('Yakin ingin menghapus foto ini?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: red; cursor: pointer;">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p>Tidak ada foto dalam album ini.</p>
        @endif
    </div>
</div>
@endsection
