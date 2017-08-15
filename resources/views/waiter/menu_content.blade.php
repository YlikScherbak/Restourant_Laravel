@if($menu)
    <div class="container">
        <ul class="nav nav-pills">
            @foreach($menu as $Mcategory)
                <li>
                    <a href="#{{ $Mcategory->category }}" data-toggle="tab">{{ $Mcategory->category }}</a>
                </li>
            @endforeach
        </ul>
        <ul class="tab-content">
            @foreach($menu as $Mcategory)
                <li class="tab-pane" id="{{ $Mcategory->category }}">
                    <ul class="nav nav-pills">
                        @foreach($Mcategory->subCategories as $subcategory)
                            <li><a data-toggle="tab"
                                   href="#{{ $Mcategory->category . '-' . $subcategory->sub_category }}">{{ $subcategory->sub_category }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="tab-content tab-content-menu">
                        @foreach($Mcategory->subCategories as $subcategory)
                            <li class="tab-pane" id="{{ $Mcategory->category . '-' . $subcategory->sub_category }}">
                                <div class="container">
                                    @foreach($subcategory->products as $product)
                                        <form id="{{ $product->id }}"
                                              action="{{ route('add_product', ['id' => $orderId]) }}" method="POST"
                                              style="display: inline-block;">
                                            <input type="hidden" name="product" value="{{ $product->prod_name }}">
                                            <input type="hidden" name="compliment" value="{{ $compliment }}">
                                            {{ csrf_field() }}
                                            <button class="btn btn-success btn-lg link"
                                                    type="submit" onclick="send({{ $product->id }})">{{ $product->prod_name }}</button>
                                        </form>
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="navbar navbar-inverse navbar-fixed-bottom">
            <div class="container">
                <div class="navbar-form navbar-left">
                    <a href="{{ route('waiter_order', ['id' => $orderId]) }}" class="btn btn-primary">
                        <i class="glyphicon glyphicon-th-list"></i> Back to order
                    </a>
                </div>
                <div class="navbar-form navbar-right">
                    <a class="btn btn-primary" id="responce">
                        <p></p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function send(id) {
        $(document).ready(function () {
            $('#' + id).submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('add_product', ['id' => $orderId]) }}",
                    type: "post",
                    data: $('#' + id).serialize(),
                    success: function (res) {
                        $('#responce').first().text(res + ' added to order');
                        setTimeout(function () {
                            $('#responce').first().text('');
                        }, 1356);
                    }
                });
                return false;
            });
        });
    }
</script>
