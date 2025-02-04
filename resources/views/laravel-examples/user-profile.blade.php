@extends('layouts.user_type.auth')

@section('content')
<h2>Buat laporan harian</h2>

<form action="{{ route('sales-reports.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="date">tanggal</label>
        <input type="date" name="date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="total_sales">total penjualan</label>
        <input type="number" name="total_sales" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="name">nama</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">simpan</button>
</form>
@endsection
