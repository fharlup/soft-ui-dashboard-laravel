<?php

namespace App\Http\Controllers;

use App\Models\SalesReport;
use Illuminate\Http\Request;

class SalesReportController extends Controller
{
    // Show all sales reports
    public function index()
    {
        // Retrieve all sales reports from the database
        $salesReports = SalesReport::all();
        
        // Return the view with the sales reports, using the correct view path
        return view('laravel-examples.user-management', compact('salesReports'));
    }

    // Show the form to create a new sales report
    public function create()
    {
        // Return the view for creating a sales report
        return view('laravel-examples.user-profile');
    }

    // Store the newly created sales report in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'total_sales' => 'required|numeric',
            'name' => 'required|string|max:255',
        ]);

        $salesReport = new SalesReport();
        $salesReport->date = $validated['date'];
        $salesReport->total_sales = $validated['total_sales'];
        $salesReport->name = $validated['name'];
        $salesReport->save();

        return redirect()->route('sales-reports.index')->with('success', 'Sales report created successfully!');
    }

    // Show the form to edit an existing sales report
    public function edit($id)
    {
        // Retrieve the sales report by ID
        $salesReport = SalesReport::findOrFail($id);
        
        // Return the edit view with the sales report data
        return view('laravel-example.user-profile', compact('salesReport'));
    }

    // Update the specified sales report
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'date' => 'required|date',
            'total_sales' => 'required|numeric',
            'name' => 'required|string|max:255',
        ]);

        // Retrieve the sales report by ID
        $salesReport = SalesReport::findOrFail($id);
        
        // Update the sales report with the validated data
        $salesReport->date = $validated['date'];
        $salesReport->total_sales = $validated['total_sales'];
        $salesReport->name = $validated['name'];
        
        // Save the updated sales report to the database
        $salesReport->save();

        // Redirect to the sales report index page with a success message
        return redirect()->route('sales-report.index')->with('success', 'Sales report updated successfully!');
    }

    // Delete a specified sales report
    public function destroy($id)
    {
        // Retrieve the sales report by ID
        $salesReport = SalesReport::findOrFail($id);
        
        // Delete the sales report
        $salesReport->delete();

        // Redirect to the sales report index page with a success message
        return redirect()->route('sales-report.index')->with('success', 'Sales report deleted successfully!');
    }
}
