@extends('welcome')
@section('content')
<div id="content"><!--content-->
			<div class="tabs-wrapper text-center"><!--tabwrapper-->
				<div class="panel box-shadow-none text-left content-header">
					<div class="panel-body" style="padding-bottom:0px">
						<div class="col-md-12">
							<h3 class="animated fadeInLeft">Absensi</h3>
							<p class="animated fadeInDown">Fingerprint <span class="fa-angle-right fa"></span> Absensi <span class="fa-angle-right fa"></span> ketidakhadiran</p>
						</div>

					</div>
				</div>
				<div><!-- col tab content-->
					<div role="tabpanel" class="tab-pane fade active in" id="tabs-area-demo" aria-labelledby="tabs1"><!--tabpanel demo-->
						<div class="col-md-12">
		                    <div class="col-md-12 tabs-area">
		                      <div class="liner"></div>
			                <div class="tab-content tab-content-v5">
			                  <div class="tab-pane fade in active" id="tabs-demo6-area1">
								<div class="panel">
								<div class="panel-heading"><h3>Data Siswa Tidak Hadir</h3>
                			</div>
								<div class="panel-body">
									<div class="responsive-table">
										<form id="teuaya" method="post" action="{{route('input_ketidakhadiran')}}">
										<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
											<thead>
												<tr>
						                          <th>No</th>
												  <th>NIS</th>
						                          <th>Nama</th>
						                          <th>Jurusan</th>
						                          <th>Rombel</th>
						                          <th>Rayon</th>
						                          <th>Keterangan</th>
												</tr>
											</thead>
											<tbody>
						                   	<?php 
												use App\Kehadiran;
												use App\Ketidakhadiran;
												$no = 0;
											?>
											
												{!! csrf_field() !!}
											<?php
											foreach ($siswa as $siswa) {
												$cek = Ketidakhadiran::where('nis',"=",$siswa->nis)->where('tanggal',date("Y-m-d"))->where('keterangan','!=',"")->first();
             									$cek_kehadiran = Kehadiran::where('nis',"=",$siswa->nis)->where('tanggal',date("Y-m-d"))->count();
												if ($cek_kehadiran > 0) {

												}else{
													if ($cek == "") {
														$no++;
														?>

												<tr>
						                          <td>{{ $no }}</td>
												  <td>{{ $siswa->nis }}</td>
						                          <td>{{ $siswa->nama }}</td>	
						                          <td>{{ $siswa->nama_jurusan }}</td>
						                          <td>{{ $siswa->rombel }}</td>
						                          <td>{{ $siswa->nama_rayon }}</td>
						                          <td>
						                          	<div class="form-animate-radio">
						                            <input type="hidden" name="input_nis[{{$no}}]" value="{{$siswa->nis}}">
													<label class="radio"><input type="radio" name="atten[{{$no}}]" value="Sakit" id="s"><span class="outer"><span class="inner"></span></span>Sakit</label> 
													<label class="radio"><input type="radio" name="atten[{{$no}}]" value="Izin" id="i"><span class="outer"><span class="inner"></span></span>Izin</label> 
													<label class="radio"><input type="radio" name="atten[{{$no}}]" value="Alpha" id="a"><span class="outer"><span class="inner"></span></span>Alpha</label> 
													</div>
						                          </td>
												</tr>
						                    <?php
													}		
												}
											}
											?>
											</tbody>
										</table>
											<input class="submit btn btn-primary" type="submit" value="Submit" id="btn_create">
										</form>
									</div>
								</div>
								
							  </div><!--panel-->
			                  </div><!--tab pane 1-->
			                  <div class="clearfix"></div>
			                </div>
		                    </div>
		                </div><!--col md12-->
					</div><!--end tabpanel demo-->
				</div><!--end col tab content-->
			</div><!--endtabwrapper-->
		</div><!--endcontent-->
	</div><!--endcontainer-->
@endsection
@section('asset_footer')
<script src="{{ url('asset/js/plugins/jquery.datatables.min.js') }}"></script>
<script src="{{ url('asset/js/plugins/datatables.bootstrap.min.js') }}"></script>
<!-- custom -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
  $('#teuaya').submit(function(e){
  	e.preventDefault();
  	serverSide: true,
    ajax{
        "url": "/ketidakhadiran/input",
        "type": "POST"
    },
    });
</script>
@endsection