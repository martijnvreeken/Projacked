<?php

namespace Projacked\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'description', 'proposal', 'fixed_price', 'hour_rate', 'hour_estimate'
    ];
    
    public function client() {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
