@if($orders)
<div class="container">
    <table class="table table-striped table-hover table-bordered table-condensed">
        <thead>
        <tr>
            <th>Id</th>
            <th>Waiter</th>
            <th>Is Active</th>
            <th>Edit</th>
            <th>Audition</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->username }}</td>
            <td>{{ $order->active }}</td>
            <td><a class="btn btn-success" href="{{ route('edit_order', ['id' => $order->id]) }}">Edit</a></td>
            <td><a class="btn btn-info" th:href="@{/admin/orders/audition/__${order.id}__}">Show</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>


    <div class="pagination">
        @if($orders->lastPage() > 1)

            @if($orders->currentPage() != 1)
                <li><a href="{{ $orders->url($orders->currentPage() - 1) }}" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
            @endif

            @for($i = 1; $i <= $orders->lastPage(); $i++)

                @if($orders->currentPage() == $i)
                        <li class="active"><a href="#">{{ $i }} <span class="sr-only">{{ $i }}</span></a></li>
                @else
                        <li><a href="{{$orders->url($i)}}">{{ $i }} <span class="sr-only">{{ $i }}</span></a></li>
                @endif

            @endfor
        @endif

        @if($orders->currentPage() != $orders->lastPage())
                <li><a href="{{ $orders->url($orders->currentPage() - 1) }}" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
        @endif
    </div>
</div>
@endif

