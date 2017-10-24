<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitbucketUser extends Model
{
    protected $fillable = ['user_id', 'nickname', 'avatar', 'website'];
}
