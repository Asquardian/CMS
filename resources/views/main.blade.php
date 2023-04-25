@extends('layouts.app')

@section('title')
    Новые аниме
@endsection

@section('content')
    <form class="col-12 row mt-2" action="" method="get">
        <select class="form-control col-sm-12 col-lg-3 my-auto" name="by">
            <option value="date" <?php if ($by == 'date') {
                print 'selected';
            } ?>>По Дате</option>
            <option value="name" <?php if ($by == 'name') {
                print 'selected';
            } ?>>По Имени</option>
            <option value="rating" <?php if ($by == 'rating') {
                print 'selected';
            } ?>>По рейтингу</option>
        </select>
        <select class="form-control col-sm-12 col-lg-3 mr-5 my-auto" name="ord">
            <option value="DESC" <?php if ($ord == 'DESC') {
                print 'selected';
            } ?>>От меньшего к большему</option>
            <option value="ASC" <?php if ($ord == 'ASC') {
                print 'selected';
            } ?>>От большего к меньшему</option>
        </select>
        <button>Поиск</button>
    </form>
  
    <x-all-anime :by="$by" :ord="$ord" />
@endsection
