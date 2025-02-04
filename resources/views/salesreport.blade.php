@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Laporan Penjualan Harian</h5>
            <a href="{{ route('createsalesreport') }}" class="btn btn-primary">Tambah Laporan</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Total Penjualan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salesReports as $report)
                        <tr>
                            <td>{{ $report->date }}</td>
                            <td>Rp {{ number_format($report->total_sales, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
