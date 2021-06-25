<?php

namespace App\Http\Controllers;

use App\Models\ScrapeData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\ScrapeExport;
use Maatwebsite\Excel\Facades\Excel;

class ScrapeDataController extends Controller
{
    public function download(ScrapeData $scrapedata, Request $request)
    {
        $filename = 'Scrape-' . substr($request->end, 0, 10) . '.csv';
        
        return Excel::download(new ScrapeExport($request->start, $request->end), $filename);
    }
}
