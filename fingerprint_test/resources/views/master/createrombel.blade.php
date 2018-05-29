@extends('welcome')
@section('content')


    <div id="content"><!--start content-->
      <div class="panel box-shadow-none content-header">
              <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Form rombel</h3>
                    <p class="animated fadeInDown">
                      Fingerprint <span class="fa-angle-right fa"></span> Form rombel
                    </p>
                </div>
              </div>
            </div>
            <div class="form-element">
              <div class="col-md-12 padding-0">
              <div class="col-md-12">
                  <div class="col-md-12 panel">
                      <div class="col-md-12 panel-heading">
                        <h4>Form rombel</h4>
                    </div>

      <?php
        // koneksi ke mysql
        $Host = "localhost";
        $username = "root";
        $password = "RPLbaru2018";
        $database = "fingerprint";
        $koneksi = new mysqli( $Host, $username, $password, $database );

        $carikode = mysqli_query($koneksi, "SELECT id_rombel from rombel") or die (mysqli_error());
        // menjadikannya array
        $datakode = mysqli_fetch_array($carikode);
        $jumlah_data = mysqli_num_rows($carikode);
        // jika $datakode
        if ($datakode) {
         // membuat variabel baru untuk mengambil kode barang mulai dari 1
         $nilaikode = substr($jumlah_data[0], 1);
         // menjadikan $nilaikode ( int )
         $kode = (int) $nilaikode;
         // setiap $kode di tambah 1
         $kode = $jumlah_data + 1;
         // hasil untuk menambahkan kode 
         // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
         // atau angka sebelum $kode
         $kode_otomatis = "RB".str_pad($kode, 3, "0", STR_PAD_LEFT);
        } else {
         $kode_otomatis = "RB001";
        }
      ?>

                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">
                          <form class="cmxform" id="signupForm" method="post" action="{{ route('rombel_create') }}">
                          {!! csrf_field() !!}                            
                              <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" class="form-text" id="idjur" name="id_rombel" required value="<?php echo $kode_otomatis?>" readonly="readonly">
                                    <span class="bar"></span>
                                    <label>ID Rombel</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                              <div class="form-group" style="margin-top: 10%" ><label class="col-sm-2 control-label text-left">Jurusan</label>
                                <div class="col-sm-10">
                                  <div class="col-sm-12 padding-0">
                                    <select class="form-control" name="id_jurusan">
                                      <option selected disabled="">Pilih Jurusan</option>
                                      @foreach ($jurusan as $jurusan)
                                        <option value="{{$jurusan->id_jurusan}}">{{$jurusan->nama_jurusan}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                              <div class="col-md-12">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="rombel" name="rombel" required>
                                <span class="bar"></span>
                                <label>Rombel</label>
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