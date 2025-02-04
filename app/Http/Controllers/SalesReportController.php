<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesReport;

class SalesReportController extends Controller
{
    public function index()
    {
        $salesReports = SalesReport::orderBy('date', 'desc')->get();
        return view('sales.index', compact('salesReports'));
    }

    public function create()
    {
        return view('sales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date|unique:sales_reports,date',
            'total_sales' => 'required|numeric|min:0',
        ]);

        SalesReport::create($request->all());

        return redirect()->route('sales.report')->with('success', 'Laporan berhasil ditambahkan!');
    }
}
