<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * table name fot model
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'eventname','shortname','subtitle','url','email','titleimage','logo','language','description','customcss'
    ];
    
    /**
     * The person that belong to the country.
     */
    public function company()
    {
        return $this->BelongsTo('App\Company','id');
    }
}
