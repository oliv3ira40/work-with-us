<?php

namespace App\Http\Requests\CreatedPermission;

use Illuminate\Foundation\Http\FormRequest;

class newPermission extends FormRequest
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
            'textarea'=>'required',
        ];
    }
}
