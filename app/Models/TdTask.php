<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TdTask extends Model
{
    use HasFactory;
    protected $table = 'td_tasks';
    protected $fillable = ['id', 'title', 'folder_id','status','url','comment','remarks','due_date','who'];
    
    const STATUS = [
        0 => [ 'label' => '未着手', 'class' => 'label-primary'],
        1 => [ 'label' => '着手中', 'class' => 'label-warning'],
        2 => [ 'label' => '完了', 'class' => ''],
    ];

    /**
     * 状態のラベル
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];
        
        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }


    public function getStatusClassAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];
        
        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }






}