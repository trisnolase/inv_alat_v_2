<?php
$sql = mysqli_query($dblink, "SELECT * from penanganan_view");
?>
<div class='col-md-12'>
	<div class='card'>
		<div class='card-header card-header-primary'>
			<h4 class='card-title '>Penanganan Laporan Gangguan</h4>
			<p class='card-category'> List Data</p>
		</div>
		<div class='card-body'>
			<div class='table-responsive'>
				<table class='table table-hover'>
					<thead class='text-primary text-center'>
						<th>ID Gangguan</th>
						<th>ID Alat</th>
						<th>Nama Alat</th>
						<th>Tanggal Penanganan</th>
						<th>Teknisi</th>
						<th>Penyelesian</th>
						<th>Hasil</th>
						<th>Rekomendasi</th>
					</thead>
					<tbody>
						<?php
						while ($r = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
							$xidk = isset($r['id_penanganan']) ? $r['id_penanganan'] : '';
							$xidg = isset($r['id_gangguan']) ? $r['id_gangguan'] : '';
							$xtgl = isset($r['tgl_penanganan']) ? $r['tgl_penanganan'] : '';
							$xtek = isset($r['teknisi']) ? $r['teknisi'] : '';
							$xpeny = isset($r['penyelesaian']) ? $r['penyelesaian'] : '';
							$xhasil = isset($r['hasil']) ? $r['hasil'] : '';
							$xrekom = isset($r['rekomendasi']) ? $r['rekomendasi'] : '';
							$xida = isset($r['id_alat']) ? $r['id_alat'] : '';
							$xnma = isset($r['nama_peralatan']) ? $r['nama_peralatan'] : '';
						?><tr>
								<td class='text-center'><?php echo $xidg ?></td>
								<td><?php echo $xida ?></td>
								<td><?php echo $xnma ?></td>
								<td class="text-center"><?php echo date_format(new DateTime($xtgl), 'd M Y'); ?></td>
								<td><?php echo $xtek ?></td>
								<td><?php echo $xpeny ?></td>
								<td><?php echo $xhasil ?></td>
								<td><?php echo $xrekom ?></td>
							</tr>
						<?php } ?></tbody>
				</table>
			</div>
		</div>
	</div>