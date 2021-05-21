<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VendorModel;
use App\Models\ProductModel;

class PurchaseModel extends Model
{
    protected $fillable=['vendorid','proid','pqty','pprice','ptotal'];
    
    public function vendor()
    {
        return $this->belongsTo(VendorModel::class,'vendorid');
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class,'proid');
    }
}
