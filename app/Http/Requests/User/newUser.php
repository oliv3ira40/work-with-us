<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class newUser extends FormRequest
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
            'first_name'    =>  'bail|required|string',
            'last_name'     =>  'nullable',
            'email'         =>  'bail|required|email|unique:users',
            'telephone'     =>  'bail|nullable|max:20',
            'cpf'           =>  'bail|nullable|numeric|unique:users',
            'password'      =>  'bail|required|min:5|confirmed',
            'login'         =>  'nullable',
            'group_id'      =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'cpf.numeric'=> 'Apenas números neste campo',
            'email.unique'=> 'Este E-MAIL já esta sendo utilizado',
            'cpf.unique'=> 'Este CPF já esta sendo utilizado',
            'telephone.numeric' =>  'Somente números neste campo'
        ];
    }
}
