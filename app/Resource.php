<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Resource extends Model
{
    protected $fillable = ['name', 'type', 'has_cost', 'language', 'link', 'description', 'tags', 'user', 'short_description'];

    use SoftDeletes;
    use Searchable;

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

    public function toSearchableArray()
    {
        /** With specific data */
        /*$record = $this->toArray();
        unset($record['created_at'], $record['updated_at'], $record['deleted_at']);
        return $record;*/

        /** With relationships */
        $this->language;
        $this->type;
        $this->user->githubUser;
        $this->stars;
        $resource = $this->toArray();
        unset($resource['description'], $resource['updated_at']);
        return $resource;

        /** With a custom relationship structure */
        /*$array = $this->toArray();
        $array['language'] = $this->language->toArray();
        return $array;*/
    }
}
