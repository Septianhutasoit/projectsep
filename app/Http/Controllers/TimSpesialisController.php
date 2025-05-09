<?php
namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class TimSpesialisController extends Controller
{
public function index()
{
$spesialis = Dokter::all();
return view('tim-spesialis', compact('spesialis'));
}

public function create()
{
return view('tim-spesialis.create');
}

public function store(Request $request)
{
$validated = $request->validate([
'nama' => 'required|string|max:255',
'spesialisasi' => 'required|string|max:255',
'deskripsi_singkat' => 'nullable|string',
'foto' => 'nullable|image|max:2048',
]);

if ($request->hasFile('foto')) {
$validated['foto'] = $request->file('foto')->store('dokter', 'public');
}

Dokter::create($validated);

return redirect()->route('tim-spesialis.index')->with('success', 'Dokter berhasil ditambahkan!');
}
}