@extends('layouts.app')

@section('title', 'Create Album')

@section('content')

    <div style="display: flex; justify-content: center; margin-top: 40px;">
        <div style="width: 100%; max-width: 500px; background-color: #fdfdfd; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <h2 style="font-size: 26px; margin-bottom: 20px; text-align: center; color: #333;">Buat Album Baru</h2>

            <form action="{{ route('albums.store') }}" method="POST">
                @csrf

                <div style="margin-bottom: 20px;">
                    <label for="namaAlbum" style="display: block; font-weight: 600; margin-bottom: 8px; color: #555;">Nama Album</label>
                    <input type="text" name="namaAlbum" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="deskripsi" style="display: block; font-weight: 600; margin-bottom: 8px; color: #555;">Deskripsi Album</label>
                    <textarea name="deskripsi" required maxlength="150" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; height: 100px; resize: vertical;"></textarea>
                </div>

                <div style="text-align: center;">
                    <button type="submit" style="background-color: #4CAF50; color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">Tambah Album</button>
                </div>
            </form>
        </div>
    </div>

@endsection
