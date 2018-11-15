<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;
use App\Http\Requests\RecommendationsRequest;
use Session;
use App\Recommendation;
use Auth;
use Input;
use DB;
use Carbon\Carbon;

class RecommendationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $recommendations = Recommendation::select('recommendations.id','recommendations.user_id', 'recommendations.worker_id', 'recommendations.recommendation as recommendation', 'recommendations.author', 'recommendations.work_author', 'recommendations.profile_author', 'users.name as user_name', 'workers.name as worker_name')->leftJoin('users', 'recommendations.user_id', '=', 'users.id')->leftJoin('workers', 'recommendations.worker_id', '=', 'workers.id')->orderBy('workers.name', 'asc')->get();


        return view('admin/recommendation.index', compact('recommendations'));
    }

    public function create($id_worker = null)
    {

        $listWorker = Worker::pluck('name', 'id');
        return view('admin/recommendation.create', compact('listWorker', 'id_worker'));
    }

    public function store(RecommendationsRequest $request)
    {
        $user_id = Auth::user()->id;
        $worker_id = Input::get('worker_id');
        $recommendation = Input::get('recommendation');
        $author = Input::get('author');
        $work_author = Input::get('work_author');
        $profile_author = Input::get('profile_author');

        $id = DB::table('recommendations')->insertGetId([
            'user_id' => $user_id,
            'worker_id' => $worker_id,
            'recommendation' => $recommendation,
            'author' => $author,
            'work_author' => $work_author,
            'profile_author' => $profile_author,
            'created_at' => Carbon::now()
        ]);

        Session::flash('recommendationSaveOk', 'Recommendation saved correctly.');
        return redirect('admin/worker/'. $worker_id);
        
    }

    // public function show()
    // {

    // }

    public function edit($id)
    {
        $recommendation = Recommendation::find($id);
        $listWorker = Worker::pluck('name', 'id');
        return view('admin/recommendation.edit', compact('recommendation', 'listWorker'));
    }

    public function update($id, RecommendationsRequest $request)
    {
        $user_id = Auth::user()->id;
        $worker_id = Input::get('worker_id');
        $recommendation = Input::get('recommendation');
        $author = Input::get('author');
        $work_author = Input::get('work_author');
        $profile_author = Input::get('profile_author');
        
        DB::table('recommendations')->where('id', $id)->update(
            [
                'user_id' => $user_id,
                'worker_id' => $worker_id,
                'recommendation' => $recommendation,
                'author' => $author,
                'work_author' => $work_author,
                'profile_author' => $profile_author,
                'updated_at' => Carbon::now()
            ]
        );

        Session::flash('recommendationSaveOk', 'Recommendation saved correctly.');
        return redirect('admin/worker/'. $worker_id);
    }

    public function destroy($id)
    {
        Recommendation::destroy($id);
        Session::flash('recommendationDestroyOk', 'Recommendation removed correctly.');
        return redirect('admin/worker/');
    }


}
