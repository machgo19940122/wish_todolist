<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'category','type'];

    public function td_tasks(){
        return $this->hasMany('App\Models\TdTask');
    }
    
    public function wish_tasks(){
        return $this->hasMany('App\Models\WishTask');
    }
}
