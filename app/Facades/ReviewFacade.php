<?php

namespace App\Facades;

use App\Data\Review\ReviewRequestData;
use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Facade;

/**
 * @method static list(string $type, int $id)
 * @method static JsonResponse create(ReviewRequestData $data, string $type, int $id)
 * @method static show(Review $review)
 * @method static JsonResponse update(ReviewRequestData $data, Review $review)
 * @method static JsonResponse delete(Review $review)
 *
 * @see BookService
 */
class ReviewFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'reviewService';
    }
}
