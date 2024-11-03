<?php

namespace App\Http\Controllers\API;

use App\Data\Genre\GenreData;
use App\Data\Genre\GenreRequestData;
use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\JsonResponse;
use Spatie\LaravelData\DataCollection;

class GenreController extends Controller
{
    public function index()
    {
        return GenreData::collect(Genre::all(), DataCollection::class);
    }

    public function store(GenreRequestData $data): JsonResponse
    {
        $genre = Genre::query()->create($data->toArray());
        return responseSuccess('Category created successfully', ['data' => GenreData::from($genre)], 201);
    }

    public function show(Genre $genre)
    {
        return GenreData::from($genre);
    }

    public function update(GenreRequestData $data, Genre $genre): JsonResponse
    {
        $genre->update($data->toArray());
        return responseSuccess('Category updated successfully', ['data' => GenreData::from($genre)]);

    }

    public function destroy(Genre $genre): JsonResponse
    {
        $genre->delete();
        return responseSuccess('Category deleted successfully');
    }
}
