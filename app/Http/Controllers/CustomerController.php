<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
// {

//     public function customersData(){
//     	$customers = Customer::all();
//     	return view('Admin.all_customers',compact('customers'));
//     }

//     public function update($id,Request $request)
//     {
       
//         $customers =  Customer::find($id);
//         $customers->name = $request->name;
//         // $customers->email = $request->email;
//         // $customers->password = $request->password;
//         // $customers->gender = $request->gender;
//         // if($request->is_active){
//         //     $employee->is_active = 1;

//         // }
      
//         // $employee->date_of_birth = $request->date_of_birth;
//         // $employee->roll = $request->roll;

//         if($employee->save())
//         {
           
//             return redirect()->back()->with(['msg' => 1]);
//         }
//         else
//         {
//             return redirect()->back()->with(['msg' => 2]);
//         }
     
//         return view('update.customer',compact('customers'));

//     }

//     public function edit($id){
//         $customers = Customer::find($id);
//         return view('edit.customer', compact('customers'));
//     }
    
// }

{
    public function index()
    {
        // Cleaner, standard syntax to get all customers
        $customers = Customer::all();
        return view('dashbord.dashbord', compact('customers'));
    }

    public function edit($id)
    {
        // Changed to singular $customer to match your edit form view variables perfectly
        $customer = Customer::findOrFail($id);     
        return view('admin.edit_customer', compact('customer'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->company = $request->company;
        $customer->address = $request->address;
        $customer->phone = $request->phone;

        $customer->save();
        return redirect()->route('all.customers'); // Use lowercase helper function
    }

    public function update($id, Request $request)
{
    $customer = Customer::findOrFail($id);

    $customer->name = $request->name;
    $customer->email = $request->email;
    $customer->company = $request->company;
    $customer->address = $request->address;
    $customer->phone = $request->phone;

    if ($request->filled('password')) {
        $customer->password = bcrypt($request->password);
    }

    if ($customer->save()) {
        return redirect()->route('all.customers');
    } else {
        return redirect()->route('all.customers');
    }
}

    public function customersData()
    {
        $customers = Customer::all();
        return view('admin.all_customers', compact('customers')); // Keeps directory casing lowercase
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        if($customer->delete()) {
            return redirect()->back()->with('msg', 1);
        } else {
            return redirect()->back()->with('msg', 2);
        }
    }
}