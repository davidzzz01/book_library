<?php

namespace App\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:255',
            'bio' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'nationality' => 'nullable|string|max:100'
        ];
    }
}
