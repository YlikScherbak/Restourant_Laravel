@extends('layouts.main_layout')

@section('navbar')
    @include('waiter.waiter_navbar')
@endsection

@section('content')
    @include('waiter.orders_content')
@endsection

