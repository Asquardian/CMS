@extends('layouts.app')
@section('title')
    Главная страница
@endsection

@section('content')
    <form action="{{ route('create-genre') }}" method="post">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="row container mx-auto">
            {{ Form::label('name', 'Жанр', array_merge(['class' => 'col-3'])) }}
            {{ Form::text('name', '', array_merge(['class' => 'form-control col-9'], ['placeholder' => 'Введите Название жанра'])) }}
            <button type="submit" class="btn btn-dark">Отправить</button>
        </div>
    </form>
@endsection
