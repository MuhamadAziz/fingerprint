@extends('welcome')
@section('content')
    <div id="content"><!--start content-->
      <div class="panel box-shadow-none content-header">
              <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Form Rayon</h3>
                    <p class="animated fadeInDown">
                      Fingerprint <span class="fa-angle-right fa"></span> Form Rayon
                    </p>
                </div>
              </div>
            </div>
            <div class="form-element">
              <div class="col-md-12 padding-0">
              <div class="col-md-12">
                  <div class="col-md-12 panel">
                      <div class="col-md-12 panel-heading">
                        <h4>Form Rayon</h4>
                    </div>

      <?php
        // koneksi ke mysql
        $Host = "localhost";
        $username = "root";
        $password = "RPLbaru2018";
        $database = "fingerprint";
        $koneksi = new mysqli( $Host, $username, $password, $database );

        $carikode = mysqli_query($koneksi, "SELECT id_rayon from rayon") or die (mysqli_error());
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
         $kode_otomatis = "R".str_pad($kode, 4, "0", STR_PAD_LEFT);
        } else {
         $kode_otomatis = "R0001";
        }
      ?>

                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">
                          <form class="cmxform" id="signupForm" method="post" action="{{ route('rayon_create') }}">
                          {!! csrf_field() !!}                            
                              <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" class="form-text" id="idrayon" name="id_rayon" required value="<?php echo $kode_otomatis?>" readonly="readonly">
                                    <span class="bar"></span>
                                    <label>ID Rayon</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="rayon" name="rayon" required>
                                <span class="bar"></span>
                                <label>Nama</label>
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
  <script>
  $(document).ready(function() {
    $('#comkey').mask('00000');
    $('#ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
      translation: {
        'Z': {
          pattern: /[0-9]/, optional: true
        }
      }
    });
    $('select').material_select();
  });
  </script>
@endsection