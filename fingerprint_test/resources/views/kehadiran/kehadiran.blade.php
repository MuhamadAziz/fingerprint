<table border="1">
	<tr>
		<td colspan="3">Sudah Hadir</td>
	</tr>
	<tr>
		<td>id</td>
		<td>NIS</td>
		<td>waktu</td>
	</tr>
	
	@foreach ($hadir as $hadir)
	<tr>
		<td>{{$hadir->id_kehadiran}}</td>
		<td>{{$hadir->nis}}</td>
		<td>{{$hadir->waktu}}</td>
	</tr>
	@endforeach
</table>
<table border="1">
	<tr>
		<td colspan="6">Belum Hadir</td>
	</tr>
	<tr>
		<td>NIS</td>
		<td>S</td>
		<td>I</td>
		<td>A</td>
	</tr>
	<?php 
		use App\Kehadiran;

		foreach ($siswa as $siswa) {
			$cek = Kehadiran::where('nis',"=",$siswa->nis)->where('tanggal',date("Y-m-d"))->where('keterangan','!=',"")->first();
			if ($cek == "") {
				?>
					<tr>
						<td>{{$siswa->nis}}</td>
						<td>
							<form method="post" action="/ketidakhadiran/sakit">
								<input type="hidden" name="input_nis" value="{{$siswa->nis}}">
								<input type="submit" name="input" value="sakit">
								{{ csrf_field() }}
							</form>
						</td>
						<td>
							<form method="post" action="/ketidakhadiran/izin">
								<input type="hidden" name="input_nis" value="{{$siswa->nis}}">
								<input type="submit" name="input" value="izin">
								{{ csrf_field() }}
							</form>
						</td>
						<td>
							<form method="post" action="/ketidakhadiran/alfa">
								<input type="hidden" name="input_nis" value="{{$siswa->nis}}">
								<input type="submit" name="input" value="alfa">
								{{ csrf_field() }}
							</form>
						</td>
					</tr>
				<?php
			}		
		}
	 ?>
</table>