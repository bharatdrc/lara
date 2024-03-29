<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Multiple extends Model
{
    use SoftDeletes;

    protected $table = 'multiples';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gender',
        'name',
        'job',
        'designation',
        'contact',
        'postal_code',
        'doj'
    ];

 }
