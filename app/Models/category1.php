<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class category1 extends Model
{
    protected $fillable = ['categoryname','img',];

    public function products(){
        return $this->hasMany(product::class,'categoryid','id');
    }
   public function subcategories(){
        return $this->hasmany(subcategory::class,'catid','id');
   }

}
