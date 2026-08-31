<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReservationController extends Controller
{
    public function index(): View
    {
        return view('reservations.index', [
            'reservations' => Reservation::query()->with(['room', 'user'])->orderBy('date')->orderBy('start_time')->get(),
        ]);
    }

    public function create(): View
    {
        return view('reservations.create', ['rooms' => Room::query()->where('is_active', true)->orderBy('name')->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'room_id' => ['required', 'integer', 'exists:rooms,id'],
            'date' => ['required', 'date'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i'],
            'purpose' => ['required', 'string', 'max:160'],
            'participant_count' => ['required', 'integer', 'min:1'],
        ]);

        // INTENTIONAL STARTER GAP: candidates implement persistence, ownership,
        // capacity validation, and overlap detection for the assessment.
        return to_route('reservations.create')->withInput()->with('notice', 'Form diterima dalam mode starter. Implementasikan penyimpanan dan validasi bentrok sebagai bagian study case.');
    }

    public function show(Reservation $reservation): View
    {
        return view('reservations.show', ['reservation' => $reservation->load(['room', 'user'])]);
    }
}
