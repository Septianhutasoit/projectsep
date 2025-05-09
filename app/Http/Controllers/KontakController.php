<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function kirim(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:5',
        ]);

        // Tidak melakukan pengiriman email, hanya redirect dengan notifikasi
        return redirect()->route('kontak')->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
