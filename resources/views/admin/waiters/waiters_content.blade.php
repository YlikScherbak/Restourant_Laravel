<h2 align="center">All waiters</h2>

<div class="container">
    <table class="table table-striped table-hover table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Enable</th>
            <th>Edit</th>
            <th>Disable/Enable</th>
        </tr>
        </thead>
        <tbody>
        @if($waiters)
            @foreach($waiters as $waiter)
                <tr>
                    <td>{{ $waiter->username }}</td>
                    <td>{{ ($waiter->enabled) ? 'true' : 'false' }}</td>
                    <td><a class="btn btn-success" href="{{ route('waiter_edit', ['id' => $waiter->id]) }}">Edit</a></td>
                    <div>@if($waiter->enabled)
                            <td>
                                <form action="{{ route('waiter_enabled') }}" method="POST">
                                    <input type="hidden" name="id" value="{{ $waiter->id }}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger" type="submit">Disable</button>
                                </form>
                            </td>
                        @else
                            <td>
                                <form action="{{ route('waiter_enabled') }}" method="POST">
                                    <input type="hidden" name="id" value="{{ $waiter->id }}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-success" type="submit">Enable</button>
                                </form>
                            </td>
                        @endif
                    </div>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>

