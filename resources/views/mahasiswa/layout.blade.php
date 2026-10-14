<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Data Mahasiswa')</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 760px; margin: 2rem auto; padding: 0 1rem; color: #1f2937; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { border-bottom: 1px solid #e5e7eb; padding: .5rem; text-align: left; }
        .btn { display: inline-block; padding: .35rem .8rem; border: 0; border-radius: 6px; background: #1d4e89; color: #fff; text-decoration: none; cursor: pointer; font-size: .9rem; }
        .btn.danger { background: #b91c1c; }
        .flash { background: #dcfce7; padding: .6rem 1rem; border-radius: 6px; }
        .error { color: #b91c1c; font-size: .85rem; }
        label { display: block; margin-top: .8rem; font-weight: 600; }
        input { width: 100%; padding: .4rem; box-sizing: border-box; }
    </style>
</head>
<body>
    <h1>@yield('heading')</h1>
    @if (session('status'))
        <p class="flash">{{ session('status') }}</p>
    @endif
    @yield('content')
</body>
</html>
