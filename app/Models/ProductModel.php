<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\CartModel;
use App\Models\PurchaseModel;
use App\Models\OrderModel;

class ProductModel extends Model
{
    protected $fillable=['pname','catid','brandid','pdesc','pprice','pqty','pimg1','pimg2'];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class,'catid');
    }

    public function brand()
    {
        return $this->belongsTo(BrandModel::class,'brandid');
    }

    public function purchase()
    {
        return $this->hasMany(PurchaseModel::class,'prorid');
    }

    public function cart()
    {
        return $this->hasMany(CartModel::class,'proid');
    }

    public function order()
    {
        return $this->hasMany(OrderModel::class,'proid');
    }
}
