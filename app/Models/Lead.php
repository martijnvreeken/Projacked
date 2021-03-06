<?php

namespace Projacked\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Lead extends Model
{
    use Notifiable;

    protected $fillable = [
        'client',
        'client_name',
        'client_email',
        'client_phone',
        'description',
        'proposal',
        'fixed_price',
        'hour_rate',
        'hour_estimate',
        'quotation_uri'
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
    
    public function getCreatedAtAttribute() {
        return (new \Carbon\Carbon($this->attributes['created_at']))->diffForHumans();
    }
    
    public function getEmailAttribute() {
        return $this->attributes['client_email'];
    }
}
