<?php

namespace App\Http\Requests\Group;

use Illuminate\Foundation\Http\FormRequest;

class newGroup extends FormRequest
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
            'hierarchy_level'   =>  'bail|required|unique:groups',
            'name'              =>  'required',
            'tag'               =>  'required',
            'tag_color'         =>  'bail|required|not_in:#ffffff',
            'permissions'       =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'hierarchy_level.unique'    =>  'Este nível já está sendo utilizado',
            'tag_color.not_in'          =>  'Esta cor não é aceita',
        ];
    }
}