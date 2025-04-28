@extends('layouts.main')

@section('content')
<div class="container mx-auto my-8 px-4">
    <h1 class="text-3xl font-semibold text-center text-indigo-600 mb-8">Tambah Pemesanan Tiket</h1>

    @if ($errors->any())
        <div class="alert alert-danger bg-red-500 text-white p-4 rounded-lg shadow-md mb-6">
            <strong class="font-bold">Oops!</strong> Ada kesalahan pada input Anda.
            <button type="button" class="absolute top-2 right-2 text-white" data-bs-dismiss="alert" aria-label="Close">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <ul class="mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pemesanan.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-6 space-y-6">
        @csrf

        <div class="mb-4">
            <label for="nama_pemesan" class="block text-lg font-medium text-gray-700">Nama Pemesan</label>
            <input type="text" name="nama_pemesan" class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="nama_pemesan" value="{{ old('nama_pemesan') }}" required>
            <div class="text-sm text-gray-500 mt-2">Masukkan nama lengkap pemesan tiket.</div>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-lg font-medium text-gray-700">Email Pemesan</label>
            <input type="email" name="email" class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="email" value="{{ old('email') }}" required>
            <div class="text-sm text-gray-500 mt-2">Masukkan email yang valid untuk konfirmasi pemesanan.</div>
        </div>

        <div class="mb-4">
            <label for="nama_konser" class="block text-lg font-medium text-gray-700">Nama Konser</label>
            <input type="text" name="nama_konser" class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="nama_konser" value="{{ old('nama_konser') }}" required>
            <div class="text-sm text-gray-500 mt-2">Masukkan nama konser yang akan dihadiri.</div>
        </div>

        <div class="mb-4">
            <label for="tanggal_konser" class="block text-lg font-medium text-gray-700">Tanggal Konser</label>
            <input type="date" name="tanggal_konser" class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="tanggal_konser" value="{{ old('tanggal_konser') }}" required>
            <div class="text-sm text-gray-500 mt-2">Pilih tanggal konser yang akan datang.</div>
        </div>

        <div class="mb-4">
            <label for="jumlah_tiket" class="block text-lg font-medium text-gray-700">Jumlah Tiket</label>
            <input type="number" name="jumlah_tiket" class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="jumlah_tiket" value="{{ old('jumlah_tiket') }}" required min="1">
            <div class="text-sm text-gray-500 mt-2">Masukkan jumlah tiket yang ingin dipesan (minimal 1).</div>
        </div>

        <div class="mb-4">
            <label for="kategori_tiket" class="block text-lg font-medium text-gray-700">Kategori Tiket</label>
            <select name="kategori_tiket" id="kategori_tiket" class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                <option value="">Pilih Kategori</option>
                <option value="VIP" {{ old('kategori_tiket') == 'VIP' ? 'selected' : '' }}>VIP</option>
                <option value="Reguler" {{ old('kategori_tiket') == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                <option value="Festival" {{ old('kategori_tiket') == 'Festival' ? 'selected' : '' }}>Festival</option>
            </select>
            <div class="text-sm text-gray-500 mt-2">Pilih kategori tiket sesuai dengan preferensi Anda.</div>
        </div>

        <div class="mb-4">
            <label for="status_pemesanan" class="block text-lg font-medium text-gray-700">Status Pemesanan</label>
            <select name="status_pemesanan" id="status_pemesanan" class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                <option value="">Pilih Status Pemesanan</option>
                <option value="Terkonfirmasi" {{ old('status_pemesanan') == 'Terkonfirmasi' ? 'selected' : '' }}>Terkonfirmasi</option>
                <option value="Pending" {{ old('status_pemesanan') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Dibatalkan" {{ old('status_pemesanan') == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
            <div class="text-sm text-gray-500 mt-2">Pilih status pemesanan Anda.</div>
        </div>

        <div class="flex justify-between items-center">
            <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Simpan</button>
            <a href="{{ route('pemesanan.index') }}" class="px-6 py-3 bg-gray-500 text-white rounded-lg shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">Batal</a>
        </div>
    </form>
</div>

@endsection
