@extends('layouts.app')

@section('title')
    Создать Аниме
@endsection

@section('content')
    <h1>Создание страницы</h1>

    <form enctype="multipart/form-data" action="{{ route('create-anime') }}" method="post">
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
            {{ Form::open(['route' => 'create-anime'], ['files' => true]) }}
            {{ Form::label('name', 'Название', array_merge(['class' => 'col-3'])) }}
            {{ Form::text('name', '', array_merge(['class' => 'form-control col-9'], ['placeholder' => 'Введите Название'])) }}
            {{ Form::label('date', 'Дата', array_merge(['class' => 'col-3'])) }}
            {{ Form::date('date', '', array_merge(['class' => 'form-control col-9 mt-2'], ['placeholder' => 'Введите Дату'])) }}
            {{ Form::label('studio', 'Студия', array_merge(['class' => 'col-3'])) }}
            {{ Form::number('studio', '', array_merge(['class' => 'form-control col-9 mt-2'], ['placeholder' => 'Введите Студию'])) }}
            {{ Form::label('state', 'Состояние', array_merge(['class' => 'col-3'])) }}
            {{ Form::text('state', '', array_merge(['class' => 'form-control col-9 mt-2'], ['placeholder' => 'Введите Состояние'])) }}
            {{ Form::label('image', 'Изображение', array_merge(['class' => 'col-3'])) }}
            {{ Form::file('image', array_merge(['class' => 'form-control col-9 mt-2'])) }}
            {{ Form::label('url', 'URL', array_merge(['class' => 'col-3'])) }}
            {{ Form::text('url', '', array_merge(['class' => 'form-control col-9 mt-2'], ['placeholder' => 'Введите URL'])) }}
            <button type="submit" class="btn btn-dark">Отправить</button>
        </div>
    </form>
@endsection
