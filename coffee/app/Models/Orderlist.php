<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderlist extends Model
{
    use HasFactory;
    protected $table = 'orderlist';
    protected $primaryKey = 'idorderlist';

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_idorder');
    }
    public function folwer()
    {
        return $this->belongsTo(Folwer::class, 'folwer_idfolwer');
    }
    public function generatelist()
{
    return $this->hasMany(generatelist::class);
}
}
