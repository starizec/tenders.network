<?php

namespace App\Http\Controllers;

use App\Models\Scrape;
use Illuminate\Http\Request;
use Session;

class ScrapeController extends Controller
{
    public function index(Scrape $scrape)
    {   
        return view('scrapes.index', ['scrapes' => $scrape->getScrapes(Session::get('country_id'))]);
    }
}
