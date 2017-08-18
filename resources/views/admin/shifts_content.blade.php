<div class="container">
    <table class="table table-striped table-hover table-bordered table-condensed">
        <thead>
        <tr>
            <th>Shift№</th>
            <th>Open date</th>
            <th>Closed date</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($shifts as $shift)
            <tr>
                <td>{{ $shift->id }}</td>
                <td>{{ $shift->creation_date }}</td>
                <td>{{ $shift->closed_date }}</td>
                <td><a class="btn btn-success" href="{{ route('shift_report', ['id' => $shift['generalReport']['id']]) }}">Report</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <div class="pagination">
        @if($shifts->lastPage() > 1)

            @if($shifts->currentPage() != 1)
                <li><a href="{{ $shifts->url($shifts->currentPage() - 1) }}" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
            @endif

            @for($i = 1; $i <= $shifts->lastPage(); $i++)

                @if($shifts->currentPage() == $i)
                    <li class="active"><a href="#">{{ $i }} <span class="sr-only">{{ $i }}</span></a></li>
                @else
                    <li><a href="{{$shifts->url($i)}}">{{ $i }} <span class="sr-only">{{ $i }}</span></a></li>
                @endif

            @endfor
        @endif

        @if($shifts->currentPage() != $shifts->lastPage())
            <li><a href="{{ $shifts->url($shifts->currentPage() - 1) }}" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
        @endif
    </div>
</div>