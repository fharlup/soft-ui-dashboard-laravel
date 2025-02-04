@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Tambah Laporan Penjualan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('sales.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" required>
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="total_sales" class="form-label">Total Penjualan</label>
                    <input type="number" name="total_sales" step="0.01" class="form-control @error('total_sales') is-invalid @enderror" required>
                    @error('total_sales')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('sales.report') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
