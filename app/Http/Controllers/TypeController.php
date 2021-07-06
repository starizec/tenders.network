<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Session;

class TypeController extends Controller
{
    public function index(Type $type)
    {
        return view('types.index', ['types' => $type->getTypes(Session::get('country_id'))]);        
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request, Type $types)
    {
        $types->country_id = $request->country_id;
        $types->type_name = $request->type_name;
        $types->created_by = 1;
        $types->updated_by = 1;
        $types->save();

        return redirect('/types');
    }

    public function edit(Type $type, $id)
    {
        return view('types.edit', ['type' => $type->where('id', $id)->first()]);
    }

    public function update(Request $request, Type $type)
    {
        $type->where('id', $request->type_id)
             ->update(['type_name' => $request->type_name,
                       'updated_by' => 1]);

        return back();
    }
}
