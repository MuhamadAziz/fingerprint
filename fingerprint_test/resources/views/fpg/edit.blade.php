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
                        <h4>Form Mesin</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">
                          <form class="cmxform" method="post" action="{{ route('fingerprintguru_update') }}">
                          {!! csrf_field() !!}          
                          <input type="hidden" name="id" value="{{ $data->id }}">                
                              <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" class="form-text" id="validate_nis" name="ip" required value="{{$data->ip}}">
                                    <span class="bar"></span>
                                    <label>IP Address</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="comkey" name="comkey" required value="{{$data->comkey}}">
                                <span class="bar"></span>
                                <label>COM Key</label>
                                </div>
                              </div>
                            {{--<div class="col-md-4">--}}
                              {{--<div class="form-group form-animate-text" >--}}
                              {{--  <input type="text" class="form-text" id="port" name="port" required value="{{$data->port}}">--}}
                              {{--  <span class="bar"></span>--}}
                              {{--  <label>Port</label>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="comkey" name="lokasi" required value="{{$data->lokasi}}">
                                <span class="bar"></span>
                                <label>Lokasi Mesin</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group"><label class="col-sm-2 control-label text-left">Status</label>
                                <div class="col-sm-10">
                                  <div class="col-sm-12 padding-0">
                                    <select class="form-control" name="status">
                                      <option selected disabled="">Status</option>
                                      <option value="1" @if ($data->status == 1) selected @endif>Aktif</option>
                                      <option value="0" @if ($data->status == 0) selected @endif>Tidak Aktif</option>
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
