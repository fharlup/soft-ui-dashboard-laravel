<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;

class UserController extends Controller
{
    public function absen(Request $request)
    {
        $user = auth()->user(); // Mengambil pengguna yang login

        // Cek apakah user sudah absen hari ini
        $attendance = Attendance::where('user_id', $user->id)
            ->whereDate('clock_in', Carbon::today())
            ->first();

        if (!$attendance) {
            // Jika belum absen, lakukan clock-in
            Attendance::create([
                'user_id' => $user->id,
                'clock_in' => Carbon::now(),
            ]);

            return response()->json(['message' => 'Berhasil absen masuk'], 201);
        } else {
            // Jika sudah clock-in, lakukan clock-out
            $attendance->update([
                'clock_out' => Carbon::now(),
            ]);

            return response()->json(['message' => 'Berhasil absen keluar'], 200);
        }
    }
}
