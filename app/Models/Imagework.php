<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagework extends Model
{
    use HasFactory;
    protected $table = 'imagework';
    protected $primaryKey = 'idimagework';

    public function generatelist()
    {
        return $this->belongsTo(Generatelist::class,'idgenerate_list');
    }
}
