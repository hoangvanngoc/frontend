<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;


class Product extends Model
{
    // use Searchable;
    use SoftDeletes;
    protected $table = 'products1s';

    public function ProductImage()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

}
