<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alapanyag_mertekegyseg extends Model
{
    use HasFactory;

    protected $fillable = [
        'mertekegyseg',
        'alapanyag'
    ];
}
