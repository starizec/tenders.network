<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function getLocations($country_id = 1, $per_page = '20', $order_by = 'id', $order = 'desc'){
        return $this->leftJoin('places', 'places.id', '=', 'locations.place_id')
                    ->leftJoin('counties', 'counties.id', '=', 'places.county_id')
                    ->select('locations.*', 'places.place_name', 'counties.county_name')
                    ->where('locations.country_id', $country_id)
                    ->orderBy($order_by, $order)
                    ->paginate($per_page);
    }

    public function getLocation($id){
        return $this->where('id', $id)->first();
    }

    public function softDelete($id){
        $this->where('id', $id)->update(['location_status' => 0]);
    }

    public function delete(){
        $this->where('id', $id)->delete();
    }
}
