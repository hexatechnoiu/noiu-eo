<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'payment_method',
        'package_id',
        'user_id',
        'date'
    ];
    public function Package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
