<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';  // ใช้ชื่อให้ตรงกับฐานข้อมูล
    protected $primaryKey = 'idcomment';

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');  // ใช้ 'users_id' ตามฐานข้อมูล
    }
}
