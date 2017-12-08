<?php

namespace App;

use Illuminate\Support\Facades\DB;

class QueriesTops {

    public static function topStarred() {
        $query = "select resources.name
                  from stars
                  inner join resources on resources.id = resource_id
                  WHERE YEARWEEK(stars.created_at) = YEARWEEK(CURDATE()) 
                  group by resource_id
                  order by count(*) desc
                  limit 3";

        return self::execute($query);
    }

    public static function topViewed() {
        $query = "select resources.name
                  from resources_views
                  inner join resources on resources.id = resource_id
                  WHERE YEARWEEK(resources_views.created_at) = YEARWEEK(CURDATE()) 
                  group by resource_id
                  order by count(*) desc
                  limit 3";

        return self::execute($query);
    }

    public static function execute($query) {
        $result = DB::select($query);
        $top = [];
        foreach ($result as $element) {
            $top[] = $element->name;
        }
        return $top;
    }
}