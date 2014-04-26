<?php include "header.html"; ?>
<div class="kolom">			
	<div class="konten">
		<?php include "konten.html"; ?>
		<div id="judul-jenis"><strong>TAMBAH PUBLIKASI</strong></div>
		<div class="body-in">
			<form action="" method="POST">
				<table>
					<tr>
						<td width="150px">Upload</td>
						<td>:</td>
						<td width="250px"><input type="text" name="user"><input type="submit" value="Browse" class="button"></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><input type="text" name="user"></td>
					</tr>
					<tr>
						<td>Pengarang</td>
						<td>:</td>
						<td><input type="email" name="mail" required="required"></td>
					</tr>
					<tr>
						<td>Tahun</td>
						<td>:</td>
						<td><input type="email" name="mail" required="required"></td>
					</tr>
					<tr>
						<td colspan="3" align="center"><input type="submit" value="Tambah" class="button"></td>
					</tr>
				</table>
			</form>
		</div>			
	</div>
</div>