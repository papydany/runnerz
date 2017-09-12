<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('/')}}">HOME</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        @if (!Auth::guest())

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  {{ Auth::user()->name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">

                <li class="divider"></li>
                <li>
                    <a href="{{url('/logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
        @endif
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="{{url('runnaz_backend')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
             <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo0"><i class="fa fa-fw fa-bar-chart-o"></i> Admin<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo0" class="collapse">
                    <li>
                        <a href="{{url('create_admin')}}">Create Admin</a>
                    </li>
                    <li>
                        <a href="{{url('view_admin')}}">View Admin</a>
                    </li>
                </ul>
            </li>

             <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-bar-chart-o"></i> Services<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo1" class="collapse">
                    <li>
                        <a href="{{url('create_service')}}">Create Service</a>
                    </li>
                    <li>
                        <a href="{{url('view_service')}}">View Service</a>
                    </li>
                </ul>
            </li>
                <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-table"></i>Items<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo2" class="collapse">
                    <li>
                        <a href="{{url('create_item')}}">Create Item</a>
                    </li>
                    <li>
                        <a href="{{url('view_item')}}">View Item</a>
                    </li>
                </ul>
            </li>
              <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo5"><i class="fa fa-fw fa-edit"></i>Erran<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo5" class="collapse">
                    <li>
                        <a href="{{url('create_erran')}}">Create </a>
                    </li>
                    <li>
                        <a href="{{url('view_erran')}}">View</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-edit"></i>Set Phone & Email<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo3" class="collapse">
                    <li>
                        <a href="{{url('create_system')}}">Create </a>
                    </li>
                    <li>
                        <a href="{{url('view_system')}}">View</a>
                    </li>
                </ul>
            </li>
               <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw fa-edit"></i>Order<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo4" class="collapse">
                    <li>
                        <a href="{{url('new_order')}}">New </a>
                    </li>
                    <li>
                        <a href="{{url('cancelled_order')}}">Cancelled</a>
                    </li>
                     <li>
                        <a href="{{url('shipped_order')}}">Shiped</a>
                    </li>
                     <li>
                        <a href="{{url('delivered_order')}}">Delivered</a>
                    </li>
                     <li>
                        <a href="{{url('return_order')}}">Return</a>
                    </li>
                </ul>
            </li>
            <li>
              <a href="{{url('view_merchant')}}">Merchant</a>
            </li>

          <li>
              <a href="{{url('view_agent')}}">Agent</a>
            </li>
          
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>