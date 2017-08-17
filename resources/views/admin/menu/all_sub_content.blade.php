@if($subcategories)
<div class="container">
    <table class="table table-striped table-hover table-bordered table-condensed">
        <thead>
        <tr>
            <th>Subcategory name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subcategories as $sub)
        <tr>
            <td>{{ $sub->sub_category }}</td>
            <td><a class="btn btn-success" href="{{ route('menu_edit_sub', ['id' =>$sub->id ]) }}">Edit</a></td>
            <td><form action="{{ route('menu_delete_sub') }}" method="POST">
                    <input type="hidden" name="id" value="{{ $sub->id }}">
                    {{ csrf_field() }}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif