<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function show($id)
    {
        return Book::findOrFail($id);
    }

    public function store(Request $request)
    {
        if (!$request->has('name') && empty($request->input('name'))) {
            return response()->json(['error' => 'The "name" field is required.'], 422);
        }

        if (!$request->has('ISBN') && !is_numeric($request->input('ISBN'))) {
            return response()->json(['error' => 'The "ISBN" field is mandatory and must be numeric.'], 422);
        }

        if (!$request->has('value') && !is_numeric($request->input('value'))) {
            return response()->json(['error' => 'The "value" field is mandatory and must be numeric.'], 422);
        }

        return Book::create($request->all());
    }

    public function update(Request $request, $id)
    {
        if ($request->has('name') && empty($request->input('name'))) {
            return response()->json(['error' => 'The "name" field is required.'], 422);
        }

        if ($request->has('ISBN') && !is_numeric($request->input('ISBN'))) {
            return response()->json(['error' => 'The "ISBN" field is mandatory and must be numeric.'], 422);
        }

        if ($request->has('value') && !is_numeric($request->input('value'))) {
            return response()->json(['error' => 'The "value" field is mandatory and must be numeric.'], 422);
        }

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return $book;
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully']);
    }
}
