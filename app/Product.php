<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'part_number', 'het',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
