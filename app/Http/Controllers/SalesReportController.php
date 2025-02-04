<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesReport;
use Carbon\Carbon;

class SalesReportController extends Controller
{
    // Tampilkan laporan penjualan harian
    public function index()
    {
        $today = Carbon::today()->toDateString();
        $sales = SalesReport::whereDate('date', $today)->get();

        $totalSales = $sales->sum(function ($sale) {
            return $sale->amount * $sale->price;
        });

        return view('report', compact('sales', 'totalSales', 'today')); 
    }

    // Menampilkan formulir tambah data penjualan
    public function create()
    {
        return view('create');
    }

    // Simpan data penjualan baru
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        SalesReport::create($request->all());

        return redirect()->route('sales.report')->with('success', 'Data penjualan berhasil ditambahkan.');
    }
}
