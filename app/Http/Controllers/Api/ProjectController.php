<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index($number_of_elements)
    {
        $projects = Project::with('type', 'technologies')->paginate($number_of_elements);

        return response()->json([
            'success' => true,
            'result' => $projects
        ]);
    }

    public function show($id)
    {
        $project = Project::find($id)->with('type', 'technologies');


        if ($project) {
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null
            ], 404);
        }
    }
}
