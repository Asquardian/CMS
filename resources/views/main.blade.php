@extends('layouts.app')

@section('title')
    Новые аниме
@endsection

@section('content')
    <div class="container-fluid row">
        <form class="col-3 row mt-2" action="" method="get">
            <select class="form-control col-sm-12 my-auto" name="by">
                <option value="date" <?php if ($req->by == 'date') {
                    print 'selected';
                } ?>>По Дате</option>
                <option value="name" <?php if ($req->by == 'name') {
                    print 'selected';
                } ?>>По Имени</option>
                <option value="rating" <?php if ($req->by == 'rating') {
                    print 'selected';
                } ?>>По рейтингу</option>
            </select>
            <select class="form-control col-sm-12 my-auto" name="ord">
                <option value="ASC" <?php if ($req->ord == 'ASC') {
                    print 'selected';
                } ?>>От большего к меньшему</option>
                <option value="DESC" <?php if ($req->ord == 'DESC') {
                    print 'selected';
                } ?>>От меньшего к большему</option>
            </select>
            <select class="form-control col-sm-12 mr-5 my-auto" name="studio">
                <option value="">Нет</option>
                @foreach ($studios as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @foreach ($genre as $item)
                <div class="form-group col-sm-12"><input name="genre[]" type="checkbox" value="{{ $item->name }}"
                        @if ($req->exists('genre')) @if (in_array($item->name, $req->genre)) checked @endif @endif />
                    <label>{{ $item->name }}</label>
                </div>
            @endforeach
            <div class="form-group col-12 row">
                <label class="col-4 my-auto">Вышел с</label>
                {{ Form::date('start', '', array_merge(['class' => 'form-control col-8 mt-2'])) }}
            </div>
                <button class="mr-2" style="height:50px" type="submit">Поиск</button>
                <a style="height:50px" href="{{ route('main') }}"><button style="height:50px" type="button">Сбросить</button></a>
        </form>
        <div class="col-9 row">
            <x-all-anime :req="$req" />
        </div>
    </div>
@endsection
