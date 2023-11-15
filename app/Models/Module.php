<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Module extends Model
{
    use HasFactory;
    protected $fillable = ['menu_item_id'];

    function menue(){
        return $this->BelongsTo(Menue::class);
    }
}
