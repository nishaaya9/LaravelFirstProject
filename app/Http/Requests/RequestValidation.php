<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'contact' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg,jfif|max:3020'
        ];
    }
    public function messages()
    {
        return [
            'name' => 'Name Required',

        ];
    }
}
