<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'profile_image',  // ใช้ 'profile_image' ตามฐานข้อมูล
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function generate()
    {
        return $this->hasMany(Generate::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'users_id');  // ใช้ 'users_id' ตามฐานข้อมูล
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'users_id');  // ใช้ 'users_id' ตามฐานข้อมูล
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'users_id');  // ใช้ 'users_id' ตามฐานข้อมูล
    }

    public function generateLists()
    {
        return $this->hasMany(GenerateList::class);
    }
}
