@extends('layouts.app')

@section('content')
    <div style="margin: 20px;">
        <h2>Edit Foto</h2>
        <form action="{{ route('photos.update', $photo->fotoID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table>
                <tr>
                    <td>
                        <label for="judulFoto">Judul Foto</label>
                    </td>
                    <td>
                        <input type="text" name="judulFoto" value="{{ old('judulFoto', $photo->judulFoto) }}" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="photo">Pilih Foto</label>
                    </td>
                    <td>
                        <input type="file" name="photo" id="photo">
                        <small>Biarkan kosong jika tidak ingin mengubah foto.</small>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="deskripsiFoto">Deskripsi</label>
                    </td>
                    <td>
                        <textarea name="deskripsiFoto" maxlength="500" required>{{ old('deskripsiFoto', $photo->deskripsiFoto) }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">
                        <button type="submit">Update Foto</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
@endsection
