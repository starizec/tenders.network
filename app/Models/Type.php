<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function getTypes($country_id = 1, $per_page = '20', $order_by = 'id', $direction = 'desc')
    {
        return $this->where('country_id', $country_id)
                    ->orderBy($order_by, $direction)
                    ->paginate($per_page);
    }
}