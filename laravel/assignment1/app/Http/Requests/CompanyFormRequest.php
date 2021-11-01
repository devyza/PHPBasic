<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFormRequest extends FormRequest
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
            'name' => 'required|max:255',
            'country' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Name is required",
            'name.max' => "A name must be with 255 characters ",
            'country.required' => "Country is Required",
            'country.max' => "A country data must be with 255 characters"
        ];
    }
}
