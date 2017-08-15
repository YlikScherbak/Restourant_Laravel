@extends('layouts.main_layout')

@section('navbar')
@endsection

@section('content')
    <img src="{{asset('images/architecture-1837150_1280.jpg')}}" class="bg"/>


    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default" style="margin-top:45px">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login with Username and Password</h3>
                    </div>
                    <div class="panel-body">

                        @if(Session::has('message'))
                            <span class="help-block">
                                        <strong>{{ Session::get('message') }}</strong>
                                    </span>
                        @endif


                        <form method="post" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            @if ($errors->has('username'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Username"
                                       name="username" value="{{ old('username') }}"/>
                            </div>
                            <div class="form-group">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                       name="password"/>
                            </div>
                            <button type="submit" class="btn btn-default">Log in</button>
                        </form>
                    </div>
                </div>
                <div class="error-actions">
                    <a href="{{ route('info') }}" class="btn btn-primary btn-lg"><span
                                class="glyphicon glyphicon-info-sign"></span>
                        Info page </a>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">User Name</label>

                                <div class="col-md-6">
                                    <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
@endsection
