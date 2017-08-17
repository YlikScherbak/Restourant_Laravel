@extends('layouts.main_layout')

@section('navbar')
    @include('admin.admin_navbar')
@endsection

@section('content')
    @include('admin.waiters.edit_waiter_content')
@endsection