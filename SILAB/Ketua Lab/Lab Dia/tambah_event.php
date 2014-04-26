<?php include "header.html"; ?>
<div class="kolom">			
	<div class="konten">
		<?php include "konten.html"; ?>
		<div id="judul-jenis"><strong>TAMBAH EVENT</strong></div>
		<div class="body-in">
			<form action="" method="POST">
				<table>
					<tr>
						<td>Nama Kegiatan</td>
						<td>:</td>
						<td><input type="text" name="user"></td>
					</tr>
					<tr>
						<td>Isi</td>
						<td>:</td>
						<td><textarea name="mail" cols="40" rows="4" required="required"></textarea></td>
					</tr>
					<tr>
						<td colspan="3" align="center"><input type="submit" value="Tambah" class="button"></td>
					</tr>
				</table>
			</form>
		</div>			
	</div>
</div>