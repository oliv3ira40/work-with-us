<?php

namespace App\Http\Requests\Reports\AutoReport;

use Illuminate\Foundation\Http\FormRequest;

class getInforFromFiles extends FormRequest
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
        // dd($this->request);

        return [
            'name'                              =>  'required',
            'report_objective_description'      =>  'required',
            'clarifications_recommendations'    =>  'bail|required',
            'files'                             =>  'bail|required|array',
        ];
    }

    public function messages()
    {
        return [
            'files.required' => 'Nenhum arquivo inserido',
        ];
    }
}
