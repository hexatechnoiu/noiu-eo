<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'picture',
        'name',
        'desc',
        'price',
        'package_type_id'
    ];
    protected $guarded = [
    ];


    public function Package_type()
    {
        return $this->belongsTo(Package_type::class, 'package_type_id');
    }
}
