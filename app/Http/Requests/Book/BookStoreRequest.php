<?php

namespace App\Http\Requests\Book;

use App\Rules\ValidPublishedYear;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class BookStoreRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'authors' => ['required', 'array'],
            'authors.*' => ['exists:authors,id'],
            'genre_id' => ['required', 'exists:genres,id'],
            'isbn' => ['required', 'string', $this->getUniqueRule()],
            'published_year' => ['required', new ValidPublishedYear()],
        ];
    }

    protected function prepareForValidation(): void
    {
        if(is_int($this->authors)){
            $this->merge([
                'authors' => [$this->authors]
            ]);
        }
    }

    protected function getUniqueRule(): Unique
    {
        return Rule::unique('books', 'isbn');
    }
}
