<?php

namespace Projacked\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    public $guarded = [];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName() {
        return 'slug';
    }

}
