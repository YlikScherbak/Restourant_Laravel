@extends('layouts.main_layout')

@section('navbar')
    {!! $navbar !!}
@endsection

@section('content')
    @include('admin.waiters.edit_waiter_content')
@endsection