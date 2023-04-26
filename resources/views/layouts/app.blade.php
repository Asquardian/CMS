<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    {{ HTML::style('https://use.fontawesome.com/releases/v5.6.1/css/all.css') }}
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('css/light.css') }}
    {{ HTML::script('js/change.js') }}
    {{ HTML::script('https://code.jquery.com/jquery-3.6.4.js') }}
    {{ HTML::script('https://code.jquery.com/ui/1.13.1/jquery-ui.js') }}
    {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js') }}
    {{ HTML::script('https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js') }}
    <title>@yield('title')</title>
</head>

<body>
    <header class="head">
        <div class="container d-flex justify-content-between align-items-center h-100">
            <div class="w-50">
                <h3 class="my-auto">Let`s Anime</h3>
                <div class="d-flex justify-content-between">
                    <a href="{{route('main')}}">Все Аниме</a>
                    @if (auth()->check())
                        @if (auth()->user()->isAdmin())
                            <a href="{{route('form-anime')}}">Создать аниме</a>
                            <a href="{{route('form-studio')}}">Создать студию</a>
                            <a href="{{route('form-genre')}}">Создать жанр</a>
                        @endif
                    @endif
                </div>
            </div>
            <button onclick="changeTheme()"><i class="fa fa-sun"></i></button>
            <label class="my-auto">Поиск: </label>
            <div class="form-group my-auto">
                <input type="text" id="term" name="term" class="form-control " autocomplete="off">
            </div>
            @if (auth()->check())
                <a href="#">{{ auth()->user()->name }}</a>
                <a href="{{ url('logout') }}">Выйти</a>
            @else
                <a href="{{ url('login') }}">Войти</a>
                <a href="{{ url('register') }}">Зарегистрироваться</a>
            @endif
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <h3 class="container mt-5">Footer</h3>
    </footer>
    {{ HTML::script('js/script.js') }}
</body>
<script src="js/script.js" type="text/javascript"></script>

</html>
