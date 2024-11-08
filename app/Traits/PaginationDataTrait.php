<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;

trait PaginationDataTrait
{
    /**
     *
     * @param LengthAwarePaginator $paginator
     * @return JsonResponse
     */
    public static function toPaginatedJsonResponse(LengthAwarePaginator $paginator): JsonResponse
    {
        if(!method_exists(static::class, 'collect')){
            throw new \LogicException("Class " . static::class . " must implement a 'collect' method to use PaginationDataTrait");
        }

        return response()->json([
            'data' => static::collect($paginator->items()),
            'meta' => [
                'current_page' => $paginator->currentPage(),
                'first_page_url' => $paginator->url(1),
                'from' => $paginator->firstItem(),
                'last_page' => $paginator->lastPage(),
                'last_page_url' => $paginator->url($paginator->lastPage()),
                'next_page_url' => $paginator->hasMorePages() ? $paginator->nextPageUrl() : null,
                'path' => $paginator->path(),
                'per_page' => $paginator->perPage(),
                'prev_page_url' => $paginator->previousPageUrl(),
                'to' => $paginator->lastItem(),
                'total' => $paginator->total(),
            ],
        ]);
    }
}
