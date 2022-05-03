<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskStatusRequest extends FormRequest
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
            'name' => ['required', Rule::unique('task_statuses')->ignore($this->route('task_status')->id)]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('This is a required field'),
            'name.unique' => __('A status with the same name already exists'),
        ];
    }
}
