  <!--header-->
    <nav class="navbar navbar-default header navbar-fixed-top">
      <div class="col-md-12 nav-wrapper"><!-- nav wrapper --> 
        <div class="navbar-header" style="width: 100%"><!--navbar header-->
          <div class="opener-left-menu is-open"><!--opener-->
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
          </div><!--end opener-->
          <a href="{{route('home')}}" class="navbar-brand">
            <b>Fingerprint</b>
          </a>

          <ul class="nav navbar-nav navbar-right user-nav"><!--navbar right-->
            <li class="user-name"><span> {{ Auth::user()->username }}</span></li>
            <li class="dropdown avatar-dropdown">
              <img src="{{ url('asset/img/avatar.jpg') }}" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <ul class="dropdown-menu user-dropdown">
                <li><a href="#"><span class="fa fa-user"></span> My Profile</a>
                </li>
                <li role="separator" class="divider"></li>
                <li class="more">
                  <ul>
                    <li><a href="{{ route('logout') }}"><span class="fa fa-power-off" title="Log Out"></span></a></li>
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
          <?php if(Auth::user()->level == "petugas_piket" || Auth::user()->level =="admin"){ ?>
          <li class="ripple @if(str_is(route('home').'*',url()->current())) active @endif">
            <a href="{{route('home')}}"><span class="fa-home fa"></span>Dashboard</a>
          </li>
          <?php } ?>
          <?php if(Auth::user()->level == "petugas_piket"){ ?>
          <li class="ripple @if(str_is(route('index').'*',url()->current()) ||  str_is(route('ketidakhadiran').'*',url()->current())) active @endif"><a href="" class="tree-toggle nav-header"><span class="fa-clipboard fa"></span>Absensi<span class="fa-angle-right fa right-arrow text-right"></span></a>
            <ul class="nav nav-list tree">
                  <li><a href="{{route('index')}}">Kehadiran</a></li>
                  <li><a href="{{route('ketidakhadiran')}}">Ketidakhadiran</a></li>
            </ul>
          </li>
          <?php } ?>
          <?php if(Auth::user()->level =="admin"){ ?>
          <li class="ripple @if(str_is(route('laporan').'*',url()->current())) active @endif">
            <a href="{{route('laporan')}}"><span class="fa-briefcase fa"></span>Laporan</a>
          </li>
          <li class="ripple @if(str_is(route('siswa_index').'*',url()->current())) active @endif"><a href="{{route('siswa_index')}}"><span class="fa fa-pencil-square-o"></span>Master</a></li>
          <li class="ripple @if(str_is(route('fingerprint_index').'*',url()->current())) active @endif">
            <a href="{{route('fingerprint_index')}}"><span class="fa-folder fa"></span>Mesin Absen</a>
          </li>
          <?php } ?>
          <!--<li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-envelope-o"></span> Mail <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="mail-box.html">Inbox</a></li>
                        <li><a href="compose-mail.html">Compose Mail</a></li>
                        <li><a href="view-mail.html">View Mail</a></li>
                      </ul>
                    </li>
                  -->
                    <li class="divider"></li>
                    <li class="ripple @if(str_is(route('about').'*',url()->current())) active @endif"><a href="{{route('about')}}"><span class="fa fa-info-circle"></span>About</a></li>
                    <li class="ripple @if(str_is(route('credit').'*',url()->current())) active @endif"><a href="{{route('credit')}}"><span class="fa fa-exchange"></span>Credits</a></li>
        </ul>
      </div><!--end sub left-->
    </div><!--end leftmenu-->
