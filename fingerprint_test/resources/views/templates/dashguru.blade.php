@extends('weguru')

@section('content')
<div id="content"><!--content-->
      <div class="panel"><!--panel-->
        <div class="panel-body"><!--panelbody-->
          <div class="col-md-6 col-sm-12">
            <h3 class="animated fadeInLeft">{{ Auth::user()->username }}</h3>
            <p class="animated fadeInDown"><span class="fa fa-map-marker"></span> Bogor, Indonesia</p>
          </div>
          <div class="col-md-6 col-sm-12"><!--weather-->
            <div class="col-md-6 col-sm-6 text-right" style="padding-left: 10px;">
              <h3 style="color:#DDDDDE"><span class="fa fa-map-marker"></span> Bogor</h3>
              <h1 style="margin-top: -10px;color:#ddd">30<sup>o</sup></h1>
            </div>
                        <div class="col-md-6 col-sm-6">
                          <div class="wheather">
                            <div class="stormy rainy animated pulse infinite">
                              <div class="shadow"></div>
                            </div>
                        <div class="sub-wheather">
                  <div class="thunder"></div>
                  <div class="rain">
                    <div class="droplet droplet1"></div>
                    <div class="droplet droplet2"></div>
                    <div class="droplet droplet3"></div>
                    <div class="droplet droplet4"></div>
                    <div class="droplet droplet5"></div>
                    <div class="droplet droplet6"></div>
                  </div>
                </div>
                          </div>
          </div><!--end weather-->
        </div><!--end panelbody-->
      </div><!--endpanel-->
    </div><!--endcontent-->
  </div><!--endcontainer-->
@endsection