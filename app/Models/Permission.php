<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function role()
    {
        return $this->belongsToMany(Role::class);
    }//end method


    public function pages()
    {
        return $this->hasOne(Page::class,'id');
    }//end method
}
