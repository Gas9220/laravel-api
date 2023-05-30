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

    public function show(int $id)
    {
        $project = Project::with('type', 'technologies')->find($id);
        
        if ($project) {
            return response()->json([
                'success' => true,
                'result' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => null
            ], 404);
        }
    }
}
