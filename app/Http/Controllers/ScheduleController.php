<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        // Anda bisa menambahkan logika untuk mengambil data jadwal jika diperlukan
        return view('schedule.index');
    }
}
