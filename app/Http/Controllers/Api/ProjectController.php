<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        if (!empty($request->query('category'))) {
            $category = $request->query('category');
            $projects = Project::where('category_id', $category)->with(['category', 'technologies'])->get();

        } else {
            $projects = Project::with(['category', 'technologies'])->paginate(5);
        }
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);

    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with(['category', 'technologies'])->first();
        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }
}
