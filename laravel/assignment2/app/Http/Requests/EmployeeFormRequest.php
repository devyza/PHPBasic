<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormRequest extends FormRequest
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
        $nameRule = ['required', 'max:255'];

        return [
            'name' => $nameRule,
            'jobTitle' => $nameRule,
            'email' => ['required', 'unique:employees'],
            'nationality' => $nameRule,
            'company_id' => ['exists:companies,id', 'numeric']
        ];
    }
}
