<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function menu($partner_id)
    {   
        return view('settings.menu', ['menu' => Setting::where('partner_id', $partner_id)
                                                       ->where('setting_name', 'menu')
                                                       ->first(),
                                      'partner_id' => $partner_id]);
    }

    public function updateMenu(Request $request, Setting $setting)
    {
        $setting->updateOrCreate(['partner_id' => $request->partner_id, 'setting_name' => $request->setting_name],                               
                                 ['setting_values' => json_encode($this->formatMenuItems($request->setting_values))]);

        return back();
    }

    public function formatMenuItems($values)
    {
        $values = trim(preg_replace('/\s\s+/', ' ', $values));
        $items = explode('-', $values);

        foreach($items as $item){
            $elements = explode(',', $item);
            $menu_element = [];

            foreach($elements as $element){
                $menu_element[] = $element;
            }

            $menu[] = $menu_element;
        }

        return $menu;
    }
}
