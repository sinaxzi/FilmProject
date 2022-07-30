<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMovieValidattionRequest extends FormRequest
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
                'title' => 'required|min:6',
                'year' => 'required|digits:4',
                'runtime' => 'required|integer',
                'director' => 'required|min:6',
                'actors' => 'required|min:6',
                'plot' => 'required|min:6',
        ];
    }
}
