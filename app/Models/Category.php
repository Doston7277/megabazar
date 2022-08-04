<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'subject_id',
        'category_name'
    ];
    protected $casts = [
        'category_name'=>'array'
    ];

    public function subject()
    {
        return $this->hasOne(Subject::class,'subject_id','subject_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','category_id');
    }


}
