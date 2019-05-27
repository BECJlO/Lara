  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('img/profile-img.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }} {{ Auth::user()->user_mid_name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @foreach($pages as $page)
          @if(is_array($page['subItems']))
            <li class="treeview">
            <a  href="#">
          @else
              <li>
              <a  href="{{ route($page['url']) }}">
          @endif
            <i class="fa {{$page['icon']}}"></i> <span>{{$page['title']}}</span>
              @if(is_array($page['subItems']))
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              @endif
            </a>
            @if(is_array($page['subItems']))
              <ul class="treeview-menu">
                @foreach($page['subItems'] as $subItem)
                <li class="active"><a href="{{ route($page['url'])}}"><i class="fa fa-circle-o"></i>{{$subItem}}</a></li>
                @endforeach
              </ul>
            @endif
          </li>
        @endforeach
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
