<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orderr';
    protected $primaryKey = 'idorder';


    public function orderlist(){
        return $this->hasMany(Orderlist::class);
    } 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
