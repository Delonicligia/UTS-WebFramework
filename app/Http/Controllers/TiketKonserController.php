<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use Illuminate\Http\Request;

class TiketKonserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiket = Konser::latest()->paginate(8);
        return view('pemesanan.index', compact('tiket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nama_konser' => 'required|string|max:255',
            'tanggal_konser' => 'required|date',
            'jumlah_tiket' => 'required|integer',
            'kategori_tiket' => 'required|in:VIP,Reguler,Festival',
            'status_pemesanan' => 'required|in:Terkonfirmasi,Pending,Dibatalkan',
        ]);

        Konser::create($validateData);
        return redirect()->route('pemesanan.index')->with('success', 'Tiket berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tiket = Konser::findOrFail($id);
        return view('pemesanan.show', compact('tiket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tiket = Konser::findOrFail($id);
        return view('pemesanan.edit', compact('tiket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nama_konser' => 'required|string|max:255',
            'tanggal_konser' => 'required|date',
            'jumlah_tiket' => 'required|integer',
            'kategori_tiket' => 'required|in:VIP,Reguler,Festival',
            'status_pemesanan' => 'required|in:Terkonfirmasi,Pending,Dibatalkan',
        ]);

        $tiket = Konser::findOrFail($id);
        $tiket->update($validateData);
        return redirect()->route('pemesanan.index')->with('success', 'Tiket berhasil diedit');
    }

    /**
     * Remove the specified resource from storage (Soft Delete).
     */
    public function destroy(string $id)
    {
        $tiket = Konser::findOrFail($id);
        $tiket->delete();  // Soft delete
        return redirect()->route('pemesanan.index')->with('success', 'Tiket berhasil dihapus');
    }

    /**
     * Display a listing of the soft-deleted resources.
     */
    public function trashed()
    {
        // Ambil semua data yang di-soft delete
        $tiket = Konser::onlyTrashed()->paginate();

        // Kembalikan data ke view
        return view('pemesanan.trashed', compact('tiket'));
    }

    /**
     * Restore a soft-deleted resource.
     */
    public function restore($id)
    {
        $tiket = Konser::withTrashed()->findOrFail($id);
        $tiket->restore();  // Mengembalikan data yang di-soft delete
        return redirect()->route('pemesanan.trashed')->with('success', 'Data berhasil dipulihkan.');
    }

        public function forceDelete($id)
    {
        $tiket = Konser::onlyTrashed()->findOrFail($id);
        $tiket->forceDelete();  // Hapus permanen dari database
        return redirect()->route('pemesanan.trashed')->with('success', 'Data berhasil dihapus permanen.');
    }
}