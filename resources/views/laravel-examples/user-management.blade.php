@extends('layouts.user_type.auth')

@section('content')

<h2>Laporan Harian</h2>
<a href="{{ route('sales-reports.create') }}" class="btn btn-primary">Tambah laporan</a>

<table class="table">
    <thead>
        <tr>
            <th>tangga</th>
            <th>Total penjualan</th>
            <th>nama</th>
        </tr>
    </thead>
    <tbody>
        @foreach($salesReports as $report)
            <tr>
                <td>{{ $report->date }}</td>
                <td>{{ $report->total_sales }}</td>
                <td>{{ $report->name }}</td>
                <td>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
