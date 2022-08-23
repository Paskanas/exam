<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    public function getDishMenus()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
