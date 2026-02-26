<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of all employees.
     */
    public function index()
    {
        // Fetch all employees from the database
        $employees = Employee::all();
        
        // Return as JSON for the Flutter app
        return response()->json($employees);
    }

    /**
     * Store a newly created employee in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'join_date' => 'required|date',
            'is_active' => 'required|boolean',
        ]);

        $employee = Employee::create($validated);

        return response()->json($employee, 201);
    }
}
