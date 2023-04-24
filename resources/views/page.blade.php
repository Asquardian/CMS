@extends('layouts.app')

@section('title')
    {{$url}}
@endsection

@section('content')
    <x-anime-show url={{$url}}/>
@endsection