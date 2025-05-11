<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::latest()->get();
        return view('welcome', compact('testimonis'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'nullable|string|max:100',
            'pesan' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            // Simpan file ke direktori public/storage/testimoni_foto
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $fotoPath = $file->storeAs('testimoni_foto', $filename, 'public');

            // Verifikasi apakah file benar-benar tersimpan
            if (!Storage::disk('public')->exists($fotoPath)) {
                Log::error('Failed to store file at: ' . $fotoPath);
                return redirect()->route('home')->with('error', 'Gagal menyimpan foto.');
            }
        }

        try {
            Testimoni::create([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'pesan' => $request->pesan,
                'rating' => $request->rating,
                'foto' => $fotoPath,
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to create testimoni: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'Gagal menyimpan testimoni.');
        }

        return redirect()->route('home')->with('success', 'Testimoni berhasil dikirim!');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        // Hapus foto jika ada
        if ($testimoni->foto) {
            Storage::disk('public')->delete($testimoni->foto);
        }

        $testimoni->delete();

        return redirect()->back()->with('success', 'Testimoni berhasil dihapus.');
    }
}
