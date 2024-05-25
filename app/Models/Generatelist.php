<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generatelist extends Model
{
    use HasFactory;
    protected $table = 'generate_list';
    protected $primaryKey = 'idgenerate_list';
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function orderlist(){
        return $this->belongsTo(Orderlist::class,'orderlist_idorderlist');
    }
    public function imagework(){
        return $this->hasMany(Imagework::class,'idgenerate_list');
    }
}
