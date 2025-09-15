@extends('admin.layouts.app') @section('content')
<h1>Tambah Cabang</h1>
<form method="POST" action="{{ route('admin.branches.store') }}">
    @csrf
    <input name="name" placeholder="Nama Cabang" />
    <textarea name="address" placeholder="Alamat"></textarea>
    <input name="latitude" placeholder="Latitude" />
    <input name="longitude" placeholder="Longitude" />
    <input name="whatsapp_number" placeholder="Nomor WhatsApp" />
    <button type="submit">Simpan</button>
</form>
@endsection
