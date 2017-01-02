<?php

namespace Projacked\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name','code','debit_number','coc_number','tax_number','email',
        'phonenumber','mobilenumber','address','zipcode','city','country'
    ];
}
