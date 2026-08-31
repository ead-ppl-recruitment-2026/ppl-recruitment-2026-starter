@extends('layouts.app')

@section('title', 'Reservation detail · EAD Laboratory')

@section('content')
<div class="toolbar"><div><p class="eyebrow">EAD Laboratory · reservation detail</p><h1>{{ $reservation->room->name }}</h1><p>{{ $reservation->purpose }}</p></div><a class="button secondary" href="{{ route('reservations.index') }}">Kembali</a></div>
<div class="panel"><dl><dt>Tanggal</dt><dd>{{ $reservation->date->format('d M Y') }}</dd><dt>Waktu</dt><dd>{{ substr($reservation->start_time, 0, 5) }}–{{ substr($reservation->end_time, 0, 5) }}</dd><dt>Lokasi</dt><dd>{{ $reservation->room->location }}</dd><dt>Kapasitas ruangan</dt><dd>{{ $reservation->room->capacity }} kursi</dd><dt>Jumlah peserta</dt><dd>{{ $reservation->participant_count }} orang</dd><dt>Pemohon</dt><dd>{{ $reservation->user->name }}</dd><dt>Status</dt><dd><span class="status">{{ $reservation->status }}</span></dd></dl></div>
@endsection
