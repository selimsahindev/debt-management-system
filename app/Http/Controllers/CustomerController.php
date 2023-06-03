<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Get all customers related to logged in user, ordered by latest
            $customers = Customer::where('user_id', auth()->user()->id)->latest()->get();

            // Render Customers vue page with inertia with customers data
            return inertia('Customer/Index', [
                'customers' => $customers->map->getFormattedCustomer()
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
        return inertia('Customer/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'firstName' => 'required|max:80',
                'lastName' => 'required|max:80',
                'email' => 'required|email|max:100',
                'phone' => 'required|max:20',
                'address' => 'required|max:255',
            ]);

            /** @var User $user */
            $user = auth()->user();

            $user->customers()->create([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            return redirect()->intended('/customers')->with('success', 'Customer created successfully')->refresh();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $customer = Customer::findOrFail($id);

            return inertia('Customer/Edit', [
                'customer' => $customer->getFormattedCustomer()
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $customer = Customer::findOrFail($id);

            $fields = $request->validate([
                'firstName' => 'required|max:80',
                'lastName' => 'required|max:80',
                'email' => 'required|email|max:100',
                'phone' => 'required|max:20',
                'address' => 'required|max:255',
            ]);

            $customer->first_name = $fields['firstName'];
            $customer->last_name = $fields['lastName'];
            $customer->email = $fields['email'];
            $customer->phone = $fields['phone'];
            $customer->address = $fields['address'];

            $customer->save();

            return redirect()->intended('/customers')->with('success', 'Müşteri başarıyla güncellendi.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Customer::findOrFail($id)->delete();

            return redirect()->intended('/customers')->with('success', 'Müşteri başarıyla silindi.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
