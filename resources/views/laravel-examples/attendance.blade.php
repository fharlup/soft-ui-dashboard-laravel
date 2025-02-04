<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Pegawai</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Absensi Pegawai</h2>
        <div class="card shadow p-4">
            <!-- Form untuk Absensi -->
            <form id="attendanceForm" method="POST" action="{{ route('absen') }}">
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">Pilih Pegawai</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        <option value="">-- Pilih Pegawai --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Absen Sekarang</button>
            </form>
        </div>

        <!-- Menampilkan Riwayat Absensi -->
        <h3 class="mt-5">Riwayat Absensi</h3>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Waktu Absen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $index => $attendance)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $attendance->user->name }}</td>
                        <td>{{ $attendance->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
