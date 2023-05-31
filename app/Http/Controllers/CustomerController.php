<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;

class CustomerController extends Controller
{
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

    public function showAddCustomerPage()
    {
        return inertia('Customer/Create');
    }

    public function showEditCustomerPage($id)
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

    public function createCustomer(Request $request)
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

    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();

            return redirect()->intended('/customers')->with('success', 'Customer deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
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

            return redirect()->intended('/customers')->with('success', 'Customer updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
