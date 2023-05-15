<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'   => 'required|unique:projects,title',
            'description'   => 'required',
            'deadline' => 'date|required',
            'assigned_user' => 'numeric|required',
            'assigned_client' => 'numeric|required',
            'status' => 'required',

        ];
    }




     public function failedValidation(Validator $validator)

     {
        return back()->with(['message'=>$validator->errors()]);

     }
}
