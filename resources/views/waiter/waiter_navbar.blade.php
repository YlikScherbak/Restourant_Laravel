<div class="container">
    <div class="row">
        <div class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand pull-left" href="#" target="_blank">
                        <img src="{{ asset('/images/restaurant-logo-template_23-2147510426.jpg') }}"
                             style="max-width:100px; max-height: 40px; margin-top: -7px;"> </img>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="responsive-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('waiter_tables') }}">Tables</a></li>
                        <li><a href="{{ route('all_orders') }}">My orders</a></li>
                        <li><p class="navbar-text"
                               text="{{ \Carbon\Carbon::now()->toDateTimeString() }}"></p></li>
                    </ul>
                    <div class="navbar-form navbar-right">
                        <a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="glyphicon glyphicon-log-out"></i> Logout
                        </a>
                    </div>
                    <form id="logout-form" action="http://restourant.loc/logout" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>