<?php

namespace App\Http\Controllers\API;

use App\Data\Issuance\IssuanceRequestData;
use App\Facades\IssuanceFacade;
use App\Http\Controllers\Controller;
use App\Models\Issuance;
use App\Models\Reservation;
use Illuminate\Http\JsonResponse;

class IssuanceController extends Controller
{
    public function store(IssuanceRequestData $data, Reservation $reservation): JsonResponse
    {
        return IssuanceFacade::store($data, $reservation);
    }

    public function return(Issuance $issuance): JsonResponse
    {
        return IssuanceFacade::delete($issuance);
    }
}
