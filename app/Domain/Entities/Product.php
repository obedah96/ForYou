<?php
//app\Domain\Entities\Product.php
namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = ['user_id','owner_name','product_type'];

    public $timestamps = true;

    public function cars()
    {
        return $this->hasOne(Car::class);
    }

    public function electricalAppliances()
    {
        return $this->hasOne(ElectricalAppliance::class);
    }

    public function homeAppliances()
    {
        return $this->hasOne(HomeAppliance::class);
    }

    public function realEstate()
    {
        return $this->hasOne(RealEstate::class);
    }
}
