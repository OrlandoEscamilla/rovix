<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Badge extends Model
{
    use SoftDeletes;

    public $fillable = ['user_id', 'name', 'image', ''];
}
