<?php include "header.html"; ?>
<div class="kolom">			
	<div class="konten">
		<?php include "konten.html"; ?>
		<div id="judul-jenis"><strong>EDIT ASSET</strong></div>
		<div class="body-in">
			<form action="" method="POST">
				<table>
					<tr>
						<td width="150px">Nama Aset Baru</td>
						<td>:</td>
						<td width="150px"><input type="text" name="user"></td>
					</tr>
					<tr>
						<td>Nama Aset Lama</td>
						<td>:</td>
						<td><select><option>Laptop</option><option>PC</option></select></td>
					</tr>
					<tr>
						<td>Jumlah</td>
						<td>:</td>
						<td><input type="email" name="mail" required="required"></td>
					</tr>
					<tr>
						<td>Tahun</td>
						<td>:</td>
						<td><input type="email" name="mail" required="required"></td>
					</tr>
					<tr>
						<td align="center"><input type="submit" value="Tambah" class="button"></td>
						<td></td>
						<td align="center"><input type="submit" value="Kurang" class="button"></td>
					</tr>
				</table>
			</form>
		</div>			
	</div>
</div>