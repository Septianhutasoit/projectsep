<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        $adminEmail = 'admin@klinik.com'; // Ganti sesuai email admin nyata

        // Kirim email
        Mail::send([], [], function ($message) use ($validated, $adminEmail) {
            $message->to($adminEmail)
                ->subject('Pesan Baru dari Kontak Klinik')
                ->setBody("
                    <p><strong>Nama:</strong> {$validated['name']}</p>
                    <p><strong>Email:</strong> {$validated['email']}</p>
                    <p><strong>Pesan:</strong><br>{$validated['message']}</p>
                ", 'text/html');
        });

        return back()->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
