<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\MainCategory;

class Vendor extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'mobile',
        'address',
        'email',
        'password',
        'logo',
        'category_id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'category_id',
        'password'
    ];

    public function getLogoAttribute($val){
        return ($val !== null) ? asset('assets/' . $val) : "";
    }

    public function scopeSelection($query){
        return $query->select('id', 'category_id', 'name', 'logo', 'mobile','address','email');
    }


    public function category(){
        return $this->belongsTo('App\Models\MainCategory', 'category_id');
    }

    public function setPasswordAttribute($password){
        if (!empty($password)){
            $this->attributes['password'] = bcrypt($password);
        }
    }
}
