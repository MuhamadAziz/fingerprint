@extends('welcome')
@section('content')
    <div id="content"><!--start content-->
      <div class="panel box-shadow-none content-header">
              <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Form Element</h3>
                    <p class="animated fadeInDown">
                      Form <span class="fa-angle-right fa"></span> Form Element
                    </p>
                </div>
              </div>
            </div>
            <div class="form-element">
              <div class="col-md-12 padding-0">
              <div class="col-md-12">
                  <div class="col-md-12 panel">
                      <div class="col-md-12 panel-heading">
                        <h4>Form Validation</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">
                          <form class="cmxform" id="signupForm" method="post" action="{{route('siswa_update', $data->nis)}}">
                          {!! csrf_field() !!}                            
                              <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" class="form-text" id="validate_nis" value="{{$data->nis}}" name="nis" readonly autofocus="true">
                                    <span class="bar"></span>
                                    <label>NIS</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="validate_nama" value="{{$data->nama}}" name="nama" required>
                                <span class="bar"></span>
                                <label>Nama</label>
                                </div>
                              </div>
                            <div class="col-md-6">
                              <div class="form-group"><label class="col-sm-2 control-label text-left">Rayon</label>
                                <div class="col-sm-10">
                                  <div class="col-sm-12 padding-0">
                                    <select class="form-control" name="rayon">
                                      <option selected disabled="">Pilih Rayon</option>
                                      @foreach ($rayon as $rayon)
                                        <option value="{{$rayon->id_rayon}}" @if ($data->id_rayon == $rayon->id_rayon) selected @endif>{{$rayon->nama_rayon}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group"><label class="col-sm-2 control-label text-left">Rombel</label>
                                <div class="col-sm-10">
                                  <div class="col-sm-12 padding-0">
                                    <select class="form-control mdb-select" name="rombel">
                                      <option selected disabled="">Pilih Rombel</option>
                                      @foreach ($rombel as $rombel)
                                        <option value="{{$rombel->id_rombel}}" @if ($data->id_rombel == $rombel->id_rombel) selected @endif>{{$rombel->rombel}}</option>
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
  <script src="{{ url('asset/js/plugins/jquery.knob.js') }}"></script>
  <script src="{{ url('asset/js/plugins/ion.rangeSlider.min.js') }}"></script>
  <script src="{{ url('asset/js/plugins/bootstrap-material-datetimepicker.js') }}"></script>
  <script src="{{ url('asset/js/plugins/jquery.mask.min.js') }}"></script>
  <script src="{{ url('asset/js/plugins/select2.full.min.js') }}"></script>
  <script src="{{ url('asset/js/plugins/nouislider.min.js') }}"></script>
  <script src="{{ url('asset/js/plugins/jquery.validate.min.js') }}"></script>
  <script src="{{ url('asset/js/mdb.min.js') }}"></script>     
  <script type="text/javascript">
  $(document).ready(function(){
     // Material Select Initialization
    $(document).ready(function() {
      $('.mdb-select').material_select();
    });
    $("#signupForm").validate({
      errorElement: "em",
      errorPlacement: function(error, element) {
        $(element.parent("div").addClass("form-animate-error"));
        error.appendTo(element.parent("div"));
      },
      success: function(label) {
        $(label.parent("div").removeClass("form-animate-error"));
      },
      rules: {
        validate_nis: "required",
        validate_nama: "required",
        validate_tempat: {
          required: true,
          minlength: 2
        },
        validate_alamat: {
          required: true,
          minlength: 5
        },
        
      },
      messages: {
        validate_nis: "Please enter your firstname",
        validate_nama: "Please enter your lastname",
        validate_tempat: {
          required: "Please enter a place",
          minlength: "Your place must consist of at least 2 characters"
        },
      }
    });
    $('.dateAnimate').bootstrapMaterialDatePicker({ weekStart : 1, time: false,animation:true});
  });
</script>
<!-- end: Javascript -->
@endsection