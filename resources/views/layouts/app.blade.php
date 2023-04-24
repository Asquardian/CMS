<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('css/light.css') }}
    {{ HTML::script('js/change.js') }}
    <title>@yield('title')</title>
</head>

<body>
    <header class="head">
        <div class="container d-flex justify-content-between align-items-center h-100">
            <div class="w-75">
                <h3 class="my-auto">Let`s Anime</h3>
                <div class="d-flex justify-content-between">
                    <a href="/site/cms/public/anime">Все Аниме</a>
                    <a href="/site/cms/public/create/anime">Создать аниме</a>
                    <a href="/site/cms/public/create/studio">Создать студию</a>
                </div>
            </div>
            <button onclick="changeTheme()">change Theme</button>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <h3 class="container mt-5">Footer</h3>
    </footer>
</body>

</html>
