<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multipalimg extends Model
{
    protected $fillable = ['productid','img',];
    public function multipalimg(){
        return $this->belongsTo(Multipalimg::class);
    }

}
  