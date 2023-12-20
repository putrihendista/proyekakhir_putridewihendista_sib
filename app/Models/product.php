<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

   
    protected $fillable = [
        'product_name',
        'category_id',
        'product_code',
        'price',
        'unit',
        'stock',
        'description',
        'image',
    ] ;
    protected $primaryKey = 'id';
    public $timestamps = true;
    public function category(){
        return $this->belongsTo(category::class,'category_id','id');
    }
    public function purchase_detail(){
        return $this->hasMany(Purchase_detail::class);
    }
    public function sales_detail(){
        return $this->hasMany(sales_detail::class);
    }
}
