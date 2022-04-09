<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $canidateId = optional($this->candidate)->id;
        $isRequired = request()->method == 'PATCH' ? 'nullable' : 'required';

        return [
            'name'             => 'required|string|min:3|max:100',
            'email'            => 'required|email|unique:candidates,email,' . $canidateId,
            'phone'            => 'required|min:5|unique:candidates,phone,' . $canidateId,
            'education'        => 'required|string',
            'dob'              => 'required|date',
            'experience'       => 'required',
            'last_position'    => 'required',
            'applied_position' => 'required',
            'skills'           => [
                                    'required',
                                    function($attr, $value, $message) {
                                        $skills = count(explode(',', $value));

                                        if ($skills < 5) {
                                            return $message(trans('validation.min.array', ['min' => 5]));
                                        }
                                    }
                                ],
            'resume'           => $isRequired . '|file|mimes:pdf|max:5000'
        ];
    }
}
