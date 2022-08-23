<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    const STATUSES = [
        1 => 'New',
        2 => 'Accepted',
        3 => 'Canceled',
        4 => 'Closed'
    ];

    public function orderDishes()
    {
        return $this->belongsTo(Dish::class, 'dish_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
