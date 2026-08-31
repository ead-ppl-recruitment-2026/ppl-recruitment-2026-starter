@extends('layouts.app')

@section('title', 'Sign in · EAD Laboratory')

@section('content')
<div class="intro" style="max-width: 560px; margin: 2rem auto 0;">
    <p class="eyebrow">EAD Laboratory · starter workspace</p>
    <h1>Masuk ke workspace.</h1>
    <p>Gunakan akun demo di bawah untuk menjelajahi katalog ruangan dan alur awal reservasi.</p>
    <div class="panel" style="margin-top: 1.5rem;">
        <form method="post" action="{{ route('login.store') }}">
            @csrf
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email', 'demo@eadlaboratory.test') }}" required autocomplete="email">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" value="password" required autocomplete="current-password">
            <div class="form-actions"><button class="button" type="submit">Masuk</button></div>
        </form>
        <p class="muted" style="margin-bottom: 0; font-size: .85rem;">Demo account: demo@eadlaboratory.test · password</p>
    </div>
</div>
@endsection
