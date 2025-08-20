<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'make_model' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'year' => ['required', 'integer', 'min:1900', 'max:'.(date('Y') + 1)],
            'price' => ['required', 'integer', 'min:0'],
            'photo' => ['nullable', 'image', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'make_model.required' => 'The make and model field is required.',
            'description.required' => 'The description field is required.',
            'year.min' => 'The year must be at least 1900.',
            'year.max' => 'The year cannot be more than next year.',
            'price.min' => 'The price must be at least 0.',
            'photo.image' => 'The photo must be an image file.',
            'photo.max' => 'The photo may not be greater than 2MB.',
        ];
    }
}
