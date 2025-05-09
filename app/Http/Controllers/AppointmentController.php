<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    // 1. Menampilkan form janji temu di halaman publik
    public function index()
    {
        return view('appointment');
    }

    // 2. Menyimpan janji temu ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'appointment_datetime' => 'required|date',
            'reason' => 'nullable|string',
        ]);

       Appointment::create([
    'user_id' => auth()->id(), // ambil ID user yang login
    'name' => $request->name,
    'phone' => $request->phone,
    'appointment_datetime' => $request->appointment_datetime,
    'reason' => $request->reason,
    'approved' => false,

        ]);

        return redirect()->route('home')->with('success', 'Janji temu Anda berhasil dibuat!');
    }

    // 3. Menampilkan daftar janji temu di halaman admin
    public function adminIndex()
    {
        $appointments = Appointment::latest()->paginate(10);
        return view('admin.appointments.index', compact('appointments'));
    }

    // 4. Menyetujui janji temu
    public function approve($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->approved = true;
        $appointment->save();

        return redirect()->route('admin.appointments.index')->with('success', 'Janji temu berhasil disetujui!');
    }

    // 5. Menghapus janji temu
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('admin.appointments.index')->with('success', 'Janji temu berhasil dihapus.');
    }
}
