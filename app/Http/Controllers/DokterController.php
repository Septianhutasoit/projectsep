<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = [
            ['name' => 'Drg Yetti F Manalu', 'specialization' => 'Dokter Gigi Umum', 'gender' => 'Perempuan'],
            ['name' => 'Drg Serelady Sitorus', 'specialization' => 'Ortodotis', 'gender' => 'Perempuan'],
            ['name' => 'Drg Domdom Panjaitan', 'specialization' => 'Dokter Bedah Mulut', 'gender' => 'Laki-laki'],
        ];

        $staff = [
            ['name' => 'Yunita Lalisuk', 'position' => 'Perawat'],
            ['name' => 'Hippu Panjaitan', 'position' => 'Asisten Dokter'],
        ];

        return view('tim-spesialis', compact('doctors', 'staff')); // Data akan dikirim ke view 'tim-spesialis'
    }
}