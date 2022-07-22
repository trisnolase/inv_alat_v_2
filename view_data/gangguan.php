<?php
$sql = mysqli_query($dblink, "SELECT * from tblgangguan as a,tblalat as b where a.id_alat=b.id_alat order by
	a.id_gangguan desc");
?>
<div class='col-md-12'>
	<div class='card'>
		<div class='card-header card-header-primary'>
			<h4 class='card-title '>Laporan Gangguan</h4>
			<p class='card-category'> List Data</p>
		</div>
		<div class='card-body'>
			<div class='table-responsive'>
				<table class='table table-hover'>
					<thead class='text-primary text-center'>
						<th>ID Gangguan</th>
						<th>ID Alat</th>
						<th>Nama Alat</th>
						<th>Tanggal Lapor</th>
						<th>Ciri - Ciri Gangguan</th>
						<th>Deskripsi Gangguan Alat</th>
						<th>Status Proses</th>
						<th>Aksi</th>
					</thead>
					<tbody>
						<?php
						while ($r = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
							$xidk = isset($r['id_gangguan']) ? $r['id_gangguan'] : '';
							$xnma = isset($r['nama_peralatan']) ? $r['nama_peralatan'] : '';
							$xida = isset($r['id_alat']) ? $r['id_alat'] : '';
							$xtgl = isset($r['tgl_gangguan']) ? $r['tgl_gangguan'] : '';
							$xciri = isset($r['ciri']) ? $r['ciri'] : '';
							$xdg = isset($r['deskripsi_gangguan']) ? $r['deskripsi_gangguan'] : '';
							$xsts = isset($r['status']) ? $r['status'] : '';
							if ($xsts == "B") {
								$xstatus = "Belum Diproses";
							} else {
								$xstatus = "Sudah Diproses";
							}
						?>
							<tr>
								<td><?php echo $xidk ?></td>
								<td><?php echo $xida ?></td>
								<td><?php echo $xnma ?></td>
								<td class="text-center"><?php echo date_format(new DateTime($xtgl), 'd M Y'); ?></td>
								<td><?php echo $xciri ?></td>
								<td><?php echo $xdg ?></td>
								<td><?php echo $xstatus ?></td>
								<td class="text-center">
									<?php if ($xsts <> 'S') {
										echo "<a href='statusalat-$xidk' class='btn btn-danger btn-sm'>Ubah Status</a>";
									} else {
										echo "<i class='material-icons text-success'>check</i>";
									} ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>