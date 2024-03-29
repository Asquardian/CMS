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
            {{ Form::label('genre', 'Жанры', array_merge(['class' => 'col-3 mt-2'])) }}
            <select class="form-control col-12 mt-2" id="genre" name="genre[]">
                @foreach($genre as $item)
                    <option>{{$item->name}}</option>
                @endforeach
            </select>
            <button id="add" type="button" class="btn btn-dark mt-2">Добавить</button>
            <div class="col-12"></div>
            {{ Form::label('studio', 'Студия', array_merge(['class' => 'col-3'])) }}
            <select class="form-control col-9 mt-2 mr-auto" name="studio">
                @foreach($studios as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            {{ Form::label('state', 'Состояние', array_merge(['class' => 'col-3'])) }}
            {{ Form::text('state', '', array_merge(['class' => 'form-control col-9 mt-2'], ['placeholder' => 'Введите Состояние'])) }}
            {{ Form::label('image', 'Изображение', array_merge(['class' => 'col-3'])) }}
            {{ Form::file('image', array_merge(['class' => 'form-control col-9 mt-2'])) }}
            {{ Form::label('url', 'URL', array_merge(['class' => 'col-3'])) }}
            {{ Form::text('url', '', array_merge(['class' => 'form-control col-9 mt-2'], ['placeholder' => 'Введите URL'])) }}
            <button type="submit" class="btn btn-dark">Отправить</button>
        </div>
    </form>
    <script type="text/javascript">
    $('#add').on( "click", function (){
        $('#genre').clone().insertAfter('#genre');
    });
    </script>
@endsection
