<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'telephone', 'address', 'city', 'availability', 'time_possibility', 'type', 'is_fuel'
    ];
}
