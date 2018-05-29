<!-- data-tables -->
    <script type="text/javascript" src="{{ url('assets/js/data-tables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/data-tables/data-tables-script.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(){    
      $('#data-tables').DataTable({
  "columnDefs": [{
    "defaultContent": "-",
    "targets": "_all"
  }]});
  })
  </script>
<table id="data-tables" class="responsive-table display data-tables" cellspacing="0">
  <thead>
      <tr>
          <th>No.</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Tanggal</th>
          <th>Waktu</th>
          <th>Machine Id</th>
          <th>Ket</th>
          <th>Status</th>
      </tr>
  </thead>

  <tbody>
      <tr>
          @foreach ($data as $key => $value)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $value->nis }}</td>
            <td>{{ $value->nama }}</td>
            <td>{{ $value->tanggal }}</td>
            <td>{{ $value->waktu }}</td>
            <td>{{ $value->machine_id }}</td>
            <td>{{ $value->ket }}</td>
            <td>{{ $value->status }}</td>
          </tr>
        @endforeach
      </tr>
  </tbody>
</table>

