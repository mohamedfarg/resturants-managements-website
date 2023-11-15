<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'module_id',
        'img'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    public function category()
    {
        return $this->belongsTo(Module::class);
    }
}
