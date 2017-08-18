@extends('layouts.main_layout')

@section('navbar')
    {!! $navbar !!}
@endsection

@section('content')
    @include('admin.menu.all_product_content')
@endsection