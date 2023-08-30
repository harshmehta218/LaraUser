<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class create extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|max:8',
            'contact_number' => 'numeric|digits:10',
            'address' => 'required',
            'files[]' => 'mimes:jpeg,jpg,png|max:50000',
            'role' => 'required|in:suppliers,resellers'
        ];
    }
}
