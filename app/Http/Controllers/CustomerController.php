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

            return redirect()->intended('/customers')->with('success', 'Customer created successfully');
        } catch (\Exception $e) {
            dd('Error: ' . $e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->intended('/customers')->with('success', 'Customer deleted successfully');
    }
}
