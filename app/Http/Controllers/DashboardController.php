<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', [
            'roomCount' => Room::query()->where('is_active', true)->count(),
            'reservationCount' => Reservation::query()->count(),
            'upcomingReservations' => Reservation::query()->with('room')->whereDate('date', '>=', today())->orderBy('date')->orderBy('start_time')->take(3)->get(),
        ]);
    }
}
