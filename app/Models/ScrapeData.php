<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ScrapeData extends Model
{
    use HasFactory;

    public function getScrapeData($start, $end)
    {
        return $this->whereBetween('created_at', [$start, $end])->get();
    }

    public function countScrapeData($days_no, $location_id = 'location_id')
    {
        return $this->where('location_id', $location_id)
                    ->whereDate('created_at', '>=', Carbon::now()->subDays($days_no))
                    ->count();
    }
}
