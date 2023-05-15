<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RequestTask extends FormRequest
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
            'date_delivery'   => 'required|date',
            'name'   => 'required',
            'description'   => 'required',
            'number_hour'   => 'required',
            'start_register'   => 'required|date',
            'end_register'   => 'required|date|after_or_equal:start_register',
            'number_volunteer'   => 'required',
        ];
    }


    public function messages()
      {
        return [
            'date_delivery.required' => ' يحب إدخال تاريخ التسليم للمهمة   ',
            'name.required' => ' يحب إدخال عنوان المهمة   ',
            'description.required' => ' يحب إدخال الوصف للمهمة   ',
            'date.date' => ' يحب إدخال تاريخ الفعالية',
            'number_hour.required' => ' يحب إدخال عدد الساعات التطوعية المقدرة ',
            'start_register.required' => 'يحب إدخال هذا الحقل ',
            'start_register.date' => ' يحب إدخال تاريخ ',
            'end_register.required' => ' يحب إدخال هذا الحقل ',
            'end_register.date' => ' يحب إدخال تاريخ ',
            'end_register.after_or_equal' => ' يحب إدخال تاريخ النهاية أكبر من تاريخ البدأ',
            'number_volunteer.required' => ' يحب إدخال رقم المتطوعين ',
        ];
     }


     public function failedValidation(Validator $validator)

     {

         throw new HttpResponseException(response()->json([

             'code'=>401,
             'success'=> false,
             'message'=> $validator->errors()

         ]));

     }
}
