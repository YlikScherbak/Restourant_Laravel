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
                    <form method="post" action="{{ Route::currentRouteName() == 'waiter_add_main' ? route('waiter_add_main') : route('menu_edit_main', ['id' => $main->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="category">Main category</label>
                            <input type="text" class="form-control" id="category"
                                   name="category" value="{{ isset($main->category) ? $main->category : old('category') }}" />
                        </div>
                        <button type="submit" class="btn btn-default">{{ Route::currentRouteName() == 'waiter_add_main' ? 'Add Main category' : 'Edit Main category' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
