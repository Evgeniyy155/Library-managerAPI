<?php

namespace App\Facades;

use App\Data\Book\BookRequestData;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Facade;

/**
 * @method static list()
 * @method static JsonResponse create(BookRequestData $data)
 * @method static show(Book $book)
 * @method static JsonResponse update(BookRequestData $data, Book $book)
 * @method static JsonResponse delete(Book $book)
 *
 * @see BookService
 */
class BookFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'bookService';
    }
}
