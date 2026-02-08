<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

// customer page
    public function customerPage(){
        return view('pages.dashboard.customer');
    }


    // customer crud

    // create customer
    public function customer(Request $request){
        $user_id = (int) $request->header('user_id');

        return Customer::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'user_id' => $user_id,
        ]);
    }

    // List Customer
    public function CustomerList(Request $request)
    {
        $user_id = (int) $request->header('user_id');

        if (!$user_id) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'User not authenticated'
            ], 401);
        }

        $customers = Customer::where('user_id', $user_id)->get();

        return response()->json([
            'status' => 'Success',
            'user_id' => $user_id,
            'customers' => $customers
        ], 200);
    }


    // customer by id
     public function customerId(Request $request)
    {
        $user_id = (int) $request->header('user_id');
        $customer_id = $request->input('id');

        return Customer::where('id', $customer_id)->where('user_id', $user_id)->first();
    }


  
    // Update Customer
    public function updateCustomer(Request $request)
    {
        $user_id = (int) $request->header('user_id');
        $cat_id = $request->input('id');

        if (!$user_id) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'User not authenticated'
            ], 401);
        }

        $request->validate([
            'name' => 'required|string|max:50'
        ]);

        $customer = Customer::where('id', $cat_id)
            ->where('user_id', $user_id)
            ->first();

        if (!$customer) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Category not found'
            ], 404);
        }

       // updates
        $customer->name   = $request->name;
        $customer->email  = $request->email;
        $customer->mobile = $request->mobile;
        $customer->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Category updated successfully',
            'customer' => $customer
        ], 200);
    }

    // Delete customer
    public function deleteCustomer(Request $request)
    {
        $user_id = (int) $request->header('user_id');
        $cus_id = $request->input('id');

        if (!$user_id) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'User not authenticated'
            ], 401);
        }

        $customer = Customer::where('id', $cus_id)
            ->where('user_id', $user_id)
            ->first();

        if (!$customer) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Category not found'
            ], 404);
        }

        $customer->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Category deleted successfully'
        ], 200);
    }   

}
