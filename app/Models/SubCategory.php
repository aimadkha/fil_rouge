<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'parent_id',
        'photo',
        'slug',
        'active',
        'created_at',
        'updated_at',
    ];

    public function scopeActive($query){
        return $query->where('active', 1);
    }

    public function scopeSelection($query){
        return $query->select('id','parent_id','name','slug','photo','active');
    }

    public function getPhotoAttribute($val){
        return ($val !== null) ? asset('assets/'. $val) : "";
    }

    public function getActive(){
        $this->active == 1 ? "active" : "not active";
    }

    public function mainCategory(){
        return $this->belongsTo(MainCategory::class, 'category_id');
    }
}
