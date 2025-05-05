<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventories';

    protected $fillable = [
        'user_id',
        'name',
        'qty',
        'price',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
