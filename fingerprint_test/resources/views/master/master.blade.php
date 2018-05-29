@extends('welcome')
@section('content')
<div id="content"><!--content-->
			<div class="tabs-wrapper text-center"><!--tabwrapper-->
				<div class="panel box-shadow-none text-left content-header">
					<div class="panel-body" style="padding-bottom:0px">
						<div class="col-md-12">
							<h3 class="animated fadeInLeft">Master</h3>
							<p class="animated fadeInDown">Fingerprint <span class="fa-angle-right fa"></span> Master</p>
						</div>
						<ul id="tabs-demo" class="nav nav-tabs content-header-tab" role="tablist" style="padding-top:10px;">
	                      <li role="presentation" class="active">
	                        <a href="#tabs-area-demo" id="tabs2" data-toggle="tab">Master</a>
	                      </li>
	                    </ul>
					</div>
				</div>
				<div><!-- col tab content-->
					<div role="tabpanel" class="tab-pane fade active in" id="tabs-area-demo" aria-labelledby="tabs1"><!--tabpanel demo-->
						<div class="col-md-12">
		                    <div class="col-md-12 tabs-area">
		                      <div class="liner"></div>
		                      <ul class="nav nav-tabs nav-tabs-v5" id="tabs-demo6">
		                        <li class="active">
			                         <a href="#tabs-demo6-area1" data-toggle="tab" title="Data Siswa">
			                          <span class="round-tabs one">
			                            <i class="glyphicon glyphicon-user"></i>
			                          </span> 
			                        </a>
			                      </li>

			                      <li>
			                        <a href="#tabs-demo6-area2" data-toggle="tab" title="Data Rayon">
			                         <span class="round-tabs two">
			                           <i class="glyphicon glyphicon-briefcase"></i>
			                         </span> 
			                       </a>
			                     </li>

			                     <li>
			                      <a href="#tabs-demo6-area3" data-toggle="tab" title="Data Rombel">
			                       <span class="round-tabs three">
			                        <i class="glyphicon glyphicon-bookmark"></i>
			                      </span> </a>
			                    </li>

			                    <li>
			                      <a href="#tabs-demo6-area4" data-toggle="tab" title="Data Jurusan">
			                       <span class="round-tabs four">
			                         <i class="glyphicon glyphicon-education"></i>
			                       </span> 
			                     </a>
			                   </li>
			                </ul>
			                <div class="tab-content tab-content-v5">
			                  <div class="tab-pane fade in active" id="tabs-demo6-area1">
								<div class="panel">
								<div class="panel-heading"><h3>Data Siswa <a href="{{ route('siswa_create') }}" title="Tambah Data" style="float: right; margin-right: 2%"><span class="glyphicon glyphicon-plus-sign" style="color:#2196F3;"></span></a></h3>
                </div>
								<div class="panel-body">
									<div class="responsive-table">
										<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
											<thead>
												<tr>
                          <th>No</th>
													<th>NIS</th>
                          <th>Nama</th>
                          <th>Tempat Lahir</th>
                          <th>Tanggal Lahir</th>
                          <th>JK</th>
                          <th>Alamat</th>
                          <th>Jurusan</th>
                          <th>Rombel</th>
						  <th>Rayon</th>
                          <th>Action</th>
												</tr>
											</thead>
											<tbody>
                      @foreach ($data as $key => $value)
												<tr>
                          <td>{{ $key + 1 }}</td>
													<td>{{ $value->nis }}</td>
                          <td>{{ $value->nama }}</td>
                          <td>{{ $value->tempat_lahir }}</td>
                          <td>{{ $value->tanggal_lahir }}</td>
                          <td>{{ $value->jk }}</td>
                          <td>{{ $value->alamat }}</td>
                          <td>{{ $value->nama_jurusan }}</td>
                          <td>{{ $value->rombel }}</td>
                          <td>{{ $value->nama_rayon }}</td>
                          <td >
                            <button class="btn-sm btn-primary" id="sisna" data-id="{{$value->nis}}" data-title="{{$value->nama}}" data-jurusan="{{ $value->id_jurusan }}" data-rayon="{{$value->id_rayon}}" data-rombel="{{$value->id_rombel}}"><a href="{{ route('siswa_edit', ['nis' => $value->nis]) }}" style="color:white; font-weight: normal;">
                              <span class="glyphicon glyphicon-edit"></span> Edit</a>
                            </button>
                            <button class="btn-sm btn-danger" id="wa" data-id="{{$value->nis}}" data-title="{{$value->nama}}">
                              <a href="{{ route('siswa_delete', ['nis' => $value->nis]) }}" style="color:white; font-weight: normal;"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                            </button>
                          </td>
												</tr>
                      @endforeach
											</tbody>
										</table>
									</div>
								</div>
							  </div><!--panel-->
			                  </div><!--tab pane 1-->
			                  <div class="tab-pane fade" id="tabs-demo6-area2">
			                    <div class="panel">
								<div class="panel-heading"><h3>Data Rayon <a href="{{ route('rayon_create')}}" title="Tambah Data" style="float: right; margin-right: 2%"><span class="glyphicon glyphicon-plus-sign" style="color:#2196F3;"></span></a></h3></div>
								<div class="panel-body">
									<div class="responsive-table">
										<table id="rayon" class="table table-striped table-bordered" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th width="5%">No.</th>
                          <th>Rayon</th>
                          <th>Action</th>
												</tr>
											</thead>
											<tbody>
                        @foreach ($rayon as $key => $value)
												<tr>
													<td>{{ $key + 1 }}</td>
                          <td>{{ $value->nama_rayon }}</td>
                          <td>
                            <button class="btn-sm btn-primary" ><a href="{{ route('rayon_edit', ['id_rayon' => $value->id_rayon]) }}" style="color:white; font-weight: normal;">
                              <span class="glyphicon glyphicon-edit"></span> Edit</a>
                            </button>
                            <button class="btn-sm btn-danger">
                              <a href="{{ route('rayon_delete', ['id_rayon' => $value->id_rayon]) }}" style="color:white; font-weight: normal;"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                            </button>
                          </td>
												</tr>
                        @endforeach
											</tbody>
										</table>
									</div>
								</div>
							  </div><!--panel-->

			                  </div>
			                  <div class="tab-pane fade" id="tabs-demo6-area3">
			                    <div class="panel">
								<div class="panel-heading"><h3>Data Rombel <a href="{{ route('rombel_create') }}" title="Tambah Data" style="float: right; margin-right: 2%"><span class="glyphicon glyphicon-plus-sign" style="color:#2196F3;"></soan></a></h3></div>
								<div class="panel-body">
									<div class="responsive-table">
										<table id="rombel" class="table table-striped table-bordered" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th>No.</th>
                          <th>Jurusan</th>
                          <th>Rombel</th>
                          <th>Action</th>
												</tr>
											</thead>
											<tbody>
                        @foreach ($rombel as $key => $value)
												<tr>
													<td>{{ $key + 1 }}</td>
                          <td>{{ $value->nama_jurusan }}</td>
                          <td>{{ $value->rombel }}</td>
                          <td width="13%">
                            <button class="btn-sm btn-primary" ><a href="{{ route('rombel_edit', ['id_rombel' => $value->id_rombel]) }}" style="color:white; font-weight: normal;">
                              <span class="glyphicon glyphicon-edit"></span> Edit</a>
                            </button>
                            <button class="btn-sm btn-danger">
                              <a href="{{ route('rombel_delete', ['id_rombel' => $value->id_rombel]) }}" style="color:white; font-weight: normal;"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                            </button>
                          </td>
												</tr>
                        @endforeach
											</tbody>
										</table>
									</div>
								</div>
							  </div><!--panel-->
			                  </div>
			                  <div class="tab-pane fade" id="tabs-demo6-area4">
			                    <div class="panel">
								<div class="panel-heading"><h3>Data Jurusan <a href="{{ route('jurusan_create') }}" title="Tambah Data" style="float: right; margin-right: 2%"><span class="glyphicon glyphicon-plus-sign" style="color:#2196F3;"></soan></a></h3></div>
								<div class="panel-body">
									<div class="responsive-table">
										<table id="jurusan" class="table table-striped table-bordered" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th width="5%">No</th>
													<th>Jurusan</th>
                          <th>Action</th>
												</tr>
											</thead>
											<tbody>
                        @foreach ($jurusan as $key => $value)
												<tr>
													<td>{{ $key + 1 }}</td>
                          <td>{{ $value->nama_jurusan }}</td>
                          <td width="13%">
                            <button class="btn-sm btn-primary" ><a href="{{ route('jurusan_edit', ['id_jurusan' => $value->id_jurusan]) }}" style="color:white; font-weight: normal;">
                              <span class="glyphicon glyphicon-edit"></span> Edit</a>
                            </button>
                            <button class="btn-sm btn-danger">
                              <a href="{{ route('jurusan_delete', ['id_jurusan' => $value->id_jurusan]) }}" style="color:white; font-weight: normal;"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                            </button>
                          </td>
												</tr>
                        @endforeach
											</tbody>
										</table>
									</div>
								</div>
							  </div><!--panel-->
			                  </div>
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
    $('#rayon').DataTable();
    $('#rombel').DataTable();
    $('#jurusan').DataTable();
    $(".nav-tabs a").click(function (e) {
      e.preventDefault();  
      $(this).tab();
    });

  });
</script>
@endsection