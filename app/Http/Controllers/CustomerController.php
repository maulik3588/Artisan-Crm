<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Session;
use Response;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Customer::query();
        $query->where('created_by', $request->user()->id);
        $search = $request->search;
        $query = $query->when(!empty($search), function($q) use ($search) {
            $q->where(function($inner) use ($search){
                $inner->orWhere('name', 'like', "%".$search."%");
                $inner->orWhere('email', 'like', "%".$search."%");
                $inner->orWhere('contact', 'like', "%".$search."%");
                $inner->orWhere('address', 'like', "%".$search."%");
            });
        });
        $customers = $query->orderBy('created_at','desc')->paginate(config('constants.PAGINATION_LIMIT'));

        return view('pages.customers.index')->with('customers', $customers);
    }

    public function add(Request $request)
    {
        return view('pages.customers.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'nullable|email|max:255',
            'contact' => 'nullable|max:20',
            'address' => 'nullable|max:2000',
            'status' => 'nullable|in:lead,active,inactive',
        ]);

        $payload = $request->only(['name','email','contact','address','status']);
        $payload['created_by'] = $request->user()->id;
        $customer = Customer::create($payload);
        if($customer) {
            Session::flash('alert_msg', 'Customer created successfully!');
            Session::flash('alert_class', 'success');
        } else {
            Session::flash('alert_msg', 'Something went wrong!');
            Session::flash('alert_class', 'danger');
        }
        return redirect()->route('admin.customers.index');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('pages.customers.add')->with('customer',$customer);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'nullable|email|max:255',
            'contact' => 'nullable|max:20',
            'address' => 'nullable|max:2000',
            'status' => 'nullable|in:lead,active,inactive',
        ]);

        $updateException = ['_token'];
        $updated = Customer::where('id', $id)->update($request->except($updateException));

        if($updated) {
            Session::flash('alert_msg', 'Customer updated successfully!');
            Session::flash('alert_class', 'success');
        } else {
            Session::flash('alert_msg', 'Something went wrong!');
            Session::flash('alert_class', 'danger');
        }

        return redirect()->route('admin.customers.index');
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        if($customer) {
            $customer->delete();
            $response = ['success' => true, 'msg' => 'Customer deleted successfully'];
        } else {
            $response = ['success' => false, 'msg' => 'No customer found!'];
        }
        return Response::json($response);
    }
}


