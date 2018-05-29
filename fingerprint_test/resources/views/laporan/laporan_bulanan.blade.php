@extends('welcome')
@section('content')
<?php 
use App\Kehadiran;
use App\Ketidakhadiran;
?>
<div id="content"><!--content-->
      <div class="tabs-wrapper text-center"><!--tabwrapper-->
        <div class="panel box-shadow-none text-left content-header">
          <div class="panel-body" style="padding-bottom:0px">
            <div class="col-md-12">
              <h3 class="animated fadeInLeft">Laporan</h3>
              <p class="animated fadeInDown">Fingerprint <span class="fa-angle-right fa"></span> Laporan Bulanan
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
                <div class="panel-heading"><h3>Laporan Bulanan </h3>
                      </div>
                <div class="panel-body">
                  <div class="responsive-table">
				<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
					<tr>
						<?php 
						$nama_bulan = "";
						$bulan_sekarang = date("m");
						$tahun_sekarang = date("Y");

						//ambil jumlah hari dalam satu bulan
						$maxday = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

						switch ($bulan) {
							case '1':
							$nm_bulan = "Januari";
							break;

							case '2':
							$nm_bulan = "Februari";
							break;

							case '3':
							$nm_bulan = "Maret";
							break;

							case '4':
							$nm_bulan = "April";
							break;

							case '5':
							$nm_bulan = "Mei";
							break;

							case '6':
							$nm_bulan = "Juni";
							break;

							case '7':
							$nm_bulan = "Juli";
							break;

							case '8':
							$nm_bulan = "Agustus";
							break;

							case '9':
							$nm_bulan = "September";
							break;

							case '10':
							$nm_bulan = "Oktober";
							break;

							case '11':
							$nm_bulan = "November";
							break;

							case '12':
							$nm_bulan = "Desember";
							break;
							
							default:

							break;
						}
						echo $nm_bulan;

						$tgl = $tahun."-".$bulan;
						?>
					</tr>
					<tr>
						<th></th>
						@for($a = 1;$a <= $maxday; $a++)
						<?php 
						//filter hari kerja
						$tanggal_string = $tahun."-".$bulan."-".$a;
						$tanggal_format = DateTime::createFromFormat('Y-m-d', $tanggal_string);
						$tanggal_nama = $tanggal_format->format('D');
						if ($tanggal_nama == "Sat" || $tanggal_nama == "Sun") {
							$warna = "red";
						}else{
							$warna = "black";
						}
						?>
						<th style="color: {{$warna}};">{{$a}}</th>
						@endfor
						<th>hadir</th>
						<th>sakit</th>
						<th>izin</th>
						<th>alpha</th>
					</tr>
					<?php
					$jumlah_hadir = 0;
					$jumlah_sakit = 0;
					$jumlah_izin = 0;
					$jumlah_alpha = 0;
					 ?>
					@foreach($siswa as $r)
					<tr>
						<td>{{$r->nama}}</td>
						@for($a = 1;$a <= $maxday; $a++)
						<?php 
						//filter hari kerja
						$tanggal_string = $tahun."-".$bulan."-".$a;
						$tanggal_format = DateTime::createFromFormat('Y-m-d', $tanggal_string);
						$tanggal_nama = $tanggal_format->format('D');
						if ($tanggal_nama == "Sat" || $tanggal_nama == "Sun") {
							$ket = "L";
							$warna = "red";
						}else{
							$ket = "";
							$warna = "black";
						}


						$hadir = Kehadiran::where('nis',$r->nis)->where('tanggal',$tgl."-".$a)->count();
						if ($hadir > 0) {
							$jumlah_hadir++;
							?>
							<td>H</td>
							<?php 
						}else{
							$tidakhadir_count = Ketidakhadiran::where('nis',$r->nis)->where('tanggal',$tgl."-".$a)->count();
							if ($tidakhadir_count >0) {
								$tidakhadir = Ketidakhadiran::where('nis',$r->nis)->where('tanggal',$tgl."-".$a)->first();
								switch ($tidakhadir->keterangan) {
										case 'sakit':
											$jumlah_sakit++;
											break;

										case 'izin':
											$jumlah_izin++;
											break;
										
										case 'alpha':
											$jumlah_alpha++;
											break;

										default:
											
											break;
									}	
								?>
								<td>{{$tidakhadir->keterangan}}</td>
								<?php
							}else{
								?>
								<td style="color: {{$warna}}">{{$ket}}</td>
								<?php
							}
						}
						?>
						@endfor
						<td>
							{{$jumlah_hadir}}
						</td>
						<td>
							{{$jumlah_sakit}}
						</td>
						<td>
							{{$jumlah_izin}}
						</td>
						<td>
							{{$jumlah_alpha}}
						</td>
					</tr>
					@endforeach
				</table>
				<button class="btn-sm btn-primary" name="print" value="Print"><span class="glyphicon glyphicon-arrow-left"><a href="{{route('laporan')}}" style="color:white; font-weight: normal"></span> &nbsp;Kembali</a></button>
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
</script>
@endsection