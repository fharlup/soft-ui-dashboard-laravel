@extends('layouts.user_type.auth')

@section('content')
    <h2>Sales Reports</h2>
    <a href="{{ route('sales-report.create') }}" class="btn btn-primary">Add New Report</a>

    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Sales</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesReports as $report)
                <tr>
                    <td>{{ $report->date }}</td>
                    <td>{{ $report->total_sales }}</td>
                    <td>{{ $report->name }}</td>
                    <td>
                        <a href="{{ route('sales-report.edit', $report->id) }}">Edit</a>
                        <form action="{{ route('sales-report.destroy', $report->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
