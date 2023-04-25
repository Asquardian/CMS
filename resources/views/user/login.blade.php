@extends('layouts.app')

@section('title')
    Регистрация
@endsection

@section('content')
    <h1>Войти</h1>

    <form action="{{ route('login-succsses') }}" method="post">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row container mx-auto">
            @csrf
            {{ Form::label('email', 'Почта', array_merge(['class' => 'col-3'])) }}
            {{ Form::email('email', '', array_merge(['class' => 'form-control col-9'], ['placeholder' => 'Введите Почту'])) }}
            {{ Form::label('password', 'Пароль', array_merge(['class' => 'col-3 mt-2'])) }}
            {{ Form::input('password', 'password', '', array_merge(['class' => 'form-control col-9 mt-2', 'type' => 'password'], ['placeholder' => 'Введите Пароль'])) }}
            <button type="submit" class="btn btn-dark">Войти</button>
        </div>
    </form>
@endsection
