@extends('layouts.app')

@section('title', 'Create Album')

@section('content')

    <h2 style="font-size: 24px; margin-bottom: 20px; color: #333;">Buat Album Baru</h2>

    <form action="{{ route('albums.store') }}" method="POST" style="max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
        @csrf
        <table style="width: 100%;">
            <tr>
                <td><label for="namaAlbum" style="font-weight: bold; color: #555;">Nama Album</label></td>
                <td><input type="text" name="namaAlbum" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></td>
            </tr>
            <tr>
                <td><label for="deskripsi" style="font-weight: bold; color: #555;">Deskripsi Album</label></td>
                <td><textarea name="deskripsi" required maxlength="150" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; resize: vertical; height: 80px;"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Tambah Album</button>
                </td>
            </tr>
        </table>
    </form>

@endsection
