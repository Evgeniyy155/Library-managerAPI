<?php

namespace App\Http\Requests\Book;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class BookUpdateRequest extends BookStoreRequest
{
    protected function getUniqueRule(): Unique
    {
        $book = $this->route('book');
        return Rule::unique('books','isbn')->ignore($book);
    }
}
