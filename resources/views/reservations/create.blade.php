@extends('layouts.app')

@section('title', 'New reservation · EAD Laboratory')

@section('content')
<div class="intro"><p class="eyebrow">EAD Laboratory · study case entry point</p><h1>Ajukan reservasi.</h1><p>Field awal sudah tersedia. Lengkapi validasi kapasitas, rentang waktu, dan bentrok jadwal sebagai bagian implementasi Anda.</p></div>
<div class="panel" style="margin-top: 1.8rem;"><form method="post" action="{{ route('reservations.store') }}">@csrf
    <div class="grid">
        <div><label for="room_id">Ruangan</label><select id="room_id" name="room_id" required><option value="">Pilih ruangan</option>@foreach ($rooms as $room)<option value="{{ $room->id }}" @selected(old('room_id') == $room->id)>{{ $room->name }} · {{ $room->capacity }} kursi</option>@endforeach</select></div>
        <div><label for="date">Tanggal</label><input id="date" type="date" name="date" value="{{ old('date') }}" required></div>
        <div><label for="start_time">Mulai</label><input id="start_time" type="time" name="start_time" value="{{ old('start_time') }}" required></div>
        <div><label for="end_time">Selesai</label><input id="end_time" type="time" name="end_time" value="{{ old('end_time') }}" required></div>
        <div><label for="participant_count">Jumlah peserta</label><input id="participant_count" type="number" name="participant_count" min="1" value="{{ old('participant_count') }}" required></div>
        <div class="full"><label for="purpose">Keperluan</label><textarea id="purpose" name="purpose" maxlength="160" required>{{ old('purpose') }}</textarea></div>
    </div>
    <div class="form-actions"><button class="button" type="submit">Kirim permintaan</button><a class="button secondary" href="{{ route('reservations.index') }}">Batal</a></div>
</form></div>
@endsection
