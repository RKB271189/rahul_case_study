<?php

namespace App\ORM_Model\Fld_Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'name',
        'quantity',
        'price',
    ];
}
