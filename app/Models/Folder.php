<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public function tasks()
    {
        // Task.phpを関連付ける
        // フォルダーに関連するタスクレコードを取得
        return $this->hasMany('App\Models\Task');
    }

    use HasFactory;
}
