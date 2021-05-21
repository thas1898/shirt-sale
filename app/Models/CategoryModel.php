<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BrandModel;
use App\Models\ProductModel;

class CategoryModel extends Model
{
    protected $fillable=['cname'];

    public function brands()
    {
        return $this->hasMany(BrandModel::class,'catid');
    }
    
    public function product()
    {
        return $this->hasMany(ProductModel::class,'catid');
    }

}
