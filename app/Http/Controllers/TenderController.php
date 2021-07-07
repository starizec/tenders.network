<?php

namespace App\Http\Controllers;

use App\Models\Tender;
use App\Models\Location;
use App\Models\Type;
use App\Models\Category;
use App\Models\Tag;
use App\Models\TenderType;
use App\Models\TenderCategory;
use App\Models\TenderTag;
use Illuminate\Http\Request;
use Session;

class TenderController extends Controller
{
    public function index(Tender $tender)
    {
        return view('tenders.index', ['tenders' => $tender->getTenders(Session::get('country_id'))]);
    }

    public function create()
    {
        return view('tenders.create', ['locations' => Location::where('country_id', Session::get('country_id'))->select('id', 'location_name', 'location_url')->get(),
                                       'types' => Type::where('country_id', Session::get('country_id'))->get(),
                                       'categories' => Category::where('country_id', Session::get('country_id'))->get(),
                                       'tags' => Tag::where('country_id', Session::get('country_id'))->get()]);
    }

    public function store(Request $request, Tender $tender)
    {
        $tender->country_id = $request->country_id;
        $tender->location_id = $request->location_id;
        $tender->tender_title = $request->tender_title;
        $tender->tender_url = $request->tender_url;
        $tender->tender_value = $request->tender_value;
        $tender->created_by = 1;
        $tender->updated_by = 1;
        $tender->save();

        if($tender){
            if(count($request->tender_types) > 0){
                foreach($request->tender_types as $tender_type){
                    $tender_type_instance = new TenderType();
                    $tender_type = $tender_type_instance->storeTenderType($tender->id, $tender_type);
                }
            }

            if(count($request->tender_categories) > 0){
                foreach($request->tender_categories as $tender_category){
                    $tender_category_instance = new TenderCategory();
                    $tender_category = $tender_category_instance->storeTenderCategory($tender->id, $tender_category);
                }
            }

            if(count($request->tender_tags) > 0){
                foreach($request->tender_tags as $tender_tag){
                    $tender_tag_instance = new TenderTag();
                    $tender_tag = $tender_tag_instance->storeTenderTag($tender->id, $tender_tag);
                }
            }
        }

        return redirect('/tenders');
    }

    public function edit(Tender $tender, $id)
    {
        return view('tenders.edit', ['tender' => $tender->getTender($id),
                                     'locations' => Location::where('country_id', Session::get('country_id'))
                                                            ->select('id', 'location_name', 'location_url')
                                                            ->get(),
                                     'types' => Type::where('country_id', Session::get('country_id'))->get(),
                                     'categories' => Category::where('country_id', Session::get('country_id'))->get(),
                                     'tags' => Tag::where('country_id', Session::get('country_id'))->get()]);
    }

    public function update(Request $request, Tender $tender)
    {
        $tender->where('id', $request->tender_id)
               ->update(['tender_title' => $request->tender_title,
                         'tender_url' => $request->tender_url,
                         'tender_value' => $request->tender_value,
                         'location_id' => $request->location_id,
                         'updated_by' => 1]);
        
        $tender_type = new TenderType();
        $tender_type->destroyTenderTypes($request->tender_id);

        foreach($request->tender_types as $tender_type){
            $tender_type_instance = new TenderType();
            $tender_type = $tender_type_instance->storeTenderType($request->tender_id, $tender_type);
        }

        $tender_category = new TenderCategory();
        $tender_category->destroyTenderCategories($request->tender_id);

        foreach($request->tender_categories as $tender_category){
            $tender_category_instance = new TenderCategory();
            $tender_category = $tender_category_instance->storeTenderCategory($request->tender_id, $tender_category);
        }

        $tender_tag = new TenderTag();
        $tender_tag->destroyTenderTags($request->tender_id);

        foreach($request->tender_tags as $tender_tag){
            $tender_tag_instance = new TenderTag();
            $tender_tag = $tender_tag_instance->storeTenderTag($request->tender_id, $tender_tag);
        }

        return back();
    }
}
