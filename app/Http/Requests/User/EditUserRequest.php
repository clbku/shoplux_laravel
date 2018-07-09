<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'old_password'=>'required',
            're-password'=>'same:password'
        ];
    }

    public function messages()
    {
        return [
            'old_password.required'=>'Vui lòng nhập mật khẩu',
            're-password.same'=>'Mật khẩu không giống nhau',
        ];
    }
}
