1 @extends('layouts.app')
2 @section('content')

3 <div style="margin: 20px;">
4
<h2>Daftar Album</h2>

5 <table style="border-collapse: collapse;">
6 <tr>
7 <th>Nama Album</th>
8 <th>Deskripsi</th>
9 <th><a href="{{ route('albums.create') }}">Tambah Album</a></th>
10 </tr>
@foreach($albums as $album)
11 <tr>
12 <td><a href="#" {{ $album->namaAlbum }}</a></td>
13 <td>{{ $album->deskripsi }}</td>
14 <td style="text-align: center;">
15 <a href="{{ route('albums.edit', $album->albumID) }}">Edit</a>
16 <form action="{{ route('albums.destroy', $album->albumID) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tindakan ini tidak bisa dibatalkan');">
17 @csrf
18 @method('DELETE')
19 <button type="submit" style="background:none; border:none;">Hapus</button>
20 </td>
21 </form>
22 </tr>
23 @endforeach

24 </table>
25 </div>

26 @endsection