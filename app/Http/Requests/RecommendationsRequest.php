<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecommendationsRequest extends FormRequest
{
    protected $rules = [
        'worker_id' => ['required', 'numeric'],
        'recommendation' => ['required', 'max:65000'],
        'author' => ['required', 'max:250'],
        'work_author' => ['required', 'max:250'],
        'profile_author' => ['required', 'max:250', 'url'],
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
            'worker_id.required' => 'Select worker.',
            'worker_id.numeric' => 'Select worker must be a numeric.',
            
            'recommendation.required' => 'The field Recommendation is required.',
            'recommendation.max' => 'The maximum length of the Recommendation field is 65000 characters.',
            
            'author.required' => 'The field Author is required.',
            'author.max' => 'The maximum length of the Author field is 250 characters.',

            'work_author.required' => 'The field Work author is required.',
            'work_author.max' => 'The maximum length of the Work Author field is 250 characters.',

            'profile_author.required' => 'The field Profile author is required.',
            'profile_author.max' => 'The maximum length of the Profile author field is 250 characters.',
            'profile_author.url' => 'Profile author must been URL address.',
        ];
    }
}