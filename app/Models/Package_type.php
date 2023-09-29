<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package_type extends Model
{
  use HasFactory;
  protected $with = ['Packages', 'Package_category'];
  protected $guarded = ['id'];

  public function Packages()
  {
    return $this->hasMany(Package::class);
  }
  public function Package_category()
  {
    return $this->belongsTo(Package_category::class);
  }
  // public function search($request)
  // {
  //     return $this->where('name', 'like', '%' . $request->search . '%')->get();
  // }
}
