<?php

namespace App\Exports;

use App\Models\ScrapeData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Session;

class ScrapeExport implements FromCollection
{
    public $start, $end;

    public function __construct($start, $end){
        $this->start = $start;
        $this->end = $end;
    }

    public function collection()
    {
        return ScrapeData::select('location_id', 'scrape_url', 'scrape_text')
                         ->whereBetween('created_at', [$this->start, $this->end])
                         ->where('country_id', Session::get('country_id'))
                         ->get();
    }
}
