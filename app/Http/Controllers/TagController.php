<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Session;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        return view('tags.index', ['tags' => $tag->getTags(Session::get('country_id'))]);
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request, Tag $tag)
    {
        $tag->country_id = $request->country_id;
        $tag->tag_name = $request->tag_name;
        $tag->created_by = 1;
        $tag->updated_by = 1;
        $tag->save();

        return redirect('/tags');
    }

    public function edit(Tag $tag, $id)
    {
        return view('tags.edit', ['tag' => $tag->where('id', $id)->first()]);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->where('id', $request->tag_id)
            ->update(['country_id' => $request->country_id,
                      'tag_name' => $request->tag_name,
                      'updated_by' => 1]);

        return back();
    }
}
