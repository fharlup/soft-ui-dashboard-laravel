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
            $attendances = Attendance::with('user')->latest()->get();  // Ambil riwayat absensi
            return view('attendance', compact('users', 'attendances'));
        } elseif ($request->isMethod('post')) {
            // Handle POST request, simpan data absensi
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id', // Validasi agar hanya pegawai yang valid
            ]);

            // Menyimpan data absensi
            $attendance = new Attendance();
            $attendance->user_id = $validated['user_id'];
            $attendance->clock_in = now(); 
            
            $attendance->created_at = now();  // Menyimpan waktu absen saat ini
            $attendance->save();

            return redirect()->route('absen')->with('success', 'Absensi berhasil!');
        }
    }
}
