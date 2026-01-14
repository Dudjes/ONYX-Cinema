<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'when' => 'required|date',
            'movieId' => 'required|exists:movies,movieId',
            'hallId' => 'required|exists:halls,hallId',
            'cinemaId' => 'required|exists:cinemas,cinemaId',
        ];
    }
}
