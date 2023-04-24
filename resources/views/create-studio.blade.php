@extends('layouts.app')

@section('title')
    Создать Аниме
@endsection

@section('content')
    <h1>Создание студии</h1>

    <form enctype="multipart/form-data" action="{{ route('create-studio') }}" method="post">
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
            {{ Form::open(['route' => 'create-studio'], ['files' => false]) }}
            {{ Form::label('name', 'Название', array_merge(['class' => 'col-3'])) }}
            {{ Form::text('name', '', array_merge(['class' => 'form-control col-9'], ['placeholder' => 'Введите Название'])) }}
            {{ Form::label('date', 'Дата', array_merge(['class' => 'col-3'])) }}
            {{ Form::date('date', '', array_merge(['class' => 'form-control col-9 mt-2'], ['placeholder' => 'Введите Дату'])) }}
            {{ Form::label('desc', 'Описание', array_merge(['class' => 'col-3'])) }}
            {{ Form::textarea('desc', '', array_merge(['class' => 'form-control mt-2 col-9'], ['placeholder' => 'Введите Описание'])) }}
            <button type="submit" class="btn btn-dark">Отправить</button>
        </div>
    </form>
@endsection
