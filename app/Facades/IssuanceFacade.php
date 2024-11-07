<?php

namespace App\Facades;

use App\Data\Issuance\IssuanceRequestData;
use App\Models\Issuance;
use App\Models\Reservation;
use App\Services\IssuanceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Facade;

/**
 * @method static JsonResponse store(IssuanceRequestData $data, Reservation $reservation)
 * @method static JsonResponse delete(Issuance $issuance)
 *
 * @see IssuanceService
 */
class IssuanceFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'issuanceService';
    }
}
