<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OurTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'image',
        'whatsapp',
        'instagram',
        'github',
        'linkedin'
    ];
}
