<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScrapeData extends Model
{
    use HasFactory;

    public function getScrapeData($start, $end)
    {
        return $this->whereBetween('created_at', [$start, $end])->get();
    }
}
