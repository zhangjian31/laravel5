@extends('layouts')

@section('header')
    @parent
    section header
@stop

@section('sidebar')
    @parent
    section sidebar
@stop

@section('content')
    {{--@parent--}}
    {{--没有继承--}}
    section content
@stop