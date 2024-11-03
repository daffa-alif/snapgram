@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; margin-top: 40px;">
        <div style="width: 100%; max-width: 500px; background-color: #fdfdfd; padding: 30px; border-radius: 10px; border: 1px solid #ddd;">
            <h2 style="font-size: 26px; margin-bottom: 20px; text-align: center; color: #333;">Edit Foto</h2>

            <form action="{{ route('photos.update', $photo->fotoID) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div style="margin-bottom: 20px;">
                    <label for="judulFoto" style="display: block; font-weight: 600; margin-bottom: 8px; color: #555;">Judul Foto</label>
                    <input type="text" id="judulFoto" name="judulFoto" value="{{ $photo->judulFoto }}" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="photo" style="display: block; font-weight: 600; margin-bottom: 8px; color: #555;">Pilih Foto</label>
                    <input type="file" id="photo" name="photo" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    <small style="display: block; margin-top: 5px; color: #777;">Biarkan kosong jika tidak ingin mengubah foto.</small>
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="description" style="display: block; font-weight: 600; margin-bottom: 8px; color: #555;">Deskripsi</label>
                    <textarea id="description" name="deskripsiFoto" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; resize: vertical;">{{ $photo->deskripsiFoto }}</textarea>
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="albumID" style="display: block; font-weight: 600; margin-bottom: 8px; color: #555;">Album</label>
                    <select id="albumID" name="albumID" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <option value="">Pilih Album</option>
                        @foreach ($albums as $album)
                            <option value="{{ $album->albumID }}" {{ $photo->albumID == $album->albumID ? 'selected' : '' }}>
                                {{ $album->namaAlbum }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div style="text-align: center;">
                    <button type="submit" style="padding: 8px 16px; font-size: 14px; background-color: #ccc; border: 1px solid #999; border-radius: 3px; cursor: pointer;">Update Foto</button>
                </div>
            </form>
        </div>
    </div>
@endsection
