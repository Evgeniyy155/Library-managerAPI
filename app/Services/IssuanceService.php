<?php

namespace App\Services;

use App\Data\Issuance\IssuanceData;
use App\Data\Issuance\IssuanceRequestData;
use App\Enums\BookStatus;
use App\Models\Issuance;
use App\Models\Reservation;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class IssuanceService
{
    public function store(IssuanceRequestData $data, Reservation $reservation): JsonResponse
    {
        return DB::transaction(function () use ($data, $reservation) {
            $issuance = Issuance::query()->create([
                'user_id' => $reservation->user_id,
                'book_id' => $reservation->book_id,
                'issued_at' => now(),
                'due_date' => now()->addDays($data->loan_duration)
            ]);
            $reservation->book()->update(['status' => BookStatus::LOANED->value]);
            $reservation->delete();
            return responseSuccess("Issued created successfully",
                ['data' => IssuanceData::from($issuance)], 201);
        });
    }

    public function delete(Issuance $issuance): JsonResponse
    {
        return DB::transaction(function () use ($issuance) {
            $issuance->book()->update(['status' => BookStatus::AVAILABLE->value]);
            $issuance->update(['returned_at' => now()]);
            return responseSuccess('The book was returned successfully');
        });
    }
}
