<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductModel;
use App\Models\RegisterModel;


class CartModel extends Model
{
    protected $fillable=['cid','proid','cqty'];

    public function register()
    {
        return $this->belongsTo(RegisterModel::class,'cid');
    }
    
    public function product()
    {
        return $this->belongsTo(ProductModel::class,'proid');
    }
}
