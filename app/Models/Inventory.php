<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory;

    use SoftDeletes;

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
