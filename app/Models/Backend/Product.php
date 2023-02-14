<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'category_id',
        'price',
        'unit_id',
        'product_model',
        'product_detail',
        'status'
    ];

    public function productUnit(){
        return $this->belongsTo(ProductUnit::class,'unit_id');
    }
    public function productCatrgory(){
        return $this->belongsTo(ProductCatrgory::class,'category_id');
    }
}
