@extends('welcomeguru')
@section('content')
<div id="content"><!--content-->
      <div class="tabs-wrapper text-center"><!--tabwrapper-->
        <div class="panel box-shadow-none text-left content-header">
          <div class="panel-body" style="padding-bottom:0px">
            <div class="col-md-12">
              <h3 class="animated fadeInLeft">Data Absen Guru</h3>
              <p class="animated fadeInDown">Fingerprint <span class="fa-angle-right fa"></span> Data Absensi Guru
            </div>

          </div>
        </div>
        <div><!-- col tab content-->
          <div role="tabpanel" class="tab-pane fade active in" id="tabs-area-demo" aria-labelledby="tabs1"><!--tabpanel demo-->
            <div class="col-md-6">
                        <div class="col-md-12 tabs-area">
                          <div class="liner"></div>
                      <div class="tab-content tab-content-v5">
                        <div class="tab-pane fade in active" id="tabs-demo6-area1">
                <div class="panel">
                <div class="panel-heading"><h3>Data Guru Sudah Hadir</h3>
                      </div>
                <div class="panel-body">
                    <div id="loading"><p><span class="fa fa-spin fa-spinner"></span> Sedang Memuat Data......</p></div>
                    <div id="boaedan"></div>
                  
                </div>
                </div><!--panel-->
                        </div><!--tab pane 1-->
                        <div class="clearfix"></div>
                      </div>
                        </div>
              </div><!--col md6-->
              <div class="col-md-6">
                        <div class="col-md-12 tabs-area">
                          <div class="liner"></div>
                      <div class="tab-content tab-content-v5">
                        <div class="tab-pane fade in active" id="tabs-demo6-area1">
                <div class="panel">
                <div class="panel-heading"><h3>Data Guru Belum Hadir</h3>
                      </div>
                <div class="panel-body">
                  <div id="henteuedan">
                    <table class="table table-striped table-bordered" cellspacing="0" cellpadding="0" border="0">
                       <tr>
                        <td>
                         <table class="table table-bordered table-striped" cellspacing="0" cellpadding="1" >
                           <tr>
                              <th style="width: 10%;">No</th>
                              <th style="width: 45%;">Nama</th>
                              <th>Keterangan</th>
                           </tr>
                         </table>
                        </td>
                       </tr>
                      <tr>
                      <td>
                      <div style="width: 100%; height: 300px; overflow: auto; margin-top: -9%;">
                      <table class="table table-striped table-bordered" width="100%" height="400px" cellpadding="1" cellspacing="0">
                      <tbody>
                        <?php 
                        use App\KehadiranGuru;
                        use App\KetidakhadiranGuru;
                        $no = 0;
                      ?>
                      
                        {!! csrf_field() !!}
                      <?php
                      foreach ($guru as $guru) {
                        $cek = KetidakhadiranGuru::where('nip',"=",$guru->nip)->where('tanggal',date("Y-m-d"))->where('ket','!=',"")->first();
                              $cek_kehadiran = KehadiranGuru::where('nip',"=",$guru->nip)->where('tanggal',date("Y-m-d"))->count();
                        if ($cek_kehadiran > 0) {

                        }else{
                          if ($cek == "") {
                            $no++;
                            ?>

                        <tr>
                                      <td>{{ $no }}</td>
                                      <td>{{ $guru->nama }}</td> 
                                      <td></td>
                        </tr>
                                <?php
                          }else{
                            $no++
                            ?>
                            <tr>
                                      <td>{{ $no }}</td>
                                      <td>{{ $guru->nama }}</td> 
                                      <td>
                                        {{$cek->ket}}
                                      </td>
                        </tr>
                            <?php
                          }   
                        }
                      }
                      ?>
                      </tbody>
                    </table>
                    </div>
                    </td>
                    </tr>
                    </table>
                </div>
              </div>
                </div><!--panel-->
                        </div><!--tab pane 1-->
                        <div class="clearfix"></div>
                      </div>
                        </div>
              </div><!--col md6-->
          </div><!--end tabpanel demo-->
        </div><!--end col tab content-->
      </div><!--endtabwrapper-->
    </div><!--endcontent-->
  </div><!--endcontainer-->
@endsection
@section('asset_footer')
<script type="text/javascript">
   $(document).ready(function()
    {
        $.ajaxSetup(
        {
            cache: false,
            beforeSend: function() {
                $('#boaedan').hide();
                $('#loading').show();
            },
            complete: function() {
                $('#loading').hide();
                $('#boaedan').show();
            },
            success: function() {
                $('#loading').hide();
                $('#boaedan').show();
            }
        });
    });
  $(document).ready(function(){
    $('#boaedan').load('{{ route('guruSinkronisasi') }}');
  })
  $(document).ready(function(){
    $('#henteuedan').load();
  })
    setInterval(function(){
      $('#boaedan').load('{{ route('guruSinkronisasi') }}');
    }, 100000)
    setInterval(function(){
      $('#henteuedan').load();
    }, 100000)
</script>
@endsection