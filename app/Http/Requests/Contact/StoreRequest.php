<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'surname' => 'nullable|string',
            'name' => 'required|string',
            'patronymic' => 'nullable|string',
            'phone' => 'required|integer',
            'email' => 'nullable|email',
            'birthday' => 'nullable|date'
        ];
    }
}
