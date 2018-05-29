@extends('weguru')
@section('content')
<div id="content"><!--content-->
      <div class="tabs-wrapper text-center"><!--tabwrapper-->
        <div class="panel box-shadow-none text-left content-header">
          <div class="panel-body" style="padding-bottom:0px">
            <div class="col-md-12">
              <h3 class="animated fadeInLeft">Mesin Absensi</h3>
              <p class="animated fadeInDown">Fingerprint <span class="fa-angle-right fa"></span> Mesin Absensi
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
                <div class="panel-heading"><h3>Data Mesin Guru<a href="{{ route('fingerprintguru_create') }}" title="Tambah Data" style="float: right; margin-right: 2%"><span class="glyphicon glyphicon-plus-sign" style="color:#2196F3;"></span></a></h3>
                      </div>
                <div class="panel-body">
                  <div class="responsive-table">
                    <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>IP Address</th>
                          {{-- <th>Port</th> --}}
                          <th>Comkey</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($data as $key => $value)
                            <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>{{ $value->ip }}</td>
                              {{-- <td>{{ ($value->port) ? $value->port : '-' }}</td> --}}
                              <td>{{ $value->comkey }}</td>
                              <td>{{ ($value->status == 1) ? "Aktif" : "Tidak Aktif" }}</td>
                              <td>
                                @if ($value->status == 1)
                                  <a href="{{ route('fingerprintguru_deactive', ['id' => $value->id]) }}" class="btn-sm btn-primary" data-position="top" title="Non Aktifkan Mesin Fingerprint"><i class="glyphicon glyphicon-remove"></i></a>
                                @else
                                  <a href="{{ route('fingerprintguru_active', ['id' => $value->id]) }}" class="btn-sm btn-success" data-position="top" data-delay="50" title ="Aktifkan Mesin Fingerprint"><i class="glyphicon glyphicon-ok"></i></a>
                                @endif
                                <a href="{{ route('fingerprintguru_check_connection', ['id' => $value->id]) }}" class="btn-sm btn-info" data-position="top" data-delay="50" title="Cek Koneksi"><i class="glyphicon glyphicon-signal"></i></a>
                                <a href="{{ route('fingerprintguru_edit', ['id' => $value->id]) }}" class="btn-sm btn-primary" data-position="top" data-delay="50" title="Ubah Mesin Fingerprint"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{{ route('fingerprintguru_delete', ['id' => $value->id]) }}" class="btn-sm btn-danger" data-position="top" data-delay="50" title="Hapus Mesin Fingerprint"><i class="glyphicon glyphicon-trash"></i></a>
                              </td>
                            </tr>
                          @endforeach
                      </tbody>
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