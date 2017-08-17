<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default" style="margin-top:45px">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $title }}</h3>
                </div>
                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post"
                          action="{{ Route::currentRouteName() == 'waiter_edit' ? route('waiter_edit', ['id' => $waiter->id]) : route('waiter_registry')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" placeholder="Name" id="username"
                                   value="{{ isset($waiter->username) ? $waiter->username : old('username') }}"
                                   name="username"/>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="password" id="password"
                                   name="password"
                                   value="{{ isset($waiter->password) ? $waiter->password : old('password') }}"/>
                        </div>
                        <button type="submit" class="btn btn-default">{{ Route::currentRouteName() == 'waiter_edit' ? 'Edit' : 'Register'}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>