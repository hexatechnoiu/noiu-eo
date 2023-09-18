<?php

namespace App\Http\Controllers;

use App\Models\Package_category;
use App\Models\Package_type;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.categories', [
            "title" => "Categories",
            "active" => "dashboard",
            "categories" => Package_category::with('Package_types')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Package_type $package_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package_type $package_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package_type $package_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package_type $package_type)
    {
        //
    }
}
