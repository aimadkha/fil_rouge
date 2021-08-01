<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'product_name',
        'product_img',
        'product_author',
        'product_type',
        'product_price',
        'product_category',
        'product_pub_date',
        'created_at',
        'updated_at',
    ];

    public function getProductImgAttribute($val){
        return ($val !== null) ? asset('assets/' . $val) : "";
    }

    public function scopeSelection($query){
        return $query->select('id','product_name','product_author','product_img','product_type','product_price','product_category','product_pub_date');
    }
}
