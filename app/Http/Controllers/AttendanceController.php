<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Menangani GET dan POST pada rute yang sama
    public function showOrStoreAttendance(Request $request)
    {
        if ($request->isMethod('get')) {
            // Handle GET request, tampilkan halaman absensi
            $users = User::all();  // Ambil semua pegawai
            $attendances = Attendance::with('user')->orderBy('clock_in', 'desc')->get(); // Mengurutkan berdasarkan clock_in
            return view('attendance', compact('users', 'attendances'));
        } elseif ($request->isMethod('post')) {
            // Handle POST request, simpan data absensi
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id', // Validasi agar hanya pegawai yang valid
            ]);

            // Menyimpan data absensi
            $attendance = new Attendance();
            $attendance->user_id = $validated['user_id'];
            $attendance->clock_in = now();  // Waktu clock_in otomatis terisi

            // Tidak perlu menyetel created_at dan updated_at secara manual
            $attendance->save();

            return redirect()->route('absen')->with('success', 'Absensi berhasil!');
        }
    }
}
