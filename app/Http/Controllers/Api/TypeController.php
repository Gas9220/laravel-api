<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::with('projects')->get();

        return response()->json([
            'success' => true,
            'results' => $types
        ]);
    }

    public function show(string $slug){
        $types = Type::where('slug', $slug)->with('projects')->first();

        return response()->json([
            'success' => true,
            'results' => $types
        ]);

    }
}
