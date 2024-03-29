<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class uniqueDayStoreRevenue implements Rule
{
    /**
     * The branch name.
     *
     * @var string
     */
    public $store;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($store)
    {
       $this->store =$store;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
         $revenueDates = \App\revenue::find($this->store)->get()->pluck('created_at');

         $date = new \Carbon\Carbon();
         $todayDate = $date->format('d/m/Y');

         foreach ($revenueDates as $date) {

             if($date->format('d/m/Y') == $todayDate)
             {
                return false;
                break;
             }
         }
         return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Today entry is already done for this store.';
    }
}
