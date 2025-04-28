@extends('layouts.main')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="text-3xl font-semibold mb-4 text-center">Daftar Pemesanan Tiket Konser</h1>

    <div class="mb-4">
        <a href="{{ route('pemesanan.create') }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
            Tambah Pemesanan
        </a>
    </div>

    <div class="mb-4">
        <a href="{{ route('pemesanan.trashed') }}" class="inline-block bg-yellow-600 text-white px-4 py-2 rounded-md hover:bg-yellow-700">
            Lihat Data Trashed
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    @if ($tiket->count())
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Nama Pemesan</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Nama Konser</th>
                        <th class="px-4 py-2 text-left">Tanggal Konser</th>
                        <th class="px-4 py-2 text-left">Jumlah Tiket</th>
                        <th class="px-4 py-2 text-left">Kategori Tiket</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tiket as $item)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ ($tiket->currentPage() - 1) * $tiket->perPage() + $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $item->nama_pemesan }}</td>
                        <td class="px-4 py-2">{{ $item->email }}</td>
                        <td class="px-4 py-2">{{ $item->nama_konser }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($item->tanggal_konser)->format('d M Y') }}</td>
                        <td class="px-4 py-2">{{ $item->jumlah_tiket }}</td>
                        <td class="px-4 py-2 capitalize">{{ $item->kategori_tiket }}</td>
                        <td class="px-4 py-2 capitalize">{{ $item->status_pemesanan }}</td>
                        <td class="px-4 py-2">
                            @if($item->deleted_at)
                                {{-- Jika data sudah dihapus (soft delete), tampilkan Restore dan Hapus Permanen --}}
                                <form action="{{ route('pemesanan.restore', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-green-600 hover:text-green-800">Restore</button>
                                </form> |
                                <form action="{{ route('pemesanan.forceDelete', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Yakin ingin menghapus permanen?')">Hapus Permanen</button>
                                </form>
                            @else
                                {{-- Jika data aktif, tampilkan Edit dan Hapus biasa --}}
                                <a href="{{ route('pemesanan.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800">Edit</a> |
                                <form action="{{ route('pemesanan.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $tiket->links('pagination::tailwind') }}
        </div>
    @else
        <div class="p-4 bg-yellow-100 text-yellow-800 rounded-md">
            Belum ada data pemesanan.
        </div>
    @endif
</div>
@endsection
