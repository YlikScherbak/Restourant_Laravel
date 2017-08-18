<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked admin-menu">
                <li class="active"><a href="#" data-target-id="home"><i class="glyphicon glyphicon-home"></i> Home</a>
                </li>
                <li><a href="#" data-target-id="users"><i class="glyphicon glyphicon-user"></i> Users</a></li>
                <li><a href="#" data-target-id="menu"><i class="glyphicon glyphicon-cutlery"></i> Menu</a></li>
                <li><a href="#" data-target-id="orders"><i class="glyphicon glyphicon-th-list"></i> Orders</a></li>
                <li><a href="#" data-target-id="error"><i class="glyphicon glyphicon-exclamation-sign"></i> Messages
                        @if($activeErrors)
                        <span class="badge badge-info">{{ $activeErrors }}</span>
                        @endif
                    </a></li>
                <li><a href="#" data-target-id="shift"><i class="glyphicon glyphicon-bell"></i> Work shift</a></li>
                <li><a href="#" data-target-id="reports"><i class="glyphicon glyphicon-list-alt"></i> Shift and reports</a>
                </li>
            </ul>
        </div>

        <!-- Приветствие -->
        <div class="col-md-9 well admin-content" id="home">
            <h2 align="center">{{ 'Welcome ' . Auth::user()->username . ' to admin page' }}</h2>
            @if($errors)
{{--            <div  class="alert alert-danger" role="alert">{{ $errors }}</div>--}}
            @endif
            @if(Session::has('message'))
               <div  class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
        </div>

        <!-- Официанты -->
        <div class="col-md-9 well admin-content" id="users">
            <div class="btn-group btn-group-justified">
                <a href="{{ route('waiter_registry') }}" class="btn btn-primary col-sm-3">
                    <i class="glyphicon glyphicon-plus"></i><br/>
                    Add waiter
                </a>
                <a href="{{ route('admin_all_waiter') }}" class="btn btn-primary col-sm-3">
                    <i class="glyphicon glyphicon-list"></i><br/>
                    Show all waiter
                </a>
            </div>
        </div>

        <!-- Менюха -->
        <div class="col-md-9 well admin-content" id="menu">
            <div class="btn-group btn-group-justified">
                <a href="{{ route('waiter_add_main') }}" class="btn btn-primary  btn-lg col-sm-3">
                    <i class="glyphicon glyphicon-th-large"></i><br/>
                    Add main category
                </a>
                <a href="{{ route('waiter_add_sub') }}" class="btn btn-primary btn-lg  col-sm-3">
                    <i class="glyphicon glyphicon-th"></i><br/>
                    Add subcategory
                </a>
                <a href="{{ route('waiter_add_prod') }}" class="btn btn-primary btn-lg col-sm-3">
                    <i class="glyphicon glyphicon-cutlery"></i><br/>
                    Add product
                </a>
            </div>
            <div class="btn-group btn-group-justified">
                <a href="{{ route('menu_all_main') }}" class="btn btn-primary btn-lg col-sm-3">
                    Show main categories
                </a>
                <a href="{{ route('menu_all_sub') }}" class="btn btn-primary btn-lg col-sm-3">
                    Show subcategories
                </a>
                <a href="{{ route('menu_all_prod') }}" class="btn btn-primary btn-lg col-sm-3">
                    Show products
                </a>
            </div>
        </div>

        <!-- Заказы -->
        <div class="col-md-9 well admin-content" id="orders">
            <div class="navbar">
                <div class="container">
                    <div class="collapse navbar-collapse">
                        <a href="{{ route('all_waiters_orders') }}" class="btn btn-primary">
                            <i class="glyphicon glyphicon-list-alt"></i><br/>
                            Show all orders
                        </a>
                        <a href="{{ route('all_waiters_orders', ['active' => true]) }}" class="btn btn-primary">
                            <i class="glyphicon glyphicon-play-circle"></i><br/>
                            Show all active orders
                        </a>
                        <form class="navbar-form navbar-left" role="search" action="{{ route('search_order') }}"
                              method="post">
                            <div class="form-group">
                                {{ csrf_field() }}
                                <input type="text" class="form-control" name="id" placeholder="Search order dy id"/>
                            </div>
                            <button type="submit" class="btn btn-default">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Сообщения об ошибках -->
        <div class="col-md-9 well admin-content text-center" id="error">
            @if($activeErrors != 0)
            <div>
                <h2 align="center">{{ 'You have ' . $activeErrors . ' messages from waiter' }}</h2>
                <a href="{{ route('admin_messages') }}" class="btn btn-primary">
                    <i class="glyphicon glyphicon-list"></i><br/>
                    Show all message
                </a>
            </div>
            @else
            <h2 align="center">You have not messages from waiters</h2>
            @endif
        </div>


        <!-- Смена  -->
        <div class="col-md-9 well admin-content text-center" id="shift">
            @if(!is_null($workShift))
            <div>
                <h2 align="center">{{ 'Work shift №' . $workShift->id . ' is open' }}</h2>
                <a href="{{ route('close_shift') }}" class="btn btn-danger">
                    <i class="glyphicon glyphicon-off"></i><br/>
                    Close Shift
                </a>
            </div>
            @else
            <div>
                <h2 align="center">No open shift</h2>
                <a href="{{ route('open_shift') }}" class="btn btn-primary">
                    <i class="glyphicon glyphicon-play-circle"></i><br/>
                    Open new shift
                </a>
            </div>
            @endif
        </div>

        <!-- Отчёти  -->
        <div class="col-md-9 well admin-content text-center" id="reports">
            <a href="{{ route('all_shift') }}" class="btn btn-primary col-sm-3">
                <i class="glyphicon glyphicon-list-alt"></i><br/>
                Show all shifts
            </a>
            <form class="navbar-form navbar-right" role="search" th:action="@{/admin/shifts/search}" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="id" placeholder="Search shift by id"/>
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
        </div>

    </div>


</div>

<script>
    $(document).ready(function () {
        var navItems = $('.admin-menu li > a');
        var navListItems = $('.admin-menu li');
        var allWells = $('.admin-content');
        var allWellsExceptFirst = $('.admin-content:not(:first)');

        allWellsExceptFirst.hide();
        navItems.click(function (e) {
            e.preventDefault();
            navListItems.removeClass('active');
            $(this).closest('li').addClass('active');

            allWells.hide();
            var target = $(this).attr('data-target-id');
            $('#' + target).show();
        });
    });
</script>