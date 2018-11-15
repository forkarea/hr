<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormsRequest;
use Input;
use DB;
use Carbon\Carbon;

class FormsController extends Controller
{

    public function send(FormsRequest $request)
    {

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
        

        $getSubject = "Zgłoszenie collectivehr.com,mateusz@collectivehr.com";
        $myEmail = 'm.glowacki92@gmail.com, mateusz@collectivehr.com';

        $uid = md5(uniqid(time()));
        $eol = "\r\n";

        // header
        $header = "From: " . $name . " <" . $email . ">\r\n";
        $header .= "MIME-Version: 1.0" . $eol;
        $header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"" . $eol;
        $header .= "Content-Transfer-Encoding: 7bit" . $eol;
        $header .= "This is a MIME encoded message." . $eol;

        // message & attachment
        $nmessage = "--" . $uid . "\r\n";
        $nmessage .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
        $nmessage .= "Content-Transfer-Encoding: 8bit" . $eol;
        if($name != ''){$nmessage .= "Name: " . $name . "\r\n\r\n";}
        if($phone != ''){$nmessage .= "Phone: " . $phone . "\r\n\r\n";}
        if($email != ''){$nmessage .= "E-mail: " . $email . "\r\n\r\n";}
        if($job_title != ''){$nmessage .= "Job title: " . $job_title . "\r\n\r\n";}
        if($company_name != ''){$nmessage .= "Company name: " . $company_name . "\r\n\r\n";}
        if($location != ''){$nmessage .= "Location: " . $location . "\r\n\r\n";}
        if($type_salary != ''){$nmessage .= "Type salary: " . $type_salary . "\r\n\r\n";}
        if($start_date != ''){$nmessage .= "Start date: " . $start_date . "\r\n\r\n";}
        if($percent_work != ''){$nmessage .= "Percent work: " . $percent_work . "\r\n\r\n";}
        if($must_have != ''){$nmessage .= "Must have: " . $must_have . "\r\n\r\n";}
        if($nice_have != ''){$nmessage .= "Nice have: " . $nice_have . "\r\n\r\n";}
        if($languages != ''){$nmessage .= "Languages: " . $languages . "\r\n\r\n";}
        if($type_work != ''){$nmessage .= "Type work: " . $type_work . "\r\n\r\n";}
        if($project_industry != ''){$nmessage .= "Project industry: " . $project_industry . "\r\n\r\n";}
        if($company_size != ''){$nmessage .= "Company size: " . $company_size . "\r\n\r\n";}
        if($project_team_size != ''){$nmessage .= "Project team size: " . $project_team_size . "\r\n\r\n";}
        if($percent_workload != ''){$nmessage .= "Percent workload: " . $percent_workload . "\r\n\r\n";}
        if($day_holiday != ''){$nmessage .= "Day holiday: " . $day_holiday . "\r\n\r\n";}
        if($office_hours_from != ''){$nmessage .= "Office hours from: " . $office_hours_from . "\r\n\r\n";}
        if($office_hours_to != ''){$nmessage .= "Office hours to: " . $office_hours_to . "\r\n\r\n";}
        if($day_travel != ''){$nmessage .= "Day travel: " . $day_travel . "\r\n\r\n";}
        if($day_relocation != ''){$nmessage .= "Day relocation: " . $day_relocation . "\r\n\r\n";}

        // attachment
        if($upload_file != null || $upload_file != ''){            
            $filename = substr(md5(uniqid(time())), 0, 20) . '.' . $upload_file->getClientOriginalExtension();
            $path = storage_path('applications');
            $save = $upload_file->move($path, $filename);
            $file = $path . "/" . $filename;

            $content = file_get_contents($file);
            $content = chunk_split(base64_encode($content));

            $nmessage .= "--" . $uid . $eol;
            $nmessage .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
            $nmessage .= "Content-Transfer-Encoding: base64" . $eol;
            $nmessage .= "Content-Disposition: attachment" . $eol;
            $nmessage .= $content . $eol;
            $nmessage .= "--" . $uid . "--";
        } else {
            $filename = null;
        }

        // $nmessage .= "Wiadomość:\r\n" . $getMessage . "\r\n\r\n";
        $nmessage .= "--" . $uid . "\r\n";
        $nmessage .= "Content-Transfer-Encoding: base64\r\n";
        $nmessage .= "--" . $uid . "--";

        $send = mail($myEmail, $getSubject, $nmessage, $header);

        if ($send) {
            //save to DB table applications
            $applications = DB::table('applications')->insert([
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
        }

    }
}
