<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishTask extends Model
{
    use HasFactory;
    // protected $table = 'wish_tasks';
    protected $fillable = ['id', 'title', 'folder_id','due_date','status','url','comment','remarks','budget'];
}
