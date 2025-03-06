<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    //public $fillable  = ["title", "slug"];
    public $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
