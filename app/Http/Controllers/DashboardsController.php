<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Customer;

class DashboardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customerCount = Customer::where('created_by', auth()->id())->count();
        return view('pages.dashboard.index', compact('customerCount'));
    }

}
