<div class="container">
    <div class="row row-centered">
        <div class="col-md-6 col-md-offset-3">
            <button class="btn btn-danger dropp">
                <i class="glyphicon glyphicon-print"></i> Print check
            </button>
            <h3 align="center">{{ $order->creation_date . ' / ' . $order->closed_date}}</h3>
            <h1 align="center">{{ 'Order№' . $order->id }}</h1>
            <p class="text-left">{{ 'Table№' . $order->table->id }}</p>
            <p class="text-left">{{ 'Served by ' . Auth::user()->username }}</p>
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Count</th>
                    <th>Sum</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->details as $detail)
                <tr>
                    <td>{{ $detail->category . ' ' .  $detail->prod_name}}</td>
                    <td>{{ $detail->count}}</td>
                    <td>{{ $detail->count * $detail->price }}</td>
                </tr>
                @endforeach
                </tbody>
                <tbody>
                <tr>
                    <td colspan="2" align="right">Discount amount</td>
                    <td>{{ $order->discount_amount }}</td>
                </tr>
                <tr>
                    <td colspan="2" align="right">Total amount</td>
                    <td>{{ $order->total_amount }}</td>
                </tr>
                </tbody>
            </table>
            <h2 align="center">Thank you for your visit!</h2>
            <h2 align="center">We will be glad to see you again</h2>
        </div>
    </div>
</div>

<div class="modal-shadow"></div>
<div class="modal-window" style="width: 499px; height: 354px;">
    <div class="close">X</div>
    <img src="{{ asset('/images/cat.jpg') }}" class="img-rounded" />
</div>

<script>
    $(function(){
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
</script>