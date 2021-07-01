<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    public function getPlaces($country_id = 1, $per_page = '20', $order_by = 'id', $direction = 'DESC')
    {
            return $this->where('country_id', $country_id)
                        ->orderBy($order_by, $direction)
                        ->with('county')
                        ->paginate($per_page);
    }

    public function getPlace($id)
    {
        return $this->where('id', $id)->first();
    }

    public function county()
    {
        return $this->hasOne(County::class, 'id', 'county_id');
    }
}
