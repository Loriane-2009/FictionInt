<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'chapters' => 'required|array|min:1',
            'chapters.*.title' => 'required|string|max:255',
            'chapters.*.content' => 'required|string',
            'chapters.*.choices' => 'nullable|array',
            'chapters.*.choices.*.choice_text' => 'required|string|max:255',
            'chapters.*.choices.*.next_chapter_index' => 'nullable|integer|min:0',
        ];

        if ($this->isMethod('PATCH') || $this->isMethod('PUT')) {
            $rules['title'] = 'sometimes|required|string|max:255';
            $rules['chapters'] = 'sometimes|array';
        }

        return $rules;
        
    }
}
