<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'condition',
        'price',
        'description',
        'category_id',
        'user_id',
        'listing_image',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function baskets()
    {
        return $this->belongsToMany(Basket::class);
    }
}

