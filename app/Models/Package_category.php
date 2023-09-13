<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];


    public function Package_types()
    {
        return $this->hasMany(Package_type::class);
    }
    public function Packages()
    {
        return $this->hasManyThrough(Package::class, Package_type::class);
    }
}