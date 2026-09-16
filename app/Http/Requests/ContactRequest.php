<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'linkedin' => ['required', 'url', 'max:255', 'regex:/linkedin\.com/i'],
            'subject' => 'required|string|max:255',
            'budget' => 'nullable|string|max:100',
            'message' => 'required|string|max:5000',
            'source' => 'nullable|string|max:255',
        ];
    }
}
