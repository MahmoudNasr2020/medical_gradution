<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','order_list','total_price','order_id','status'];

    protected $casts = [
        'order_list' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
