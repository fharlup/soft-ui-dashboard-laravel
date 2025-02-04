@extends('layouts.user_type.auth')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-3">Tambah Data Penjualan</h4>
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('sales.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="date" class="form-label">Tanggal</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Jumlah Terjual</label>
                            <input type="number" name="amount" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga Satuan</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('sales.report') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
