<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'movieName' => 'required|string|max:255',
            'ageRequirement' => 'required|string|max:255',
            'duration' => ['required', 'date_format:H:i'],
            'genre_id' => ['required', 'array'],
            'genre_id.*' => ['exists:genres,genreId'],
            'description' => ['nullable', 'string'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'image' => ['nullable', 'string', 'max:2048'],
        ];
    }
}
