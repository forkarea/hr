<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkersUpdateRequest extends FormRequest
{
    protected $rules = [
        'name' => ['required', 'max:255'],
        'description' => ['required', 'max:65000'],
        'profile_worker' => ['required', 'max:250', 'url'],
        'photo' => ['nullable', 'file', 'mimes:jpg,jpeg,png'],
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
            'name.required' => 'The field name is required.',
            'name.numeric' => 'The maximum length of the name field is 250 characters.',

            'description.required' => 'The field description is required.',
            'description.max' => 'The maximum length of the description field is 65000 characters.',

            'profile_worker.required' => 'The field profile worker is required.',
            'profile_worker.max' => 'The maximum length of the profile worker field is 250 characters.',
            'profile_worker.url' => 'Profile worker must been URL address .',

            'photo.file' => 'Must be a file',
            'photo.mimes' => 'Format only: jpg, jpeg, png.',
        ];
    }
}