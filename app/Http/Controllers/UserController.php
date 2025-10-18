<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = User::query();
        // Search
        $search = $request->search;
        $query = $query->where(function($query) use ($search){
            $query->orWhere('name', 'like', "%".$search."%");
            $query->orWhere('email', 'like', "%".$search."%");
        });
        $users = $query->orderBy('created_at','desc')->paginate(config('constants.PAGINATION_LIMIT'));

        return view('pages.users.index')->with('users', $users);
    }

    public function add(Request $request)
    {
        return view('pages.users.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'mobile' => 'required|unique:users|max:10'
        ]);
        $request->merge([
            'password' => Hash::make('123456'),
        ]);
        if(empty($request->get('is_admin'))) {
            $request->merge([
                'is_admin' => false,
            ]);
        }
        $user = User::create(request()->all());
        if($user) {
            Session::flash('alert_msg', 'User created successfully!');
            Session::flash('alert_class', 'success');
        } else {
            Session::flash('alert_msg', 'Something went wrong!');
            Session::flash('alert_class', 'danger');
        }
        return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.users.add')->with('user',$user);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'mobile' => 'required|max:10|unique:users,mobile,'.$id,
        ]);

        // if(!empty($request->get('password'))) {
        //     $request->merge([
        //         'password' => Hash::make($request->get('password'))
        //     ]);
        // }
        $updateException = ['_token'];

        $user = User::where('id', $id)->update(request()->except($updateException));

        if($user) {
            Session::flash('alert_msg', 'User updated successfully!');
            Session::flash('alert_class', 'success');
        } else {
            Session::flash('alert_msg', 'Something went wrong!');
            Session::flash('alert_class', 'danger');
        }

        return redirect()->route('admin.user.edit', [$id]);
    }

    public function delete($id)
    {
        $user = User::find($id);
        if($user) {
            $user->delete();
            $response = ['success' => true, 'msg' => 'User deleted successfully'];
        } else {
            $response = ['success' => false, 'msg' => 'No user found!'];
        }
        return Response::json($response);
    }
}
