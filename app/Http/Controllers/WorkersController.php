<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WorkersRequest;
use App\Http\Requests\WorkersUpdateRequest;
use Session;
use Auth;
use App\Worker;
use App\Recommendation;
use Input;
use DB;
use Carbon\Carbon;
use File;
use Image;

class WorkersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $workers = Worker::select('workers.id','workers.user_id', 'workers.name', 'workers.photo', 'workers.description', 'workers.profile_worker', 'users.name as user_name')
        ->leftJoin('users', 'workers.user_id', '=', 'users.id')->get();
        return view('admin/worker.index', compact('workers'));
    }

    public function create()
    {
        return view('admin/worker.create');
    }

    public function store(WorkersRequest $request)
    {
        $user_id = Auth::user()->id;
        $name = Input::get('name');
        $description = Input::get('description');
        $profile_worker = Input::get('profile_worker');

        $filename = substr(md5(uniqid(time())), 0, 20). '.' .Input::file('photo')->getClientOriginalExtension();
        $path = public_path('photo_linkedin');
        // $save = Input::file('photo')->move($path, $filename);

        //resize image
        $save = Image::make(Input::file('photo'))
            ->resize(90, 90)
            ->save($path . '/' . $filename, 60);

        DB::table('workers')->insert(
            [
                'user_id' => $user_id,
                'name' => $name,
                'description' => $description,
                'profile_worker' => $profile_worker,
                'photo' => $filename,
                'created_at' => Carbon::now()
            ]
        );

        Session::flash('workerSaveOk', 'Worker saved correctly.');
        return redirect('admin/worker');

    }

    public function show($id)
    {
        $worker = Worker::find($id);
        $recommendations = Recommendation::select('recommendations.id as recommendation_id','user_id', 'recommendation', 'author', 'work_author', 'profile_author', 'users.name as user_name')->leftJoin('users', 'recommendations.user_id', '=', 'users.id')->where('worker_id', $id)->get();
        return view('admin/worker.show', compact('worker', 'recommendations'));
    }

    public function edit($id)
    {
        $worker = Worker::find($id);
        return view('admin/worker.edit', compact('worker'));
    }

    public function update($id, WorkersUpdateRequest $request)
    {
        $oldPhoto = Input::get('old_photo');
        $user_id = Auth::user()->id;
        $name = Input::get('name');
        $description = Input::get('description');
        $profile_worker = Input::get('profile_worker');
        $photo = Input::file('photo');

        if ($photo != null || $photo != '') {
            $filename = substr(md5(uniqid(time())), 0, 20) . '.' . $photo->getClientOriginalExtension();
            $path = public_path('photo_linkedin');
            // $save = $photo->move($path, $filename);

            //resize image
            $save = Image::make(Input::file('photo'))
                ->resize(90, 90)
                ->save($path . '/' . $filename, 60);

            if ($save) {
                $photoRemove = $path . "/" . $oldPhoto;
                if (File::exists($photoRemove)) {
                    File::delete($photoRemove);
                }
            }
        } else {
            $filename = $oldPhoto;
        }

        DB::table('workers')->where('id', $id)->update(
            [
                'user_id' => $user_id,
                'name' => $name,
                'description' => $description,
                'profile_worker' => $profile_worker,
                'photo' => $filename,
                'updated_at' => Carbon::now()
            ]
        );

        Session::flash('workerUpdateOk', 'Worker updated correctly.');
        return redirect('admin/worker');

    }

    public function destroy($id)
    {

        $path = public_path('photo_linkedin');
        $photo = Worker::find($id)->photo;
        
        if (File::exists($path . "/" . $photo)) {
            File::delete($path . "/" . $photo);
        }

        $destroy = Worker::destroy($id);
        

        Session::flash('workerDestroyOk', 'Worker removed correctly.');
        return redirect('admin/worker');
    }
}
