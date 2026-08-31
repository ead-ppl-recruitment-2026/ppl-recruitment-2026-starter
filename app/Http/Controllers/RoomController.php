<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\View\View;

class RoomController extends Controller
{
    public function index(): View
    {
        return view('rooms.index', ['rooms' => Room::query()->where('is_active', true)->orderBy('name')->get()]);
    }
}
