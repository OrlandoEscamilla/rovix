<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Star extends Model
{

    protected $fillable = ['id_resource', 'id_user'];

    use SoftDeletes;

    public function resource(){
        return $this->belongsTo('App\Resource');
    }

}
