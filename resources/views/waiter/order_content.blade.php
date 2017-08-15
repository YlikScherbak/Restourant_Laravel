@if($order)
    <div class="container">
        <h2 style="display: inline">{{ 'Order№' . $order->id . ' Waiter:' . Auth::user()->username }}</h2>
    </div>
    <div class="container">
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th>Category</th>
                <th>Name</th>
                <th>Count</th>
                <th>Sum</th>
            </tr>
            </thead>
            <tbody>
            @if($order->details)
                @foreach($order->details as $detail)
                    <tr>
                        <td>{{ $detail->category }}</td>
                        <td>{{ $detail->product_name }}</td>
                        <td>{{ $detail->count }}</td>
                        <td>{{ $detail->price * $detail->count }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
            <tbody>
            <tr>
                <td colspan="3" align="right">Discount amount</td>
                <td>{{ $order->discount_amount }}</td>
            </tr>
            <tr>
                <td colspan="3" align="right">Total amount</td>
                <td>{{ $order->total_amount }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="navbar navbar-inverse navbar-fixed-bottom">
            <div class="container">
                <div class="navbar-form navbar-left">
                    <a href="{{ route('menu', ['id' => $order->id]) }}" class="btn btn-primary">
                        <i class="glyphicon glyphicon-cutlery"></i> Add product
                    </a>
                    <form action="{{ route('menu', ['id' => $order->id]) }}" method="get"
                          style="display: inline-block;">
                        <input type="hidden" name="compliment" value="true">
                        {{ csrf_field() }}
                        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-gift"></i> Add
                            compliment
                        </button>
                    </form>

                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-success dropdown-toggle " data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            Set discount <span class="caret"></span>
                        </button>
                        @if($discounts)
                            <ul class="dropdown-menu">
                                @foreach($discounts as $discount)
                                    <li><a class="link"
                                           href="{{ route('set_disc', ['id' => $order->id,'discount' => $discount->id]) }}"
                                        >{{ $discount->discount_name . ' ' . $discount->percentage . '%' }}</a></li>
                                    <li role="separator" class="divider"></li>
                                @endforeach
                                <li><a class="link" href="{{ route('disable_disc', ['id' => $order->id]) }}"
                                       style="color: red;">Disable discount</a></li>
                            </ul>
                        @endif
                    </div>
                    <button class="btn btn-danger dropp">
                        <i class="glyphicon glyphicon-exclamation-sign"></i> Send error
                    </button>
                </div>
                <div class="navbar-form navbar-right">
                    <a href="{{ route('close_order', ['id' => $order->id]) }}" class="btn btn-primary">
                        <i class="glyphicon  glyphicon-off"></i> Close order
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-shadow"></div>
<div class="modal-window">
    <div class="close">X</div>
    <form method="post" action="{{ route('send_error', ['id' => $order->id]) }}"  class="vote">
        <div class="form-group">
            {{ csrf_field() }}
            <label for="username">Message</label>
            <input type="text" class="form-control" id="text" name="text"/>
        </div>
        <button type="submit" class="btn btn-default link">Send message</button>
    </form>
</div>

<script>
    $(function () {
        $('.dropp').click(function () {
            $('.modal-shadow').show();
            $('.modal-window').show();
        });

        $('.modal-shadow').click(function () {
            $('.modal-shadow').hide();
            $('.modal-window').hide();
        });

        $('.close').click(function () {
            $('.modal-shadow').hide();
            $('.modal-window').hide();
        });
    });

    $(function () {

        $('.vote').on('submit', function () {

            var method = $(this).attr('method');
            var action = $(this).attr('action');
            var vals = $(this).serialize();

            $.ajax({
                type: method,
                url: action,
                data: vals
            });
            return false;
        });
    });
</script>
