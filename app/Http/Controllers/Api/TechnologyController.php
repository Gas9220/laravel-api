<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::with('projects')->get();

        return response()->json([
            'success' => true,
            'results' => $technologies
        ]);
    }

    public function show(string $slug){
        $technologies = Technology::where('slug', $slug)->with('projects')->first();

        return response()->json([
            'success' => true,
            'results' => $technologies
        ]);

    }
}
