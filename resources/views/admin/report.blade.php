@extends('layouts.main_layout')

@section('navbar')
    {!! $navbar !!}
@endsection

@section('content')
    @include('admin.report_content')
@endsection
