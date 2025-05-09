<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index'); // Biar halaman utama bisa diakses publik
    }

    public function index()
    {
        $testimonis = Testimoni::latest()->get(); // Ambil testimoni dari database
        return view('welcome', compact('testimonis')); // Kirim ke view
    }
}
