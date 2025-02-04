@extends('layouts.user_type.auth')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-3">Laporan Penjualan - {{ $today }}</h4>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jumlah Terjual</th>
                                <th>Harga Satuan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $sale)
                            <tr>
                                <td>{{ $sale->date }}</td>
                                <td>{{ $sale->amount }}</td>
                                <td>Rp {{ number_format($sale->price, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($sale->amount * $sale->price, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h5 class="mt-3">Total Penjualan Hari Ini: Rp {{ number_format($totalSales, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection