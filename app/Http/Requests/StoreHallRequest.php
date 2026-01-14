<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHallRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'hallNumber' => 'required|integer',
            'capacity' => 'required|integer',
            'cinemaId' => 'required|exists:cinemas,cinemaId',
        ];
    }
}
