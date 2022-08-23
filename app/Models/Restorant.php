<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restorant extends Model
{
    use HasFactory;

    public function menus()
    {
        return $this->hasMany(Menu::class, 'restorant_id', 'id');
    }
}
