@if($subcategories)
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked admin-menu">
                    @foreach($subcategories as $sub)
                        <li><a href="#" data-target-id="{{ $sub->id }}">{{ $sub->sub_category }}</a></li>
                    @endforeach
                </ul>
            </div>


            @foreach($subcategories as $sub)
                <div class="col-md-9 well admin-content" id="{{ $sub->id }}">
                    <table class="table table-striped table-hover table-bordered table-condensed">
                        <thead>
                        <tr>
                            <th>Product name</th>
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sub->products as $product)
                            <tr>
                                <td>{{ $product->prod_name }}</td>
                                <td>{{ $product->price }}</td>
                                <td><a class="btn btn-success"
                                       href="{{ route('menu_edit_prod', ['id' => $product->id]) }}">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('menu_delete_prod') }}" method="POST">
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>

    </div>
@endif

<script>
    $(document).ready(function () {
        var navItems = $('.admin-menu li > a');
        var navListItems = $('.admin-menu li');
        var allWells = $('.admin-content');
        var allWellsExceptFirst = $('.admin-content:not(:first)');

        allWellsExceptFirst.hide();
        navItems.click(function (e) {
            e.preventDefault();
            navListItems.removeClass('active');
            $(this).closest('li').addClass('active');

            allWells.hide();
            var target = $(this).attr('data-target-id');
            $('#' + target).show();
        });
    });
</script>