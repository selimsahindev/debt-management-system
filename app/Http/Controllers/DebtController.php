<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use Illuminate\Http\Request;
// use carbon
use Carbon\Carbon;

class DebtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Get all debts from the database. format each one to include customer name
            $debts = Debt::with('customer')->latest()->get()->map(function ($debt) {
                return [
                    'id' => $debt->id,
                    'customerId' => $debt->customer_id,
                    'customerName' => $debt->customer->first_name . ' ' . $debt->customer->last_name,
                    'description' => $debt->description,
                    'amount' => $debt->amount,
                    'dueDate' => Carbon::parse($debt->due_date)->locale('tr')->isoFormat('D MMM YYYY'),
                    'isPaid' => $debt->is_paid,
                ];
            });

            return inertia('Debt/Index', [
                'debts' => $debts
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Debt/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Debt $debt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Debt $debt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Debt $debt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Debt $debt)
    {
        //
    }
}
