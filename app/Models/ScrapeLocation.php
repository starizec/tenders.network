<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ScrapeLocation extends Model
{
    use HasFactory;

    public function getScrapeLocations($http_status_code, $start, $end, $per_page = 20){
        return $this->whereBetween('created_at', [$start, $end])->where('location_http_status_code', 'LIKE', substr($http_status_code, 0, 1).'%')->paginate($per_page);
    }
}
