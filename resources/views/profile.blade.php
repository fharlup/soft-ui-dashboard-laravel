
@extends('layouts.user_type.auth')

@section('content')
 <h1>Tambah Laporan Penjualan</h1>

    <form action="{{ route('sales-report.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">Tanggal</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="amount">Jumlah Penjualan</label>
            <input type="number" name="amount" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
@endsection

