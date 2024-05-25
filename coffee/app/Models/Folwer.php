<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folwer extends Model
{
    // use HasFactory;
    // protected $table = 'folwer';
    
    use HasFactory;
    protected $primaryKey = 'idfolwer';
    protected $table = 'folwer'; // กำหนดชื่อตารางในฐานข้อมูล

    protected $fillable = [
        'name_fol',
        'detail_fol',
        'color',
        'price',
        'image_fol',


    ]; // ระบุฟิลด์ที่สามารถเขียนได้
    public function generate()
{
    return $this->hasMany(Generate::class);
}

public function comment()
{
    return $this->hasMany(Comment::class);
}
public function orderlist()
{
    return $this->hasMany(Orderlist::class);
}




    // ตัวอย่างการกำหนด relationship กับ Model อื่นๆ
    // public function relatedModel()
    // {
    //     return $this->hasOne(RelatedModel::class);
    // }

    // public function anotherRelatedModel()
    // {
    //     return $this->hasMany(AnotherRelatedModel::class);
    // }
}
