<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // se quiser controlar permissões, coloca aqui
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rate' => 'required|numeric',
            'duration' => 'nullable|string|max:255',
        ];
    }
}
