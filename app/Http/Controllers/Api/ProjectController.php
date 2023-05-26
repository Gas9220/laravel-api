<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technologies')->get();

        return response()->json([
            'success' => true,
            'result' => $projects
        ]);
    }

    public function show(string $slug)
    {
        $projects = Project::where('slug', $slug)->with('type', 'technologies')->first();


        if ($projects) {
            return response()->json([
                'success' => true,
                'results' => $projects
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null
            ], 404);
        }
    }
}
