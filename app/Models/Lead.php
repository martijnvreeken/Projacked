<?php

namespace Projacked\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'client_name',
        'client_email',
        'client_phone',
        'description',
        'proposal',
        'fixed_price',
        'hour_rate',
        'hour_estimate'
    ];
    
    public function setFixedPriceAttribute($value) {
        if($value === '') {
            $this->attributes['fixed_price'] = null;
        } else {
            $this->attributes['fixed_price'] = $value;
        }
    }

    public function setHourRateAttribute($value) {
        if($value === '') {
            $this->attributes['hour_rate'] = null;
        } else {
            $this->attributes['hour_rate'] = $value;
        }
    }

    public function setHourEstimateAttribute($value) {
        if($value === '') {
            $this->attributes['hour_estimate'] = null;
        } else {
            $this->attributes['hour_estimate'] = $value;
        }
    }
}
