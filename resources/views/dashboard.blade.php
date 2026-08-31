@extends('layouts.app')

@section('title', 'Dashboard · EAD Laboratory')

@section('content')
<div class="intro">
    <p class="eyebrow">EAD Laboratory · PPL recruitment starter</p>
    <h1>Room reservation, mulai dari sini.</h1>
    <p>Baseline kecil ini memberi konteks domain dan data awal. Kandidat melanjutkan logika reservasi, validasi kapasitas, dan pencegahan jadwal bentrok.</p>
</div>

<div class="stats">
    <div class="stat"><strong>{{ $roomCount }}</strong><span>Ruangan aktif</span></div>
    <div class="stat"><strong>{{ $reservationCount }}</strong><span>Reservasi contoh</span></div>
</div>

<div class="toolbar"><div><p class="eyebrow">Quick start</p><h2>Jelajahi baseline</h2></div></div>
<div class="cards">
    <a class="card" href="{{ route('rooms.index') }}"><div><p class="eyebrow">01</p><h3>Katalog ruangan</h3><p>Lihat kapasitas dan lokasi ruang yang tersedia.</p></div><span>→</span></a>
    <a class="card" href="{{ route('reservations.index') }}"><div><p class="eyebrow">02</p><h3>Daftar reservasi</h3><p>Gunakan data seed sebagai referensi tampilan.</p></div><span>→</span></a>
    <a class="card" href="{{ route('reservations.create') }}"><div><p class="eyebrow">03</p><h3>Form reservasi</h3><p>Mulai dari field dasar yang sudah disiapkan.</p></div><span>→</span></a>
    <div class="card"><div><p class="eyebrow">04</p><h3>Ruang eksplorasi</h3><p>Implementasikan requirement study case di branch Anda.</p></div><span>✦</span></div>
</div>

<div class="panel" style="margin-top: 2rem;">
    <p class="eyebrow">Upcoming sample data</p>
    <h2>Reservasi terdekat</h2>
    @if ($upcomingReservations->isEmpty())
        <p class="muted">Belum ada data reservasi.</p>
    @else
        <table><thead><tr><th>Tanggal</th><th>Ruangan</th><th>Waktu</th><th>Status</th></tr></thead><tbody>
        @foreach ($upcomingReservations as $reservation)<tr><td>{{ $reservation->date->format('d M Y') }}</td><td>{{ $reservation->room->name }}</td><td>{{ substr($reservation->start_time, 0, 5) }}–{{ substr($reservation->end_time, 0, 5) }}</td><td><span class="status">{{ $reservation->status }}</span></td></tr>@endforeach
        </tbody></table>
    @endif
</div>
@endsection
