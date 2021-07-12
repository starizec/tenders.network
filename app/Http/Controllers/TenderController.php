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
use App\Models\TenderContent;
use Illuminate\Http\Request;
use Session;

class TenderController extends Controller
{
    public function index(Tender $tender)
    {
        return view('tenders.index', ['tenders' => $tender->getTenders(Session::get('country_id'), 100)]);
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

        if($request->filled('tender_content') || $request->hasFile('tender_file')){
            $tender_content = new TenderContent();
            $tender_content->tender_id = $tender->id;
            $tender_content->tender_content = $request->tender_content;
            if($request->hasFile('tender_file')){
                $tender_content->tender_file = $request->file('tender_file')->store('files');
            }else{
                $tender_content->tender_file = null;
            }
            $tender_content->created_by = 1;
            $tender_content->updated_by = 1;
            $tender_content->save();
        }

        return redirect('/tenders');
    }

    public function edit(Tender $tender, $id)
    {
        return view('tenders.edit', ['tender' => $tender->getTender($id),
                                     'tender_content' => TenderContent::where('tender_id', $id)->first(),
                                     'locations' => Location::where('country_id', Session::get('country_id'))
                                                            ->select('id', 'location_name', 'location_url')
                                                            ->get(),
                                     'types' => Type::where('country_id', Session::get('country_id'))->get(),
                                     'categories' => Category::where('country_id', Session::get('country_id'))->get(),
                                     'tags' => Tag::where('country_id', Session::get('country_id'))->get()]);
    }

    public function update(Request $request, Tender $tender)
    {
        if(isset($request->remove_file)){
            $this->removeFile($request->tender_id);
        }

        $tender->where('id', $request->tender_id)
               ->update(['tender_title' => $request->tender_title,
                         'tender_url' => $request->tender_url,
                         'tender_value' => $request->tender_value,
                         'location_id' => $request->location_id,
                         'updated_by' => 1]);

        if($request->filled('tender_content') || $request->hasFile('tender_file')){
            if (TenderContent::where('tender_id', $request->tender_id)->exists()){
                if($request->hasFile('tender_file')){
                    $tender_file_path = $request->file('tender_file')->store('files');
                }else{
                    $tender_file_path = TenderContent::where('tender_id', $request->tender_id)
                                                     ->select('tender_file')
                                                     ->first();

                    $tender_file_path = $tender_file_path->tender_file;
                }

                TenderContent::where('tender_id', $request->tender_id)
                             ->update(['tender_content' => $request->tender_content,
                                       'tender_file' => $tender_file_path,
                                       'updated_by' => 1]);

            }else{
                $tender_content = new TenderContent();
                $tender_content->tender_id = $request->tender_id;
                $tender_content->tender_content = $request->tender_content;
                $tender_content->tender_file = $request->file('tender_file')->store('files');
                $tender_content->created_by = 1;
                $tender_content->updated_by = 1;
                $tender_content->save();
            }

        }
        
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

    public function removeFile($tender_id)
    {
        TenderContent::where('tender_id', $tender_id)
                     ->update(['tender_file' => null]);

        return back();
    }

    public function upload()
    {
        return view('tenders.upload');
    }

    public function doUpload(Request $request)
    {
        if(!$request->has('tenders_csv')){
            return back();
        }

        $path = $request->file('tenders_csv')->getRealPath();
        $tenders = array_map('str_getcsv', file($path));

        foreach($tenders as $tender){
            if($tender[0] == null){
                break;
            }

            $new_tender = new Tender();
            $new_tender->country_id = $request->country_id;
            $new_tender->location_id = (integer)$tender[0];
            $new_tender->tender_url = $tender[1];
            $new_tender->tender_title = $tender[2];
            $new_tender->created_by = 1;
            $new_tender->updated_by = 1;
            $new_tender->tender_value = (empty(trim($tender[6]))) ? null : $tender[6];
            $new_tender->created_at = $request->input('date');

            $new_tender->save();

            //store tender categories
            $tender_categories = explode(',', $tender[3]);

            foreach($tender_categories as $category){
                $tender_category = new TenderCategory();

                $tender_category->storeTenderCategory($new_tender->id, $category);
            }

            //store tender tags
            $tender_tags = explode(',', $tender[4]);

            foreach($tender_tags as $tag){
                $tender_tag = new TenderTag();

                $tender_tag->storeTenderTag($new_tender->id, $tag);
            }

            //store tender types
            $tender_types = explode(',', $tender[5]);

            foreach($tender_types as $type){
                $tender_type = new TenderType();

                $tender_type->storeTenderType($new_tender->id, $type);
            }
        }

        return redirect('/tenders');
    }
}
