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
              <p class="animated fadeInDown">Fingerprint <span class="fa-angle-right fa"></span> Laporan Harian
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
                <div class="panel-heading"><h3>Laporan Harian </h3>
                      </div>
                <div class="panel-body">
                  <div class="responsive-table">
<form method="post" action="/print_harian/{{$rombel}}/{{$tanggal}}">
	{{ csrf_field() }}
	<button class="btn-sm btn-primary" type="submit" name="print" value="Print"><span class="glyphicon glyphicon-print"></span> &nbsp;Print</button>
	<button class="btn-sm btn-primary" name="print" value="Print"><span class="glyphicon glyphicon-arrow-left"><a href="{{route('laporan')}}" style="color:white; font-weight: normal"></span> &nbsp;Kembali</a></button>
</form>
<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
	<tr>
		<td>NIS</td>
		<td>Nama</td>
		<td>Jenis Kelamin</td>
		<td>Rombel</td>
		<td>Rayon</td>
		<td>Keterangan</td>
	</tr>
	<?php 
	foreach ($siswa as $r) {
		$hadir = Kehadiran::where('nis',$r->nis)->where('tanggal',$tanggal)->count();
		if ($hadir > 0) {
			?>
			<tr>
				<td>{{$r->nis}}</td>
				<td>{{$r->nama}}</td>
				<td>{{$r->jk}}</td>
				<td>{{$r->rombel}}</td>
				<td>{{$r->nama_rayon}}</td>
				<td>hadir</td>
			</tr>

			<?php 
		}else{
			$tidakhadir_count = Ketidakhadiran::where('nis',$r->nis)->where('tanggal',$tanggal)->count();
			if ($tidakhadir_count >0) {
				$tidakhadir = Ketidakhadiran::where('nis',$r->nis)->where('tanggal',$tanggal)->first();	
				?>
				<tr>
					<td>{{$r->nis}}</td>
					<td>{{$r->nama}}</td>
					<td>{{$r->jk}}</td>
					<td>{{$r->rombel}}</td>
					<td>{{$r->nama_rayon}}</td>
					<td>{{$tidakhadir->keterangan}}</td>
				</tr>
				<?php
			}else{
				?>
				<tr>
					<td>{{$r->nis}}</td>
					<td>{{$r->nama}}</td>
					<td>{{$r->jk}}</td>
					<td>{{$r->rombel}}</td>
					<td>{{$r->nama_rayon}}</td>
					<td>belum diinput</td>
				</tr>
				<?php
			}
		}
	}
	?>
</table>
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