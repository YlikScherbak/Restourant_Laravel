@extends('layouts.main_layout')

@section('navbar')
    {!! $navbar !!}
@endsection

@section('content')
    @include('admin.messages_content')
@endsection