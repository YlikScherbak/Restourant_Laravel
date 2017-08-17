@extends('layouts.main_layout')

@section('navbar')
    @include('admin.admin_navbar')
@endsection

@section('content')
    @include('admin.orders.order_edit_content')
@endsection