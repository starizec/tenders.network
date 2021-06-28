<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;

    public function getCounties($country_id = 1, $per_page = '20', $order_by = 'id', $order = 'DESC'){
        if($order == 'DESC'){
            return $this->where('country_id', $country_id)
                        ->orderByDesc($order_by)
                        ->paginate($per_page);

        }elseif($order == 'ASC'){
            return $this->where('country_id', $country_id)
                        ->orderBy($order_by)
                        ->paginate($per_page);
        }
    }

    public function getCounty($id){
        return $this->where('id', $id)->first();
    }
}
