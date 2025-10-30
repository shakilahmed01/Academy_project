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
        $pageTitle2 = "Add Customer2";
        $customers = Customer::all();

        return view('customer.index',compact('pageTitle','pageTitle2','customers'));
    }
}
