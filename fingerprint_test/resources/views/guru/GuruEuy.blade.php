<script src="{{ url('asset/js/plugins/jquery.datatables.min.js') }}"></script>
<script src="{{ url('asset/js/plugins/datatables.bootstrap.min.js') }}"></script>
<!-- custom -->
<table class="table table-striped table-bordered" cellspacing="0" cellpadding="0" border="0">
 <tr>
  <td>
   <table class="table table-bordered table-striped" cellspacing="0" cellpadding="1" >
     <tr>
        <th style="width: 10%">No</th>
        <th style="width: 60%;">Nama</th>
        <th>Waktu</th>
     </tr>
   </table>
  </td>
 </tr>
<tr>
<td>
<div id="turun" style="width: 100%; height: 300px; overflow: auto; margin-top: -9%;">
<table id="turun" class="table table-striped table-bordered" width="100%" height="400px" cellpadding="1" cellspacing="0">
  <tbody>
        <?php
        // koneksi ke mysql
        $Host = "localhost";
        $username = "root";
        $password = "RPLbaru2018";
        $database = "fingerprint";
        $koneksi = new mysqli( $Host, $username, $password, $database );
        $date = date('Y-m-d');
        $carikode = mysqli_query($koneksi, "SELECT kehadiranguru.*, guru.nama FROM guru, kehadiranguru where kehadiranguru.nip = guru.nip AND tanggal='$date'") or die (mysqli_error($koneksi));
        // menjadikannya array
        $no = 0;
        while($value = mysqli_fetch_array($carikode)){
        $no++;

        ?>
      <tr>
        <td>@php echo $no @endphp</td>
        <td>@php echo $value['nama'] @endphp</td>
        <td>@php echo $value['waktu'] @endphp</td>
      </tr>
      <?php } ?>
  </tbody>
</table>
</div>
</td>
</tr>
</table>
<script type="text/javascript">
  var $el = $("#turun");
    function anim() {
      var st = $el.scrollTop();
      var sb = $el.prop("scrollHeight")-$el.innerHeight();
      $el.animate({scrollTop: st<sb/2 ? sb : 0}, 50000, anim);
    }
    function stop(){
      $el.stop();
    }
    anim();
    $el.hover(stop, anim);
</script>