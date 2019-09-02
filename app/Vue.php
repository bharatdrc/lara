<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vue extends Model
{
    /**
     * table name fot model
     *
     * @var string
     */
    protected $table = 'vues';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','address'
    ];
}
