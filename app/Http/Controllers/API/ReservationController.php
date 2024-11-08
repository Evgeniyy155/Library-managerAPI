<?php

namespace App\Http\Controllers\API;

use App\Data\Reservation\ReservationRequestData;
use App\Facades\ReservationFacade;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index(): JsonResponse
    {
        return ReservationFacade::list();
    }

    public function store(ReservationRequestData $data, Request $request): JsonResponse
    {
        return ReservationFacade::create($data, $request->user());
    }

    public function show(Reservation $reservation)
    {
        return ReservationFacade::show($reservation);
    }

    public function destroy(Reservation $reservation): JsonResponse
    {
        return ReservationFacade::delete($reservation);
    }
}
