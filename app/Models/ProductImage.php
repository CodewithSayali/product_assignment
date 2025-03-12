<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';
    protected $fillable = [
        'id',
        'product_xid',
        'product_image',
        'status'
    ];
}
