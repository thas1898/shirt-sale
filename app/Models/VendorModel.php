<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PurchaseModel;

class VendorModel extends Model
{
    protected $fillable=['vname','vcname','vaddress','vstate','vphone','vemail'];

    public function purchase()
    {
        return $this->hasMany(PurchaseModel::class,'vendorid');
    }
}
