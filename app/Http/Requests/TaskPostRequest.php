<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class TaskPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title'   => 'required',
            'description'   => 'required',
            'deadline' => 'date|required',
            'assigned_user' => 'numeric|required',
            'id_project' => 'numeric|required',
            'status' => 'required',

        ];
    }




     public function failedValidation(Validator $validator)

     {
        return back()->with(['message'=>$validator->errors()]);

     }
}
