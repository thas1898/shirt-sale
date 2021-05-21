<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CartModel;
use App\Models\OrderModel;

class RegisterModel extends Model
{
    protected $fillable=['rname','rphone','remail','raddress','rcity','rstate','rpin','rpassword','type'];
    public function cart()
    {
        return $this->hasMany(CartModel::class,'cid');
    }

    public function order()
    {
        return $this->hasMany(OrderModel::class,'cid');
    }
}
