<?php
//app\Domain\Entities\Product.php
namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = ['user_id','owner_name','product_type'];

    public $timestamps = true;

    
}
