<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * table name fot model
     *
     * @var string
     */
    protected $table = 'person';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname','email','jobtitle','profiletext','profileimage','language','interestedin','canprovide'
    ];

     /**
     * Get the company record associated with the person.
     */
    public function company()
    {
    	return $this->BelongsTo('App\Company','id');
    }
}