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
                    <form method="post" action="{{ Route::currentRouteName() == 'waiter_add_prod' ? route('waiter_add_prod') : route('menu_edit_prod', ['id' => $product->id])}}">
                        <label for="subcategory" class="control-label">
                            Subcategory
                        </label>
                        <div class="controls">
                            <select name="subcategory" id="subcategory">
                                @if($subcategories)
                                    @foreach($subcategories as $sub)
                                    <option value="{{ $sub->id }}">{{ $sub->sub_category }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="prodName">Product name</label>
                            <input type="text" class="form-control" id="prodName" placeholder="Product"
                                   name="prod_name" value="{{ isset($product->prod_name) ? $product->prod_name : old('prod_name') }}"/>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" placeholder="Price"
                                   name="price" value="{{ isset($product->price) ? $product->price : old('price') }}"/>
                        </div>
                        <button type="submit" class="btn btn-default">{{ Route::currentRouteName() == 'waiter_add_prod' ? 'Add product' : 'Edit product'}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>