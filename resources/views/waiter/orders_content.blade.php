@if($orders)

    <div class="container">
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th>Order№</th>
                <th>Creation time</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->creation_date }}</td>
                    <td><a class="btn btn-success" href="{{ route('waiter_order', ['id' => $order->id]) }}">Select</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endif
