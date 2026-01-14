<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCinemaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cinemaName' => 'required|string|max:255',
            'adress' => 'nullable|string|max:255',
            'screenSize' => 'nullable|numeric',
        ];
    }
}
