<?php 

namespace App;

use Illuminate\Support\Str;
/**
 * this trait provides custom methods for eloquent
 *  models in order to make the code a bit cleaner
 */
trait ModelHelpers
{    
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getValuesAttribute()
    {
        return [$this->id, $this->slug];
    }
}
