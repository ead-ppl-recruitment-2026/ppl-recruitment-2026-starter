<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'EAD Laboratory · Room Reservation')</title>
    <style>
        :root { color-scheme: light; font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; color: #161616; background: #f7f7f5; }
        * { box-sizing: border-box; }
        body { margin: 0; line-height: 1.5; }
        a { color: #111; text-decoration-thickness: 1px; text-underline-offset: 3px; }
        header { background: #111; color: #fff; }
        nav { display: flex; justify-content: space-between; gap: 1.5rem; align-items: center; max-width: 1160px; margin: 0 auto; padding: 1rem 1.5rem; }
        nav a { color: #fff; text-decoration: none; }
        .brand { display: flex; flex-direction: column; line-height: 1.15; letter-spacing: .01em; }
        .brand small { color: #bdbdbd; font-size: .68rem; letter-spacing: .16em; text-transform: uppercase; margin-top: .25rem; }
        .nav-links { display: flex; align-items: center; gap: 1.1rem; font-size: .9rem; }
        .nav-links form { margin: 0; }
        .nav-links button { border: 0; background: transparent; color: #fff; padding: 0; font: inherit; cursor: pointer; }
        main { max-width: 1160px; margin: 0 auto; padding: 3rem 1.5rem 4rem; }
        .eyebrow { color: #696969; font-size: .73rem; letter-spacing: .16em; text-transform: uppercase; margin: 0 0 .65rem; }
        h1, h2, h3 { letter-spacing: -.03em; line-height: 1.15; margin-top: 0; }
        h1 { font-size: clamp(2rem, 4vw, 3.6rem); margin-bottom: .8rem; }
        h2 { font-size: 1.45rem; }
        p { color: #5e5e5e; }
        .toolbar { display: flex; justify-content: space-between; gap: 1.5rem; align-items: flex-end; margin-bottom: 1.8rem; }
        .button, button.button { display: inline-flex; align-items: center; justify-content: center; gap: .4rem; background: #111; color: #fff; border: 1px solid #111; padding: .7rem 1rem; text-decoration: none; cursor: pointer; font: inherit; }
        .button:hover, button.button:hover { background: #343434; }
        .button.secondary { color: #111; background: transparent; border-color: #b8b8b8; }
        .button.secondary:hover { background: #ececea; }
        .panel { background: #fff; border: 1px solid #deded9; padding: 1.35rem; margin-bottom: 1rem; }
        .intro { border-top: 3px solid #111; padding-top: 1.1rem; max-width: 720px; }
        .stats { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: .8rem; margin: 2rem 0; }
        .stat { border-top: 1px solid #111; padding-top: .7rem; }
        .stat strong { display: block; font-size: 2rem; letter-spacing: -.04em; }
        .stat span { color: #6b6b6b; font-size: .83rem; }
        .cards { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: .8rem; }
        .card { background: #fff; border: 1px solid #deded9; padding: 1.2rem; min-height: 160px; display: flex; flex-direction: column; justify-content: space-between; }
        .card h3 { font-size: 1.15rem; margin-bottom: .3rem; }
        .card p { font-size: .9rem; margin: 0; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { text-align: left; vertical-align: top; border-bottom: 1px solid #e5e5e0; padding: .85rem .7rem; }
        th { color: #5d5d5d; font-size: .73rem; letter-spacing: .1em; text-transform: uppercase; font-weight: 600; }
        .status { display: inline-block; border: 1px solid #bcbcb7; padding: .15rem .45rem; font-size: .75rem; }
        label { display: block; font-weight: 650; margin: .9rem 0 .35rem; }
        input, textarea, select { width: 100%; box-sizing: border-box; padding: .7rem .75rem; border: 1px solid #bdbdb7; background: #fff; color: #111; font: inherit; }
        input:focus, textarea:focus, select:focus { outline: 2px solid #111; outline-offset: 1px; }
        textarea { min-height: 7rem; resize: vertical; }
        .grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem; }
        .full { grid-column: 1 / -1; }
        .form-actions { display: flex; align-items: center; gap: .7rem; margin-top: 1.2rem; }
        .alert { border-left: 3px solid #111; background: #ededeb; padding: .75rem 1rem; margin-bottom: 1rem; }
        .error { color: #6c1616; }
        .error ul { margin: .4rem 0 0; }
        dl { display: grid; grid-template-columns: 12rem 1fr; gap: .7rem 1.2rem; margin: 0; }
        dt { color: #676767; font-size: .85rem; }
        dd { margin: 0; }
        .muted { color: #777; }
        .footer-note { border-top: 1px solid #deded9; margin-top: 3rem; padding-top: 1rem; color: #777; font-size: .8rem; }
        @media (max-width: 860px) { .cards { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        @media (max-width: 650px) { nav, .toolbar { align-items: flex-start; flex-direction: column; } .nav-links { flex-wrap: wrap; } main { padding-top: 2rem; } .grid, .stats { grid-template-columns: 1fr; } dl { display: block; } dt { margin-top: .75rem; } .cards { grid-template-columns: 1fr; } table { display: block; overflow-x: auto; white-space: nowrap; } }
    </style>
</head>
<body>
<header><nav><a class="brand" href="{{ session('demo_user_id') ? route('dashboard') : route('login') }}"><strong>EAD Laboratory</strong><small>Campus Room Reservation</small></a><div class="nav-links">@if (session('demo_user_id'))<a href="{{ route('rooms.index') }}">Rooms</a><a href="{{ route('reservations.index') }}">Reservations</a><a href="{{ route('reservations.create') }}">New request</a><form method="post" action="{{ route('logout') }}">@csrf<button type="submit">Sign out</button></form>@endif</div></nav></header>
<main>
    @if (session('notice')) <div class="alert">{{ session('notice') }}</div> @endif
    @if (session('success')) <div class="alert">{{ session('success') }}</div> @endif
    @if ($errors->any())
        <div class="alert error"><strong>Periksa kembali isian Anda.</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif
    @yield('content')
    <p class="footer-note">EAD Laboratory · starter app untuk rekrutmen asisten PPL · gunakan data dummy/non-sensitif.</p>
</main>
</body>
</html>
