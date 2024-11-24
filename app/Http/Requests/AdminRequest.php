<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:30',
        ] + (
            $this->isMethod('POST') ? $this->store() : $this->update()
        );
    }
    protected function store(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8|string|confirmed',
        ];
    }
    protected function update(): array
    {
        return [
            'email' => 'required|email|unique:users,email,' . decrypt($this->route('admin')),
            'password' => 'nullable|confirmed|min:8|string|confirmed',
        ];
    }
}
