<?php

namespace App\Services;

use App\Data\Reservation\ReservationData;
use App\Data\Reservation\ReservationRequestData;
use App\Enums\BookStatus;
use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelData\DataCollection;

class ReservationService
{
    public function list()
    {
        return ReservationData::collect(Reservation::all(), DataCollection::class);
    }

    public function create(ReservationRequestData $data, User $user)
    {
        return DB::transaction(function () use ($data, $user) {
            $reservedAt = now();
            $expiresAt = $reservedAt->addDays($data->duration);
            $book = Book::query()->find($data->book_id);
            $reservation = Reservation::query()->create([
                'user_id' => $user->id,
                'book_id' => $data->book_id,
                'reserved_at' => $reservedAt,
                'expires_at' => $expiresAt
            ]);
            $book->update(['status' => BookStatus::RESERVED->value]);
            return responseSuccess('Reservation created successfully',
                ['data' => ReservationData::from($reservation)], 201);
        });
    }

    public function show(Reservation $reservation)
    {
        return ReservationData::from($reservation);
    }

    public function delete(Reservation $reservation)
    {
        return DB::transaction(function () use ($reservation) {
            $book = Book::query()->findOrFail($reservation->book_id);
            $reservation->delete();
            $book->update(['status' => BookStatus::AVAILABLE->value]);
            return responseSuccess('Reservation deleted successfully');
        });

    }
}
