<?php

namespace App\Http\Controllers\API;

use App\Data\Book\BookRequestData;
use App\Facades\BookFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
class BookController extends Controller
{

    public function index()
    {
        return BookFacade::list();
    }

    public function store(BookStoreRequest $request): JsonResponse
    {
        return BookFacade::create(BookRequestData::from($request->validated()));
    }

    public function show(Book $book)
    {
        return BookFacade::show($book);
    }
    public function update(BookUpdateRequest $request, Book $book): JsonResponse
    {
        return BookFacade::update(BookRequestData::from($request->validated()), $book);
    }
    public function destroy(Book $book): JsonResponse
    {
        return BookFacade::delete($book);
    }
}
