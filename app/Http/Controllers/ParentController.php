<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentModel;
class ParentController extends Controller
{
    public function index()
    {
        $parents = ParentModel::all();
        return view('parents.index', compact('parents'));
    }

    public function create()
    {
        return view('parents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // validation rules
        ]);
    
        $parent = new ParentModel();
        $parent->fill($request->all());
        $parent->save();
    
        return redirect()->route('parents.index')->with('success', 'Parent created successfully');
    }

    public function show(string $id)
    {
        $parent = ParentModel::find($id);
        return view('parents.show', compact('parent'));
    }

    public function edit(string $id)
    {
        $parent = ParentModel::find($id);
        return view('parents.edit', compact('parent'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            // validation rules
        ]);
    
        $parent = ParentModel::find($id);
        $parent->fill($request->all());
        $parent->save();
    
        return redirect()->route('parents.index')->with('success', 'Parent updated successfully');
    }

    public function destroy(string $id)
    {
        $parent = ParentModel::find($id);
    $parent->delete();

    return redirect()->route('parents.index')->with('success', 'Parent deleted successfully');
    }
}
