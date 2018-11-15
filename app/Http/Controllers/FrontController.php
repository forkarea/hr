<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;

class FrontController extends Controller
{
    public function index()
    {
        $getRecommendationWorker = Worker::with('recommendations')->get();
        return view('front.index', compact('getRecommendationWorker','getWorker', 'getRecommendation'));
    }
}
