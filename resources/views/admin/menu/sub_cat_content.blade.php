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
                <form method="post" action="{{Route::currentRouteName() ==  'waiter_add_sub' ? route('waiter_add_sub') : route('menu_edit_sub', ['id' => $subcategory->id]) }}">
                    <div class="control-group">
                        <label for="Main category" class="control-label">
                            Main Category
                        </label>
                        <div class="controls">
                            <select name="mainCategory" id="Main category" >
                                @foreach($main as $cat)
                                <option value="{{ $cat->id }}" >{{ $cat->category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ csrf_field() }}
                        <label for="subcategory">Subcategory</label>
                        <input type="text" class="form-control" id="subcategory" placeholder="Subcategory"
                               name="subcategory" value="{{ isset($subcategory->sub_category) ? $subcategory->sub_category : old('subcategory') }}" />
                    </div>
                    <button type="submit" class="btn btn-default">{{ Route::currentRouteName() == 'waiter_add_sub' ? 'Add subcategory' : 'Edit subcategory' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>