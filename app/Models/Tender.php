<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    use HasFactory;

    public function getTenders($country_id = 1, $per_page = '20', $order_by = 'id', $direction = 'desc')
    {
        return $this->where('country_id', $country_id)
                    ->with('country')
                    ->with('types')
                    ->with('categories')
                    ->with('tags')
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
}
