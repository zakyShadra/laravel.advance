<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Manajemen Kegiatan')</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; margin: 0; background: #f4f4f4; color: #222; }
        header { background: #1f2937; color: #fff; padding: 1rem 2rem; }
        header a { color: #fff; text-decoration: none; font-weight: bold; }
        main { max-width: 900px; margin: 2rem auto; background: #fff; padding: 1.5rem 2rem; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { text-align: left; padding: .5rem .75rem; border-bottom: 1px solid #e5e7eb; }
        .btn { display: inline-block; padding: .4rem .8rem; border-radius: 4px; text-decoration: none; font-size: .9rem; border: none; cursor: pointer; }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-edit { background: #f59e0b; color: #fff; }
        .btn-delete { background: #dc2626; color: #fff; }
        .btn-secondary { background: #6b7280; color: #fff; }
        .alert-success { background: #d1fae5; color: #065f46; padding: .75rem 1rem; border-radius: 4px; margin-bottom: 1rem; }
        .errors { background: #fee2e2; color: #991b1b; padding: .75rem 1rem; border-radius: 4px; margin-bottom: 1rem; }
        form.form-group { margin-bottom: 1rem; }
        label { display: block; font-weight: bold; margin-bottom: .25rem; }
        input, textarea, select { width: 100%; padding: .5rem; border: 1px solid #d1d5db; border-radius: 4px; box-sizing: border-box; }
        .status-draft { color: #6b7280; }
        .status-published { color: #2563eb; }
        .status-completed { color: #059669; }
        .actions form { display: inline; }
    </style>
</head>
<body>
    <header>
        <a href="{{ route('activities.index') }}">Manajemen Kegiatan</a>
    </header>
    <main>
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="errors">
                <ul style="margin:0; padding-left: 1.25rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
