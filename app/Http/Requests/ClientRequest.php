<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ClientRequest extends FormRequest
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
            'phone'   => 'required|unique:clients,phone',
            'email'   => 'required|email|unique:clients,email',
            'image' => 'required|mimes:png,jpg',
            'name' => 'required',

        ];
    }




     public function failedValidation(Validator $validator)

     {
        return back()->with(['message'=>$validator->errors()]);

     }
}
