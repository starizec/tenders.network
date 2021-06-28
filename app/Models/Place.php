<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    public function getPlaces($country_id = 1, $per_page = '20', $order_by = 'id', $order = 'DESC'){
        if($order == 'DESC'){
            return $this->where('country_id', $country_id)
                        ->orderByDesc($order_by)
                        ->with('county')
                        ->paginate($per_page);

        }elseif($order == 'ASC'){
            return $this->where($country_id)
                        ->orderBy($order_by)
                        ->paginate($per_page);
        }
    }

    public function getPlace($id){
        return $this->where('id', $id)->first();
    }

    public function county(){
        return $this->hasOne('App\Models\County', 'id', 'county_id');
    }
}
