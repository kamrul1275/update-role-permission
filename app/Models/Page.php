<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_title',
        'page_uri',
      
    ];

    public function permissions()
    {
        return $this->hasMany(Permission::class,'id','page_id');
    }//end method
}
