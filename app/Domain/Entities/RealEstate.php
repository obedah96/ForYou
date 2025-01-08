<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    protected $fillable = [
        'product_id', 'product_name', 'product_city', 'product_count',
        'description', 'price','image_path'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
