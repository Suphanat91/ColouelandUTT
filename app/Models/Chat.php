<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chat';
    protected $primaryKey = 'idchat';
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function replymas()
{
    return $this->hasMany(Replymas::class);
}
}
