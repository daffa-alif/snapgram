@extends('layouts.app')

@section('content')
<h2>Profil Saya</h2>
<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('PUT')
    <table style="border: none; text-align: left;">
        <tr>
            <td><label for="username">Username</label></td>
            <td><input type="text" name="username" value="{{ $user->username }}" required></td>
        </tr>
        <tr>
            <td><label for="namaLengkap">Nama Lengkap</label></td>
            <td><input type="text" name="namaLengkap" value="{{ $user->namaLengkap }}" required></td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td><input type="email" name="email" value="{{ $user->email }}" required></td>
        </tr>
        <tr>
            <td><label for="password">Password</label></td>
            <td><input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah"></td>
        </tr>
        <tr>
            <td><label for="password_confirmation">Konfirmasi Password</label></td>
            <td><input type="password" name="password_confirmation" placeholder="Kosongkan jika tidak ingin mengubah"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right;">
                <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer;">Update Profil</button>
            </td>
        </tr>
    </table>
</form>

<!-- Logout Form -->
<div style="margin-top: 20px;">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; cursor: pointer;">Logout</button>
    </form>
</div>
@endsection
