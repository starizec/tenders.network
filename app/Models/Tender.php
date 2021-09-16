<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    use HasFactory;

    public function getTenders($country_id,                                
                               $types,
                               $categories,
                               $tags,
                               $counties,
                               $per_page = '20', 
                               $order_by = 'id', 
                               $direction = 'desc',)
    {
        return $this->where('country_id', $country_id)
                    ->with('country:id,currency_symbol', 
                           'types:id,type_name', 
                           'categories:id,category_name', 
                           'tags:id,tag_name', 
                           'location.place.county')
                    ->whereHas('types', function ($query) use ($types){
                        $query->whereIn('types.id', $types);
                    })
                    ->whereHas('categories', function ($query) use ($categories){
                        $query->whereIn('categories.id', $categories);
                    })
                    ->whereHas('tags', function ($query) use ($tags){
                        $query->whereIn('tags.id', $tags);
                    })
                    ->whereHas('location.place.county', function($query) use ($counties){
                        $query->whereIn('id', $counties);
                    })
                    ->orderBy('tenders.'.$order_by, $direction)
                    ->paginate($per_page);
    }

    public function getTender($id)
    {
        return $this->where('id', $id)
                    ->with('country')
                    ->with('types')
                    ->with('categories')
                    ->with('tags')
                    ->first();
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, TenderType::class, 'tender_id', 'type_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, TenderCategory::class, 'tender_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, TenderTag::class, 'tender_id', 'tag_id');
    }

    public function location()
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }
}
