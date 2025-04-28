@extends('layouts.main')

@section('content')
<div class="container mx-auto my-8 px-4">
    <h1 class="text-3xl font-semibold text-center text-red-600 mb-8">Data Pemesanan yang Dihapus</h1>

    @if($tiket->isEmpty())
        <div class="text-center text-lg text-gray-500">Tidak ada data yang dihapus.</div>
    @else
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-3 px-4 text-left">Nama Pemesan</th>
                    <th class="py-3 px-4 text-left">Email</th>
                    <th class="py-3 px-4 text-left">Nama Konser</th>
                    <th class="py-3 px-4 text-left">Tanggal Konser</th>
                    <th class="py-3 px-4 text-left">Jumlah Tiket</th>
                    <th class="py-3 px-4 text-left">Status Pemesanan</th>
                    <th class="py-3 px-4 text-left">Tanggal Dihapus</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tiket as $pemesanan)
                    <tr class="bg-white border-b">
                        <td class="py-3 px-4">{{ $pemesanan->nama_pemesan }}</td>
                        <td class="py-3 px-4">{{ $pemesanan->email }}</td>
                        <td class="py-3 px-4">{{ $pemesanan->nama_konser }}</td>
                        <td class="py-3 px-4">{{ \Carbon\Carbon::parse($pemesanan->tanggal_konser)->format('d-m-Y') }}</td>
                        <td class="py-3 px-4">{{ $pemesanan->jumlah_tiket }}</td>
                        <td class="py-3 px-4">{{ $pemesanan->status_pemesanan }}</td>
                        <td class="py-3 px-4">{{ \Carbon\Carbon::parse($pemesanan->deleted_at)->format('d-m-Y H:i:s') }}</td>
                        <td class="py-3 px-4">
                            <form action="{{ route('pemesanan.restore', $pemesanan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-blue-600 hover:text-blue-800">Restore</button>
                            </form>
                            <form action="{{ route('pemesanan.forceDelete', $pemesanan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Hapus Permanen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
