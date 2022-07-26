<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLotRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:50',
            'description' => 'required|min:5|max:5000',
            'categories' => 'required|exists:categories,id',
        ];
    }
}
