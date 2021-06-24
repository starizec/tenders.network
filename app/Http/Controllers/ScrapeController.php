<?php

namespace App\Http\Controllers;

use App\Models\Scrape;
use Illuminate\Http\Request;

class ScrapeController extends Controller
{
    public function index(Scrape $scrape)
    {
        $scrapes = $scrape->getScrapes();
        
        return view('scrapes.index', ['scrapes' => $scrapes]);
    }
}
