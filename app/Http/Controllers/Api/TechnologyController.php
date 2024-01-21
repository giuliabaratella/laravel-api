<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::with(['projects'])->get();
        return response()->json([
            'success' => true,
            'results' => $technologies
        ]);

    }

    public function show($slug)
    {
        $technology = Technology::where('slug', $slug)->with(['projects'])->first();
        return response()->json([
            'success' => true,
            'results' => $technology
        ]);
    }
}
