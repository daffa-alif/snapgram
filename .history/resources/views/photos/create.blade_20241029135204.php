@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; margin-top: 40px;">
        <div style="width: 100%; max-width: 500px; background-color: #fdfdfd; padding: 30px; border-radius: 10px; border: 1px solid #ddd;">
            <h2 style="font-size: 26px; margin-bottom: 20px; text-align: center; color: #333;">Upload Foto Baru</h2>

            <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="margin-bottom: 20px;">
                    <label for="judulFoto" style="display: block; font-weight: 600; margin-bottom: 8px; color: #555;">Judul Foto</label>
                    <input type="text" name="judulFoto" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="photo" style="display: block; font-weight: 600; margin-bottom: 8px; color: #555;">Pilih Foto</label>
                    <input type="file" name="photo" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="deskripsiFoto" style="display: block; font-weight: 600; margin-bottom: 8px; color: #555;">Deskripsi</label>
                    <textarea name="deskripsiFoto" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; resize: vertical;"></textarea>
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="albumID" style="display: block; font-weight: 600; margin-bottom: 8px; color: #555;">Album</label>
                    <select name="albumID" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <option value="">Pilih Album</option>
                        @foreach ($albums as $album)
                            <option value="{{ $album->albumID }}">{{ $album->namaAlbum }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="text-align: center;">
                    <button type="submit" style="padding: 8px 16px; font-size: 14px; background-color: #ccc; border: 1px solid #999; border-radius: 3px; cursor: pointer;">Unggah Foto</button>
                </div>
            </form>
        </div>
    </div>
@endsection
