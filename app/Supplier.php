<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function type()
    {
        return $this->belongsTo(ItemType::class);
    }
}
