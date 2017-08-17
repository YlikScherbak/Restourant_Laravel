@if($mains)
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th>Category name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mains as $main)
                <tr>
                    <td>{{ $main->category }}</td>
                    <td><a class="btn btn-success" href="{{ route('menu_edit_main', ['id' => $main->id]) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('menu_delete_main') }}" method="POST">
                            <input type="hidden" name="id" value="{{ $main->id }}">
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