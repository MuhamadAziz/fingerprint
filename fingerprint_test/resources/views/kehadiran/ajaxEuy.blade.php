<script src="{{ url('asset/js/plugins/jquery.datatables.min.js') }}"></script>
<script src="{{ url('asset/js/plugins/datatables.bootstrap.min.js') }}"></script>
<!-- custom -->

<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>No</th>
      <th>NIS</th>
      <th>Nama</th>
      <th>Jurusan</th>
      <th>Rombel</th>
      <th>Rayon</th>
      <th>Tanggal</th>
      <th>Waktu</th>
      <th>Machine Id</th>
      <th>Ket</th>
      <th>Status</th>
    </tr>
   </thead>
  <tbody>
        <?php
        // koneksi ke mysql
        $Host = "localhost";
        $username = "root";
        $password = "RPLbaru2018";
        $database = "fingerprint";
        $koneksi = new mysqli( $Host, $username, $password, $database );
        $date = date('Y-m-d');
        $carikode = mysqli_query($koneksi, "SELECT kehadiran.*, qw_siswa.*, fingerprint_machines.lokasi
FROM qw_siswa, kehadiran, fingerprint_machines where kehadiran.nis = qw_siswa.nis AND kehadiran.machine_id = fingerprint_machines.id AND tanggal='$date'") or die (mysqli_error());
        // menjadikannya array
        $no = 0;
        while($value = mysqli_fetch_array($carikode)){
        $no++;

        ?>
      <tr>
        <td>@php echo $no @endphp</td>
        <td>@php echo $value['nis'] @endphp</td>
        <td>@php echo $value['nama'] @endphp</td>
        <td>@php echo $value['nama_jurusan'] @endphp</td>
        <td>@php echo $value['rombel'] @endphp</td>
        <td>@php echo $value['rayon'] @endphp</td>
        <td>@php echo $value['tanggal'] @endphp</td>
        <td>@php echo $value['waktu'] @endphp</td>
        <td>@php echo $value['machine_id'] @endphp</td>
        <td>@php echo $value['lokasi'] @endphp</td>
        <td><?php $stat = $value['status'];
            if($stat == "1"){
              echo "Pulang";
            }elseif($stat == "0"){
              echo "Masuk";
            }else{
              echo "Lembur";
            }
        ?></td>
      </tr>
      <?php } ?>
  </tbody>
</table>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable({
      "order": [[ 4, "desc" ]]
    });
  });
</script>
