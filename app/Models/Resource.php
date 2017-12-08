<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Resource extends Model {
    protected $fillable = ['name', 'type', 'has_cost', 'language', 'link', 'description', 'tags', 'user', 'short_description'];

    use SoftDeletes;
    use Searchable;

    public function language() {
        return $this->belongsTo('App\Language');
    }

    public function type() {
        return $this->belongsTo('App\Type');
    }

    public function format() {
        return $this->belongsTo('App\Format');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function stars() {
        return $this->hasMany('App\Star');
    }

    public function views() {
        return $this->hasMany('App\ResourceView');
    }

    public function toSearchableArray() {

        /** With relationships */
        $this->language;
        $this->type;
        $this->format;
        $this->user->githubUser;
        $this->stars = $this->stars()->count();
        $resource = $this->toArray();
        unset($resource['description'], $resource['updated_at'], $resource['deleted_at']);
        return $resource;

        /** With a custom relationship structure */
        /*$array = $this->toArray();
        $array['language'] = $this->language->toArray();
        return $array;*/
    }
}
