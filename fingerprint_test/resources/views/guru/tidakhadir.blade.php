@extends('weguru')
@section('content')
<div id="content"><!--content-->
      <div class="tabs-wrapper text-center"><!--tabwrapper-->
        <div class="panel box-shadow-none text-left content-header">
          <div class="panel-body" style="padding-bottom:0px">
            <div class="col-md-12">
              <h3 class="animated fadeInLeft">Data Absen Guru</h3>
              <p class="animated fadeInDown">Fingerprint <span class="fa-angle-right fa"></span> Data Ketidakhadiran Guru
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
                <div class="panel-heading"><h3>Form Tidak Hadir</h3>
                      </div>
                <div class="panel-body">
                  <div class="responsive-table">
                    <form id="teuaya" method="post" action="{{route('input_ketidakhadiranguru')}}">
                    <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>Keterangan</th>
                        </tr>
                      </thead>
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
                                      <td>
                                        <input type="hidden" name="input_nip[{{$no}}]" value="{{$guru->nip}}">
                                        <div class="form-group form-animate-text">
                                        <input type="text" class="form-text" name="atten[{{$no}}]" placeholder="Keterangan" style="height: 20px">
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
              </div><!--col md6-->
          </div><!--end tabpanel demo-->
        </div><!--end col tab content-->
      </div><!--endtabwrapper-->
    </div><!--endcontent-->
  </div><!--endcontainer-->
@endsection
@section('asset_footer')
@endsection