<?php

namespace App\Services;


use App\Data\Review\ReviewData;
use App\Data\Review\ReviewRequestData;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Spatie\LaravelData\DataCollection;

class ReviewService
{
    protected array $modelMapping = [
      'books' => Book::class,
    ];

    public function list($type, $id)
    {
        $modelClass = $this->resolveModelClass($type);
        $model = $modelClass::query()->findOrFail($id);
        $reviews = $model->reviews()->with('user')->get();
        return ReviewData::collect($reviews, DataCollection::class);
    }

    public function create(ReviewRequestData $data, string $type, int $id): JsonResponse
    {
        $modelClass = $this->resolveModelClass($type);
        $model = $modelClass::query()->findOrFail($id);
        $user = auth()->user();
        $review = $model->reviews()->create(array_merge([
            'user_id' => $user->id
        ], $data->toArray()));
        return responseSuccess('Review added successfully', ['data' => ReviewData::from($review)], 201);
    }

    public function show(Review $review)
    {
        return ReviewData::from($review);
    }
    public function update(ReviewRequestData $data, Review $review): JsonResponse
    {
        $review->update($data->toArray());
        return responseSuccess('Review updated successfully', ['data' => ReviewData::from($review)]);
    }

    public function delete(Review $review): JsonResponse
    {
        $review->delete();
        return responseSuccess('Review deleted successfully');
    }

    protected function resolveModelClass(string $type)
    {
        if(!array_key_exists($type, $this->modelMapping)){
            abort(404, 'Invalid type provided');
        }
        return $this->modelMapping[$type];
    }
}
