<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'organization',
        'location',
        'contacts',
        'type_id',
        'price_details',
    ];

    public function type()
    {
        return $this->belongsTo(ItemType::class);
    }
}
