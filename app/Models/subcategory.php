<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class subcategory extends Model
{
    protected $fillable = ['catid', 'img', 'subcatname',];
   

    public function products(){
        return $this->hasMany(product::class,'subcategoryid','id');
    }

    public function category1(){
        return $this->belongsTo(category1::class,'catid','id');
    }
}