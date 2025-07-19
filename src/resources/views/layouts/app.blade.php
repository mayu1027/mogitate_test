<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/common.css')}}">
    @yield('css') {{-- ページごとの追加CSS --}}
</head>
<body>
    <div class="app">
    <header class="header">
        <h1 class="header__heading">mogitate</h1>
    </header>
    <div class="content">
        @yield('content') {{-- 各ページの中身がここに入る --}}
    </div>
    </div>
</body>

</html>