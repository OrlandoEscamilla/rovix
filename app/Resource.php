<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    protected $fillable = ['name', 'type', 'has_cost', 'language', 'link', 'description', 'tags', 'user'];

    use SoftDeletes;

    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function stars()
    {
        return $this->hasMany('App\Star');
    }
}
