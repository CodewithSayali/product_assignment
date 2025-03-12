<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'price'
    ];
    public function images() {
        return $this->hasMany(ProductImage::class,'product_xid','id');
    }
}
