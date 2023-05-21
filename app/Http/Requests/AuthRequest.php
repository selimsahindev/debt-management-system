<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        if ($this->is('register')) {
            return [
                'firstName' => 'required|string',
                'lastName' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string|confirmed|min:6',
            ];
        }

        if ($this->is('login')) {
            return [
                'email' => 'required|string',
                'password' => 'required|string|min:6',
                'rememberMe' => 'nullable|boolean',
            ];
        }

        return [];
    }
}
