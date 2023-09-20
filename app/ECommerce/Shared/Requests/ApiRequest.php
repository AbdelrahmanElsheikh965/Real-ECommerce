<?php

namespace App\ECommerce\Shared\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

abstract class ApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    abstract public function authorize(): bool;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    abstract public function rules(): array;

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        if (! empty($errors)) {
            throw new HttpResponseException(response()->json([
                'status' => JsonResponse::HTTP_BAD_REQUEST,
                'error' => 'error'
            ]));
        }
    }

}
