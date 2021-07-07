<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $visible = ['country_name', 
                          'country_language', 
                          'currency_name', 
                          'currency_iso', 
                          'currency_symbol'];

    public function getCountries()
    {
        return $this->all();
    }

    public function getCountry($id)
    {
        return $this->where('id', $id)->first();
    }
}
