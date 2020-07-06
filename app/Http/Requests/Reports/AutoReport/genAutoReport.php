<?php

namespace App\Http\Requests\Reports\AutoReport;

use Illuminate\Foundation\Http\FormRequest;

class genAutoReport extends FormRequest
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
            'name'                              => 'required',
            'report_objective_description'      => 'required',
            'clarifications_recommendations'    => 'bail|required',
            'subtopics_errors'                  => 'bail|required|array',
            'topics_errors'                     => 'bail|required|array',
        ];
    }

    public function messages()
    {
        return [
            'subtopics_errors.required'     => 'Nenhum arquivo inserido',
            'topics_errors.required'        => 'Nenhum arquivo inserido',
        ];
    }
}
