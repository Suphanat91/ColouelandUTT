<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imageqr extends Model
{
    use HasFactory;
    protected $table = 'image_qr';
    protected $primaryKey = 'idimage_qr';
}
