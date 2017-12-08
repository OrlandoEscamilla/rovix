<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model {

    protected $fillable = ['name'];

    public function resource() {
        return $this->hasOne('App\Resource');
    }
}
