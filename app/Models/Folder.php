<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public function tasks()
    {
        // Task.phpを関連付ける
        return $this->hasMany('App\Models\Task');
    }

    use HasFactory;
}
