<?php

namespace App\Models;
use App\Models\Folwer;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generate extends Model
{
    use HasFactory;
    protected $table = 'generate';

    // protected $table = 'users';
    protected $primaryKey = 'idgenerate';


    public function folwer()
{
    return $this->belongsTo(Folwer::class, 'idfolwer');
}

public function user()
{
    return $this->belongsTo(User::class);
}

}
