<?php

namespace App\Http\Controllers;

use App\Models\Package_category;
use App\Models\Package_type;
use Illuminate\Http\Request;

class Package_typeController extends Controller
{

    public function index()
    {
        if(strtolower(auth()->user()->role) != 'admin'){
            return abort(401);
          }

        return view('dashboard.categories', [
            "title" => "Categories",
            "active" => "dashboard",
            "categories" => Package_category::with('Package_types')->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "package_category_id" => "required",
        ]);
        $data['status'] = "active";
        Package_type::create($data);
        return redirect()->back()->with(['success' => 'Category created successfully']);

    }
    public function update(string $id, Request $request, Package_type $package_type)
    {
        $data = $request->validate([
            "name" => "required",
            "package_category_id" => "required",
        ]);
        Package_type::where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Category has been updated');
    }
    public function destroy(string $id, Package_type $package_type)
    {
        $category = Package_type::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category Has Been deleted sucessfully');
    }
}
