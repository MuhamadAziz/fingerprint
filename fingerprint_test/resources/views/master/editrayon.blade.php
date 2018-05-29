@extends('welcome')
@section('content')

    <div id="content"><!--start content-->
      <div class="panel box-shadow-none content-header">
              <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Edit Rayon</h3>
                    <p class="animated fadeInDown">
                      Fingerprint <span class="fa-angle-right fa"></span> Ubah Data Rayon
                    </p>
                </div>
              </div>
            </div>
            <div class="form-element">
              <div class="col-md-12 padding-0">
              <div class="col-md-12">
                  <div class="col-md-12 panel">
                      <div class="col-md-12 panel-heading">
                        <h4>Ubah Data Rayon</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">
                          <form class="cmxform" id="signupForm" method="post" action="{{route('rayon_update', $data->id_rayon)}}">
                          {!! csrf_field() !!}                            
                              <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" class="form-text" id="validate_nis" value="{{$data->id_rayon}}" name="id_rayon" readonly autofocus="true">
                                    <span class="bar"></span>
                                    <label>ID Rayon</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="validate_nama" value="{{$data->nama_rayon}}" name="rayon" required>
                                <span class="bar"></span>
                                <label>Nama Rayon</label>
                                </div>
                              </div>
                            <div class="col-md-12" style="margin-top: 20px;">
                                <input class="submit btn btn-primary" type="submit" value="Submit">
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div><!--end form element-->
    </div><!--end content-->
  </div><!--end container-->
@endsection
@section('asset_footer')
  <script src="{{ url('asset/js/mdb.min.js') }}"></script>     
  <script type="text/javascript">
  $(document).ready(function(){
     // Material Select Initialization
    $(document).ready(function() {
      $('.mdb-select').material_select();
    });
  });
</script>
@endsection