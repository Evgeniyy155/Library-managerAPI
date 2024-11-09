<?php

namespace App\Http\Controllers\API;

use App\Data\Review\ReviewRequestData;
use App\Facades\ReviewFacade;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\JsonResponse;

class ReviewController extends Controller
{
    public function index(string $type, int $id)
    {
        return ReviewFacade::list($type, $id);
    }

    public function store(ReviewRequestData $data, string $type, int $id): JsonResponse
    {
        return ReviewFacade::create($data, $type, $id);
    }

    public function show(Review $review)
    {
        return ReviewFacade::show($review);
    }

    public function update(ReviewRequestData $data, Review $review): JsonResponse
    {
        return ReviewFacade::update($data, $review);
    }

    public function destroy(Review $review): JsonResponse
    {
        return ReviewFacade::delete($review);
    }
}
