<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chat';  // ใช้ชื่อให้ตรงกับฐานข้อมูล
    protected $primaryKey = 'idchat';

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');  // ใช้ 'users_id' ตามฐานข้อมูล
    }

    public function replymas()
    {
        return $this->hasMany(Replymas::class);
    }
}
