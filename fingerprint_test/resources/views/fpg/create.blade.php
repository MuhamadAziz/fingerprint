@extends('weguru')
@section('content')
    <div id="content"><!--start content-->
      <div class="panel box-shadow-none content-header">
              <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Mesin</h3>
                    <p class="animated fadeInDown">
                      Fingerprint <span class="fa-angle-right fa"></span> Tambah Mesin
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
                          <form class="cmxform" method="post" action="{{ route('fingerprintguru_create') }}">
                          {!! csrf_field() !!}                          
                              <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" class="form-text" id="validate_nis" name="ip" required>
                                    <span class="bar"></span>
                                    <label>IP Address</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="comkey" name="comkey" required>
                                <span class="bar"></span>
                                <label>COM Key</label>
                                </div>
                              </div>
                            {{--<div class="col-md-4">--}}
                              {{--<div class="form-group form-animate-text" >--}}
                              {{--  <input type="text" class="form-text" id="port" name="port" required>--}}
                              {{--  <span class="bar"></span>--}}
                              {{--  <label>Port</label>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-md-6">
                              <div class="form-group"><label class="col-sm-2 control-label text-left">Status</label>
                                <div class="col-sm-10">
                                  <div class="col-sm-12 padding-0">
                                    <select class="form-control" name="status">
                                      <option selected disabled="">Status</option>
                                      <option value="1">Aktif</option>
                                      <option value="0">Tidak Aktif</option>
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
  $(document).ready(function() {
    $('#comkey').mask('00000');
    $('#ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
      translation: {
        'Z': {
          pattern: /[0-9]/, optional: true
        }
      }
    });
    $('select').material_select();
  });
</script>
<!-- end: Javascript -->
@endsection