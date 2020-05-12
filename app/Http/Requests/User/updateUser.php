<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Admin\User;


class updateUser extends FormRequest
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
        $editable_user = User::find($this->id);
        $this->cpf = str_replace(['.', '-'], '', $this->cpf);

        session()->flash('notification', 'error:Preencha os campos corretamente');
        return [
            'first_name'    =>  'bail|required|string',
            'last_name'     =>  '',
            'email'         =>  ($editable_user->email == $this->email) ? 'bail|required|email' : 'bail|required|email|unique:users',
            'telephone'     =>  'bail|nullable|max:20',
            'password'      =>  'bail|nullable|min:5|confirmed',
            'login'         =>  'nullable',
            'group_id'      =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'email.unique'      =>  'Este E-MAIL já esta sendo utilizado',
            'telephone.numeric' =>  'Somente números neste campo'
        ];
    }
}
