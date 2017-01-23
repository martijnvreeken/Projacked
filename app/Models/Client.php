<?php

namespace Projacked\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name','contact','code','debit_number','coc_number','tax_number','email',
        'phonenumber','mobilenumber','address','zipcode','city','country'
    ];
    
    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $code = strtoupper(substr($value, 0, 2));
        $code .= Carbon::now()->format('m') . Carbon::now()->format('y');
        $this->attributes['code'] = $code;
    }
    
    public function projects() {
        return $this->hasMany(Project::class, 'client_id');
    }
}
