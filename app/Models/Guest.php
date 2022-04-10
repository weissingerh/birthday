<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'plus_one',
        'plus_one_name',
        'coming',
        'alcohol'
    ];
}
