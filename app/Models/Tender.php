<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Country;

class Tender extends Model
{
    use HasFactory;

    public function getTenders($country_id = 1, $per_page = '20', $order_by = 'id', $direction = 'desc')
    {
        return $this->where('country_id', $country_id)
                    ->leftJoin('countries', 'countries.id', '=', 'tenders.country_id')
                    ->orderBy('tenders.'.$order_by, $direction)
                    ->paginate($per_page);
    }
}
