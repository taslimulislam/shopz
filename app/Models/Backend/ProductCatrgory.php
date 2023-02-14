<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCatrgory extends Model
{
    use HasFactory;

    protected $table = 'product_category';
    protected $fillable = [
        'category_name',
        'status'
    ];
}
