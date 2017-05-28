<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'telephone', 'address','latlon', 'city', 'needs', 'heads'
    ];
}
