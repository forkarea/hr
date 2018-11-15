<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApplicationsRequest;
use App\Application;
use Input;
use Session;
use DB;
use Carbon\Carbon;
use Auth;
use File;
use Response;


class ApplicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $applications = Application::select('applications.id', 'applications.user_id','applications.name','applications.phone','applications.email','applications.job_title','applications.company_name','applications.location', 'applications.created_at', 'applications.updated_at', 'users.name as user_name')->leftJoin('users', 'applications.user_id', '=', 'users.id')->orderBy('applications.created_at', 'desc')->paginate(20);

        return view('admin/application.index', compact('applications'));
    }

    public function create()
    {
        return view('admin/application.create');
    }

    public function store(ApplicationsRequest $request)
    {
        $user_id = Auth::user()->id;
        $name = Input::post('name');
        $phone = Input::post('phone');
        $email = Input::post('email');
        $job_title = Input::post('job_title');
        $company_name = Input::post('company_name');
        $location = Input::post('location');
        $type_salary = Input::post('type_salary');
        $start_date = Input::post('start_date');
        $percent_work = Input::post('percent_work');
        $must_have = Input::post('must_have');
        $nice_have = Input::post('nice_have');
        $languages = Input::post('languages');
        $type_work = Input::post('type_work');
        $project_industry = Input::post('project_industry');
        $company_size = Input::post('company_size');
        $project_team_size = Input::post('project_team_size');
        $percent_workload = Input::post('percent_workload');
        $day_holiday = Input::post('day_holiday');
        $office_hours_from = Input::post('office_hours_from');
        $office_hours_to = Input::post('office_hours_to');
        $day_travel = Input::post('day_travel');
        $day_relocation = Input::post('day_relocation');
        $upload_file = Input::file('upload_file');


        if ($upload_file != null || $upload_file != '') {
            $filename = substr(md5(uniqid(time())), 0, 20) . '.' . $upload_file->getClientOriginalExtension();            
            $path = storage_path('applications');
            $save = $upload_file->move($path, $filename);
        } else {
            $filename = null;
        }

        $applications = DB::table('applications')->insert([
            'user_id' => $user_id,
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'job_title' => $job_title,
            'company_name' => $company_name,
            'location' => $location,
            'type_salary' => $type_salary,
            'start_date' => $start_date,
            'percent_work' => $percent_work,
            'must_have' => $must_have,
            'nice_have' => $nice_have,
            'languages' => $languages,
            'type_work' => $type_work,
            'project_industry' => $project_industry,
            'company_size' => $company_size,
            'project_team_size' => $project_team_size,
            'percent_workload' => $percent_workload,
            'day_holiday' => $day_holiday,
            'office_hours_from' => $office_hours_from,
            'office_hours_to' => $office_hours_to,
            'day_travel' => $day_travel,
            'day_relocation' => $day_relocation,
            'upload_file' => $filename,
            'created_at' => Carbon::now()
        ]);

        Session::flash('applicationSaveOk', 'Application saved correctly.');
        return redirect('admin/application');
    }

    public function show($id)
    {
        $applications = Application::with('user')->find($id);
        $applicationsFile = Application::find($id)->upload_file;

        if ($applicationsFile != null || $applicationsFile != '') {
            $formatFile = explode(".", $applicationsFile);
            $formatFile = $formatFile[1];
        } else {
            $formatFile = null;
        }

        return view('admin/application.show', compact('applications', 'formatFile'));
    }

    public function showApplication($name)
    {
        $file = storage_path('applications').'/'.$name;
        return response()->download($file);
    }

    public function edit($id)
    {
        $applications = Application::find($id);
        return view('admin/application.edit', compact('applications'));
    }

    public function update($id, ApplicationsRequest $request)
    {
        $user_id = Auth::user()->id;
        $old_upload_file = Application::find($id)->upload_file;
        $name = Input::post('name');
        $phone = Input::post('phone');
        $email = Input::post('email');
        $job_title = Input::post('job_title');
        $company_name = Input::post('company_name');
        $location = Input::post('location');
        $type_salary = Input::post('type_salary');
        $start_date = Input::post('start_date');
        $percent_work = Input::post('percent_work');
        $must_have = Input::post('must_have');
        $nice_have = Input::post('nice_have');
        $languages = Input::post('languages');
        $type_work = Input::post('type_work');
        $project_industry = Input::post('project_industry');
        $company_size = Input::post('company_size');
        $project_team_size = Input::post('project_team_size');
        $percent_workload = Input::post('percent_workload');
        $day_holiday = Input::post('day_holiday');
        $office_hours_from = Input::post('office_hours_from');
        $office_hours_to = Input::post('office_hours_to');
        $day_travel = Input::post('day_travel');
        $day_relocation = Input::post('day_relocation');
        $upload_file = Input::file('upload_file');

        if ($upload_file != null || $upload_file != '') {
            $filename = substr(md5(uniqid(time())), 0, 20) . '.' . $upload_file->getClientOriginalExtension();
            $path = storage_path('applications');
            $save = $upload_file->move($path, $filename);
        } else {
            $filename = $old_upload_file;
        }

        $applications = DB::table('applications')->where('id', $id)->update([
            'user_id' => $user_id,
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'job_title' => $job_title,
            'company_name' => $company_name,
            'location' => $location,
            'type_salary' => $type_salary,
            'start_date' => $start_date,
            'percent_work' => $percent_work,
            'must_have' => $must_have,
            'nice_have' => $nice_have,
            'languages' => $languages,
            'type_work' => $type_work,
            'project_industry' => $project_industry,
            'company_size' => $company_size,
            'project_team_size' => $project_team_size,
            'percent_workload' => $percent_workload,
            'day_holiday' => $day_holiday,
            'office_hours_from' => $office_hours_from,
            'office_hours_to' => $office_hours_to,
            'day_travel' => $day_travel,
            'day_relocation' => $day_relocation,
            'upload_file' => $filename,
            'updated_at' => Carbon::now()
        ]);

        Session::flash('applicationSaveOk', 'Application saved correctly.');
        return redirect('admin/application');
    }

    public function destroy($id)
    {
        $path = storage_path('applications');
        $photo = Application::find($id)->upload_file;

        if (File::exists($path . "/" . $photo)) {
            File::delete($path . "/" . $photo);
        }

        Application::destroy($id);
        Session::flash('ApplicationDestroyOk', 'Application removed correctly.');
        return redirect('admin/application/');
    }
}
