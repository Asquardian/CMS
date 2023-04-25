@extends('layouts.app')

@section('title')
    Регистрация
@endsection

@section('content')
    <h1>Регистрация</h1>

    <form action="{{ route('user-create') }}" method="post">
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
            {{ Form::label('name', 'Никнейм', array_merge(['class' => 'col-3'])) }}
            {{ Form::text('name', '', array_merge(['class' => 'form-control col-9'], ['placeholder' => 'Введите Никнейм'])) }}
            {{ Form::label('email', 'Почта', array_merge(['class' => 'col-3 mt-2'])) }}
            {{ Form::email('email', '', array_merge(['class' => 'form-control col-9 mt-2'], ['placeholder' => 'Введите Почту'])) }}
            {{ Form::label('password', 'Пароль', array_merge(['class' => 'col-3 mt-2'])) }}
            {{ Form::input('password', 'password', '', array_merge(['class' => 'form-control col-9 mt-2', 'type' => 'password'], ['placeholder' => 'Введите Пароль'])) }}
            {{ Form::label('password_confirmation', 'Подтверждение пароля', array_merge(['class' => 'col-3 mt-2'])) }}
            {{ Form::input('password', 'password_confirmation', '', array_merge(['class' => 'form-control col-9 mt-2'], ['placeholder' => 'Подтвердите пароль'])) }}
            <button type="submit" class="btn btn-dark">Зарегистрироваться</button>
        </div>
    </form>
@endsection
