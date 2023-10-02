<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package_type extends Model
{
  use HasFactory;
  protected $guarded = ['id'];

  public function Packages()
  {
    return $this->hasMany(Package::class);
  }
  public function Package_category()
  {
    return $this->belongsTo(Package_category::class);
  }
}
