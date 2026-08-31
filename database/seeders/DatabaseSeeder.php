<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $demoUser = User::query()->create([
            'name' => 'Demo Candidate',
            'email' => 'demo@eadlaboratory.test',
            'password' => Hash::make('password'),
        ]);

        $rooms = collect([
            ['name' => 'Lab A-101', 'location' => 'Gedung A · Lantai 1', 'capacity' => 30],
            ['name' => 'Lab B-202', 'location' => 'Gedung B · Lantai 2', 'capacity' => 24],
            ['name' => 'Ruang C-301', 'location' => 'Gedung C · Lantai 3', 'capacity' => 12],
            ['name' => 'Studio D-105', 'location' => 'Gedung D · Lantai 1', 'capacity' => 40],
        ])->map(fn (array $room) => Room::query()->create($room + ['is_active' => true]));

        Reservation::query()->create([
            'user_id' => $demoUser->id,
            'room_id' => $rooms[0]->id,
            'date' => today()->addDays(1),
            'start_time' => '09:00',
            'end_time' => '11:00',
            'purpose' => 'Praktikum Pemrograman Perangkat Lunak',
            'participant_count' => 26,
            'status' => 'Confirmed',
        ]);

        Reservation::query()->create([
            'user_id' => $demoUser->id,
            'room_id' => $rooms[2]->id,
            'date' => today()->addDays(2),
            'start_time' => '13:00',
            'end_time' => '15:00',
            'purpose' => 'Study group EAD Laboratory',
            'participant_count' => 8,
            'status' => 'Pending',
        ]);
    }
}
