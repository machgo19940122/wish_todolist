<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TdTask extends Model
{
    use HasFactory;
    // protected $table = 'td_tasks';
    protected $fillable = ['id', 'title', 'folder_id','status','url','comment','remarks','due_date','who'];
}
