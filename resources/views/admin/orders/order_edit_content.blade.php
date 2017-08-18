@if($order)
    <div class="container">
        <h2 style="display: inline">{{ 'Order№' . $order->id }}</h2>
    </div>
    <div class="container">
        @if(Session::has('message'))
            <div  class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th>Category</th>
                <th>Name</th>
                <th>Count</th>
                <th>Sum</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->details as $detail)
                <tr>
                    <td>{{ $detail->category }}</td>
                    <td>{{ $detail->product_name }}</td>
                    <td>{{ $detail->count }}</td>
                    <td>{{ $detail->price * $detail->count }}</td>
                    <td>
                        <form action="{{ route('delete_product') }}" method="POST">
                            <input type="hidden" name="id" value="{{ $order->id }}">
                            <input type="hidden" name="product_name" value="{{ $detail->product_name }}">
                            {{ csrf_field() }}
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif