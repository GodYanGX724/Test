<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;


class MyRequest extends FormRequest
{

    // protected $redirect = "/myerror";

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'uid' => 'required|min:3|max:5|unique:userinfo,uid',
            'password'=> [
                'required',
                'confirmed',
                Password::min(4)
                      ->mixedCase()
                      ->letters()
                      ->numbers()
                      ->symbols()
                
                ]
        ];
    }


    function messages(){
        return [
            'uid.required'=>'欄位為必填',
            'uid.max'=>'帳號長度超過:max個字',
            'uid.min'=> '帳號長度小於:min個字',
            'password.confirmed' => '密碼不一致'
        ];
    }
}
