<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * table name fot model
     *
     * @var string
     */
    protected $table = 'company';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'companyname','address','invoiceaddress'
    ];


    /**
     * The person that belong to the country.
     */
    public function person()
    {
        return $this->hasMany('App\Person','companyid');
    }

    /**
     * The person that belong to the country.
     */
    public function mainAddress()
    {
        return $this->BelongsTo('App\Address','address');
    }

    /**
     * The person that belong to the country.
     */
    public function billingAddress()
    {
        return $this->BelongsTo('App\Address','invoiceaddress');
    }
}