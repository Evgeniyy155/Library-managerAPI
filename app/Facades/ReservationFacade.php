<?php

namespace App\Facades;

use App\Data\Reservation\ReservationRequestData;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Facade;

/**
 * @method static list()
 * @method static JsonResponse create(ReservationRequestData $data, User $user)
 * @method static show(Reservation $reservation)
 * @method static JsonResponse delete(Reservation $reservation)
 *
 * @see BookService
 */
class ReservationFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'reservationService';
    }
}
