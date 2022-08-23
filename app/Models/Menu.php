<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function getMenuRestorants()
    {
        return $this->belongsTo(Restorant::class, 'restorant_id', 'id');
    }
}
