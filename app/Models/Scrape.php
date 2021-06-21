<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ScrapeLocation;

class Scrape extends Model
{
    use HasFactory;

    public function getScrapes($country_id = 1, $count = '20', $order_by = 'id', $order = 'DESC'){
        if($order == 'DESC'){
            return $this->where('country_id', $country_id)->orderByDesc($order_by)->paginate($count);

        }elseif($order == 'ASC'){
            return $this->where($country_id)->orderBy($order_by)->paginate($count);
        }
    }
}
