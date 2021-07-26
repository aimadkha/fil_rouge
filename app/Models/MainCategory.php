<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MainCategory extends Model
{

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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
        return $query->select('id','name','slug','photo','active');
    }

    public function getPhotoAttribute($val){
        return ($val !== null) ? asset('assets/'. $val) : "";
    }

    public function getActive(){
        $this->active == 1 ? "active" : "not active";
    }

}
