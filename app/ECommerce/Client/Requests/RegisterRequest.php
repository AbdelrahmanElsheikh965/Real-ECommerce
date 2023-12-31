<?php

namespace App\ECommerce\Client\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => 'required',      'last_name' => 'required',
            'gender' => 'required',          'password' => 'required|confirmed|min:8',
            'email' => 'required|email:filter|unique:clients'
        ];
    }
}
