<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
	use App\Ketidakhadiran;
	use App\Kehadiran;
	?>
</head>
<body onload="window.print();">
	<table align="center">
		<tr>
			<td>NIS</td>
			<td>Nama</td>
			<td>Jenis Kelamin</td>
			<td>Rombel</td>
			<td>Rayon</td>
			<td>Keterangan</td>
		</tr>
		<?php 
		foreach ($siswa as $r) {
			$hadir = Kehadiran::where('nis',$r->nis)->where('tanggal',$tanggal)->count();
			if ($hadir > 0) {
				?>
				<tr>
					<td>{{$r->nis}}</td>
					<td>{{$r->nama}}</td>
					<td>{{$r->jk}}</td>
					<td>{{$r->rombel}}</td>
					<td>{{$r->nama_rayon}}</td>
					<td>hadir</td>
				</tr>

				<?php 
			}else{
				$tidakhadir_count = Ketidakhadiran::where('nis',$r->nis)->where('tanggal',$tanggal)->count();
				if ($tidakhadir_count >0) {
					$tidakhadir = Ketidakhadiran::where('nis',$r->nis)->where('tanggal',$tanggal)->first();	
					?>
					<tr>
						<td>{{$r->nis}}</td>
						<td>{{$r->nama}}</td>
						<td>{{$r->jk}}</td>
						<td>{{$r->rombel}}</td>
						<td>{{$r->nama_rayon}}</td>
						<td>{{$tidakhadir->keterangan}}</td>
					</tr>
					<?php
				}else{
					?>
					<tr>
						<td>{{$r->nis}}</td>
						<td>{{$r->nama}}</td>
						<td>{{$r->jk}}</td>
						<td>{{$r->rombel}}</td>
						<td>{{$r->nama_rayon}}</td>
						<td>belum diinput</td>
					</tr>
					<?php
				}
			}
		}
		?>
	</table>
</body>
</html>