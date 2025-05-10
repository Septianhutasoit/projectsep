<?php

namespace App\Http\Controllers\Admin;

use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        return view('admin.layanan.index', compact('layanan'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|nullable|max:1999',
        ]);

        $fileNameToStore = 'noimage.png'; // Default gambar

        if ($request->hasFile('gambar')) {
            $filenameWithExt = $request->file('gambar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            // Simpan ke folder public/gambar_layanan menggunakan disk 'public'
            $request->file('gambar')->storeAs('gambar_layanan', $fileNameToStore, 'public');
        }

        Layanan::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $fileNameToStore,
        ]);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('admin.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|nullable|max:1999',
        ]);

        $layanan = Layanan::findOrFail($id);
        $fileNameToStore = $layanan->gambar; // Gunakan gambar lama sebagai default

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika bukan default
            if ($layanan->gambar !== 'noimage.png' && Storage::disk('public')->exists('gambar_layanan/' . $layanan->gambar)) {
                Storage::disk('public')->delete('gambar_layanan/' . $layanan->gambar);
            }

            $filenameWithExt = $request->file('gambar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            // Simpan ke folder public/gambar_layanan menggunakan disk 'public'
            $request->file('gambar')->storeAs('gambar_layanan', $fileNameToStore, 'public');
        }

        $layanan->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $fileNameToStore,
        ]);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        // Hapus gambar jika bukan default
        if ($layanan->gambar !== 'noimage.png' && Storage::disk('public')->exists('gambar_layanan/' . $layanan->gambar)) {
            Storage::disk('public')->delete('gambar_layanan/' . $layanan->gambar);
        }

        $layanan->delete();
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
