<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class BillDetail extends Model
{
   protected $table = 'bill_detail';
   protected $fillable =['bill_id','product_id', 'quantity', 'price'];

   public function product(){
       return $this->belongsTo(Product::class, 'product_id');
   }

}
