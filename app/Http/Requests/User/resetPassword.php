<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class resetPassword extends FormRequest
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
        session()->flash('notification', 'error:Preencha os campos corretamente');
        return [
            'email' =>  'bail|required|exists:users'
        ];
    }

    public function messages()
    {
        return [
            'email.exists'  =>  'Registro não encontrado',
        ];
    }
}
