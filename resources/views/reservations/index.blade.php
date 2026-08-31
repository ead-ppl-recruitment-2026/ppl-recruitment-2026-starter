@extends('layouts.app')

@section('title', 'Reservations · EAD Laboratory')

@section('content')
<div class="toolbar"><div><p class="eyebrow">EAD Laboratory · sample records</p><h1>Reservasi</h1><p>Data seed untuk membantu kandidat memahami domain.</p></div><a class="button" href="{{ route('reservations.create') }}">Buat permintaan</a></div>
<div class="panel"><table><thead><tr><th>Tanggal</th><th>Ruangan</th><th>Waktu</th><th>Keperluan</th><th>Pemohon</th><th>Status</th></tr></thead><tbody>
@forelse ($reservations as $reservation)
<tr><td><a href="{{ route('reservations.show', $reservation) }}">{{ $reservation->date->format('d M Y') }}</a></td><td>{{ $reservation->room->name }}</td><td>{{ substr($reservation->start_time, 0, 5) }}–{{ substr($reservation->end_time, 0, 5) }}</td><td>{{ $reservation->purpose }}</td><td>{{ $reservation->user->name }}</td><td><span class="status">{{ $reservation->status }}</span></td></tr>
@empty
<tr><td colspan="6" class="muted">Belum ada reservasi.</td></tr>
@endforelse
</tbody></table></div>
@endsection
