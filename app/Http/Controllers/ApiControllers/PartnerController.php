<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Setting;
use App\Models\Type;
use App\Models\Category;
use App\Models\Tag;
use App\Models\County;

class PartnerController extends Controller
{
    public function menu($partner_id, Setting $setting)
    {
        return Setting::where('setting_name', 'menu')
                      ->where('partner_id', $partner_id)
                      ->select('setting_values')
                      ->first();
    }

    public function filters($partner_id, Setting $setting, Partner $partner)
    {
        $partner = $partner->where('id', $partner_id)->first();

        $filters = (object)[
            "types" => Type::where('country_id', $partner->country_id)->select('id', 'type_name')->get(),
            "categories" => Category::where('country_id', $partner->country_id)->select('id', 'category_name')->get(),
            "tags" => Tag::where('country_id', $partner->country_id)->select('id', 'tag_name')->get(),
            "counties" => County::where('country_id', $partner->country_id)->select('id', 'county_name')->get()
        ];

        return response()->json($filters);

    }
}
