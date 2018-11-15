<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationsRequest extends FormRequest
{
    protected $rules = [
        'name' => ['required', 'max:255'],
        'phone' => ['required', 'max:255'],
        'email' => ['required', 'max:255', 'email'],
        'job_title' => ['required', 'max:255'],
        'company_name' => ['required', 'max:255'],
        'location' => ['required', 'max:255'],
        'type_salary' => ['required', 'digits_between:1,10','min:0', 'max:2147483647', 'numeric'],
        'start_date' => ['required', 'max:255'],
        'percent_work' => ['nullable ', 'digits_between:1,10','min:0', 'max:2147483647', 'numeric'],
        'upload_file' => ['file', 'mimes:jpg,jpeg,png,pdf,doc,docx,xlsx,txt'],
        'must_have' => ['required','max:255'],
        'nice_have' => ['required','max:255'],
        'languages' => ['required','max:255'],
        'type_work' => ['max:255'],
        'project_industry' => ['max:255'],
        'company_size' =>'nullable ',  ['digits_between:1,10','min:0', 'max:2147483647','numeric'],
        'project_team_size' => ['nullable ', 'digits_between:1,10','min:0', 'max:2147483647', 'numeric'],
        'percent_workload' => ['nullable ', 'digits_between:1,10','min:0', 'max:2147483647', 'numeric'],
        'day_holiday' => ['nullable ', 'digits_between:1,10','min:0', 'max:2147483647', 'numeric'],
        'office_hours' => ['max:255'],
        'day_travel' => ['nullable ', 'digits_between:1,10','min:0', 'max:2147483647', 'numeric'],
        'day_relocation' => ['nullable ', 'digits_between:1,10','min:0', 'max:2147483647', 'numeric']
    ];


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The maximum number of characters in the name field is 250.',

            'phone.required' => 'The phone field is required.',
            'phone.max' => 'The maximum number of characters in the phone field is 250.',

            'email.required' => 'The email field is required.',
            'email.max' => 'The maximum number of characters in the email field is 250.',
            'email.email' => 'The email address provided is not valid.',

            'job_title.required' => 'The job title field is required.',
            'job_title.max' => 'The maximum number of characters in the job title field is 250.',

            'company_name.required' => 'The company name field is required.',
            'company_name.max' => 'The maximum number of characters in the company name field is 250.',

            'location.required' => 'The location field is required.',
            'location.max' => 'The maximum number of characters in the location field is 250.',

            'type_salary.required' => 'The type salary field is required.',
            'type_salary.digits' => 'The maximum number of characters in the type salary field is 10.',
            'type_salary.numeric' => 'The type salary field must be a number.',
            'type_salary.min' => 'The minimum value in the type salary field is 0.',
            'type_salary.max' => 'The maximum value in the type salary field is 2147483647.',

            'start_date.required' => 'The start date field is required.',
            'start_date.max' => 'The maximum number of characters in the start date field is 250.',

            'percent_work.digits' => 'The maximum number of characters in the percent work field is 10.',
            'percent_work.numeric' => 'The percent work field must be a number.',
            'percent_work.min' => 'The minimum value in the percent work field is 0.',
            'percent_work.max' => 'The maximum value in the percent work field is 2147483647.',
            
            'upload_file.mimes' => 'Allowed file format: jpg, jpeg, png, pdf, doc, docx, xlsx, txt.',
            
            'must_have.max' => 'The maximum number of characters in the must have field is 250.',
            'must_have.required' => 'The must have field is required.',

            'nice_have.max' => 'The maximum number of characters in the nice have field is 250.',
            'nice_have.required' => 'The nice have field is required.',

            'languages.max' => 'The maximum number of characters in the languages field is 250.',
            'languages.required' => 'The languages field is required.',

            'type_work.max' => 'The maximum number of characters in the type work field is 250.',
            
            'project_industry.max' => 'The maximum number of characters in the project industry field is 250.',

            'company_size.digits' => 'The maximum number of characters in the company size field is 10.',
            'company_size.numeric' => 'The company size field must be a number.',
            'company_size.min' => 'The minimum value in the company size field is 0.',
            'company_size.max' => 'The maximum value in the company size field is 2147483647.',

            'project_team_size.digits' => 'The maximum number of characters in the project team size field is 10.',
            'project_team_size.numeric' => 'The project team size field must be a number.',
            'project_team_size.min' => 'The minimum value in the project team field is 0.',
            'project_team_size.max' => 'The maximum value in the project team field is 2147483647.',

            'percent_workload.digits' => 'The maximum number of characters in the percent workload field is 10.',
            'percent_workload.numeric' => 'The percent workload field must be a number.',
            'percent_workload.min' => 'The minimum value in the percent workload field is 0.',
            'percent_workload.max' => 'The maximum value in the percent workload field is 2147483647.',

            'day_holiday.digits' => 'The maximum number of characters in the day holiday field is 10.',
            'day_holiday.numeric' => 'The day holiday field must be a number.',
            'day_holiday.min' => 'The minimum value in the day holiday field is 0.',
            'day_holiday.max' => 'The maximum value in the day holiday field is 2147483647.',

            'office_hours.max' => 'The maximum number of characters in the office hours field is 250.',

            'day_travel.digits' => 'The maximum number of characters in the day travel field is 10.',
            'day_travel.numeric' => 'The day travel field must be a number.',
            'day_travel.min' => 'The minimum value in the day travel field is 0.',
            'day_travel.max' => 'The maximum value in the day travel field is 2147483647.',

            'day_relocation.digits' => 'The maximum number of characters in the day relocation field is 10.',
            'day_relocation.numeric' => 'The day relocation field must be a number.',
            'day_relocation.min' => 'The minimum value in the day relocation field is 0.',
            'day_relocation.max' => 'The maximum value in the day relocation field is 2147483647.',
        ];
    }
}