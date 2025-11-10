<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function create(Request $data)
    {
        $data->validate([
            "name" => 'required|string',
            "email" => 'required|email|unique:customers,email',
            "phone" => 'required|string|max:20',
            "address" => 'required|string|max:255',
          ]
        );
        
        $customers = new Customer();

        $customers->name = $data->name;
        $customers->email = $data->email;
        $customers->phone = $data->phone;
        $customers->address = $data->address;

        $customers->save();


        return back()->with('success', 'Customer added successful!');
    }

    public function index()
    {
        $pageTitle = "Add Customer";
        return view('customer.index',compact('pageTitle'));
    }

    public function list()
    {
        $pageTitle = "list Customer";
        $customers = Customer::latest()->paginate(3);
        return view('customer.list',compact('pageTitle','customers'));
    }

    public function edit($id)
    {
        $pageTitle = "Customer Edit";
        $edit = Customer::find($id);
        return view('customer.edit',compact('pageTitle','edit'));
    }

    public function update(Request $request)
    {
         $request->validate([
                'id' => 'required|integer|exists:customers,id'                       
         ]);
        $update = Customer::find($request->id);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->address = $request->address;

        $update->save();

        return back()->with('success','Customer updated successful!');
    }

    public function delete($id)
    {
        $delete = Customer::find($id);
        $delete->delete();
        return redirect()->route('customer.list')->with('success','Customer deleted successful!');
    }
}
