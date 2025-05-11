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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maks 2MB
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $file = $request->file('foto');
            $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName()); // Hindari spasi
            $fotoPath = 'testimoni_foto/' . $filename; // Path relatif

            try {
                // Simpan file ke storage/app/public/testimoni_foto
                $file->storeAs('testimoni_foto', $filename, 'public');

                // Verifikasi penyimpanan
                if (!Storage::disk('public')->exists($fotoPath)) {
                    Log::error('Failed to store file at: ' . $fotoPath);
                    return redirect()->route('home')->with('error', 'Gagal menyimpan foto.');
                }
            } catch (\Exception $e) {
                Log::error('File storage error: ' . $e->getMessage());
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
            // Hapus file jika sudah disimpan tetapi gagal membuat record
            if ($fotoPath && Storage::disk('public')->exists($fotoPath)) {
                Storage::disk('public')->delete($fotoPath);
            }
            return redirect()->route('home')->with('error', 'Gagal menyimpan testimoni.');
        }

        return redirect()->route('home')->with('success', 'Testimoni berhasil dikirim!');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        // Hapus foto jika ada
        if ($testimoni->foto && Storage::disk('public')->exists($testimoni->foto)) {
            Storage::disk('public')->delete($testimoni->foto);
        } else if ($testimoni->foto) {
            Log::warning('File not found for deletion: ' . $testimoni->foto);
        }

        $testimoni->delete();

        return redirect()->route('home')->with('success', 'Testimoni berhasil dihapus.');
    }
}
