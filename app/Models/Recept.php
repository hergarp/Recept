<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recept extends Model
{
    use HasFactory;
    protected $primaryKey = 'r_id';

    public function users() {
        $this->belongsToMany(User::class, 'receptkonyvs', 'user', 'recept');
    }
}
