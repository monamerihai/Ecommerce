<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'categoryid','subcategoryid', 'productname','img','price','tittle','qty','description'
    ];

    public function category1(){
        return $this->belongsTo(category1::class,'categoryid','id');
    }

    public function subcategory(){
        return $this->belongsTo(subcategory::class,'subcategoryid','id');
    }
}
