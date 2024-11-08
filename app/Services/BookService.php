<?php

namespace App\Services;

use App\Data\Book\BookData;
use App\Data\Book\BookRequestData;
use App\Helpers\PaginationHelper;
use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookService
{
    public function list(): JsonResponse
    {
        return BookData::toPaginatedJsonResponse(Book::query()->paginate(PaginationHelper::getPerPage()));
    }


    public function create(BookRequestData $data): JsonResponse
    {
        $book = Book::query()->create($data->toArray());
        $book->authors()->sync($data->authors);
        return responseSuccess('Book created successfully', ['data' => BookData::from($book)], 201);
    }

    public function show(Book $book)
    {
        return BookData::from($book);
    }
    public function update(BookRequestData $data, Book $book): JsonResponse
    {
        $book->update($data->toArray());
        $book->authors()->sync($data->authors);
        return responseSuccess('Book updated successfully', ['data' => BookData::from($book)]);
    }

    public function delete(Book $book): JsonResponse
    {
        $book->delete();
        return responseSuccess('Book deleted successfully');
    }
}
