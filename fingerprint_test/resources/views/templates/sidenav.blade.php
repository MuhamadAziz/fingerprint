  <!--header-->
    <nav class="navbar navbar-default header navbar-fixed-top">
      <div class="col-md-12 nav-wrapper"><!-- nav wrapper --> 
        <div class="navbar-header" style="width: 100%"><!--navbar header-->
          <div class="opener-left-menu is-open"><!--opener-->
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
          </div><!--end opener-->
          <a href="{{route('guru')}}" class="navbar-brand">
            <b>Fingerprint</b>
          </a>

          <ul class="nav navbar-nav navbar-right user-nav"><!--navbar right-->
            <li class="user-name"><span> </span></li>
            <li class="dropdown avatar-dropdown">
              <img src="{{ url('asset/img/avatar.jpg') }}" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <ul class="dropdown-menu user-dropdown">
                <li><a href="#"><span class="fa fa-user"></span> My Profile</a>
                </li>
                <li role="separator" class="divider"></li>
                <li class="more">
                  <ul>
                    <li><a href="{{ route('keluar') }}"><span class="fa fa-power-off" title="Log Out"></span></a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul><!--end navbar right-->
        </div><!--end navbar header-->
      </div><!--end nav wrapper-->
    </nav>
  <!--endheader-->

  <div class="container-fluid mimin-wrapper"><!--container-->
    <div id="left-menu"><!--leftmenu-->
      <div class="sub-left-menu scroll"><!--sub left-->
        <ul class="nav nav-list">
          <li><div class="left-bg"></div></li>
          <li class="time">
            <h1 class="animated fadeInLeft">20:00</h1>
            <p class="animated fadeInRight">Sat, March 3rd 2001</p>
          </li>
          <li class="ripple @if(str_is(route('guru').'*',url()->current())) active @endif">
            <a href="{{route('guru')}}"><span class="fa-home fa"></span>Dashboard</a>
          </li>
          <li class="ripple @if(str_is(route('ketidakhadiranguru').'*',url()->current())) active @endif"><a href="{{route('ketidakhadiranguru')}}"><span class="fa-clipboard fa"></span>Absensi Guru Tidak Hadir</a></li>
          <li class="ripple @if(str_is(route('guru_index').'*',url()->current())) active @endif"><a href="{{route('guru_index')}}"><span class="fa fa-pencil-square-o"></span>Data Guru</a></li>
          <li class="ripple @if(str_is(route('fingerprintguru_index').'*',url()->current())) active @endif">
            <a href="{{route('fingerprintguru_index')}}"><span class="fa-folder fa"></span>Mesin Absen</a>
          </li>
        </ul>
      </div><!--end sub left-->
    </div><!--end leftmenu-->
