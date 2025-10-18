<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Category;

use Response;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Category::query();
        // Search
        $search = $request->search;
        $query = $query->where(function($query) use ($search){
            $query->orWhere('name', 'like', "%".$search."%");
        });
        $categories = $query->orderBy('created_at','desc')->paginate(config('constants.PAGINATION_LIMIT'));

        return view('pages.category.index')->with('categories', $categories);
    }

    public function add(Request $request)
    {
        return view('pages.category.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
        ]);

        $user = Category::create(request()->all());
        if($user) {
            Session::flash('alert_msg', 'Category created successfully!');
            Session::flash('alert_class', 'success');
        } else {
            Session::flash('alert_msg', 'Something went wrong!');
            Session::flash('alert_class', 'danger');
        }
        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('pages.category.add')->with('category',$category);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
        ]);
        $data = ['name' => $request->name];
        $data['is_active'] = !empty($request->status) ? $request->status : 0;

        $user = Category::where('id', $id)->update($data);

        if($user) {
            Session::flash('alert_msg', 'Category updated successfully!');
            Session::flash('alert_class', 'success');
        } else {
            Session::flash('alert_msg', 'Something went wrong!');
            Session::flash('alert_class', 'danger');
        }

        return redirect()->route('admin.category.edit', [$id]);
    }

    public function delete($id)
    {
        $user = Category::find($id);
        if($user) {
            $user->delete();
            $response = ['success' => true, 'msg' => 'Category deleted successfully'];
        } else {
            $response = ['success' => false, 'msg' => 'No category found!'];
        }
        return Response::json($response);
    }

}
