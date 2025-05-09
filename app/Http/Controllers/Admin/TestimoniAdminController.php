<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniAdminController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::latest()->get();
        return view('admin.testimoni.index', compact('testimonis'));
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        if ($testimoni->foto) {
            Storage::disk('public')->delete($testimoni->foto);
        }

        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }

    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'pesan' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'foto' => 'nullable|image|max:2048',
        ]);

        $testimoni = Testimoni::findOrFail($id);

        // Jika ada foto baru, hapus foto lama
        if ($request->hasFile('foto')) {
            if ($testimoni->foto) {
                Storage::disk('public')->delete($testimoni->foto);
            }
            $fotoPath = $request->file('foto')->store('testimoni_foto', 'public');
            $testimoni->foto = $fotoPath;
        }

        $testimoni->nama = $request->nama;
        $testimoni->pesan = $request->pesan;
        $testimoni->rating = $request->rating;
        $testimoni->save();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function create()
    {
        return view('admin.create_testimoni');
    }
}
