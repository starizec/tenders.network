<?php
namespace App\Services;

use App\Models\Type;
use App\Models\Category;
use App\Models\Tag;
use App\Models\County;

class UserFilterService
{
    public static function reset($country_id)
    {
        $filters = [];
        $filters['types'] = Type::where('country_id', $country_id)->pluck('id')->toArray();
        $filters['categories'] = Category::where('country_id', $country_id)->pluck('id')->toArray();
        $filters['tags'] = Tag::where('country_id', $country_id)->pluck('id')->toArray();
        $filters['counties'] = County::where('country_id', $country_id)->pluck('id')->toArray();

        return base64_encode(serialize($filters));
    }
}