@extends('layouts.user_type.auth')

@section('content')
    <h2>Create Sales Report</h2>

    <form action="{{ route('sales-report.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="total_sales">Total Sales</label>
            <input type="number" name="total_sales" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
