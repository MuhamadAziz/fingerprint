@extends('welcome')
@section('content')
    <div id="content"><!--start content-->
      <div class="panel box-shadow-none content-header">
              <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Laporan</h3>
                    <p class="animated fadeInDown">
                      Fingerprint <span class="fa-angle-right fa"></span> Laporan Kehadiran
                    </p>
                </div>
              </div>
            </div>
            <div class="form-element">
              <div class="col-md-12 padding-0">
              <div class="col-md-12">
                  <div class="col-md-12 panel">
                      <div class="col-md-12 panel-heading">
                        <h4>Laporan Kehadiran</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">
	<form method="post" action="{{route('laporan_harian')}}">
		<div class="col-md-12">
			<h4 style="margin-bottom: 2%">Laporan Harian</h4>
		</div>
		<div class="col-md-4">
          <div class="form-group form-animate-text">
          	<input type="text" class="form-text dateAnimate" required name="input_tanggal">
          		<span class="bar"></span>
          	<label><span class="fa fa-calendar"></span> Tanggal </label>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group"><label class="col-sm-2 control-label text-left">Rombel</label>
            <div class="col-sm-10">
              <div class="col-sm-12 padding-0">
                <select class="form-control mdb-select" name="input_rombel">
                  <option selected disabled="">Pilih Rombel</option>
                  @foreach ($rombel as $r)
                    <option value="{{$r->id_rombel}}">{{$r->rombel}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
		{{ csrf_field() }}
		<div class="col-md-12" style="margin-bottom: 2%; margin-top: -2.5%;">
		<input class="btn btn-primary" type="submit" name="harian">
		</div>
	</form>
	<div class="clearfix"></div>
	<div class="col-md-12">
		<h4 style="margin-bottom: 2%">Laporan Bulanan</h4>
	</div>
	<form method="post" action="{{route('laporan_bu')}}">
		<?php 
		$index_bulan[1]= "Januari";
		$index_bulan[2]= "Februari";
		$index_bulan[3]= "Maret";
		$index_bulan[4]= "April";
		$index_bulan[5]= "Mei";
		$index_bulan[6]= "Juni";
		$index_bulan[7]= "Juli";
		$index_bulan[8]= "Agustus";
		$index_bulan[9]= "September";
		$index_bulan[10]= "Oktober";
		$index_bulan[11]= "November";
		$index_bulan[12]= "Desember";					
		?>
		<div class="col-md-4">
          <div class="form-group"><label class="col-sm-2 control-label text-left">Bulan</label>
            <div class="col-sm-10">
              <div class="col-sm-12 padding-0">
                <select class="form-control mdb-select" name="input_bulan">
                  <option selected disabled="">Pilih Bulan</option>
                  @for($bln = 1;$bln <= 12;$bln++)
                    <option value="{{$bln}}">{{$index_bulan[$bln]}}</option>
                  @endfor
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group"><label class="col-sm-2 control-label text-left">Tahun</label>
            <div class="col-sm-10">
              <div class="col-sm-12 padding-0">
                <select class="form-control mdb-select" name="input_tahun">
                  <option selected disabled="">Pilih Tahun</option>
                  @for($thn = date("Y");$thn >= 1996;$thn--)
					<option value="{{$thn}}">{{$thn}}</option>
				  @endfor
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group"><label class="col-sm-2 control-label text-left">Rombel</label>
            <div class="col-sm-10">
              <div class="col-sm-12 padding-0">
                <select class="form-control mdb-select" name="input_rombel">
                  <option selected disabled="">Pilih Rombel</option>
                  @foreach ($rombel as $r)
                    <option value="{{$r->id_rombel}}">{{$r->rombel}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
			{{ csrf_field() }}
		<div class="col-md-12" style="margin-top: 2%">
			<input class="btn btn-primary" type="submit" name="harian">
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
    $('.dateAnimate').bootstrapMaterialDatePicker({ weekStart : 1, time: false,animation:true});
  });
</script>
<!-- end: Javascript -->
@endsection