<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'production_country', 'image', 'category_id','company_id'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
}
