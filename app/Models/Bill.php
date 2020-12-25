<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
   protected $table  = 'billS';
   protected $fillable = ['customer_id', 'date_order', 'total', 'note'];
   public function billDetail(){
         return $this->hasMany(Product::class, 'customer_id');
   }
}
