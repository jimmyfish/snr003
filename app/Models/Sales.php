<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';

    protected $fillable = [
        'product_id',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
