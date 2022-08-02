<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchIndexRequest extends FormRequest
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
        $minYear = request('minYear');
        return [
            'search' => 'nullable|string|max:100',
            'minYear' => 'nullable|required_with:maxYear|digits:4',
            'maxYear' => "nullable|required_with:minYear|digits:4|numeric|min:$minYear",
        ];
    }
}
