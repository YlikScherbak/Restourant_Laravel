<div class="container">
    <table class="table  table-hover table-bordered">
        <thead>
        <tr>
            <th>№</th>
            <th>Order№</th>
            <th>Waiter</th>
            <th>Time</th>
            <th>Message</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($errors as $error)
            <tr>
                <td>{{ $error->id }}</td>
                <td>{{ $error->order_id }}</td>
                <td>{{ $error->waiter }}</td>
                <td>{{ $error->date }}</td>
                <td>{{ $error->message }}</td>
                <td><a class="btn btn-warning" href="{{ route('delete_message', ['id' => $error->id]) }}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>