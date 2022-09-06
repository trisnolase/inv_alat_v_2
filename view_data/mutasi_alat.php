<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
	<div class='col-md-12'>
		<div class='card'>
			<div class='card-body'>
				<a class='btn btn-success btn-sm' href='tambahmutasi'>Mutasi Peralatan</a>
			</div>
		</div>
	</div>
	<?php
	$sql = mysqli_query($dblink, "SELECT * from histori_lokasi_view order by id_histori desc");
	?>
	<div class='col-md-12'>
		<div class='card'>
			<div class='card-header card-header-primary'>
				<h4 class='card-title '>Mutasi</h4>
				<p class='card-category'> List Data</p>
			</div>
			<div class='card-body'>
				<div class='table-responsive'>
					<table class='table table-hover'>
						<thead class='text-primary text-center'>
							<th>ID Alat</th>
							<th>Nama Alat</th>
							<th>Lokasi Awal</th>
							<th>Lokasi Mutasi</th>
							<th>Tanggal Mutasi</th>
						</thead>
						<tbody>
							<?php
							while ($r = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
								$xidal = isset($r['id_alat']) ? $r['id_alat'] : '';
								$xnal = isset($r['nama_peralatan']) ? $r['nama_peralatan'] : '';
								$xnmla = isset($r['nama_lokasi_a']) ? $r['nama_lokasi_a'] : '';
								$xnmlb = isset($r['nama_lokasi_b']) ? $r['nama_lokasi_b'] : '';
								$xtglm = isset($r['tgl']) ? $r['tgl'] : '';
							?>
								<tr>
									<td class='text-center'><?php echo $xidal ?></td>
									<td><?php echo $xnal ?></td>
									<td><?php echo $xnmla ?></td>
									<td><?php echo $xnmlb ?></td>
									<td class="text-center"><?php echo date_format(new DateTime($xtglm), 'd M Y'); ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>