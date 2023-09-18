<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Package_type;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.packages', [
            "package_type" => Package_type::with('Packages')->get(),
            "title" => "Packages | Dashboard",
            "active" => "dashboard"
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
    public function store(StorePackageRequest $request)
    {
        $valData = $request->validate([
            'picture' => 'image|file|mimes:png,jpg,svg,gif,jpeg,webp',
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required|numeric',
            'package_type_id' => 'exists:package_types,id'
        ]);

        $valData['unit'] = 'Pax';

        if ($request->file('picture')) {
            $valData['picture'] = Storage::disk('public')->putFile('picture', $request->file('picture'));
        }

        Package::create($valData);

        return redirect()->back()->with(['success' => 'Package created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        $data = $request->validate(
            [
                'picture' => 'image|file|max:2048|mimes:png,jpg,svg,jpeg,webp',
                'name' => 'required',
                'desc' => 'required',
                'price'  => 'required|numeric',
                'package_type_id' => 'exists:package_types,id'
            ]
        );

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        Package::where('id', $package->id)->update($data);
        return redirect()->back()->with('success', 'Package has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        Package::destroy($package->id);
        return redirect()->back()->with('success', $package->name . ' Has Been deleted sucessfully');
    }
}
