@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; margin-top: 40px;">
        <div style="width: 100%; max-width: 500px; background-color: #fdfdfd; padding: 30px; border-radius: 10px; border: 1px solid #ddd;">
            <h2 style="font-size: 26px; margin-bottom: 20px; text-align: center; color: #333;">Edit Album</h2>

            <form action="{{ route('albums.update', $album->albumID) }}" method="POST">
                @csrf
                @method('PUT')

                <div style="margin-bottom: 20px;">
                    <label for="namaAlbum" style="display: block; font-weight: 600; margin-bottom: 8px; color: #555;">Nama Album</label>
                    <input type="text" name="namaAlbum" value="{{ $album->namaAlbum }}" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="deskripsi" style="display: block; font-weight: 600; margin-bottom: 8px; color: #555;">Deskripsi Album</label>
                    <textarea name="deskripsi" maxlength="150" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; height: 100px; resize: vertical;">{{ $album->deskripsi }}</textarea>
                </div>

                <div style="text-align: center;">
                    <button type="submit" style="padding: 8px 16px; font-size: 14px; background-color: #ccc; border: 1px solid #999; border-radius: 3px; cursor: pointer;">Update Album</button>
                </div>
            </form>
        </div>
    </div>
@endsection
