<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Testimoni;
use App\Models\Dokter;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter', 'bulan');
        $start = null;
        $end = null;

        $now = Carbon::now();

        switch ($filter) {
            case 'hari':
                $start = $now->copy()->startOfDay();
                $end = $now->copy()->endOfDay();
                break;
            case 'minggu':
                $start = $now->copy()->startOfWeek();
                $end = $now->copy()->endOfWeek();
                break;
            case 'bulan':
                $start = $now->copy()->startOfMonth();
                $end = $now->copy()->endOfMonth();
                break;
            case 'tahun':
                $start = $now->copy()->startOfYear();
                $end = $now->copy()->endOfYear();
                break;
        }

        $labels = [];
        $data = [];

        if ($filter === 'tahun') {
            $current = $start->copy();
            for ($i = 0; $i < 12; $i++) {
                $monthStart = $current->copy()->startOfMonth();
                $monthEnd = $current->copy()->endOfMonth();
                $labels[] = $monthStart->format('M Y');
                $data[] = Appointment::whereBetween('appointment_datetime', [$monthStart, $monthEnd])->count();
                $current->addMonth();
            }
        } elseif ($filter === 'bulan') {
            $current = $start->copy()->startOfWeek();
            while ($current <= $end) {
                $weekStart = $current->copy()->startOfWeek();
                $weekEnd = $current->copy()->endOfWeek();
                $labels[] = 'Minggu ' . $weekStart->weekOfMonth;
                $data[] = Appointment::whereBetween('appointment_datetime', [$weekStart, $weekEnd])->count();
                $current->addWeek();
            }
        } elseif ($filter === 'minggu') {
            $current = $start->copy();
            while ($current <= $end) {
                $labels[] = $current->format('d M');
                $data[] = Appointment::whereDate('appointment_datetime', $current)->count();
                $current->addDay();
            }
        } elseif ($filter === 'hari') {
            $current = $start->copy();
            while ($current->lte($end)) {
                $date = $current->toDateString();
                $labels[] = $current->format('D, d M');
                $count = Appointment::whereDate('appointment_datetime', $date)->count();
                $data[] = $count;
                $current->addDay();
            }
        }

        return view('admin.dashboard', [
            'totalAppointments' => Appointment::count(),
            'totalUsers' => User::count(),
            'totalTestimonials' => Testimoni::count(),
            'totalDoctors' => Dokter::count(),
            'labels' => $labels,
            'data' => $data,
            'filter' => $filter,
            'start' => $start ? $start->toDateString() : null,
            'end' => $end ? $end->toDateString() : null,
        ]);
    }
}
