@extends('layouts.main_layout')

@section('navbar')
    @include('admin.admin_navbar')
@endsection

@section('content')
    @include('admin.menu.sub_cat_content')
@endsection
