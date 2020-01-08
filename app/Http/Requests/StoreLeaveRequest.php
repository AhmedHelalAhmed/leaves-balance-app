<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeaveRequest extends FormRequest
{
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
        return [
            'from_date'=>['required','date'],
            'to_date'=>['required','date'],
            'type'=>['required','between:1,2','integer'],
            'reason'=>['required','string'],
            'status'=>['nullable','between:0,1','integer'],
        ];
    }
}
