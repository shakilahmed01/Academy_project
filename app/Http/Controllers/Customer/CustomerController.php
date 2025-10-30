<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function create(Request $data)
    {
        $customers = new Customer();

        $customers->name = $data->name;
        $customers->email = $data->email;
        $customers->phone = $data->phone;
        $customers->address = $data->address;

        $customers->save();


        return back();
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
        $update = Customer::find($request->id);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->address = $request->address;

        $update->save();

        return back();
    }

    public function delete($id)
    {
        $delete = Customer::find($id);
        $delete->delete();
        return redirect()->route('customer.list');
    }
}
