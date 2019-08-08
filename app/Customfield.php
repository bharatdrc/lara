<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customfield extends Model
{

    /**
     * field types
     *
     * @var array
     */
    public $inputType = [0=>'Textfield',1=>'Dropdown',2=>'Checkbox',3=>'Radio',4=>'Textarea'];

    /**
     * table name fot model
     *
     * @var string
     */
    protected $table = 'customfield';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','type','required','event_id','options'
    ];

    /**
     * The person that belong to the country.
     */
    public function event()
    {
        return $this->belongsTo('App\Event','event_id');
    }

    /**
     * The person that belong to the country.
     */
    public function customfieldvalues()
    {
        return $this->hasMany('App\Customfieldvalues','customfield_id');
    }

}
