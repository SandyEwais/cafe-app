<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class TimeValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $value = Carbon::parse($value);
        $picked_time = Carbon::createFromTime($value->hour,$value->minute,$value->second);
        $open = Carbon::createFromTimeString('09:00:00');
        $closed = Carbon::createFromTimeString('23:00:00');
        return $picked_time->between($open,$closed) ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please choose time between 9:00AM-11:00pm';
    }
}
