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
                          <form class="cmxform" id="signupForm" method="post" action="{{route('rombel_update', $date->id_rombel)}}">
                          {!! csrf_field() !!}                            
                              <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" class="form-text" id="validate_nis" value="{{$data->id_rombel}}" name="id_rayon" readonly autofocus="true">
                                    <span class="bar"></span>
                                    <label>ID Rombel</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="validate_nama" value="{{$data->rombel}}" name="rombel" required>
                                <span class="bar"></span>
                                <label>Rombel</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                              <div class="form-group"><label class="col-sm-2 control-label text-left">Jurusan</label>
                                <div class="col-sm-10">
                                  <div class="col-sm-12 padding-0">
                                    <select class="form-control" name="jurusan">
                                      <option selected disabled="">Pilih Jurusan</option>
                                      @foreach ($jurusan as $jurusan)
                                        <option value="{{$jurusan->id_jurusan}}" @if ($data->id_jurusan == $jurusan->id_jurusan) selected @endif>{{$jurusan->nama_jurusan}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
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