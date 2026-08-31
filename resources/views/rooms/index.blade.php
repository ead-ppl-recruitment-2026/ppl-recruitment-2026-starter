@extends('layouts.app')

@section('title', 'Rooms · EAD Laboratory')

@section('content')
<div class="toolbar"><div><p class="eyebrow">EAD Laboratory · directory</p><h1>Ruangan kampus</h1><p>Katalog read-only untuk baseline study case.</p></div><a class="button" href="{{ route('reservations.create') }}">Buat permintaan</a></div>
<div class="cards">
    @forelse ($rooms as $room)
        <article class="card"><div><p class="eyebrow">Room {{ str_pad((string) $room->id, 2, '0', STR_PAD_LEFT) }}</p><h3>{{ $room->name }}</h3><p>{{ $room->location }}</p></div><div><strong>{{ $room->capacity }}</strong><span class="muted"> kursi</span></div></article>
    @empty
        <div class="panel"><p class="muted">Belum ada ruangan aktif.</p></div>
    @endforelse
</div>
@endsection
