<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLabelRequest extends FormRequest
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
            'name' => ['required', Rule::unique('labels')->ignore($this->route('label')->id ?? null)],
            'description' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('This is a required field'),
            'name.unique' => __('A label with the same name already exists'),
        ];
    }
}
