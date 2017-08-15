<div class="container">
    @if($floors)

        <ul class="nav nav-pills">
            @foreach($floors as $floor)
                <li><a href="#{{ $floor->id }}" data-toggle="tab">{{ $floor->floor_name }}</a></li>
            @endforeach
        </ul>
        <ul class="tab-content tab-content-menu">
            @foreach($floors as $floor)
                <li class="tab-pane" id="{{ $floor->id }}">
                    @foreach($floor->tables as $table)
                        {{--{{ dd($table) }}--}}
                        @if($table->occupied === true)
                            <span><a href="{{ route('waiter_order', ['id' => $table->order_id]) }}"
                                         class="{{ ($table->user->username == Auth::user()->username) ? 'btn btn-primary btn-lg btn-huge' : 'btn btn-danger disabled btn-lg btn-huge'}}">Table№
                                    <span>{{ $table->id }}</span><br/><span>{{ $table->user->username ? $table->user->username : ' ' }}</span></a></span>
                        @else
                            <a href="{{ route('create_order', ['id' => $table->id]) }}"
                                   class="btn btn-success btn-lg btn-huge">Table№ {{ $table->id }}<span></span></a>
                        @endif
                    @endforeach
                </li>
            @endforeach
        </ul>
    @endif
</div>

