<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceView extends Model {
    protected $table = 'resources_views';
    protected $fillable = ['resource_id'];
    public $timestamps = false;

    public function resource() {
        $this->belongsTo('App\Resource');
    }
}
