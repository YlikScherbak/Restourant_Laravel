@extends('layouts.main_layout')

@section('navbar')
    {!! $navbar !!}
@endsection

@section('content')
    @include('admin.menu.product_content')
@endsection