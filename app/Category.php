<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'varian', 'volume', 'name'
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
