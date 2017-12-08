<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    protected $fillable = ['name'];

    public function resource()
    {
        return $this->hasOne('App\Resource');
    }
}
