<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        return Store::all();
    }

    public function show($id)
    {
        return Book::findOrFail($id);
    }

    public function store(Request $request)
    {
        if (!$request->has('name') && empty($request->input('name'))) {
            return response()->json(['error' => 'The "name" field is mandatory.'], 422);
        }

        if (!$request->has('address') && empty($request->input('address'))) {
            return response()->json(['error' => 'The "address" field is mandatory.'], 422);
        }

        if (!$request->has('active') && empty($request->input('active'))) {
            return response()->json(['error' => 'The "active" field is mandatory.'], 422);
        }

        $store = new Store();
        $store->validate($request->all());
        
        return Store::create($request->all());
    }

    public function update(Request $request, $id)
    {
        if ($request->has('name') && empty($request->input('name'))) {
            return response()->json(['error' => 'The "name" field is empty.'], 422);
        }

        if ($request->has('address') && empty($request->input('address'))) {
            return response()->json(['error' => 'The "address" field is empty.'], 422);
        }

        if ($request->has('active') && !is_bool($request->input('active'))) {
            return response()->json(['error' => 'The "active" field cannot be empty and must be of boolean type.'], 422);
        }

        $store = Store::findOrFail($id);
        $store->validate($request->all());
        $store->update($request->all());

        return $store;
    }

    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();

        return response()->json(['message' => 'Store deleted successfully']);
    }
}
