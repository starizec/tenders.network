<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Partner;

class Partner extends Model
{
    use HasFactory;

    public function getPartners($per_page = '20', $order_by = 'id', $direction = 'DESC')
    {
        return $this->orderBy($order_by, $direction)
                    ->with('country')
                    ->paginate($per_page);
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
