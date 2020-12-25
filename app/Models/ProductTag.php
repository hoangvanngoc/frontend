<?php

namespace App\Models;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{

   protected $table = 'product_tags';

    public function Product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }
    public function Tag(){
        return $this->belongsTo('App\Models\Tag','tag_id','id');
    }
}
