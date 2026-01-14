<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'seat' => 'required|string|max:10',
            'playId' => 'required|exists:plays,playId',
            'userId' => 'required|exists:users,id',
            'isSold' => 'required|boolean',
        ];
    }
}
