<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;

class BrandModel extends Model
{
    protected $fillable=['catid','bname'];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class,'catid');
    }

    public function product()
    {
        return $this->hasMany(ProductModel::class,'brandid');
    }
    
}
