<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Package_type;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Http\Requests\SearchPackageRequest;

class PackageController extends Controller
{

  public function index()
  {
    if(strtolower(auth()->user()->role) != 'admin'){
      return abort(401);
    }

    if (request('search')) {
      $packages = Package::where('name', 'LIKE', '%' . request('search') . '%')->orderBy('package_type_id')->paginate(5);
      return view('dashboard.packages', [
        "title" => "Packages | Dashboard",
        "active" => "dashboard",
        "package_type" => Package_type::get(),
        "packages" => $packages
      ]);
    } else {
      $packages = Package::orderBy('package_type_id')->paginate(5);
      return view('dashboard.packages', [
        "title" => "Packages | Dashboard",
        "active" => "dashboard",
        "package_type" => Package_type::get(),
        "packages" => $packages
      ]);
    }
  }

  public function store(StorePackageRequest $request)
  {
    $request['price'] = str_replace('.', '', $request->price);
    $valData = $request->validate([
      'picture' => 'image|file|mimes:png,jpg,svg,gif,jpeg,webp|max:4096',
      'name' => 'required',
      'desc' => 'required',
      'price' => 'required|numeric',
      'package_type_id' => 'exists:package_types,id'
    ]);

    if ($request->file('picture')) {
      $valData['picture'] = $request->file('picture')->store('picture', 'public');
    }
    Package::create($valData);
    return redirect()->back()->with(['success' => 'Package created successfully']);
  }
  public function update(UpdatePackageRequest $request, Package $package)
  {
    $request['price'] = str_replace(['.', ','], '', $request->price);
    $data = $request->validate(
      [
        'picture' => 'image|file|max:2048|mimes:png,jpg,svg,jpeg,webp',
        'name' => 'required',
        'desc' => 'required',
        'price'  => 'required|numeric',
        'package_type_id' => 'exists:package_types,id'
      ]
    );

    if ($request->file('picture')) {
      if ($request->oldPicture) {
        Storage::delete($request->oldPicture);
      }
      $data['picture'] = $request->file('picture')->store('picture', 'public');
    }

    Package::where('id', $package->id)->update($data);
    return redirect()->back()->with('success', 'Package has been updated');
  }
  public function destroy(Package $package)
  {
    Package::destroy($package->id);
    return redirect()->back()->with('success', 'Package Has Been deleted sucessfully');
  }

  public function search(SearchPackageRequest $request)
  {
    if ($request->has('search')) {
      $package = Package_type::where('name', 'LIKE', '%' . $request->search . '%')->get();
    } else {
      $package = Package_type::all();
    }
    return view('dashboard/packages', ['packages' => $package]);
  }
}
