<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Place;
use App\Models\Location;

class County extends Model
{
    use HasFactory;

    public function getCounties($country_id = 1, $per_page = '20', $order_by = 'id', $direction = 'DESC')
    {
        return $this->where('country_id', $country_id)
                    ->orderBy($order_by, $direction)
                    ->paginate($per_page);
    }

    public function getCounty($id)
    {
        return $this->where('id', $id)->first();
    }

    public function updateCounty($county_id, $county_name, $country_id)
    {
        $county = $this->where('id', $county_id)->first();
        $i = [];
        if($country_id != $county->country_id){
            $place_instance = new Place();
            $places_with_county_id = $place_instance->select('id')->where('county_id', $county_id)->get();

            $location_instance = new Location();
            
            foreach($places_with_county_id as $id){
                $place_instance->where('id', $id->id)
                               ->update(['country_id' => $country_id]);

                $location_instance->where('place_id', $id->id)
                                    ->update(['country_id' => $country_id]);
            }
        }

        $this->where('id', $county_id)
             ->update(['country_id' => $country_id,
                       'county_name' => $county_name,
                       'updated_by' => 1]);
    }
}
