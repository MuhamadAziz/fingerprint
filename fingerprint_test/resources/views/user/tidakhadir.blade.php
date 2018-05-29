@extends('welcome')

@section('content')
  <div class="row row-main">
    <div class="col s12 m12 l12">
      <div class="card-panel">
        <div class="row">
          <div class="col s12 m4 l4">
            <nav class="cyan nav-breadcrumb">
              <div class="nav-wrapper">
                <div class="col s12 m12 l12">
                  <a class="breadcrumb">Data Belum Hadir</a>
                </div>
              </div>
            </nav>
          </div>
          <div class="col s12 m8 l8">
            <div class="row right">
              <div class="col s12 m12 l12">
               <!--<a href="{{ route('siswa_create') }}" class="btn waves-effect waves-light cyan tooltipped" data-position="top" data-delay="50" data-tooltip="Tambah Data Siswa"><i class="material-icons">add_circle</i></a>-->
              </div>
            </div>
          </div>
        </div>
        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <h4>Tabel Data Belum Hadir</h4>
          </div>
        </div>
        <table class="striped responsive-table">
          <thead>
            <tr>
              <th>No.</th>
              <th>NIS</th>
              <th>Nama</th>
              <th>Rombel</th>
              <th>Ket</th>

            </tr>
           </thead>
          <tbody>
            <?php 
            use App\Kehadiran;
            use App\Ketidakhadiran;
            $no = 0;
            ?>
            <form method="post" action="/ketidakhadiran/input">
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
                <td>{{ $siswa->rombel}}</td>
                <td>
                  <input type="hidden"  name="input_nis[{{$no}}]" value="{{$siswa->nis}}">
                  <!-- <input type="submit" name="input" value="sakit"> -->
                  <input type="radio" class="with-gap" name="atten[{{$no}}]" value="sakit" id="s"> <label for="s" style="padding-left: 22px;">Sakit</label>
                  <input type="radio" class="with-gap" name="atten[{{$no}}]" value="izin" id="i"><label for="i" style="padding-left: 22px;"">Izin</label>
                  <input type="radio" class="with-gap" name="atten[{{$no}}]" value="alpa" id="a"><label for="a" style="padding-left: 22px;">Alpha</label>
                </td>
              </tr>
            <?php
              }   
            }
            }
            ?>
          </tbody>
        </table>
        <div class="row right">
            <button class="btn waves-effect waves-light cyan" id="btn_create">Simpan</button>
         </div>
        <div class="row right" style="margin-right: 5px;">
            <a href="{{ url('/ketidakhadiran') }}" class="btn waves-effect waves-light cyan" id="btn_create">Batal</a>
        </div>
        </form>


        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <div class="right">
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
    $('radio').material_select();
  });
</script>