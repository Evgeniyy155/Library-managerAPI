<?php

namespace App\Http\Controllers\API;

use App\Data\Author\AuthorData;
use App\Data\Author\AuthorRequestData;
use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\LaravelData\DataCollection;

class AuthorController extends Controller
{
    public function index()
    {
        return AuthorData::collect(Author::all(), DataCollection::class);
    }

    public function store(AuthorRequestData $data): JsonResponse
    {
        $author = Author::query()->create($data->toArray());
        return responseSuccess('Author created successfully', ['data' => AuthorData::from($author)], 201);
    }

    public function show(Author $author)
    {
        return AuthorData::from($author);
    }

    public function update(AuthorRequestData $data, Author $author): JsonResponse
    {
        $author->update($data->toArray());
        return responseSuccess('Author updated successfully', ['data' => AuthorData::from($author)]);

    }

    public function destroy(Author $author): JsonResponse
    {
        $author->delete();
        return responseSuccess('Author deleted successfully');
    }
}
