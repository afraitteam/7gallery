<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public $guarded = [];
    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
