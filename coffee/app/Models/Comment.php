<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $primaryKey = 'idcomment';

    public function folwer()
    {
        return $this->belongsTo(Folwer::class, 'folwer_idfolwer');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
